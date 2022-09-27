<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', 'yahya', '1234', 'blog-table');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>