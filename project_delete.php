<?php
include 'mainheader.php';
include 'connect.php';
// Check connection for errors
if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}

echo '<div class="container">';
echo '<div class="row"></br></br>';

    //get some info about the situation
    $current_user_id = $user->data['user_id'];
    $clean_pid = mysql_real_escape_string($_GET['id']);


    //Get the project's details so we can compare user IDs again.
	$project_details = mysqli_query($con, "call get_project('$clean_pid')");
	while($row = mysqli_fetch_array($project_details)){
	      $project_user_id = $row['project_user_id'];
	      $project_id = $row['project_id'];
	  }


    if($current_user_id == $project_user_id){
	    // debugging information
	    echo "current user id is: " . $current_user_id . '</br>';
	    echo "projects user id is: " . $project_user_id . '</br>';
	    echo "projects id is: " . $clean_pid . '</br>';
	    echo 'deleting project....';
	    
	    // call our stored procedure to delete the project
	    $result = mysqli_query($con, "call delete_project('$project_id')");
	    echo $result;
	    echo var_dump($result);
	    mysqli_connect_error();
	    
	    echo '<h1>Your Project has been deleted</h1>';
	    echo "<h1>Unicorns across the universe just shed a tear.</h1>";
	    if($result==false){echo 'actually, that was a joke. something is not working correctly here....your project is still alive.';}
	    mysqli_close($con);
		exit;

	}else{
		echo '<h1>You can not do that. I suspect foul play is involved here.</h1>';
    	mysqli_close($con);
		exit;
	}

?>

</br><!--some extra space...-->

    </div><!--./row-->
</div><!--./container-->

</body>
</html>