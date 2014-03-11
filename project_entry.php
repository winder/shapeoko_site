<?php
include 'mainheader.php';

/***************************************************************
This file is used to enter details for a new project. These details
are submitted to project_submit.php 
***************************************************************/

?>



<?php
if ($user->data['user_id'] == ANONYMOUS){
?>
<div class="container">
  <div class="row">
  </br>
    <div class="col-md-8 col-md-offset-2">
      <div class="alert alert-info">Already a Member? Use the Login form in the header!</div>
      <div class="alert alert-danger">Not a Member? Use the Register button in the header to get started!</div>
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
            <form role="form" action="../project_submit.php" method="post" enctype="multipart/form-data">
            
              <div class="form-group">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Project Title</h3>
                  </div>
                
                  <div class="panel-body">
                    <input type="text" class="form-control" id="projectTitle" name="projectTitle" placeholder="Electronics Enclosure">
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
                  <textarea class="textarea" name="projectDescription" placeholder="Enter project description. It should be a few sentences" style="width: 100%; height: 100px"></textarea>
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
                  <textarea class="textarea2" name="additionalInstructions" placeholder="Enter additional information or instructions about your project here" style="width: 100%; height: 200px"></textarea>
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



</body>

</html>

<?php };?>