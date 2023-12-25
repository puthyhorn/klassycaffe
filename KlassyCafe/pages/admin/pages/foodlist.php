<center>
	<div class="pt-4 pb-2" style="margin-top:-60px;">
        <h5 class="card-title text-center pb-0 fs-4">Food Listing</h5>
        <p class="text-center small">All foods and drinks listing here.</p>
    </div>
	<div class="search-bar col-6" style="margin-bottom:40px;">
      
	</div>
	
</center>

<form method="post">

<section class="section dashboard" style="margin-top:-5%;margin-bottom:2%;">
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
	
<div class="card-body">

	<table class="table datatable datatable-table">
		<thead  style = "margin-bottom:60px;" >
			<tr>
				<th data-sortable="true" style="width: 2.714285714285714%;">#</th>
				<th data-sortable="true" style="width: 12.714285714285714%;">Food</th>
				<th data-sortable="true" style="width: 25.95031055900621%;">Ingridient</th>
				<th data-sortable="true" style="width: 7.7639751552795%;">Price</th>
				<th data-sortable="true" style="width: 10.7639751552795%;">Category Type</th>
				<th data-sortable="true" style="width: 10.7639751552795%;">Picture</th>
				<th data-sortable="true" style="width: 7.7639751552795%;">Edit</th>
				<th data-sortable="true" style="width: 7.7639751552795%;">Delete</th>
			</tr>
		</thead>
		<tbody>
		
		<?php
		if(isset($_POST['btn']))
		{
			$category = trim($_POST['btn']);
			$xml = "SELECT * FROM tbl_food where cid='$category' AND trash = 0 order by id desc";
			$result = mysqli_query($conn,$xml);
		}else
		{
			$xml = "SELECT * FROM tbl_food where trash = 0 order by id desc";
			$result = mysqli_query($conn,$xml);
		}
		while($row = mysqli_fetch_array($result))
		{
		?>
					<tr data-index="0">			
						<th scope="row" style= "padding:10px;">#</td>
						<td style= "padding:20px;"><?=$row[1]?></td>
						<td style= "padding:10px;"><?=$row[2]?></td>
						<td style= "padding:20px;">$ <?=$row[3]?></td>
						<td style= "padding:20px;"><?=$row['cid']?></td>
						<td style= "padding:10px;">
							<img src="../../img/<?=$row[5];?>/<?=$row['img'];?>" style = "width:100px;" >
						</td>
						<td style= "padding:20px;">
							<a class="btn btn-primary" type="button" href="index.php?p=editfood&&id= <?=$row[0]?>" >Edit</a>
						</td>
						<td style= "padding:20px;">
							<a class="btn btn-danger" type="button" href="index.php?p=deletefood&&id= <?=$row[0]?>" onclick="return confirm('Are you sure want to delete?');" >Delete</a>
						</td>
						
					</tr>
		<?php
		}
		?>
		
			
		</tbody>
	</table>
</div>

</form>
