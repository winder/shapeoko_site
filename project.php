<?php
include 'mainheader.php';
include 'connect.php';

/***************************************************
This file is used to show the details for a project 
****************************************************/



    //get the id of the logged in user
    //we can use this to verify permission to edit
    $current_id = $user->data['user_id'];

     //get the project ID so we can start looking stuff up.
    //Then clean it. That thing is dirty!
    $clean_pid = mysql_real_escape_string($_GET['id']);

    // Check connection for errors
    if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}

    // call our stored procedure. Safety first.
    // if there's a problem, quit.
    $result = mysqli_query($con, "call get_project('$clean_pid')");
    if ($result === FALSE) {
        die(mysqli_connect_error());
    }


    //iterate through the result set (shoudl really only be one result...)
    //$result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
      $title = $row['project_title'];
      $description = $row['project_description'];
      $username = $row['project_user'];
      $userid = $row['project_user_id'];
      $instructions = $row['project_instructions'];
      $image1 = $row['image1'];
      $image2 = $row['image2'];
      $image3 = $row['image3'];
      $image4 = $row['image4'];
      $image5 = $row['image5'];
      $topic = $row['project_topic_id'];
    }
?>


    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $title;?>
                    <small>by <?php echo $username;?></small>
                    <a class="btn btn-primary pull-right" href="http://www.shapeoko.com/forum/viewtopic.php?f=19&t=<?php echo $topic;?>">View on Forum</a>
                </h1>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
                <img class="img-responsive" src="projects/images/picture_1_<?php echo $clean_pid . "." . $image1;?>">
            </div>

            <div class="col-md-6">
                <h3>Project Description</h3>
                <p>
                    <?php echo html_entity_decode($description);?>
                </P>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <hr>
                
                <?php
                    //if the current user is the creator of the project, let them edit it.
                    if($userid == $current_id){
                ?>
                        <a href="project_edit.php?id=<?php echo $clean_pid;?>"><button type="button" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> edit</button></a>
                        <a href="project_delete.php?id=<?php echo $clean_pid;?>" onclick="return confirm('Are you sure you want to delete this project? There is no way of getting it back...');"><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</button>
                        </a>
                <?php
                    }else{echo '';}
                ?>                 
            </div>
        </div>

    </div><!-- /.container -->

    <div class="container">

        <footer>
            <div class="row">
                <div class="col-lg-12">
                </br>
                    <p><em>Copyright &copy; Shapeoko 2014</em></p>
                </div>
            </div>
        </footer>
    </div><!-- /.container -->

</body>

</html>
