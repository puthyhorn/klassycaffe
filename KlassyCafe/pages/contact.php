  <!-- Contact Start -->
        <div class="contact">
            <div class="container" style="padding-top:3%;">
                <div class="section-header text-center">
                    <p>Contact Us</p>
                    <h2>Contact For Any Query</h2>
                </div>
                <div class="row align-items-center contact-information">
                    <div class="col-md-6 col-lg-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Address</h3>
                                <p>450 Street, Phnom Penh, Cambodia</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Call Us</h3>
                                <p>+087 880 636</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Email Us</h3>
                                <p>webkhmer@gmail.org</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-share"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Follow Us</h3>
                                <div class="contact-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<?php
							
							if(isset($_POST['btnSend']))
							{
								$name = trim($_POST['txtName']);
								$email = trim($_POST['txtEmail']);
								$subject = trim($_POST['txtSubject']);
								$smg = trim($_POST['txtsmg']);
								$error = '';
								
								$sql = "insert into tbl_contacts(name, email, subject, smg)
										values(?,?,?,?)";
								$stmt = $conn-> prepare($sql);
								$stmt -> bind_param("ssss",$name,$email,$subject,$smg);
								if($stmt -> execute())
								{
									$error = '<div class="alert alert-success" style="margin-top:17px;" role = "alert"> Your message has been sent successfully.</div>';
									$stmt -> close();
									$conn->close();
								}else
								{
									$error = '<div class="alert alert-danger" style="margin-top:17px;" role = "alert"> Transaction Failed.</div>';
								}
							}
						?>
						
                <div class="row contact-form">
                    <div class="col-md-6">
                        <!--<iframe src="https://maps.google.com/maps?q=https://www.google.com/maps/place/AI/@11.5394206,104.9090316,17z/data=!3m1!4b1!4m6!3m5!1s0x31095174fca5c935:0x6954ccff2ed480cb!8m2!3d11.5394154!4d104.9116119!16s%2Fg%2F11h4ch7741?entry=ttu&t=&z=10&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>-->
						<iframe width="770" height="432" id="gmap_canvas" src="https://maps.google.com/maps?q=Phnom Penh,cambodia&t=&z=3&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
					<div class="col-md-6">
                        <div id="success"></div>
						
                        <form method="post">
                            <div class="control-group">
                                <input type="text" class="form-control" name="txtName" id="name" placeholder="Your Name" required />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" name="txtEmail" id="email" placeholder="Your Email" required data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" name="txtSubject" id="subject" placeholder="Subject" required />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" id="message" name="txtsmg" placeholder="Message" required data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div style="text-align:center;">
                                <button class="btn custom-btn" type="submit" name="btnSend" id="sendMessageButton">Send Message</button>
								<?=$error;?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->