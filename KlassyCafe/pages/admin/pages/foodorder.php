
<?php
	error_reporting(0);
	$id = trim($_GET['id']);
	$bid = trim($_GET['id']);
	$tid = trim($_GET['id2']);
	$xml = "SELECT * FROM tbl_table where table_num = '$id' ";
	$rst = mysqli_query($conn,$xml);
	$data= mysqli_fetch_array($rst);
	
	$mark = $data['mark'];
	$tbl_num = $data['table_num'];
	

?>
<form method="post">
	<div class="card-body" style="margin-top:4px;">
				
    <section class="section dashboard" style="margin-top:1px;margin-bottom:2%; float:right;">
				<div class="row">       
					<div class="col-12">
						<div class="card top-selling">
					
							<div class="filter">
							  <button class="btn btn-primary" value="Filter" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
							  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
								<li class="dropdown-header text-start">
								  <h6>Filter</h6>
								</li>
								
								<li><button class="dropdown-item" type="submit" name="btn" value="food">Foods</button></li>
								<li><button class="dropdown-item" type="submit" name="btn" value="dessert">Desserts</button></li>
								<li><button class="dropdown-item" type="submit" name="btn" value="juice">Juices</button></li>
					
							  </ul>
							</div>
						</div>
					</div>
				</div>
	</section>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label"><h1>Food Order </h1></label>
			
                <div class="col-sm-10">
					<table class="table datatable datatable-table">
					<?php
					if(isset($_POST['btn']))
					{
						$category = trim($_POST['btn']);
						$xml = "SELECT id,name,ingridient,price,img,cid,trash FROM tbl_food where cid='$category' AND trash = 0 order by id desc";
						$result = mysqli_query($conn,$xml);
					}else
					{
						$xml = "SELECT id,name,ingridient,price,img,cid,trash FROM tbl_food where trash = 0 order by id desc";
						$result = mysqli_query($conn,$xml);
					}
					?>
						<tbody>
						<?php
							$num = mysqli_num_rows($result);
							if($num == 0)
							{
							?>
							<tr>
								<td colspan="7"><center><div class="alert alert-success" role = "alert"> No Food listing currenty !!!</div></center></td>
							</tr>
							<?php	 
							}else
							{
								while($row = mysqli_fetch_array($result))
								{
								?>
							<tr data-index="0">	
								<td style= "padding:10px;">
									<img src="../../img/<?=$row[5];?>/<?=$row['img'];?>" style = "width:100px;" >
								</td>				
								<td style= "padding:20px;"><?=$row[1]?></td>
								<td style= "padding:20px;">$ <?=$row[3]?></td>
								<td style= "padding:20px;">
									<a class="btn btn-success" type="button" href="index.php?p=placeorder&&id=<?=$row[0]?>&&bid=<?=$bid?>&&tid=<?=$tid;?>" >Order</a>
								</td>
							</tr>
							<?php
								}
								mysqli_close($conn);
							}
						?>
						</tbody>
					</table>
                </div>
                <div class="row mb-3">
					<div class="col-sm-10">
						<a type="button" href="index.php?p=preorder&&id=<?=$tid;?>&&id2=<?=$id;?>" class="btn btn-danger" style="margin-right:-10%; float:right;width:150px;height:50px;margin-top:25px;padding:10px;">Back</a>
					</div>
                </div>
			
				<div class="pt-4 pb-2" >
                    <h5 class="card-title text-center pb-0 fs-4" style="margin-top:-50px; margin-bottom:60px;"></h5>
                    <p class="text-center small"></p>
                </div>
				<div class="pt-4 pb-2" >
                    <h5 class="card-title text-center pb-0 fs-4" style="margin-top:-50px; margin-bottom:60px;"></h5>
                    <p class="text-center small"></p>
                </div>
		</div>
	</div>
</form>

		