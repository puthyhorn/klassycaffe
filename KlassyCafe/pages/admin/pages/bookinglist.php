<center>
	<div class="pt-4 pb-2" style="margin-top:-60px;">
        <h5 class="card-title text-center pb-0 fs-4">Booking Confirmation</h5>
        <p class="text-center small">Confirm the booking.</p>
    </div>
	<div class="search-bar col-6" style="margin-bottom:40px;">
      
	</div>
</center>
	
<div class="card-body">
	<?php
		error_reporting(0);
		$xml = "SELECT * FROM tbl_booking order by bookid";
		$result = mysqli_query($conn,$xml);
		
	?>
	
	<table class="table datatable datatable-table">
		<thead  style = "margin-bottom:60px;" >
			<tr>
				<th data-sortable="true" style="width: 12.714285714285714%;">Booking ID</th>
				<th data-sortable="true" style="width: 15.95031055900621%;">Customer Name</th>
				<th data-sortable="true" style="width: 10.7639751552795%;">Phone Number</th>
				<th data-sortable="true" style="width: 10.7639751552795%;">Emial</th>
				<th data-sortable="true" style="width: 15.7639751552795%;">Arrival Date</th>
				<th data-sortable="true" style="width: 10.7639751552795%;">Time</th>
				<th data-sortable="true" style="width: 12.7639751552795%;">Table Number</th>
				<th data-sortable="true" style="width: 12.7639751552795%;">Food Order</th>
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
					<th scope="row" style= "padding:30px;"><?=$row[0]?></td>
					<td style= "padding:30px;"><?=$row[1]?></td>
					<td style= "padding:30px;"><?=$row[2]?></td>
					<td style= "padding:30px;"><?=$row[3]?></td>
					<td style= "padding:30px;"><?=$row[4]?></td>
					<td style= "padding:30px;"><?=$row[5]?></td>
					<td style= "padding:30px;"><?=$row[6]?></td>
					<td style= "padding:30px;">
						<a class="btn btn-primary" type="button" href="index.php?p=preorder&&id= <?=$row['tid']?>&&id2= <?=$row[0]?>" >Order</a>
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
