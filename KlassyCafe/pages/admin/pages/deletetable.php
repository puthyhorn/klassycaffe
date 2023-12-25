
<?php
	error_reporting(0);
	$id = $_GET['id'];
	$sql = "update tbl_table set trash = 1 where tid=$id";
	$result = mysqli_query($conn, $sql);
	$conn ->close();
	if(!$result)
	{
		echo '<div class="alert alert-danger" style="text-align:center;" role = "alert"> Failed to delete.</div>';
	}else
	{
		echo '<div class="alert alert-success" style="text-align:center;" role = "alert"> The table has been deleted successful.</div>';
	}

?>
