<?php
	include "conn_db/db_config.php";
	error_reporting(0);
	$sql = "SELECT * FROM tbl_table WHERE trash=0 GROUP BY mark ORDER BY tid DESC";
	$result = mysqli_query($conn,$sql);
?>

<div class="feature">
            <div class="container"  style="padding-top:3%;">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="section-header">
                            <p>Why Choose Us</p>
                            <h2>Our Key Features</h2>
                        </div>
                        <div class="feature-text">
                            <div class="feature-img">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="img/feature-1.jpg" alt="Image">
                                    </div>
                                    <div class="col-6">
                                        <img src="img/feature-2.jpg" alt="Image">
                                    </div>
                                    <div class="col-6">
                                        <img src="img/feature-3.jpg" alt="Image">
                                    </div>
                                    <div class="col-6">
                                        <img src="img/feature-4.jpg" alt="Image">
                                    </div>
                                </div>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet consec adipis elit. Phasel nec preti mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor, auctor id gravida condime, viverra quis sem. Curabit non nisl nec nisi sceleri maximus 
                            </p>
                            <a class="btn custom-btn" href="index.php?p=booking">Book A Table</a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">		
						<?php
						while($row= mysqli_fetch_array($result))
						{
						?>
							<div class="col-sm-4" style="padding:5%; margin-bottom:-10%;">
                                <div class="feature-item">
                                    <img src="img/tables/<?=$row['img'];?>" width="220px;" style="padding-right:5%;" alt="Image" />
                                    <div style="text-align:center;"><h3><?=$row['mark'];?></h3><strong><?=$row['floor'];?></strong></div>
                                </div>
                            </div>
							
                        <?php
						}
						?>
                        </div>
                    </div>
                </div>
            </div>
        </div>