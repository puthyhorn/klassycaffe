<?php
	$id=$_GET['id'];
	$SQL="delete from tbl_prebook where bookid = $id";
	$result= mysqli_query($conn, $SQL);
	$conn->close();
			
	if(!$result){
		echo '<div class="alert alert-danger" role = "alert"> Transaction Failed.</div>';
	}else{
		echo '<div class="alert alert-success" style="text-align:center;" role = "alert"> The booking has been removed successful.</div>';
	}	
?>
