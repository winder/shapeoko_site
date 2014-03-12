<?php
include 'mainheader.php';
include 'connect.php';

/***************************************************************
This file is used to actually submit the project to the database
the file is called from project_entry.php 
***************************************************************/

echo '<div class="container">';
echo '<div class="row"></br></br>';


// Check connection, exit if problem
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit("oh god.. there was a sql problem");
}

//if the user is not logged in, we need to bounce them, they have no business calling this page
if ($user->data['user_id'] == ANONYMOUS){
  echo "you must be logged in to submit a project</br>use the form in the navbar to login.</br>Or Register for a new account.";
  exit;
}else{
    

    //the entire condition depends on the user both being logged in AND uploading at least one file
    //if no file (image) is present, then we have to reject the submission. Using back, should let them
    //attach a file without loosing their form data
    /*---------------------------------------------------------------*/
    if(isset($_FILES['projectPicture'])){
        $info = pathinfo($_FILES['projectPicture']['name']);
        $ext1 = strtolower($info['extension']); //get the extension of the file
        $size_check = $info['size'];
        echo $size_check;
        if($size_check >=1024){exit;}
        $image1 = $ext1;
        //hardcoded values as placeholders for future features
        $image2 = 'jpg';
        $image3 = 'jpg';
        $image4 = 'jpg';
        $image5 = 'jpg';
    }else{exit('You must include at least one image for your project. Click the back button to try again.');}
    

    //Go ahead and post the form data, but escape it so we dont get burned
        $title = mysql_real_escape_string($_POST['projectTitle']);
        $description = mysql_real_escape_string(nl2br(htmlspecialchars($_POST['projectDescription'])));
        $makercam = mysql_real_escape_string($_POST['usedMakercam']);
        $instructions = mysql_real_escape_string(nl2br(htmlspecialchars($_POST['additionalInstructions'])));

    //Create these variables for use when inserting record into the projects table
    //eventually these will be filled in on the project_entry.php page.... for now we are hard coding them
        $project_os = 1;                                  //is project open source?
        $project_url="www.shapeoko.com";                  //what is the projects 'buy' URL?
        $project_user = $user->data['username_clean'];    //get the username of the submitter
        $project_user_id = $user->data['user_id'];        //get the user id so we can do some cross referencing with the user table later

    //Build up the sql string to execute based on variables POSTED from submission
    //regarding submitting Rich Text: http://www.clonmelweb.net/tutorial_TinyMCE_2of2.php
        $sql="INSERT INTO projects (project_user, project_user_id, project_title, project_description, image1, image2, image3, image4, image5, project_instructions, makercam, project_os, project_url)
        VALUES('$project_user','$project_user_id','$title','$description', '$image1', '$image2', '$image3', '$image4', '$image5', '$instructions', '$makercam', '$project_os', '$project_url')";

    //Run the query
        $result = mysqli_query($con, $sql);
    
    //Grab the latest insert ID for use with matching images to project ID and posting links
        $new_project_id = mysqli_insert_id($con);

    //we had to wait until after the post was submitted in order to obtain the new project id to append the image names
        $newname = "picture_1_" . $new_project_id . "." . $ext1;
        $thumbname = "thumb_" . $new_project_id . "." . $ext1;
        $target = 'projects/images/'. $newname;
        $thumbtarget = 'projects/images/'. $thumbname;
        //now that we have all that straightened out, move and rename the image file to its final resting place
        move_uploaded_file( $_FILES['projectPicture']['tmp_name'], $target);


    //Build up the description string to include image #1 in their auto forum post
        $description = $description . " \n \n " . '[img]http://www.shapeoko.com/' . $thumbtarget . '[/img]';

    //Variables to hold the parameters for phpbb3 function submit_post
         $title = utf8_normalize_nfc($title);
         $text = utf8_normalize_nfc($description);
         $poll = $uid = $bitfield = $options = '';
         generate_text_for_storage($title, $uid, $bitfield, $options, false, false, false);
         generate_text_for_storage($text, $uid, $bitfield, $options, true, true, true);
    
    //Build up data array with relevant data and parameter settings
         $data = array(
             'forum_id'       => 30,
             'topic_id'       =>0,
             'post_id'        =>0,
             'icon_id'        => false,
             'post_approved'  => true,
             'enable_bbcode'  => true,
             'enable_smilies' => true,
             'enable_urls'    => true,
             'enable_sig'     => true,
             'message'        => $text,
             'message_md5'    => md5($text),
             'bbcode_bitfield' => $bitfield,
             'bbcode_uid'      => $uid,
             'post_edit_locked'   => 0,
             'topic_title'      => $title,
             'notify_set'      => false,
             'notify'         => false,
             'post_time'       => 0,
             'forum_name'      => '',
             'enable_indexing'   => true,
         );

    //Finally create the new post in the members projects forum
          $post_url =  submit_post('post', $title, '', POST_NORMAL, $poll, $data);

    //Grab the newly created topic ID so we can link to it in the summary
          //$topic_id = $data['topic_id'];
    


    /*---------------------------------------------------------------*/
    //OK, grabbed all of that, now lets summarize everything for the user and
    //spit out some links so the user can go somewhere else to see their new project
        echo '<h1>Your Project was submitted successfully!</h1>';
        echo '<h3><a href="http://www.shapeoko.com/project.php?id='. $new_project_id . '">Click here to view your new project!</a></h3></br>';
        echo '<h3><a href="http://www.shapeoko.com/forum/viewtopic.php?f=19&t=' . $data['topic_id'] . '">Click here to view your new post on the forum</a></b></h3></br>';
        echo '<h3><a href="http://www.shapeoko.com/projects.php">Click here to go to the main Projects Gallery Page</a></h3></br>';

        $new_topic_id = $data['topic_id'];
    //now update the row we just created with the topic ID so we can reference it later
        $topic_sql = "UPDATE projects SET project_topic_id = $new_topic_id WHERE project_id = $new_project_id";
        mysqli_query($con, $topic_sql); 
    
    //make some thumbnails so we can load the images faster in the gallery and so they fit in the forum posts
        smart_resize_image($target, 350, 0, true, $thumbtarget, false, false, 100);

    //Close up shop
        mysqli_close($con);
    }


/**
 * easy image resize function
 * https://github.com/Nimrod007/PHP_image_resize
 * @param  $file - file name to resize
 * @param  $width - new image width
 * @param  $height - new image height
 * @param  $proportional - keep image proportional, default is no
 * @param  $output - name of the new file (include path if needed)
 * @param  $delete_original - if true the original image will be deleted
 * @param  $use_linux_commands - if set to true will use "rm" to delete the image, if false will use PHP unlink
 * @param  $quality - enter 1-100 (100 is best quality) default is 100
 * @return boolean|resource
 */
  
  function smart_resize_image($file,
                              $width              = 350, 
                              $height             = 0, 
                              $proportional       = true, 
                              $output             = 'file', 
                              $delete_original    = false, 
                              $use_linux_commands = false,
                  $quality = 100
       ) {
      
    if ( $height <= 0 && $width <= 0 ) return false;

    # Setting defaults and meta
    $info                         = getimagesize($file);
    $image                        = '';
    $final_width                  = 0;
    $final_height                 = 0;
    list($width_old, $height_old) = $info;
  $cropHeight = $cropWidth = 0;

    # Calculating proportionality
    if ($proportional) {
      if      ($width  == 0)  $factor = $height/$height_old;
      elseif  ($height == 0)  $factor = $width/$width_old;
      else                    $factor = min( $width / $width_old, $height / $height_old );

      $final_width  = round( $width_old * $factor );
      $final_height = round( $height_old * $factor );
    }
    else {
      $final_width = ( $width <= 0 ) ? $width_old : $width;
      $final_height = ( $height <= 0 ) ? $height_old : $height;
    $widthX = $width_old / $width;
    $heightX = $height_old / $height;

    $x = min($widthX, $heightX);
    $cropWidth = ($width_old - $width * $x) / 2;
    $cropHeight = ($height_old - $height * $x) / 2;
    }

    # Loading image to memory according to type
    switch ( $info[2] ) {
      case IMAGETYPE_JPEG:  $image = imagecreatefromjpeg($file);  break;
      case IMAGETYPE_GIF:   $image = imagecreatefromgif($file);   break;
      case IMAGETYPE_PNG:   $image = imagecreatefrompng($file);   break;
      default: return false;
    }
    
    
    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
      $transparency = imagecolortransparent($image);
      $palletsize = imagecolorstotal($image);

      if ($transparency >= 0 && $transparency < $palletsize) {
        $transparent_color  = imagecolorsforindex($image, $transparency);
        $transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
        imagefill($image_resized, 0, 0, $transparency);
        imagecolortransparent($image_resized, $transparency);
      }
      elseif ($info[2] == IMAGETYPE_PNG) {
        imagealphablending($image_resized, false);
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
        imagefill($image_resized, 0, 0, $color);
        imagesavealpha($image_resized, true);
      }
    }
    imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);


    # Taking care of original, if needed
    if ( $delete_original ) {
      if ( $use_linux_commands ) exec('rm '.$file);
      else @unlink($file);
    }

    # Preparing a method of providing result
    switch ( strtolower($output) ) {
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
      break;
      case 'file':
        $output = $file;
      break;
      case 'return':
        return $image_resized;
      break;
      default:
      break;
    }
    
    # Writing image according to type to the output destination and image quality
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
      case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
      case IMAGETYPE_PNG:
        $quality = 9 - (int)((0.9*$quality)/10.0);
        imagepng($image_resized, $output, $quality);
        break;
      default: return false;
    }

    return true;
  }




?>

</br><!--some extra space...-->

    </div><!--./row-->
</div><!--./container-->

</body>
</html>