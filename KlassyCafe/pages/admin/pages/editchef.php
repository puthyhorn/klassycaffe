	<?php
	error_reporting(0);
	$id = $_GET['id'];
	$xml = "SELECT * FROM tbl_chef where cid = '$id' ";
	$result = mysqli_query($conn,$xml);
	$row= mysqli_fetch_array($result);
	
	$cfname = $row['name'];
	$cardnum = $row['cardid'];
	$phone = $row['phone'];
	$date = $row['start_date'];
	$tin = $row['timein'];
	$tout = $row['timeout'];
	$img = $row['img'];
	
	
	if(isset($_POST['btnUpdate']))
	{
		$cname = trim($_POST['txtcname']);
		$cphone = trim($_POST['txtphone']);
		$ctin = trim($_POST['txttimein']);
		$ctout = trim($_POST['txttimeout']);
		$newimg = trim($_POST['txtimg']);
		
		$message = "";
		$success = '<div class="alert alert-success" role = "alert"> User has been updated successfully.</div>';
		$failed = '<div class="alert alert-danger" role = "alert"> Error in adding new chef !!!</div>';
		
		$filetmp = $_FILES['txtpicture']['tmp_name'];
		$filename = $_FILES['txtpicture']['name'];
		$filetype = $_FILES['txtpicture']['type'];
		$filesize = $_FILES['txtpicture']['size'];
		$filepath = "../../../assets/images/chefs".$filename;
		$file_exe = strtolower(end(explode('.',$filename)));
		$extension = array("jpeg","jpg","png","");
		
		if($filesize> 2097152)
		{
			echo "File size not bigger than 2MB !!!";
		}else{
			if(in_array($file_exe,$extension)=== false)
			{
				echo "Extension not allowed. Please try another extension !!!";
			}else
			{
				if($cname != '' && $cphone != '' && $ctin!='' && $ctout !='' && $newimg !='')
				{
					move_uploaded_file($filetmp,"../../../assets/images/chefs".$filename);
					$sql = "update tbl_chef set name='$cname', phone ='$cphone', timein='$ctin', timeout='$ctout', img ='$newimg' where cid='$id' ";
					$result = mysqli_query($conn, $sql);
					$conn ->close();
					if(!$result)
					{
						$message = $failed;
					}else{
						$message = $success;
					}		
				}
			}
		}
		
	}

?>
	
	<div class="card-body">
				<div class="pt-4 pb-2" >
                    <h5 class="card-title text-center pb-0 fs-4" style="margin-bottom: 35px;">Editing Chef </h5>
                    <p class="text-center small"></p>
                  </div>
              <!-- General Form Elements -->
			  
        <form method="post">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Chef Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "txtcname" value= "<?=$cfname; ?>">
                  </div>
                </div>
				<div class="row mb-3">
				
					<label for="inputDate" class="col-sm-2 col-form-label">ID Card Number</label>
					  <div class="col-sm-4">
						<input type="text" class="form-control" value= "<?=$cardnum; ?>" disabled>
					  </div>
					  
					  <label for="inputDate" class="col-sm-2 col-form-label">Phone Number</label>
					  <div class="col-sm-4">
						<input type="text" class="form-control" name = "txtphone" value= "<?=$phone; ?>">
					  </div>
				 
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Start Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" value= "<?=$date; ?>" disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Time In</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "txttimein" value= "<?=$tin; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Time Out</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "txttimeout" value= "<?=$tout; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Upload Image</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="txtimg" value= "<?=$img; ?>">
                  </div>
                </div>
                
				<div class="row mb-3" style="text-align:center;">
					<?php echo $message; ?>
				</div>
                <div class="row mb-3"> 
                  <div class="col-sm-10">
                    <a type="button" class="btn btn-danger" style="float:left; width:150px;height:50px;margin-top:25px;padding-top:10px;" href="index.php?p=cheflist">Cancel</a>
					<button type="submit" class="btn btn-primary" style="float:right; width:150px;height:50px;margin-top:25px;" name="btnUpdate">Update</button>
                  </div>
				</div>

        </form>	<!-- End General Form Elements -->

</div>