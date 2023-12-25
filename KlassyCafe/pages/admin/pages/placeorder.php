
<?php
	error_reporting(0);
	$foodid = $_GET['id'];
	$bookid = $_GET['bid'];
	$tid = trim($_GET['tid']);
	
	$sql = "SELECT price FROM tbl_food where id = $foodid";
	$rst = mysqli_query($conn,$sql);
	$cn = mysqli_fetch_array($rst);
	$price = $cn[0];
	$num = 1;
	$xml = "insert into tbl_preorder(tableid,bookid,foodid,price,num)
					values (?,?,?,?,?)";
					
	$stmt = $conn-> prepare($xml);
	$stmt -> bind_param("siidi",$tid,$bookid,$foodid,$price,$num);
	if($stmt -> execute())
	{
		echo'<div class="alert alert-success" role = "alert"> The order has been recorded successfull.</div>';
	}else{
		echo '<div class="alert alert-danger" role = "alert"> Transaction Failed.</div>';
	}
	
	
	
	
	
	/*
	$xml = "SELECT t.table_num, f.id, f.price,po.num FROM tbl_food f JOIN tbl_preorder po ON po.foodid = f.id JOIN tbl_table t ON po.tableid = t.table_num";
	$result = mysqli_query($conn,$xml);

	while($nms = mysqli_fetch_array($result)) {
        $rows[] = $nms[1];
    }
	
	foreach($rows as $row)
    {

		if($row == $foodid)
		{
			$sql = "UPDATE tbl_preorder SET num = num+1 where foodid = $foodid AND tableid = $tid";
			$result = mysqli_query($conn, $sql);
			if(!$result)
			{
				echo "Not OK";
			}else{
				echo'<div class="alert alert-success" role = "alert"> The order has been recorded successfull.</div>';
			}
		}else
		{
			
			$sql = "SELECT price FROM tbl_food where id = $foodid";
			$rst = mysqli_query($conn,$sql);
			$cn = mysqli_fetch_array($rst);
			$price = $cn[0];
			echo $price;
			$num = 1;
			$xml = "insert into tbl_preorder(tableid,bookid,foodid,price,num)
					values (?,?,?,?,?)";
					
			$stmt = $conn-> prepare($xml);
			$stmt -> bind_param("siidi",$tid,$bookid,$foodid,$price,$num);
			if($stmt -> execute())
			{
				echo'<div class="alert alert-success" role = "alert"> The order has been recorded successfull.</div>';
			}else{
				echo '<div class="alert alert-danger" role = "alert"> Transaction Failed.</div>';
			}
			
			echo $foodid;
		}
			
	}
	*/
	
?>