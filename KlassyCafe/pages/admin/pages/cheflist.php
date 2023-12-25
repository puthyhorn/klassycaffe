<?php
	error_reporting(0);
	
		$xml = "SELECT * FROM tbl_chef order by cid";
		$result = mysqli_query($conn,$xml);
		

?>

<div class="datatable-container" >
	<div class="pt-6 pb-2" style="margin-top:-40px; margin-bottom:50px;">
        <h2 class="card-title text-center pb-0 fs-4">Chef Management</h2>
    </div>
	<table class="table datatable datatable-table">
		<thead  style = "margin-bottom:60px;" >
			<tr>
				<th data-sortable="true" style="width: 12.714285714285714%;">ID Card</th>
				<th data-sortable="true" style="width: 15.95031055900621%;">Chef Name</th>
				<th data-sortable="true" style="width: 10.7639751552795%;">Phone Number</th>
				<th data-sortable="true" style="width: 10.7639751552795%;">Start Date</th>
				<th data-sortable="true" style="width: 7.7639751552795%;">Time In</th>
				<th data-sortable="true" style="width: 7.7639751552795%;">Time Out</th>
				<th data-sortable="true" style="width: 15.7639751552795%;">Image</th>
				<th data-sortable="true" style="width: 12.192546583850932%;">Edit</a></th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($result))
			{
			?>
				<tr data-index="0">			
					<th scope="row" style= "padding:30px;"><?=$row['cardid']?></td>
					<td style= "padding:30px;"><?=$row['name']?></td>
					<td style= "padding:30px;"><?=$row['phone']?></td>
					<td style= "padding:30px;"><?=$row[4]?></td>
					<td style= "padding:30px;"><?=$row[5]?></td>
					<td style= "padding:30px;"><?=$row[6]?></td>
					<td>
						<img src= "../../img/chefs/<?php echo $row['img'] ?>" style = "width:100px;" /> 
					</td>
					<td style= "padding:30px 0px 0px 0px;">
						<a class="btn btn-danger" type="button" href="index.php?p=editchef&&id= <?=$row[0]?>" >Edit</a>
					</td>
				</tr>
			<?php
				
			}
			mysqli_close($conn);
			?>
		</tbody>
	</table>
</div>
<div>
	<div class="datatable-bottom">
		<div class="col-12" style="text-align:center;"><?=$message?> </div>
		<nav class="datatable-pagination"><ul class="datatable-pagination-list"></ul></nav>
	</div>
</div>
              <!-- End Table with stripped rows -->

            </div>