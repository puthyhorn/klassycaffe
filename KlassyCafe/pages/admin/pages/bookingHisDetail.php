
<?php
	error_reporting(0);
	$id = trim($_GET['id']);
	
	$xml = "SELECT c.id,c.bookid,c.cus_name,c.phone,c.email,c.date,c.time,c.tableid,c.amount,c.ckdate,t.mark FROM tbl_ckbook c JOIN tbl_table t ON c.tableid = t.table_num where bookid = '$id' ";
	$rst = mysqli_query($conn,$xml);
	$data= mysqli_fetch_array($rst);
?>
	
<script>
    function printPage() {
        window.print();
    }
</script>
	
	
	<div class="card-body" style="margin-top:4px;">
		<center>
				<div class="row mb-3">
					<label style="align:center; margin-bottom:25px; margin-top:-35px;" class="col-sm-12 col-form-label"><strong><h1 style="font-weight:bold;font-size:40px;"> Invoice </h1></strong></label>
				</div>
		</center>
        <form method="post"  style="font-size:20px;">
				
			<div style="float:left; width:50%;">
				<div class="row mb-4">
                  <label for="inputText" class="col-sm-4 col-form-label">Booking Number</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value="<?=$data[1];?>"  disabled >
                  </div>
                </div>
				<div class="row mb-4">
                  <label for="inputText" class="col-sm-4 col-form-label">Customer Name</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value="<?=$data[2];?>"  disabled >
                  </div>
                </div>
				<div class="row mb-4">
                  <label for="inputText" class="col-sm-4 col-form-label">Phone Number</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value="<?=$data[3];?>"  disabled >
                  </div>
                </div>
				<div class="row mb-4">
                  <label for="inputText" class="col-sm-4 col-form-label">Email</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value="<?=$data[4];?>"  disabled >
                  </div>
                </div>
				<div class="row mb-4">
                  <label for="inputText" class="col-sm-4 col-form-label">Checked In</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value="<?=$data[5];?>"  disabled >
                  </div>
                </div>
				<div class="row mb-4">
                  <label for="inputText" class="col-sm-4 col-form-label">Time</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value="<?=$data[6];?>"  disabled >
                  </div>
                </div>
				<div class="row mb-4">
                  <label for="inputText" class="col-sm-4 col-form-label">Table Description</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value="<?=$data[10];?>"  disabled >
                  </div>
                </div>
				<div class="row mb-4">
                  <label for="inputText" class="col-sm-4 col-form-label">Table Number</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value="<?=$data[7];?>"  disabled >
                  </div>
                </div>
				<div class="row mb-4">
                  <label for="inputText" class="col-sm-4 col-form-label">Total Amount</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value="$ <?=$data[8];?>"  disabled >
                  </div>
                </div>
				<div class="row mb-4">
                  <label for="inputText" class="col-sm-4 col-form-label">Check Out Date</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value="<?=$data[9];?>"  disabled >
                  </div>
                </div>
				
				<div class="row mb-3">
						<div class="col-sm-10">
							<button type="button" class="btn btn-primary" style="height:50px;width:160px;float:right;" onclick="printPage()" target="_blank" name="btnprint" title="Print Report"> 
								<i class="fab bi bi-printer"></i>
							</button>
							<a type="button" href="index.php?p=ckbookinglist" class="btn btn-danger" style="margin-right:30px; width:160px;height:50px;padding:10px;">Back</a>
						</div>
						
					</div>
				
			</div>
			
			<div style="">			
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-3 col-form-label"><strong>Food Order</strong></label>
                  <div class="col-sm-12">
					<table class="table datatable datatable-table">
						<tbody>
							<?php
							$id = $_GET['id'];
							$xml = "SELECT o.foodid, o.price, sum(o.num), o.bookid,f.name,f.img, f.cid FROM tbl_orderhis o JOIN tbl_food f ON o.foodid = f.id 
									WHERE o.bookid = $id AND num>0
									GROUP BY o.foodid";
							$result = mysqli_query($conn,$xml);
							while($row = mysqli_fetch_array($result))
								{
								?>
									<tr data-index="0">				
										<td style= "padding:30px;">$ <?=$row[4]?></td>
										<td style= "padding:30px;"><?=$row[1]?></td>
										<td style= "padding:30px;"><?=$row[2]?></td>
										<td style= "padding:10px;">
											<img src="../../img/<?=$row[6];?>/<?=$row[5];?>" style = "width:100px;" >
										</td>
									</tr>
								<?php
								}
								
								$sql = "SELECT round(sum(price*num),2) FROM tbl_orderhis WHERE bookid = '$id' AND num>0 GROUP BY tableid";
								$rst = mysqli_query($conn,$sql);
								$cn = mysqli_fetch_array($rst);
								?>
								<tr style="">
									<td colspan=3><h4 style="text-align:center; padding:20px;">Total Amount:</h4></td>
									<td style="padding:20px;"><h2><b>$ <?=$cn[0];?></b></h2></td>
								</tr>
						</tbody>
					</table>
					
                </div>
			</div>	
        </form>
	</div>
<!--style="margin-top:-6px;margin-bottom:30px;float:right;  class="btn btn-primary" "-->