<?php
	if(isset($_POST['btnBook']))
	{
		$name = trim($_POST['txtname']);
		$email = trim($_POST['txtemail']);
		$phone = trim($_POST['txtphone']);
		$date = trim($_POST['txtdate']);
		$time = trim($_POST['txttime']);
		$tid = trim($_POST['txttid']);
		
		$msg_date = '<div style="color:red;text-align:center;margin-bottom:10px;"> Please select available date. </div>';
		$error = '';
		$sysdate = date('m/d/Y');

		if($date < $sysdate)
		{
			$error = $msg_date;	
		}else
		{
			/*
			echo $name.'<br>';
			echo $phone.'<br>';
			echo $email.'<br>';
			echo $date.'<br>';
			echo $time.'<br>';
			echo $tid.'<br>';
			*/
			$sql = "insert into tbl_prebook(cus_name, phone, email, date, time, tid)
					values(?,?,?,?,?,?)";
			$stmt = $conn-> prepare($sql);
			$stmt -> bind_param("ssssss",$name,$phone,$email,$date,$time,$tid);
			if($stmt -> execute())
			{
				$error = '<div class="alert alert-success" style="margin-top:17px;" role = "alert"> Your booking has been sent successfully.</div>';
				$stmt -> close();
			}else
			{
				$error = '<div class="alert alert-danger" style="margin-top:17px;" role = "alert"> Error occurring this process.</div>';
			}
			
		}
		
	}
?>


	<div class="booking">
            <div class="container"  style="padding-top:5%; ">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="booking-content">
                            <div class="section-header">
                                <p>Book A Table</p>
                                <h2>Book Your Table For Private Dinners & Happy Hours</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. Aenean consectetur convallis porttitor. Aliquam interdum at lacus non blandit.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5" style="background-color: #fbaf32; padding:60px 30px;" >
                        <div class="booking-form" >
						
                            <form method="post">
							
                                <div class="control-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Name" name="txtname" required="required" >
										
										
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="far fa-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="txtemail" placeholder="Email" required="required" />
										
										
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Phone" name="txtphone" required="required" />
										
										
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-mobile-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group date" id="date" data-target-input="nearest">
                                        <input type="date" class="form-control datetimepicker-input" name="txtdate" placeholder="Date"/>
									
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group time" id="time" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="txttime" placeholder="Time" data-target="#time" data-toggle="datetimepicker"/>
										
										
                                        <div class="input-group-append" data-target="#time" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group">
                                        <select class="custom-select " name="txttid" style="border-radius:5px; height:50px;">
                                            <option selected>Table</option>
											<?php
												$sql = mysqli_query($conn,"SELECT tid,mark,table_num FROM tbl_table 
																			WHERE table_num NOT IN (SELECT tid FROM tbl_booking)
                                                                            AND trash=0
																			ORDER BY table_num asc");
												while($row = mysqli_fetch_array($sql))
												{
													echo "<option value='".$row['table_num']."'>".$row['table_num'].'     '.$row['mark']."</option>";
												}
												?>
                                           
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-chevron-down"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn custom-btn" type="submit" name="btnBook">Book Now</button>
                                </div>
								<?=$error;?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>