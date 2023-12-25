	<?php
	error_reporting(0);
	
	if(isset($_POST['btnAdd']))
	{
		$cname = trim($_POST['txtcname']);
		$cidcard = trim($_POST['txtidcard']);
		$cphone = trim($_POST['txtphone']);
		$startdate = trim($_POST['txtstartdate']);
		$tin = trim($_POST['txttimein']);
		$tout = trim($_POST['txttimeout']);
		$img = trim($_POST['txtimg']);
		$message = "";
		$success = '<div class="alert alert-success" style="text-align:center;" role = "alert"> User has been created successfully.</div>';
		$failed = '<div class="alert alert-danger" style="text-align:center;" role = "alert"> Error in adding new chef !!!</div>';
		$addfailed = '<div class="alert alert-danger" style="text-align:center;" role = "alert"> Chef is already exists.</div>';
		
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
				if($cname != '' && $cidcard !='' && $cphone != '' && $startdate != '' && $tin!='' && $tout !='' && $img !='')
				{
					move_uploaded_file($filetmp,"../../../assets/images/chefs".$filename);
					
					$xml = "SELECT * FROM tbl_chef where cardid = '$cidcard'";
					$result = mysqli_query($conn,$xml);
					if(mysqli_num_rows($result) == 0)
					{
						$sql = "insert into tbl_chef (name,cardid,phone,start_date,timein,timeout,img) values (?,?,?,?,?,?,?)";
						$stmt = $conn-> prepare($sql);
						$stmt -> bind_param("sssssss",$cname,$cidcard,$cphone,$startdate,$tin,$tout,$img);
						if($stmt -> execute())
						{								
							$message = $success;
							$stmt -> close();
						}else
						{
							$message = $failed;
						}
					}else {$message = $addfailed;}					
				}
			}
		}
		
	}

?>
	
	<div class="card-body">
				<div class="pt-4 pb-2" >
                    <h5 class="card-title text-center pb-0 fs-4" style="margin-top:-60px; margin-bottom:50px;">Register New Chef </h5>
                    <p class="text-center small"></p>
                  </div>
              <!-- General Form Elements -->
			  
            <form method="post">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Chef Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "txtcname" required>
                  </div>
                </div>
				<div class="row mb-3">
				
					<label for="inputDate" class="col-sm-2 col-form-label">ID Card Number</label>
					  <div class="col-sm-4">
						<input type="text" class="form-control" name = "txtidcard" required>
					  </div>
					  
					  <label for="inputDate" class="col-sm-2 col-form-label">Phone Number</label>
					  <div class="col-sm-4">
						<input type="text" class="form-control" name = "txtphone" required>
					  </div>
				 
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Start Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name = "txtstartdate" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Time In</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "txttimein" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Time Out</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "txttimeout" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Upload Image</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="txtimg" required>
                  </div>
                </div>
                
				<div class="row mb-3" style="text-align:center;">
					<?php echo $message ?>
				</div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" name="btnAdd" class="btn btn-primary" style="float:right; width:100px;height:50px;margin-top:20px;">Add</button>
                  </div>
                </div>

            </form><!-- End General Form Elements -->

</div>