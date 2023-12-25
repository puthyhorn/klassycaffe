
<?php
	error_reporting(0);
	
	if(isset($_POST['btnAdd']))
	{
		$username = trim($_POST['txtusername']);
		$position = trim($_POST['txtpostiton']);
		$password = trim($_POST['txtpassword']);
		$cfpassword = trim($_POST['txtconfirmpassword']);
		$img = trim($_POST['txtimg']);
		
		$message = "";
		$success = '<div class="alert alert-success" role = "alert"> User has been created successfully.</div>';
		$pwdfailed = '<div class="alert alert-danger" role = "alert"> Password not match !!!</div>';
		$addfailed = '<div class="alert alert-danger" role = "alert"> User already exists.</div>';
		
		$filetmp = $_FILES['txtpicture']['tmp_name'];
		$filename = $_FILES['txtpicture']['name'];
		$filetype = $_FILES['txtpicture']['type'];
		$filesize = $_FILES['txtpicture']['size'];
		$filepath = "../../../assets/images/users".$filename;
		$file_exe = strtolower(end(explode('.',$filename)));
		$extension = array("jpeg","jpg","png","");

		$xml = "SELECT * FROM tbl_user where username = '$username' ";
		$result = mysqli_query($conn,$xml);
		$row= mysqli_fetch_array($result);
		
		
		if(mysqli_num_rows($result) == 0)
		{
			if($password == $cfpassword)
			{
				if($filesize> 2097152)
				{
					echo "File size not bigger than 2MB !!!";
				}else{
					if(in_array($file_exe,$extension)=== false)
					{
						echo "Extension not allowed. Please try another extension !!!";
					}else
					{
						$sql = "insert into tbl_user(username,position,`password`,img) values('$username','$position','$password','$img' )";
						$stmt = $conn-> prepare($sql);
						if($stmt -> execute())
						{								
							$message = $success;
							$stmt -> close();
						}
					}
				}
			}else
			{
				$message = $pwdfailed;
			}
			
		}else{
				$message = $addfailed;
		}
	}

?>
<div style="margin-left:10%;">
        <div class="col-10" > 
            <div class="card mb-3">
                <div class="card-body">

                  <div class="pt-4 pb-2" style="margin-top:-40px; margin-bottom:0px;">
                    <h5 class="card-title text-center pb-0 fs-4">Register New User Account</h5>
                    <p class="text-center small">Enter details info to create a new account</p>
                  </div>

                  <form class="row g-3" method="post">
					<div class="col-12" style="text-align:center;">
						<?= $message ?>
					</div>
					
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                        <input type="text" name="txtusername" class="form-control" required>
                    </div>
					
					<div class="col-12">
                      <label for="yourUsername" class="form-label">Position</label>
                        <input type="text" name="txtpostiton" class="form-control" required>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="txtpassword" class="form-control" required>
                    </div>
					
					<div class="col-12">
                      <label for="yourPassword" class="form-label">Confirm Password</label>
                      <input type="password" name="txtconfirmpassword" class="form-control" required>
                    </div>
					
					<div class="col-12">
                      <label for="yourPassword" class="form-label">Image</label>
                      <input type="file" name="txtimg" class="form-control" required>
                    </div>
					
                    <div class="col-12" style="text-align:center;">
                      <input class="btn btn-primary w-20" type="submit" name="btnAdd" value="Add New Account" >
					  
                    </div>
					
                  </form>

                </div>
			</div>
        </div>
</div>