<?php
	$id=$_GET['id'];
	$SQL="update tbl_contacts set trash = 1 where con_id = $id";
	$result= mysqli_query($conn, $SQL);
	$conn->close();
			
	if(!$result)
	{
		echo '<div class="alert alert-danger" role = "alert"> Transaction Failed.</div>';
	}else
	{
		echo '<div class="alert alert-success" style="text-align:center;" role = "alert"> The messege has been removed successful.</div>';
		header ("location:../../index.php?pc=contact");
		
	}	
?>
