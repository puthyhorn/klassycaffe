
<?php
	error_reporting(0);
	$id = $_GET['id'];
	$xml = "SELECT * FROM tbl_table where tid = '$id' ";
	$result = mysqli_query($conn,$xml);
	$row= mysqli_fetch_array($result);
	
	$mark = $row['mark'];
	$tbl_num = $row['table_num'];
	$tfloor = $row['floor'];
	$timg = $row['img'];
	
	
	if(isset($_POST['btnedit']))
	{
		$newmark = trim($_POST['txtmark']);
		$newtnumber = trim($_POST['txttablenumber']);
		$newfloor = trim($_POST['txtfloor']);
		$newimg = trim($_POST['txtimg']);
		
		$message = "";
		$yes = '<div class="alert alert-success" role = "alert"> The table has been updated successfull !!!</div>';
		$failed = '<div class="alert alert-danger" role = "alert"> Something went wrong !!!</div>';

		$sql = "update tbl_table set mark='$newmark', table_num ='$newtnumber', floor= '$newfloor' , img = '$newimg' where tid='$id'";
		$result = mysqli_query($conn, $sql);
		if(!$result)
		{
			$message = $failed;
		}else{
			$message = $yes;
			$conn ->close();
		}
		
	}

?>
	
	<div class="card-body">
				<div class="pt-4 pb-2" >
                    <h5 class="card-title text-center pb-0 fs-4" style="margin-bottom: 35px;">Editing Table </h5>
                    <p class="text-center small"></p>
                  </div>
              <!-- General Form Elements -->
			  
            <form method="post">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Table Mark</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="txtmark"  value="<?=$mark; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Floor</label>
                  <div class="col-sm-10">
				  <select class="form-control" name="txtfloor" value="<?=$floor; ?>">
						<option> -- Choose the floor -- </option>
						<option value="Ground Floor"> Ground Floor </option>
						<option value="First Floor"> First Floor </option>
						<option value="Second Floor"> Second Floor </option>
					</select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "txttablenumber" value="<?=$tbl_num; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Picture</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="txtimg" value="<?=$timg; ?>">
                  </div>
                </div>
					
				<div class="row mb-3" style="text-align:center;">
					<?php echo $message ?>
				</div>
				
                <div class="row mb-3">
					<div class="col-sm-10">
						<a type="button" class="btn btn-danger" style="float:left; width:150px;height:50px;margin-top:25px;padding-top:10px;" href="index.php?p=tablelist">Cancel</a>
						<button type="submit" class="btn btn-primary" style="float:right; width:150px;height:50px;margin-top:25px;" name="btnedit">Update</button>
					</div>
                </div>
				
            </form>
</div>