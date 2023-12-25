
<style>
.left {
  width: 70%;
  float: left;
  clear: both;
}

.right {
  width: 30%;
  float: right;
  margin-bottom: 25px;
}
 #wrapper {
  height: 100%;
  -webkit-align-items: center;
  align-items: center;
  -webkit-justify-content: center;
  justify-content: center;
}

 #wrapper #container #left-col {
  width: 40%;
  min-width: 240px;
  height: 100%;
  float: left;
  background: #34495e;
  margin-left:5%;
}
 #wrapper #container #left-col #left-col-cont {
  margin: 20px 25px;
  color: white;
}
 #wrapper #container #left-col #left-col-cont h2 {
  margin: 25px 0 0 0;
}
 #wrapper #container #left-col #left-col-cont div.item {
  margin: 30px 0;
  clear: both;
}
 #wrapper #container #left-col #left-col-cont div.item .img-col {
  width: 30%;
  float: left;
}
 #wrapper #container #left-col #left-col-cont div.item .img-col img {
  width: 100%;
  max-height: 100px;
}
 #wrapper #container #left-col #left-col-cont div.item .meta-col {
  width: 70%;
  float: right;
}
 #wrapper #container #left-col #left-col-cont div.item .meta-col h3 {
  font-size: 1em;
  margin: 10px 0 0 5px;
}
 #wrapper #container #left-col #left-col-cont div.item .meta-col p {
  font-size: 0.9em;
  margin: 5px 0 0 5px;
  opacity: 0.5;
}
 #wrapper #container #left-col #left-col-cont p#total {
  text-transform: uppercase;
  text-align: left;
  font-size: 1em;
  margin: 0;
  font-weight:bold;
}
 #wrapper #container #left-col #left-col-cont h4#total-price {
  text-align: left;
  font-size: 2em;
  margin: 0;
  color: orange;
  font-weight:bold;
}
 #wrapper #container #left-col #left-col-cont h4#total-price span {
  color: #1c2834;
}
 #wrapper #container #right-col {
  width: calc(50% - 50px);
  min-width: 310px;
  height: 100%;
  margin: 20px 25px;
  margin-right:5%;
  float: right;
}
 #wrapper #container #right-col h2 {
  float: left;
  margin: 6px 0 6px 0;
}
 #wrapper #container #right-col div#logotype {
  float: right;
  margin: 4px 0 0 0;
}
 #wrapper #container #right-col div#logotype img {
  width: 60px;
  height: auto;
}
 #wrapper #container #right-col div#logotype img#visa {
  margin-top: -10px;
}
 #wrapper #container form {
  margin: 80px auto 0;
  width: 100%;
}
 #wrapper #container form #cardnumber {
  background: white;
  width: calc(100% - 14px);
  padding: 4px 6px;
  border-radius: 3px;
  border: 1px solid lightgrey;
}
 #wrapper #container form #cardnumber input {
  display: inline-block;
  font-family: "Lato", sans-serif;
  width: calc(25% - 23px);
  padding: 6px 8px;
  letter-spacing: 6px;
  font-size: 1em;
  border: none;
  background: none;
}
 #wrapper #container form #cardnumber input::-webkit-input-placeholder {
  opacity: 0.5;
}
 #wrapper #container form #cardnumber input::-moz-placeholder {
  opacity: 0.5;
}
 #wrapper #container form #cardnumber input[type=number]::-webkit-inner-spin-button,  #wrapper #container form #cardnumber input [type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
 #wrapper #container form #cardnumber span.divider {
  color: rgba(0, 0, 0, 0.3);
}
 #wrapper #container form label {
  display: block;
  font-family: "Lato", sans-serif;
  font-size: 1em;
  font-weight: 600;
  text-transform: uppercase;
  margin: 14px 14px 14px 4px;
}
 #wrapper #container form label#cvc-label i {
  cursor: pointer;
  margin-left: 3px;
}
 #wrapper #container form input {
  display: block;
  padding: 6px 8px;
  border: 1px solid lightgrey;
  border-radius: 2px;
  font-size: 0.9em;
}
 #wrapper #container form input:focus {
  border-color: #e67e22;
}
 #wrapper #container form input::-webkit-input-placeholder {
  opacity: 0.5;
}
 #wrapper #container form input::-moz-placeholder {
  opacity: 0.5;
}
 #wrapper #container form input#cardholder {
  width: calc(100% - 18px);
  padding: 8px 10px;
  font-size: 1.1em;
}
 #wrapper #container form select#cardholder {
  width: calc(100% - 18px);
  padding: 8px 10px;
  font-size: 1.1em;
}
 #wrapper #container form input#cvc {
  width: calc(100% - 18px);
  padding: 8px 10px;
  font-size: 1.1em;
}
}
 #wrapper #container form select {
  border: 1px solid lightgrey;
  border-radius: 2px;
  background: none;
  width: 90px;
  font-weight: 500;
  font-size: 0.9em;
  padding: 6px 8px;
  color: rgba(0, 0, 0, 0.2);
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}
 #wrapper #container form a[type=button]{
  display: block;
  width: 100%;
  border: none;
  border-radius: 4px;
  padding: 8px 0;
  font-size: 0.8em;
  text-align:center;
}

 #wrapper #container form button{
  display: block;
  width: 100%;
  border: none;
  border-radius: 4px;
  padding: 8px 0;
  font-size: 0.8em;
  text-align:center;
}

 #wrapper #container form a[type=button]#purchase {
  background: #e67e22;
  color: white;
  margin:  0 0 8px;
  font-size: 1.5em;
  width:45%;
  float:left;
}
 #wrapper #container form button#paypal {
  background: gray;
  color: white;
  margin: 0 0 8px;
  font-size: 1.5em;
  border: 1px solid lightgrey;
  width:45%;
  float:right;
}
 #wrapper #container form button#paypal:hover {
  background: #003087;
  border-color: #003087;
  color: white;
}
 #wrapper #container form button#paypal:hover i {
  color: #009cde;
}
 #wrapper #container form button#paypal i {
  color: #003087;
}
 #wrapper #container form p#support {
  font-size: 0.7em;
  text-align: center;
  color: rgba(0, 0, 0, 0.5);
}
 #wrapper #container form p#support a {
  text-decoration: none;
  color: inherit;
  padding: 0 1px 2px 1px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.5);
}
 #wrapper #container form p#support a:hover {
  padding-bottom: 3px;
}
 #dailyui {
  position: fixed;
  font-size: 15em;
  font-weight: 700;
  margin: 0 0 -55px 0;
  padding: 0;
  right: 0;
  bottom: 0;
  color: rgba(0, 0, 0, 0.3);
  z-index: 0;
  text-align: right;
  font-family: "proxima-nova", "Lato", sans-serif;
}
</style>
<div id="wrapper">
	<div id="container">
		<div id="left-col">
			<div id="left-col-cont">
				<h2>Orders Summary</h2>
				
			<?php
				error_reporting(0);
				$tid = trim($_GET['tID']);
				$Bid = trim($_GET['bid']);
				$xml = "SELECT f.img,f.name,t.table_num,f.price,sum(po.num),f.cid 
						FROM tbl_food f JOIN tbl_preorder po ON po.foodid = f.id JOIN tbl_table t ON po.tableid = t.table_num
						where po.num >0 AND tableid= '$tid'
						group by po.foodid;
						";
				$result = mysqli_query($conn,$xml);
				$num = mysqli_num_rows($result);
					
			?>
			<form method="post">
			
			<?php
			while($row = mysqli_fetch_array($result))
				{
			?>
				<div class="item">
					<div class="img-col">
						<img src="../../img/<?=$row['cid'];?>/<?=$row[0];?>" style="width:120px;height:120px;padding:5px;" alt="" />
					</div>
					<div class="meta-col">
						<h3><?=$row['name'];?></h3>
						<p class="price">Price: $ <?=$row['price'];?></p>
						<span><p class="price">Quantity: <?=$row[4];?></p></span>
					</div>
				</div>
			<?php
				}
				
				$sql = "SELECT round(sum(price*num),2) FROM tbl_preorder WHERE tableid ='$tid'group by tableid";
				$rst = mysqli_query($conn,$sql);
				$cn = mysqli_fetch_array($rst);
				$amount = $cn[0];
				
				?>
				<div class="img-col" style="margin-top:10%;margin-bottom:5%; float:right;">
					<h4 id="total-price"><span style="margin-right:40px; color:white;">Total Price : </span>$	<?=$cn[0];?></h4>
				</div>
			</form>
			</div>
		</div>
		<div id="right-col">
			<h1>Payment By Cash</h1>
			<div id="logotype">
				
			</div>
			
			<?php
			
				if(isset($_POST['btnPay']))
				{
					$smg = '';
					$cash = trim($_POST['txtcash']);
					$sysdate = date('Y/m/d');
					if($cash == $amount)
					{
						$pm="SELECT * FROM tbl_booking WHERE bookid = '$Bid'";
						$r= mysqli_query($conn, $pm);
						while($rs = mysqli_fetch_array($r))
						{
							$name = $rs[1];$phone = $rs[2];$email = $rs[3];$date = $rs[4];$time = $rs[5];$tid = $rs[6];
							
						}	
						if(!$result)
						{
							echo '<div class="alert alert-danger" role = "alert"> Transaction Failed.</div>';
						}else
						{
							$dm = "insert into tbl_ckbook (bookid,cus_name,phone,email,date,time,tableid,amount,ckdate)
									values (?,?,?,?,?,?,?,?,?)";
							$stmt = $conn-> prepare($dm);
							$stmt -> bind_param("issssssds",$Bid,$name,$phone,$email,$date,$time,$tid,$amount,$sysdate);
									
							if($stmt -> execute())
							{
								
								$sq="insert into tbl_orderhis select * from tbl_preorder where bookid = $Bid";
								$rst= mysqli_query($conn, $sq);
								if(!$rst){
									echo '<div class="alert alert-danger" role = "alert"> Transaction Failed.</div>';
								}else{
									
									$hm="delete from tbl_preorder where bookid = $Bid";
									$sthm= mysqli_query($conn, $hm);
									
									$wq="delete from tbl_booking where bookid = $Bid";
									$st= mysqli_query($conn, $wq);
								
									$smg = '<div class="alert alert-success" role = "alert"> You already paid and check out successfull.</div>';
								}
								
								$smg = '<div class="alert alert-success" role = "alert"> You already paid and check out successfull.</div>';
							}else
							{
								echo '<div class="alert alert-danger" role = "alert"> Transaction Failed.</div>';
							}	
						}
					}else
					{
						$smg = '<div class="alert alert-warning" role = "alert"> Please check the amount again !!!</div>';
					}
					
				}
			?>
			
			<form method="post">
			
				<label for="">cash recieve</label>
				<input id="cardholder" type="text" placeholder="Cash Recieve" name="txtcash" required />
				
				<label for="">notes</label>
				<input id="cardholder" type="text" placeholder="add some notes here." />
				<div style="margin-top:30px;margin-bottom:-30px;"><?=$smg;?></div>
				<div style="margin-top:20%;">
					<span><a type="button" id="purchase" href="index.php?p=preorder&&id= <?=$tid;?>&&id2= <?=$Bid?>">Back</a></span>
					<button type="submit" id="paypal" name="btnPay"> Pay and CheckOut</button>
				</div>
				
			</form>
			
		</div>
	</div>
</div>