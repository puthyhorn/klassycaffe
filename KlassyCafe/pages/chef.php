<?php
	error_reporting(0);
	$sql = "SELECT * FROM tbl_chef";
	$result = mysqli_query($conn,$sql);
?>


<div class="team">
            <div class="container"  style="padding-top:3%;">
                <div class="section-header text-center">
                    <p>Our Team</p>
                    <h2>Our Master Chef</h2>
                </div>
				
                <div class="row">
					
				<?php
				while($row= mysqli_fetch_array($result))
				{
				?>
				
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="img/chefs/<?=$row['img'];?>" alt="Image">
                                <div class="team-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="team-text">
                                <h2><?=$row['name'];?></h2>
                                <p>Phone: <?=$row['phone'];?></p>
                            </div>
                        </div>
                    </div>
					
				<?php
							
				}
				?>
                </div>
            </div>
        </div>