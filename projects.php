<?php 
  include 'mainheader.php';
  include 'connect.php';

/***************************************************************
This file is used to show entire collection of project (gallery) 
***************************************************************/

    // Check connection
    if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
    // Call stored procedure
    $result = mysqli_query($con, 'call all_projects()');
    if ($result === FALSE) {die(mysqli_connect_error());}
?>
<style>
  .thumbnail{height:430px;overflow:hidden;}
  .thumbnail img{max-height:250px;}
</style>

<div class="container">
  <div class="row">
    <div class="col-md-3 col-md-offset-9">
      <a class="btn btn-success" role="button" href="project_entry.php"><span class="glyphicon glyphicon-plus"></span> New Project</a>
    </div>
  </div>
  <div class="row">
    <h1>Shapeoko Project Gallery</h1>

<?php
    while($row = mysqli_fetch_array($result)){
      $title = $row['project_title'];
      $id = $row['project_id'];
      $image1 = $row['image1'];
      $username = $row['project_user'];
?>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a href="project.php?id=<?php echo $id;?>">
        <img src="projects/images/thumb_<?php echo $id . "." . $image1;?>" alt="...">
      </a>
      <!--<img src="projects/images/thumb_<?php echo $id . "." . $image1;?>" alt="...">-->
      <div class="caption">
        <h3><?php echo $title;?></h3>
        <h5><?php echo "by " . $username;?></h5>
        <p><a href="project.php?id=<?php echo $id;?>" class="btn btn-primary" role="button">details</a></p>
      </div>
    </div>
  </div>

<?php
      $colcount ++;
      if($colcount == 3){
        echo '</div>';
        echo '<div class="row">';
        $colcount =0;
      }//close if condition
    }//close while loop

?>


</div><!--end column-->

</body>
</html>