<?php
	
	$host = "localhost"; // IP = 127.0.0.1
	$user = "root";
	$pwd  = "";
	
	$conn = mysqli_connect($host,$user,$pwd) or die("Error connection database");
	
	if(!$conn){
		die("Connection Failed".mysqli_connect_error());
	}	
	mysqli_select_db($conn,"klassycafe") or die("Error in selecting database");
	#echo "Connection Successful";
	

?>
