<!-- Content
		================================================== -->
		<div class="site-content">
    <div class="container">

        <div class="row">

            <div class="col-lg-6">
            
                <!-- Login -->
                <div class="card">
                
                    <div class="card__header">
                        <h4>Login to your Account</h4>
                    </div>
                    <div class="card__content">

                        <!-- Login Form -->
                        <form action="#">
                            <div class="form-group">
                                <label for="login-name">Your Email</label>
                                <input type="email" name="login-name" id="login-name" class="form-control" placeholder="Enter your email address...">
                            </div>
                            <div class="form-group">
                                <label for="login-password">Your Password</label>
                                <input type="password" name="login-password" id="login-password" class="form-control" placeholder="Enter your password...">
                            </div>
                            <div class="form-group form-group--password-forgot">
                                <label class="checkbox checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" value="option1" checked> Remember Me
                                    <span class="checkbox-indicator"></span>
                                </label>
                                <span class="password-reminder">Forgot your password? <a href="#">Click Here</a></span>
                            </div>
                            <div class="form-group form-group--sm">
                                <a href="_esports_shop-account.html" class="btn btn-primary-inverse btn-lg btn-block">Sign in to your account</a>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-facebook btn-icon btn-block"><i class="fa fa-facebook"></i> Sign In via Facebook</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-twitter btn-icon btn-block"><i class="fa fa-twitter"></i> Sign in via Twitter</button>
                                </div>
                            </div>
                        </form>
                        <!-- Login Form / End -->

                    </div>
                </div>
                <!-- Login / End -->
            </div>

            <div class="col-lg-6">
            
                <!-- Register -->
                <div class="card">
                    <div class="card__header">
                        <h4>Register Now</h4>
                    </div>

                    <div class="card__content">
                    <div class="col-lg-12">
							<?php Flasher::flash();?>
						</div>
                        <!-- Register Form -->
                        <form action="<?= url('register');?>" method="post">
                            <div class="form-group">
                                <label for="register-name">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your Username..." required="">
                            </div>
                            <div class="form-group">
                                <label for="register-password">Your Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password..." required="">
                            </div>
                            <div class="form-group">
                                <label for="repeat-password">Repeat Password</label>
                                <input type="password" name="repassword" id="repeat-repassword" class="form-control" placeholder="Repeat your password..." required="">
                            </div>
                            <div class="form-group">
                            <label for=""> Gender</label><br>
							<label class="radio radio-inline mr-2">
								<input type="radio" name="jenis_kelamin" id="inlineRadio1" value="laki-laki" checked required=""> Male
								<span class="radio-indicator"></span>
							</label>
							<label class="radio radio-inline mr-2">
								<input type="radio" name="jenis_kelamin" id="inlineRadio2" value="perempuan" required=""> Female
								<span class="radio-indicator"></span>
							</label>
                            </div>
                            <div class="form-group">
                                <label for="register-name">Your Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address..." required="">
                            </div>
                            <div class="form-group">
							<label class="control-label" for="select-default">Date of birth</label>
                            <div class="input-group ">
							<select id="select-default" name="tanggal" class="form-control col-lg-3" required="">
                            <option readonly=""  value="" hidden="">Date</option>
                            <?php   for ($i=01; $i <= 31 ; $i++) { ?>
                                <?php if ($i <= 9){ ?>
                                <option value="0<?= $i ?>">0<?= $i ?></option>
                                <?php }else{ ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                            <?php } ?>
							</select>
							<select  id="select-default" name="bulan" class="form-control col-lg-3" required="">
                            <option readonly=""  value="" hidden="">Month</option>
                            <?php $bulan=array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); ?>
                                <?php  for ($i=1;$i<=12;$i++){ ?>
								<option value="<?= $i ?>"><?= $bulan[$i] ?></option>
								<?php } ?>
							</select>
							<select  id="select-default" name="tahun" class="form-control col-lg-3" required="">
                            <option readonly=""  value="" hidden="">Year</option>
                            <?php for ($i=2020; $i>=1945 ; $i--) { ?> 
								<option value="<?= $i ?>"><?= $i ?></option>
                            <?php } ?>
							
							</select>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="register-name">Address</label>
                                <textarea class="form-control" name="alamat" id="alamat" placeholder="Enter your Address..." required="" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="register-name">Province</label>
                                <input type="text" name="provinsi" id="provinsi" class="form-control" placeholder="Enter your province..." required="">
                            </div>
                            <div class="form-group">
                                <label for="register-name">City</label>
                                <input type="text" name="kota" id="kota" class="form-control" placeholder="Enter your City..." required="">
                            </div>
                            <div class="form-group">
                                <label for="register-name">Phone Number (May be Empty / Optional)</label>
                                <input type="number" name="nomor" id="nomor" class="form-control" placeholder="Enter your phone number...">
                            </div>
                            <div class="form-group">
                                <label for="register-name">Input ID Card / Family Card (May be Empty / Optional)</label><br>
                                <img src="" id="ktp" name="ktp"><br>
                                <input type="file" name="ktp" id="ktp">
                            </div>
                            <div class="form-group">
                                <label for="register-name">Your Photo (May be Empty / Optional)</label><br>
                                <img src="" id="foto" name="foto"><br>
                                <input type="file" name="foto" id="foto">
                            </div>
                            <div class="form-group">
                                <label for="register-name">Phone Number (May be Empty / Optional)</label>
                                <input type="text" name="provinsi" id="provinsi" class="form-control" placeholder="Enter your phone number...">
                            </div>
                            <div class="form-group">
                                <label for="register-name">ID Number (May be Empty / Optional)</label>
                                <input type="text" name="provinsi" id="provinsi" class="form-control" placeholder="Enter your ID number...">
                            </div>
                            <div class="form-group">
                                <label for="register-name">Username Game (May be Empty / Optional)</label>
                                <input type="text" name="provinsi" id="provinsi" class="form-control" placeholder="Enter your username game...">
                            </div>



                            <div class="form-group">
                                <button type="submit" class="btn btn-default btn-lg btn-block" >
								Create Your Account
							</button>
                            </div>
                        </form>
                        <!-- Register Form / End -->

                    </div>
                </div>
                <!-- Register / End -->
            </div>

        </div>
    </div>
</div>

<!-- Content / End -->