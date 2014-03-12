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
      $instructions = $row['project_instructions'];
      $image1 = $row['image1'];
      $image2 = $row['image2'];
      $image3 = $row['image3'];
      $image4 = $row['image4'];
      $image5 = $row['image5'];
      $topic = $row['project_topic_id'];
    }


if ($project_user_id != $current_user_id){

?>
<div class="container">
  <div class="row">
  </br>
    <div class="col-md-8 col-md-offset-2">
      <div class="alert alert-danger">
      <?php echo "Project User id: " . $project_user_id . "Current User Id: " . $current_user_id;?>
      You can't edit this project. It's not yours. Shame on you for trying.
      </div>
    </div>
  </div>
</div>
<?php
exit;
}else{
?>




    <div class="container">
        <div class="row">
        
        </br><!--needs a little extra spacing...-->
          <div class="col-md-8">
            <form role="form" action="../project_update.php" method="post" enctype="multipart/form-data">
            
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
                <label for="projectPicture">Image 1</label>
                <input type="file" id="projectPicture" name="projectPicture">
                <p class="help-block">(Chose your best picture!)</p>
              </div>

              <div class="form-group">
                <label for="projectDescription">Description</label>
                  <textarea 
                    class="textarea"
                    name="projectDescription"
                    style="width: 100%; height: 100px"
                  ><?php echo $description;?></textarea>
              </div>

              <div class="checkbox">
                <label>
                  <input type="checkbox" name="usedMakercam"> Did you use MakerCAM?
                </label>
              </div>
              <!--
                <div class="form-group">
                  <label for="projectPicture2">Image 2</label>
                  <input type="file" id="projectPicture2" name="projectPicture2">
                </div>
                <div class="form-group">
                  <label for="projectPicture3">Image 3</label>
                  <input type="file" id="projectPicture3" name="projectPicture3">
                </div>
                <div class="form-group">
                  <label for="projectPicture4">Image 4</label>
                  <input type="file" id="projectPicture4" name="projectPicture4">
                </div>
                <div class="form-group">
                  <label for="projectPicture5">Image 5</label>
                  <input type="file" id="projectPicture5" name="projectPicture5">
                </div>
              -->

              <div class="form-group">
                <label for="additionalInstructions">Additional Instructions</label>
                  <textarea class="textarea2" name="additionalInstructions" style="width: 100%; height: 200px"><?php echo $instructions;?></textarea>
              </div>

              <button type="submit" class="btn btn-success">Submit</button>
              <a class="btn btn-warning" href="project.php?id=<?php echo $clean_pid;?>">Cancel Edit and Go Back</a>
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



</body>

</html>

<?php };?>