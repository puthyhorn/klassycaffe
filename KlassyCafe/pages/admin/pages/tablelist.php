
<?php
	error_reporting(0);
	session_start();
	if(isset($_SESSION['userid']))
	{
		$uid = $_SESSION['userid'];
		echo $uid;
	}else
	{
		echo '<h1>'.$uid.'</h1>';
	}
?>
			
<form method="post">
	<div class="datatable-container" >
		<div class="pt-6 pb-2" style="margin-top:-35px; margin-bottom:50px;">
			<h2 class="card-title text-center pb-0 fs-4">Table Management</h2>
		</div>
		
	<section class="section dashboard" style="margin-top:-5%;margin-bottom:3%;">
		<div class="row">       
			<div class="col-12">
				<div class="card top-selling">
			
					<div class="filter">
					  <button class="btn btn-primary" value="Filter" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
					  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
						<li class="dropdown-header text-start">
						  <h6>Filter</h6>
						</li>
						
						<li><button class="dropdown-item" type="submit" name="btn" value="Ground Floor">Ground Flools</button></li>
						<li><button class="dropdown-item" type="submit" name="btn" value="First Floor">First Floors</button></li>
						<li><button class="dropdown-item" type="submit" name="btn" value="Second Floor">Second Floos</button></li>
			
					  </ul>
					</div>
				</div>
			</div>
		</div>
	</section>

		<table class="table datatable datatable-table">
			<thead  style = "margin-bottom:60px;" >
				<tr>
					<th data-sortable="true" style="width: 8.714285714285714%;">#</th>
					<th data-sortable="true" style="width: 18.714285714285714%;">Table Mark</th>
					<th data-sortable="true" style="width: 12.95031055900621%;">Table Number</th>
					<th data-sortable="true" style="width: 16.7639751552795%;">Floor</th>
					<th data-sortable="true" style="width: 14.7639751552795%;">Picture</th>
					<th data-sortable="true" style="width: 8.192546583850932%;">Edit</a></th>
					<th data-sortable="true" style="width: 8.192546583850932%;">Delete</a></th>
				</tr>
			</thead>
			<tbody>
			<?php
				if(isset($_POST['btn']))
				{
					$floor = trim($_POST['btn']);
					$xml = "SELECT * FROM tbl_table WHERE floor = '$floor' AND trash=0 order by tid desc";
					$result = mysqli_query($conn,$xml);
				}else
				{
					$xml = "SELECT * FROM tbl_table WHERE trash=0 order by tid desc";
					$result = mysqli_query($conn,$xml);
				}
				while($row = mysqli_fetch_array($result))
				{
				?>
					<tr data-index="0">			
						<th scope="row" style= "padding:30px;"> # </th>
						<td style= "padding:30px;"><?=$row[1]?></td>
						<td style= "padding:30px;"><?=$row[2]?></td>
						<td style= "padding:30px;"><?=$row[3]?></td>
						<td>
							<img src= "../../img/tables/<?php echo $row['img'] ?>" style = "width:100px;" /> 
						</td>
						<td style= "padding:30px 0px 0px 0px;">
							<a class="btn btn-primary" type="button" href="index.php?p=edittable&&id= <?=$row[0]?>" >Edit</a>
						</td>
						<td style= "padding:30px 0px 0px 0px;">
							<a class="btn btn-danger" type="button" href="index.php?p=deletetable&&id= <?=$row[0]?>" >Delete</a>
						</td>
					</tr>
				<?php
					
				}
				mysqli_close($conn);
				?>
				
				
			</tbody>
		</table>
		<div>
			<div class="datatable-bottom">
				<div class="col-12" style="text-align:center;"><?=$message?> </div>
				<nav class="datatable-pagination"><ul class="datatable-pagination-list"></ul></nav>
			</div>
		</div>
    </div>		
</form>