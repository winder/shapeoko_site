<?php
include 'mainheader.php';
include 'connect.php';
echo '<div class="container">';
echo '<div class="row"></br></br>';


    // Check connection, exit if problem
    if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();exit("oh god.. there was a sql problem");}
    echo '<h1>This page will eventually update your projects from the edit page</h1>';
    echo "<h1>But, it's not finished yet</h1>";


    //stored procedure needs to be created for update command
    //mysqli_query($con, $update_project($title, etc, etc, etc,etc)); 
    //Close up shop
    mysqli_close($con);    

?>

</br><!--some extra space...-->

    </div><!--./row-->
</div><!--./container-->

</body>
</html>