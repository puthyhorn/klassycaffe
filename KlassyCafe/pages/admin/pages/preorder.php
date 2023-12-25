
<?php
	error_reporting(0);
	$id = trim($_GET['id']);
	$bid = trim($_GET['id2']);
	
	$xml = "SELECT * FROM tbl_table where table_num = '$id' ";
	$rst = mysqli_query($conn,$xml);
	$data= mysqli_fetch_array($rst);
	
	$mark = $data['mark'];
	$tbl_num = $data['table_num'];
	

?>
	
	<div class="card-body" style="margin-top:4px;">
				
              <!-- General Form Elements -->
			  
            <form method="post">
			<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Table ID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?=$tbl_num;?>"  disabled >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Table Mark</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?=$mark;?>" disabled >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Food Order</label>
                  <div class="col-sm-10">
				  <table class="table datatable datatable-table">
	
		<tbody>
		<?php
		$xml = "SELECT f.img,f.name, f.price,sum(po.num),b.bookid,f.cid,po.oid FROM tbl_preorder po JOIN tbl_food f ON po.foodid = f.id JOIN tbl_booking b ON po.tableid = b.tid WHERE b.bookid=$bid AND po.num>0 GROUP BY po.foodid";
		$result = mysqli_query($conn,$xml);
		$num = mysqli_num_rows($result);
		if($num == 0)
		{
		?>
		<tr>
			<td colspan="7"><center><div class="alert alert-success" role = "alert"> No Food ordered currenty !!!</div></center></td>
		</tr>
		<?php	 
		}else
		{
			while($row = mysqli_fetch_array($result))
			{
			?>
				<tr data-index="0">	
					<td style= "padding:10px;">
						<img src="../../img/<?=$row[5];?>/<?=$row[0];?>" style = "width:100px;" >
					</td>				
					<td style= "padding:20px;"><?=$row[1]?></td>
					<td style= "padding:20px;">$ <?=$row[2]?></td>
					<td style= "padding:20px;"><?=$row[3]?></td>
					<td style= "padding:20px;">
						<a class="btn btn-danger" type="button" href="index.php?p=cancelOrder&&id=<?=$row[6]?>" >Cancel Order</a>
					</td>
					
				</tr>
			<?php
			}
			
			$sql = "SELECT round(sum(price*num),2) FROM tbl_preorder WHERE tableid = '$tbl_num' GROUP BY tableid";
			$rst = mysqli_query($conn,$sql);
			$cn = mysqli_fetch_array($rst);
		}
			?>
			<tr style="">
				<td colspan=4><h4 style="text-align:center; padding:20px;">Total Amount:</h4></td>
				<td style="padding:20px;"><h2><b>$ <?=$cn[0];?></b></h2></td>
			</tr>
			
		</tbody>
	</table>
                  </div>
                </div>
                
				
                <div class="row mb-3">
					<div class="col-sm-10">
						<a type="button" href="index.php?p=payKH&&tID=<?=$tbl_num?>&&bid=<?=$bid?>" class="btn btn-warning" style="float:right;width:150px;height:50px;padding:10px;">Check Out</a>
						<a type="button" href="index.php?p=foodorder&&id2=<?=$tbl_num?>&&id=<?=$bid?>" class="btn btn-success" style="float:right;margin-right:30px; width:150px;height:50px;padding:10px;">Order More</a>
						<a type="button" href="index.php?p=bookinglist" class="btn btn-danger" style="margin-right:30px; float:right;width:150px;height:50px;padding:10px;">Back</a>
					</div>
                </div>
				
            </form>
			
			<div class="pt-4 pb-2" >
                    <h5 class="card-title text-center pb-0 fs-4" style="margin-top:-50px; margin-bottom:60px;"></h5>
                    <p class="text-center small"></p>
                  </div>
				  <div class="pt-4 pb-2" >
                    <h5 class="card-title text-center pb-0 fs-4" style="margin-top:-50px; margin-bottom:60px;"></h5>
                    <p class="text-center small"></p>
                  </div>

</div>
