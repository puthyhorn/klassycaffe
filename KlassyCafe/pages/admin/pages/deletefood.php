
<?php
	error_reporting(0);
	$id = $_GET['id'];
	$sql = "update tbl_food set trash = 1 where id='$id'";
	$result = mysqli_query($conn, $sql);
	$conn ->close();
	if(!$result)
	{
		
	}else
	{
		echo '<div class="alert alert-success" style="text-align:center;" role = "alert"> The food has been deleted successful.</div>';
	}

?>
