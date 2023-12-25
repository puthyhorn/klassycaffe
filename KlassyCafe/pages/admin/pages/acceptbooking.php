<?php
	$id= trim($_GET['id']);
	
	$xml="insert into tbl_booking select * from tbl_prebook where bookid = $id";
	$result= mysqli_query($conn, $xml);
			
	if(!$result){
		echo '<div class="alert alert-danger" role = "alert"> Transaction Failed.</div>';
	}else{
		echo '<div class="alert alert-success" role = "alert"> The booking has been confirmed Successfull.</div>';
	}

	$SQL="delete from tbl_prebook where bookid = $id";
	$st= mysqli_query($conn, $SQL);

	$conn->close();
?>
