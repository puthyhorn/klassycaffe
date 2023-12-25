
<center>
	<div class="pt-4 pb-2" style="margin-top:-60px;">
        <h5 class="card-title text-center pb-0 fs-4">Checked OutBooking</h5>
        <p class="text-center small">Checked out booking report.</p>
    </div>
	<div class="search-bar col-6" style="margin-bottom:40px;">
      
	</div>
</center>

<!--Start Search-->
<form method="post">
	<span>
        <select class="col-3" name="txttable" style="margin-left:12%;margin-top:-20px;margin-bottom:30px;height:50px;font-size:20px;padding-left:2%; border-radius:5px;" >
            <option value="">Search by table</option>
			<?php
				$sql = mysqli_query($conn,"SELECT table_num,mark FROM tbl_table ");
				while($row = mysqli_fetch_array($sql))
				{
					echo "<option value='".$row['table_num']."'>".$row['table_num']."\t\t".$row['mark']."</option>";
				}
			?>
		</select>
	</span>
	<span data-target-input="nearest">
		<input type="date" class="datetimepicker-input col-3" name="txtdate" title="Search By CheckIn Date" style="margin-top:-20px;margin-bottom:30px;border-radius:3px;height:50px;font-size:20px;padding-left:2%;" />
	</span>
	
	
	<span class="col-md-4" style="margin-top:-6px;margin-bottom:30px;float:right;">
		<button  class="btn btn-primary" type="submit" name="btnSearch" style="height:40px;width:70px;" title="Search Now">
			<i class="fab bi bi-search"></i>
		</button>
		<button  class="btn btn-primary" type="submit" style="height:40px;width:70px;" onclick="printPage()" target="_blank" name="btnprint" title="Print Report"> 
			<i class="fab bi bi-printer"></i>
		</button>
	</span>

</form>
<!--End Search-->

<script>
        function printPage() {
            window.print();
        }
</script>
	
<div class="card-body">

	<table class="table datatable datatable-table">
		<thead  style = "margin-bottom:60px;" >
			<tr>
				<th data-sortable="true" style="width: 8.714285714285714%;">Booking ID</th>
				<th data-sortable="true" style="width: 10.95031055900621%;">Guest Name</th>
				<th data-sortable="true" style="width: 7.7639751552795%;">Number</th>
				<th data-sortable="true" style="width: 10.7639751552795%;">Emial</th>
				<th data-sortable="true" style="width: 12.7639751552795%;">Arrival Date</th>
				<th data-sortable="true" style="width: 10.7639751552795%;">Time</th>
				<th data-sortable="true" style="width: 12.7639751552795%;">Table Number</th>
				<th data-sortable="true" style="width: 10.7639751552795%;">Amount</th>
				<th data-sortable="true" style="width: 12.7639751552795%;">CheckOut Date</th>
				<th data-sortable="true" style="width: 7.7639751552795%;">View</th>
			</tr>
		</thead>
		<tbody style="color:red;">
		<?php
			if(isset($_POST['btnSearch']))
			{
				$date = trim($_POST['txtdate']);
				$table = trim($_POST['txttable']);
				
				if($table != "")
				{
					$sql = "SELECT * FROM tbl_ckbook WHERE tableid = '$table'";
					$rst = $conn-> query($sql);
					
				}
				if($date != "")
				{
					$sql = "SELECT * FROM tbl_ckbook WHERE date = '$date'";
					$rst = $conn-> query($sql);
				}
				if($date != "" && $table != "")
				{
					$sql = "SELECT * FROM tbl_ckbook WHERE tableid = '$table' AND date = '$date'";
					$rst = $conn-> query($sql);
				}
				
				if(mysqli_num_rows($rst)>0)
				{
					while($row = mysqli_fetch_array($rst))
					{
						?>
							<tr data-index="0">			
								<th scope="row" style= "padding:30px;"><?=$row[1]?></td>
								<td style= "padding:30px;"><?=$row[2]?></td>
								<td style= "padding:30px;"><?=$row[3]?></td>
								<td style= "padding:30px;"><?=$row[4]?></td>
								<td style= "padding:30px;"><?=$row[5]?></td>
								<td style= "padding:30px;"><?=$row[6]?></td>
								<td style= "padding:30px;"><?=$row[7]?></td>
								<td style= "padding:30px;">$ <?=$row[8]?></td>
								<td style= "padding:30px;"><?=$row[9]?></td>
								<td style= "padding:15px;"><a type="button" href="index.php?p=bookingHisDetail&&id=<?=$row[1];?>" class="btn btn-primary">Show</a></td>
							</tr>
						<?php
							
					}
				}else
				{
				?>
					<tr data-index="0">
						<td colspan=10><div class="alert alert-danger" style="text-align:center;">
							<strong>No record found related to your keyword !!!</strong>
						</div></td>
					</tr>
				<?php
				}
			}else{
					error_reporting(0);
					$xml = "SELECT * FROM tbl_ckbook order by id DESC";
					$result = mysqli_query($conn,$xml);
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
								<th scope="row" style= "padding:30px;"><?=$row[1]?></td>
								<td style= "padding:30px;"><?=$row[2]?></td>
								<td style= "padding:30px;"><?=$row[3]?></td>
								<td style= "padding:30px;"><?=$row[4]?></td>
								<td style= "padding:30px;"><?=$row[5]?></td>
								<td style= "padding:30px;"><?=$row[6]?></td>
								<td style= "padding:30px;"><?=$row[7]?></td>
								<td style= "padding:30px;">$ <?=$row[8]?></td>
								<td style= "padding:30px;"><?=$row[9]?></td>
								<td style= "padding:15px;"><a type="button" href="index.php?p=bookingHisDetail&&id=<?=$row[1];?>" class="btn btn-primary">Show</a></td>
							</tr>
						<?php
							
						}
					}
						mysqli_close($conn);
			}
			?>
		</tbody>
	</table>
</div>
