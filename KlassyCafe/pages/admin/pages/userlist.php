<?php
	error_reporting(0);
	
		$xml = "SELECT * FROM tbl_user where trash=0 order by userid desc";
		$result = mysqli_query($conn,$xml);
		

?>

<div class="datatable-container" >
	
	<div class="pt-4 pb-2" style="margin-top:-40px; margin-bottom:20px;">
                    <h5 class="card-title text-center pb-0 fs-4">User Account Management</h5>
                    <p class="text-center small">All user accounts and for modify</p>
                  </div>
	<table class="table datatable datatable-table">
		<thead>
			<tr>
				<th data-sortable="true" style="width: 8.714285714285714%;">User ID</th>
				<th data-sortable="true" style="width: 25.95031055900621%;">User Name</th>
				<th data-sortable="true" style="width: 18.95031055900621%;">Position</th>
				<th data-sortable="true" style="width: 15.7639751552795%;">Password</th>
				<th data-sortable="true" style="width: 17.7639751552795%;">Image</th>
				<th data-sortable="true" style="width: 9.192546583850932%;">Edit</a></th>
				<th data-sortable="true" style="width: 9.192546583850932%;">Delete</a></th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($result))
			{
			?>
				<tr data-index="0">			
					<th scope="row" style= "padding:30px;"><?=$row['userid']?></td>
					<td style= "padding:30px;"><?=$row['username']?></td>
					<td style= "padding:30px 0px 0px 0px;"><?=$row['position']?></td>
					<td style= "padding:30px;">*******</td>
					<td>
						<img src= "../../img/users/<?php echo $row['img'] ?>" style = "width:100px;" /> 
					</td>
					<td style= "padding:30px 0px 0px 0px;">
						<a class="btn btn-primary" type="button" href="index.php?p=edituser&&id= <?=$row['userid']?>" >Edit</a>
					</td>
					<td style= "padding:30px 0px 0px 0px;">
						<a class="btn btn-danger" type="button" href="index.php?p=disableuser&&id= <?=$row['userid']?>" >Disable</a>
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