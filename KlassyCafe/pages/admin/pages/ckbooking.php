<?php
	$id=$_GET['id'];
	$date = date('m/d/Y');
	$xml="insert into tbl_ckbook select * from tbl_booking where bookid = $id";
	$result= mysqli_query($conn, $xml);
			
	if(!$result){
		echo '<div class="alert alert-danger" role = "alert"> Transaction Failed.</div>';
	}else{
		echo '<div class="alert alert-success" role = "alert"> Transaction Success.</div>';
		header ("location:../index.php?p=bookinglist");
	}
	
	$hm="delete from tbl_preorder where id = $id";
	$sthm= mysqli_query($conn, $hm);
	
	$SQL="delete from tbl_booking where id = $id";
	$st= mysqli_query($conn, $SQL);
	
	$conn->close();
?>
