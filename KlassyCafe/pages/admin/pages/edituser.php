
<?php
	error_reporting(0);
	$id = $_GET['id'];
	$xml = "SELECT * FROM tbl_user where userid = '$id' ";
	$result = mysqli_query($conn,$xml);
	$row= mysqli_fetch_array($result);
	
	$username = $row['username'];
	$poistion = $row['position'];
	$password = $row['password'];
	$img = $row['img'];
	
	
	if(isset($_POST['btnupdate']))
	{
		$username = trim($_POST['txtusername']);
		$position = trim($_POST['txtposition']);
		$password = trim($_POST['txtnewpassword']);
		$cfpassword = trim($_POST['txtconfirmnewpassword']);
		$img = trim($_POST['txtnewimg']);
		
		$message = "";
		$yes = '<div class="alert alert-success" role = "alert"> Update success !!!</div>';
		$failed = '<div class="alert alert-danger" role = "alert"> Something went wrong !!!</div>';
		$pwdfailed = '<div class="alert alert-danger" role = "alert"> Password not match !!!</div>';
		
		$filetmp = $_FILES['txtpicture']['tmp_name'];
		$filename = $_FILES['txtpicture']['name'];
		$filetype = $_FILES['txtpicture']['type'];
		$filesize = $_FILES['txtpicture']['size'];
		$filepath = "../../../assets/images/users".$filename;
		$file_exe = strtolower(end(explode('.',$filename)));
		$extension = array("jpeg","jpg","png","");
		
		if($password == $cfpassword)
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
							$sql = "update tbl_user set username='$username',position= '$position', password ='$password', img ='$img' where userid='$id'";
							$mresult = mysqli_query($conn, $sql);
							$conn ->close();
							if(!$mresult)
							{
								$message = $failed;
							}else{
								$message = $yes;
							}
						}
					}
				}
			
		}else
		{
			$message = $pwdfailed;
		}
	}

?>
        <div class="col-10" > 
            <div class="card mb-3">
                <div class="card-body">

                  <div class="pt-4 pb-2" style="margin-bottom:20px;">
                    <h2 class="card-title text-center pb-0 fs-4">Modify User Account</h2>
                  </div>

                  <form class="row g-3" method="post">
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                        <input type="text" name="txtusername" class="form-control" value = "<?=$username?>">
                    </div>
					
					<div class="col-12">
                      <label for="yourUsername" class="form-label">Position</label>
                        <input type="text" name="txtposition" class="form-control" value = "<?=$poistion?>">
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="text" name="txtpassword" class="form-control" value = "<?=$password?>" disabled>
                    </div>
					
					<div class="col-12">
                      <label for="yourPassword" class="form-label">New Password</label>
                      <input type="password" name="txtnewpassword" class="form-control" required>
                    </div>
					
					<div class="col-12">
                      <label for="yourPassword" class="form-label">Confirm New Password</label>
                      <input type="password" name="txtconfirmnewpassword" class="form-control" required >
                    </div>
					
					<div class="col-12">
                      <label for="yourUsername" class="form-label">Picture</label>
                        <input type="file" name="txtnewimg" class="form-control" value = "<?=$img?>">
                    </div>
					
                    <div class="col-12" style="text-align:center;">
						<div class="col-12">
							<?= $message ?>
						</div>
                      <a class="btn btn-danger w-20" type="button" style="margin-top:25px; float:left;width:10%;" href="index.php?p=userlist" > Back </a>
					  <button class="btn btn-primary w-20" type="submit" name="btnupdate" style="margin-top:25px; width:10%; float:right;" > Update </button>
                    </div>
					
                  </form>

                </div>
			</div>
        </div>