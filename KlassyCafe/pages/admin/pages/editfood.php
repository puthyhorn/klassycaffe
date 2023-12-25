
<?php
	error_reporting(0);
	$id = $_GET['id'];
	$xml = "SELECT * FROM tbl_food where id = '$id' ";
	$result = mysqli_query($conn,$xml);
	$row= mysqli_fetch_array($result);
	
	$name = $row['name'];
	$ingrid = $row['ingridient'];
	$price = $row['price'];
	$cid = $row['cid'];
	
	
	if(isset($_POST['btnedit']))
	{
		$newname = trim($_POST['txtname']);
		$newprice = trim($_POST['txtprice']);
		$newingrid = trim($_POST['txtingrid']);
		$newcid = trim($_POST['txtcate']);
		$newimg = trim($_POST['txtimg']);
		
		$message = "";
		$yes = '<div class="alert alert-success" role = "alert"> Update success !!!</div>';
		$failed = '<div class="alert alert-danger" role = "alert"> Something went wrong !!!</div>';
		$pwdfailed = '<div class="alert alert-danger" role = "alert"> Table number is already exists !!!</div>';
		
		$sql = "update tbl_food set name='$newname', ingridient ='$newingrid', price= '$newprice' , cid = '$newcid', img = '$newimg' where id='$id'";
		$result = mysqli_query($conn, $sql);
		$conn ->close();
		if(!$result)
		{
			$message = $failed;
		}else{
			$message = $yes;
		}
		
	}

?>
	
	<div class="card-body">
				<div class="pt-4 pb-2" >
                    <h5 class="card-title text-center pb-0 fs-4" style="margin-bottom: 35px;">Editing Food </h5>
                    <p class="text-center small"></p>
                  </div>
              <!-- General Form Elements -->
			  
            <form method="post">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="txtname" value="<?=$name; ?>">
                  </div>
                </div>
				<div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Ingrideints</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name = "txtingrid" rows ="5px;"><?=$ingrid; ?></textarea>
                  </div>
                </div>
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="txtprice" value="<?=$price; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Category Name</label>
                  <div class="col-sm-10">
				  <select class="form-control" name="txtcate">
						
						<option value="food"> Food </option>
						<option value="dessert"> Dessert </option>
						<option value="juice"> Juice </option>
					</select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" required>Picture</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="txtimg">
                  </div>
                </div>
					
				<div class="row mb-3" style="text-align:center;">
					<?php echo $message ?>
				</div>
				
                <div class="row mb-3">
					<div class="col-sm-10">
						<a class="btn btn-danger" style="float:left; width:150px;height:50px;margin-top:25px;margin-left:20%;" href="index.php?p=foodlist">Back</a>
						<button type="submit" class="btn btn-primary" style="float:right; width:150px;height:50px;margin-top:25px;margin-right:-20%;" name="btnedit">Save</button>
					</div>
                </div>
				
            </form>
</div>