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
                    <div class="col-lg-12">
							<?php Flasher::flash();?>
						</div>
                        <!-- Login Form -->
                        <form action="<?= BASEURL ?>/login" method="post">
                            <div class="form-group">
                                <label for="login-name">Your Email</label>
                                <input type="email" name="email" id="login-name" class="form-control" placeholder="Enter your email address..." require="">
                            </div>
                            <div class="form-group">
                                <label for="login-password">Your Password</label>
                                <input type="password" name="password" id="login-password" class="form-control" placeholder="Enter your password..."  require="">
                            </div>
                            <div class="form-group form-group--password-forgot">
                                <label class="checkbox checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" value="option1" checked> Remember Me
                                    <span class="checkbox-indicator"></span>
                                </label>
                                <span class="password-reminder">Forgot your password? <a href="#">Click Here</a></span>
                            </div>
                            <div class="form-group form-group--sm">
                            <button type="submit" class="btn btn-primary-inverse btn-lg btn-block" >
                            Sign in to your account
                            </button>
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

                    <div class="card__content" id="data" data-id="<?= BASEURL ?>">
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
                            <label for=""> Jenis Kelamin</label><br>
							<label class="radio radio-inline mr-2">
								<input type="radio" name="jenis_kelamin" id="inlineRadio1" value="laki-laki" checked required=""> Laki-laki
								<span class="radio-indicator"></span>
							</label>
							<label class="radio radio-inline mr-2">
								<input type="radio" name="jenis_kelamin" id="inlineRadio2" value="perempuan" required=""> Perempuan
								<span class="radio-indicator"></span>
							</label>
                            </div>
                            <div class="form-group">
                                <label for="register-name">Your Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address..." required="">
                            </div>
                            <div class="form-group">
							<label class="control-label" for="select-default">Tanggal Lahir</label>
                            <div class="input-group ">
							<select  name="tanggal" class="form-control col-lg-3" required="">
                            <option readonly=""  value="" hidden="">Tanggal</option>
                            <?php   for ($i=01; $i <= 31 ; $i++) { ?>
                                <?php if ($i <= 9){ ?>
                                <option value="0<?= $i ?>">0<?= $i ?></option>
                                <?php }else{ ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                            <?php } ?>
							</select>
							<select   name="bulan" class="form-control col-lg-3" required="">
                            <option readonly=""  value="" hidden="">Bulan</option>
                            <?php $bulan=array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); ?>
                                <?php  for ($i=1;$i<=12;$i++){ ?>
								<option value="<?= $i ?>"><?= $bulan[$i] ?></option>
								<?php } ?>
							</select>
							<select   name="tahun" class="form-control col-lg-3" required="">
                            <option readonly=""  value="" hidden="">Tahun</option>
                            <?php for ($i=2020; $i>=1945 ; $i--) { ?> 
								<option value="<?= $i ?>"><?= $i ?></option>
                            <?php } ?>
							
							</select>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="register-name">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Enter your Alamat..." required="">
                            </div>
                            <div class="form-group" style="position: static;"> 
                                <label for="Provinsi">Provinsi</label> 
                                <select class="form-control" name="provinsi" id="provinsi">
                                <option readonly=""  value="" hidden="">Provinsi</option>
                                </select> 
                            </div>
                            <div class="form-group" style="position: static;"> 
                                <label for="Kabupaten">Kabupaten</label> 
                                <select class="form-control" name="kabupaten" id="kabupaten">
                                <option readonly=""  value="" hidden="">Kabupaten</option>
                                </select> 
                            </div> 
                            <div class="form-group">
                                <label for="register-name">Nomor Hp (Boleh Kosong / Opsional)</label>
                                <input type="number" name="nomor" id="nomor" class="form-control" placeholder="Enter your nomor telepon...">
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