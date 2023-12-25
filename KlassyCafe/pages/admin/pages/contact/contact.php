<center>
	<div class="pt-4 pb-2" style="margin-top:-60px;">
        <h5 class="card-title text-center pb-0 fs-4">Messeges</h5></br>
        <p class="text-center small">Messege from customers.</p>
    </div>
	<div class="search-bar col-6" style="margin-bottom:40px;">
     
	</div>
</center>
	
<div class="card-body">
	<?php
		error_reporting(0);
		$xml = "SELECT * FROM tbl_contacts WHERE trash=0 order by con_id desc";
		$result = mysqli_query($conn,$xml);
	?>
	
	<table class="table datatable datatable-table">
		<thead  style = "margin-bottom:60px;" >
			<tr>
				<th data-sortable="true" style="width: 7.192546583850932%;">#</a></th>
				<th data-sortable="true" style="width: 15.95031055900621%;">Customer Name</th>
				<th data-sortable="true" style="width: 9.7639751552795%;">Email</th>
				<th data-sortable="true" style="width: 20.7639751552795%;">Subject</th>
				<th data-sortable="true" style="width: 25.7639751552795%;">Messege</th>
				<th data-sortable="true" style="width: 7.192546583850932%;">Delete</a></th>
			</tr>
		</thead>
		<tbody>
		<?php
		$num = mysqli_num_rows($result);
		if($num == 0)
		{
		?>
		<tr>
			<td colspan="8"><center><div class="alert alert-success" role = "alert"> No booking aviable currenty !!!</div></center></td>
		</tr>
		<?php	 
		}else
		{
			while($row = mysqli_fetch_array($result))
			{
			?>
				<tr data-index="0">	
					<td scope="row" style= "padding:30px;">#</td>				
					<th scope="row" style= "padding:30px;"><?=$row[1]?></th>
					<td style= "padding:30px;"><?=$row[2]?></td>
					<td style= "padding:30px;"><?=$row[3]?></td>
					<td style= "padding:30px;"><?=$row[4]?></td>
					<td style= "padding:30px 0px 0px 0px;">
						<a class="btn btn-danger" type="button" href="index.php?pc=deleteMessage&&id= <?=$row['con_id']?>" >Delete</a>
					</td>
				</tr>
			<?php
				
			}
		}
			mysqli_close($conn);
			?>
		</tbody>
	</table>
	
</div>
