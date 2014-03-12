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
	      $ext = $row['image1'];
	  }
	

	//goofy thing with calling stored procedures: once one is called, it closes the connection
	//we need to reconnect to the DB so we can call the next SP
	//thanks to this answer: http://www.php.net/manual/en/function.mysql-ping.php#68526
	if (!mysqli_ping ($con)) {
	   mysqli_close($con);
	   include 'connect.php';
	}

    if($current_user_id == $project_user_id){
	    // debugging information
	    echo "current user id is: " . $current_user_id . '</br>';
	    echo "projects user id is: " . $project_user_id . '</br>';
	    echo "projects id is: " . $clean_pid . '</br>';
	    echo 'deleting project....';
	    
	    // call our stored procedure to delete the project!
	    $result = mysqli_query($con, "call delete_project('$project_id')");
	    mysqli_connect_error();

	    // delete the related main file
		$filename = 'projects/images/' . 'picture_1_'. $clean_pid . "." . $ext;
		if(file_exists($filename)){
		// file_exists returns true
		    if(is_writable($filename)){
		        // is_writable also returns true
		        if(unlink($filename)){
		            echo 'file deleted: ' . $filename;
		        }
		        else{
		            echo 'cant delete file';
		            print_r(error_get_last());
		        }
		    }
		}

	    // delete the related thumbnail file
		$filename = 'projects/images/' . 'thumb_'. $clean_pid . "." . $ext;
		if(file_exists($filename)){
		// file_exists returns true
		    if(is_writable($filename)){
		        // is_writable also returns true
		        if(unlink($filename)){
		            echo 'file deleted: ' . $filename;
		        }
		        else{
		            echo 'cant delete file';
		            print_r(error_get_last());

		        }
		    }
		}
	    
	    echo '<h1>Your Project and all of it\'s related files have been deleted</h1>';
	    echo "<h1>Unicorns across the universe just shed a tear.</h1>";
	    if($result==false){echo 'actually, that was a joke. something is not working correctly here....your project is still alive.';}
	    echo '</br><a href="projects.php" class="btn btn-primary btn-lg">Go to Project Gallery</a>';
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