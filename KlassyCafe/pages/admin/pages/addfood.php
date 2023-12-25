
<?php
	error_reporting(0);
	
	if(isset($_POST['btnAdd']))
	{
		$name = trim($_POST['txtname']);
		$ingrid = trim($_POST['txtingrid']);
		$price = trim($_POST['txtprice']);
		$cate = trim($_POST['txtcate']);
		$img = trim($_POST['txtimg']);
		
		$message = "";
		$success = '<div class="alert alert-success" role = "alert"> Food or Dish has been added successfully.</div>';
		$failed = '<div class="alert alert-danger" role = "alert"> There is an error in adding new food !!!</div>';
		
		$filetmp = $_FILES['txtpicture']['tmp_name'];
		$filename = $_FILES['txtpicture']['name'];
		$filetype = $_FILES['txtpicture']['type'];
		$filesize = $_FILES['txtpicture']['size'];
		$filepath = "../../../assets/images".$filename;
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
				if($name != '' && $ingrid !='' && $price != '' && $cate !='' && $img !='')
				{
					move_uploaded_file($filetmp,"../../../assets/images".$filename);
					
						$sql = "insert into tbl_food (name,ingridient,price,img,cid) values (?,?,?,?,?)";
						$stmt = $conn-> prepare($sql);
						$stmt -> bind_param("ssiss",$name,$ingrid,$price,$img,$cate);
						if($stmt -> execute())
						{		
							$message = $success;
							$stmt -> close();
						}else
						{
							$message = $failed;
						}				
				}
			}
		}
		
		
	}

?>
	
	<div class="card-body">
				<div class="pt-4 pb-2" >
                    <h5 class="card-title text-center pb-0 fs-4" style="margin-top:-50px; margin-bottom:60px;">Adding New Food/Dish </h5>
                    <p class="text-center small"></p>
                  </div>
              <!-- General Form Elements -->
			  
            <form method="post">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="txtname" required>
                  </div>
                </div>
				<div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Ingrideints</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name = "txtingrid" rows ="5px;" required></textarea>
                  </div>
                </div>
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="txtprice" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Category Name</label>
                  <div class="col-sm-10">
				  <select class="form-control" name="txtcate" required>
						<option> -- The type of food -- </option>
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
						<button type="submit" class="btn btn-primary" style="float:right; width:150px;height:50px;margin-top:25px;" name="btnAdd">Add</button>
					</div>
                </div>
				
            </form>

</div>