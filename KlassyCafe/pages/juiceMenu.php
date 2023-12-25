<div style="margin-top:-2.4%;">	
	<div class="food">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-4">
							<div class="food-item">
								<i class="flaticon-cooking"></i>
								<h2>Foods</h2>
								<p>
									Lorem ipsum dolor sit amet elit. Phasel nec pretium mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor auctor quis sem. 
								</p>
								<a href="index.php?p=foodMenu">View Menu</a>
							</div>
						</div>
						<div class="col-md-4">
							<div class="food-item">
								<i class="flaticon-fruits-and-vegetables"></i>
								<h2>Desserts</h2>
								<p>
									Lorem ipsum dolor sit amet elit. Phasel nec pretium mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor auctor quis sem. 
								</p>
								<a href="index.php?p=dessertMenu">View Menu</a>
							</div>
						</div>
						<div class="col-md-4">
							<div class="food-item">
								<i class="flaticon-cocktail"></i>
								<h2>Juices</h2>
								<p>
									Lorem ipsum dolor sit amet elit. Phasel nec pretium mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor auctor quis sem. 
								</p>
								<a href="index.php?p=juiceMenu">View Menu</a>
							</div>
						</div>
					</div>
				</div>
			</div>
	<div class="menu"  style="margin-top:-8%;">
            <div class="container">
                <div class="section-header text-center">
                    <p>Juice Menu</p>
                    <h2>Wonderful Juice Menu</h2>
                </div>
                <div class="menu-tab">
                    <div class="tab-content">
                        <div id="beverages" class="container tab-pane active">
                            <div class="row">
                                <div class="col-lg-7 col-md-12">
								
                                    <?php
									error_reporting(0);
									$xml = "SELECT * FROM tbl_food WHERE cid = 'juice' AND trash=0 order by id desc";
									$result = mysqli_query($conn,$xml);
									while($row = mysqli_fetch_array($result))
									{
									?>
                                    <div class="menu-item">
                                        <div class="menu-img">
                                            <img src="img/<?=$row['cid'];?>/<?=$row['img'];?>" alt="Image">
                                        </div>
                                        <div class="menu-text">
                                            <h3><span><?=$row['name'];?></span> <strong>$ <?=$row['price'];?></strong></h3>
                                            <p><?=$row['ingridient'];?></p>
                                        </div>
                                    </div>
									
									<?php
									}
									?>
									
                                </div>
								
                                <div class="col-lg-5 d-none d-lg-block">
                                    <img src="img/menu-beverage-img.jpg" alt="Image">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>