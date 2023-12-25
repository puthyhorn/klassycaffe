
<section class="section dashboard">
    <div class="row">       
		<div class="col-12">
            <div class="card top-selling overflow-auto">
				
				
			<form method="POST" style="font-size:16px;">	
                <div class="filter">
                  <a class="icon btn btn-primary" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter By</h6>
                    </li>

                    <li><button class="dropdown-item" type="submit" name="btn" value="today">Today</button></li>
                    <li><button class="dropdown-item" type="submit" name="btn" value="week">This Week</button></li>
                    <li><button class="dropdown-item" type="submit" name="btn" value="month">This Month</button></li>
                  </ul>
                </div>
				
                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling <span>| Todays</span></h5>

				
	
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col" style="width: 12.714285714285714%;">Images</th>
                        <th scope="col" style="width: 12.714285714285714%;">Food</th>
						<th scope="col" style="width: 50.714285714285714%;">Ingredients</th>
                        <th scope="col" style="width: 10.714285714285714%;">Price</th>
                        <th scope="col" style="width: 10.714285714285714%;">Sold</th>
                        <th scope="col" style="width: 15.714285714285714%;">Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
					
					<?php
					if(isset($_POST['btn']))
					{
						if($_POST['btn'] == "today")
						{
							$xml = "SELECT f.name,f.cid,f.img,f.price,f.ingridient,round(sum(o.price*o.num),2),sum(o.num),ck.date 
									FROM tbl_orderhis o JOIN tbl_food f ON o.foodid = f.id JOIN tbl_ckbook ck ON o.bookid = ck.bookid
									WHERE date = CURRENT_DATE AND o.num>0
									GROUP BY o.foodid order by sum(o.num) DESC;";
						}else if($_POST['btn'] == "week")
						{
							$xml = "SELECT f.name,f.cid,f.img,f.price,f.ingridient,round(sum(o.price*o.num),2),sum(o.num),ck.date 
									FROM tbl_orderhis o JOIN tbl_food f ON o.foodid = f.id JOIN tbl_ckbook ck ON o.bookid = ck.bookid
									WHERE date BETWEEN CURRENT_DATE-6 AND CURRENT_DATE AND o.num>0
									GROUP BY o.foodid order by sum(o.num) DESC;";
						}else{
							$xml = "SELECT f.name,f.cid,f.img,f.price,f.ingridient,round(sum(o.price*o.num),2),sum(o.num),ck.date 
								FROM tbl_orderhis o JOIN tbl_food f ON o.foodid = f.id JOIN tbl_ckbook ck ON o.bookid = ck.bookid
								WHERE date BETWEEN date_add(date_add(LAST_DAY(CURRENT_DATE),interval 1 DAY),interval -1 MONTH) AND  LAST_DAY(CURRENT_DATE) AND o.num>0
								GROUP BY o.foodid order by sum(o.num) DESC";
						}
							
						$result = mysqli_query($conn,$xml);
						$numrows = mysqli_num_rows($result);
						if($numrows==0)
						{
						?>
							<tr>
								<td colspan="6"><center><div class="alert alert-danger" role = "alert" style="padding:20px;margin:50px 60px;"> No records found on this period !!!</div></center></td>
							</tr>
						<?php
							
						}else
						{
							while($row = mysqli_fetch_array($result))
							{
							?>
							  <tr>
								<td><img src="../../img/<?=$row[1];?>/<?=$row[2];?>" alt="" /></td>
								<td><?=$row[0];?></td>
								<td><?=$row[4];?></td>
								<td>$ <?=$row[3];?></td>
								<td class="fw-bold"><?=$row[6];?></td>
								<td>$ <?=$row[5];?></td>
							  </tr>
							<?php
							}	
						}
					}else
					{
						$xml = "SELECT f.name,f.cid,f.img,f.price,f.ingridient,round(sum(o.price*o.num),2),sum(o.num),ck.date 
								FROM tbl_orderhis o JOIN tbl_food f ON o.foodid = f.id JOIN tbl_ckbook ck ON o.bookid = ck.bookid
								WHERE o.num>0
								GROUP BY o.foodid order by sum(o.num) DESC";
								
						$result = mysqli_query($conn,$xml);
						while($row = mysqli_fetch_array($result))
						{
					?>
                      <tr>
                        <td><img src="../../img/<?=$row[1];?>/<?=$row[2];?>" alt="" /></td>
                        <td><?=$row[0];?></td>
						<td><?=$row[4];?></td>
                        <td>$ <?=$row[3];?></td>
                        <td class="fw-bold"><?=$row[6];?></td>
                        <td>$ <?=$row[5];?></td>
                      </tr>
                    <?php
						}
					}
					?>					
					  
                    </tbody>
                  </table>
                </div>
			</form>
             </div>
        </div>
    </div>
</section>