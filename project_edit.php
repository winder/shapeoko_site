<?php
include 'mainheader.php';
include 'connect.php';

    //get some info about the situation
    $current_user_id = $user->data['user_id'];
    $clean_pid = mysql_real_escape_string($_GET['id']);

    // Check connection for errors
    if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}

    // call our stored procedure. Safety first.
    // if there's a problem, quit.
    $result = mysqli_query($con, "call get_project('$clean_pid')");
    if ($result === FALSE) {die(mysqli_connect_error());}

    //iterate through the result set (shoudl really only be one result...)
    //$result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
      $title = $row['project_title'];
      $description = $row['project_description'];
      $username = $row['project_user'];
      $project_user_id = $row['project_user_id'];
      $topic = $row['project_topic_id'];
      $ext = $row['image1'];
    }


if ($project_user_id != $current_user_id){
      echo '<div class="col-md-8 col-md-offset-2">';
      echo '<div class="alert alert-info">You can\'t edit this project. It does not belong to you. Shame on you for trying.</div>';
      echo '</div>';
      exit;
    }
?>

<link rel="stylesheet" type="text/css" href="rte/prettify.css"></link>
    <link rel="stylesheet" type="text/css" href="rte/bootstrap-wysihtml5.css"></link>
    <div class="container">
        <div class="row">
        
        </br><!--needs a little extra spacing...-->
          <div class="col-md-8">
            <form role="form" action="../project_submit.php" method="post" enctype="multipart/form-data">
            
              <div class="form-group">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Project Title</h3>
                  </div>
                
                  <div class="panel-body">
                    <input type="text" class="form-control" id="projectTitle" name="projectTitle" value="<?php echo $title;?>">
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <b>Current Image</b></br>
                    <img src="projects/images/thumb_<?php echo $clean_pid . '.' . $ext;?>" height="80px"></img>
                  </div>
                  <div class="col-md-10">
                    <label for="projectPicture">Select New Image</label>
                    <input type="file" id="projectPicture" name="projectPicture">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Project Description</h3>
                  </div>
                
                  <div class="panel-body">
                    <textarea class="textarea" name="projectDescription" placeholder="Enter project description. It should be a few sentences" style="width: 100%; height: 200px;"></textarea>
                  </div>
                </div>
              </div>

              <div class="checkbox">
                <label>
                  <input type="checkbox" name="usedMakercam"> Did you use MakerCAM?
                </label>
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div><!--./md-8-->
         
          <div class="col-md-4">
            <h3>Information</h3>
            <p>This is a basic form to upload and share your project with the shapeoko community. There are few rules you need to be aware of before posting your project.</p>
            <ol>
              <li>You need at least 1 picture!</li>
              <li>The project must be your own</li>
              <li>Be cool</li>
            </ol>
            <h3>Hints to get you started</h3>
            <ul>
              <li> The first picture you upload will be your "main" for the project. It will show up on the gallery page and as the big picture at the top of your project page</li>
              <li> It would be helpful if you included a material list</li>
              <li> If you used makercam, please check the box</li>
            </ul>
            <h3>Auto Posting!</h3>
            <p>Your project will be automatically added to the "Member's Project" section on the forum. Feel free to keep an eye on that thread for feedback from the community.</p>
          </div><!--./md-4-->

        </div><!--./row-->
    </div><!--./container-->

    <!--include all files required to produce rich text editor in both text area boxes-->
    <!--This updated version with is compatible with bootstrap 3 found here: https://github.com/schnawel007/bootstrap3-wysihtml5 -->
    <!--Found here: http://stackoverflow.com/questions/19665914/bootstrap-wysiwyg-textarea-editor-working-on-bootstrap-3 -->
    <script src="rte/wysihtml5-0.3.0.js"></script>
    <script src="rte/prettify.js"></script>
    <script src="rte/bootstrap-wysihtml5.js"></script>

    <script>
      $('.textarea').wysihtml5({"image": false});
      $('.textarea2').wysihtml5({"image": false});
    </script>

    <script type="text/javascript" charset="utf-8">
      $(prettyPrint);
    </script>


</body>

</html>
