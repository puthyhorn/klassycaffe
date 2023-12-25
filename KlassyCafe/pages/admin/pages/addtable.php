
	<?php
	error_reporting(0);
	
	if(isset($_POST['btnAdd']))
	{
		$mark = trim($_POST['txtmark']);
		$tnumber = trim($_POST['txttablenumber']);
		$floor = trim($_POST['txtfloor']);
		$img = trim($_POST['txtimg']);
		
		$message = "";
		$success = '<div class="alert alert-success" role = "alert"> Table has been added successfully.</div>';
		$addfailed = '<div class="alert alert-danger" role = "alert"> Table number is already exists.</div>';
		$failed = '<div class="alert alert-danger" role = "alert"> There is an error in adding new table !!!</div>';
		
		$filetmp = $_FILES['txtpicture']['tmp_name'];
		$filename = $_FILES['txtpicture']['name'];
		$filetype = $_FILES['txtpicture']['type'];
		$filesize = $_FILES['txtpicture']['size'];
		$filepath = "../../../assets/images/tables".$filename;
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
				if($mark != '' && $tnumber !='' && $floor != '' && $img !='')
				{
					move_uploaded_file($filetmp,"../../../assets/images/tables".$filename);
					
					$xml = "SELECT * FROM tbl_table where table_num = '$tnumber'";
					$result = mysqli_query($conn,$xml);
					if(mysqli_num_rows($result) == 0)
					{
						$sql = "insert into tbl_table (mark,table_num,floor,img) values (?,?,?,?)";
						$stmt = $conn-> prepare($sql);
						$stmt -> bind_param("ssss",$mark,$tnumber,$floor,$img);
						if($stmt -> execute())
						{								
							$message = $success;
							$stmt -> close();
						}else
						{
							$message = $failed;
						}	
					}else
					{ 
						$message = $addfailed;
					}					
				}
			}
		}
		
	}

?>
	
	<div class="card-body">
				<div class="pt-4 pb-2" >
                    <h5 class="card-title text-center pb-0 fs-4" style="margin-top:-50px; margin-bottom:60px;">Adding New Table </h5>
                    <p class="text-center small"></p>
                  </div>
              <!-- General Form Elements -->
			  
            <form method="post">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Table Mark</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="txtmark">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Floor</label>
                  <div class="col-sm-10">
				  <select class="form-control" name="txtfloor">
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
                    <input type="text" class="form-control" name = "txttablenumber">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Picture</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="txtimg">
                  </div>
                </div>
					
				<div class="row mb-3" style="text-align:center;">
					<?php echo $message ?>
				</div>
				
                <div class="row mb-3">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary" style="float:right; width:150px;height:50px;margin-top:25px;" name="btnAdd">Add</button>
					</div>
                </div>
				
            </form>

</div>