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
                            <?php Flasher::flashLogin();?>
                        </div>
                        <!-- Login Form -->
                        <form action="<?= BASEURL ?>/login" method="post">

                            <div class="form-group">
                                <label for="login-name">Your Email</label>
                                <input type="email" name="email" id="login-name" class="form-control" placeholder="Enter your email address..." required>
                            </div>
                            <div class="form-group">
                                <label for="login-password">Your Password</label>
                                <input type="password" name="password" id="login-password" class="form-control" placeholder="Enter your password..."  required>
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

                        </form>
                        <!-- Login Form / End -->
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-facebook btn-icon btn-block"><i class="fa fa-facebook"></i> Sign In via Facebook</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-twitter btn-icon btn-block"><i class="fa fa-twitter"></i> Sign in via Twitter</button>
                            </div>
                        </div>
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
                        <form class="form-register" action="<?= url('register');?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="register-name">Username <i class="text-danger" style="font-size:15px;">*</i></label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your Username..." value="<?=$data['FalseRegister']['username'];?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="register-password">Your Password <i class="text-danger" style="font-size:15px;">*</i></label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password..." required="">
                                <i class="text-muted ml-2" style="font-size:12px;">The password must be a combination of letters and numbers</i>
                            </div>
                            <div class="form-group">
                                <label for="repeat-password">Repeat Password <i class="text-danger" style="font-size:15px;">*</i></label>
                                <input type="password" name="repassword" id="repeat-repassword" class="form-control" placeholder="Repeat your password..." required="">
                                <i class="text-muted ml-2" style="font-size:12px;">The password must be a combination of letters and numbers</i>
                            </div>
                            <div class="form-group">
                                <label for=""> Gender <i class="text-danger" style="font-size:15px;">*</i></label><br>
                                <label class="radio radio-inline mr-2">
                                    <input type="radio" name="jenis_kelamin" id="inlineRadio1" value="laki-laki" <?php if ($data['FalseRegister']['jenis_kelamin'] == 'laki-laki') {echo 'checked';}else{echo 'checked';}?> required=""> Male
                                    <span class="radio-indicator"></span>
                                </label>
                                <label class="radio radio-inline mr-2">
                                    <input type="radio" name="jenis_kelamin" id="inlineRadio2" value="perempuan" required=""> Female
                                    <span class="radio-indicator"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="register-name">Your Email <i class="text-danger" style="font-size:15px;">*</i></label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address..." value="<?=$data['FalseRegister']['email'];?>" required="">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="select-default">Date of birth <i class="text-danger" style="font-size:15px;">*</i></label>
                                <div class="input-group "> 
                                    <select  name="tanggal" class="form-control col-lg-3" required="">
                                        <option value='0' <?php if ($data['FalseRegister']['birth'] == ''){echo 'selected';} ?>>Date</option>
                                        <?php for ($i=01; $i <= 31 ; $i++) { ?>
                                            <?php if ($i <= 9){ ?>
                                        <option value="0<?= $i ?>" <?php if ($data['FalseRegister']['birth'] != '' AND date('d', strtotime($data['FalseRegister']['birth'])) == $i ){echo 'selected';} ?>>0<?= $i ?></option>
                                            <?php }else{ ?>
                                        <option value="<?= $i ?>" <?php if ($data['FalseRegister']['birth'] != '' AND date('d', strtotime($data['FalseRegister']['birth'])) == $i ){echo 'selected';} ?>><?= $i ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <select name="bulan" class="form-control col-lg-3" required="">
                                        <option value='0' <?php if ($data['FalseRegister']['birth'] == ''){echo 'selected';} ?>>Month </option> 
                                        <?php $bulan=array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); ?>
                                        <?php  for ($i=1;$i<=12;$i++){ 
                                            if (substr(date('m', strtotime(Session::get('FalseRegister')['birth'])),0,1) == 0) {
                                                $a = substr(date('m', strtotime(Session::get('FalseRegister')['birth'])),1,2);
                                            } else {
                                                $a = date('m', strtotime(Session::get('FalseRegister')['birth']));
                                            }
                                        ?>
                                        <option value="<?= $i ?>" <?php if ($data['FalseRegister']['birth'] != '' AND $a == $i ){echo 'selected';} ?>><?= $bulan[$i] ?></option>
                                        <?php } ?>
                                    </select>

                                    <select   name="tahun" class="form-control col-lg-3" required="">
                                        <option value='0' <?php if ($data['FalseRegister']['birth'] == ''){echo 'selected';} ?>>Year</option>
                                        <?php for ($i=2020; $i>=1945 ; $i--) { ?> 
                                        <option value="<?= $i ?>" <?php if ($data['FalseRegister']['birth'] != '' AND date('Y', strtotime($data['FalseRegister']['birth'])) == $i ){echo 'selected';} ?>><?= $i ?></option>
                                        <?php } ?> 
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="register-name">Address <i class="text-danger" style="font-size:15px;">*</i></label>
                                <textarea class="form-control" name="alamat" id="alamat" placeholder="Enter your Address..." required="" rows="5"><?=$data['FalseRegister']['address'];?></textarea>
                            </div>

                            <div class="form-group" style="position: static;"> 
                                <label for="Provinsi">PROVINCE <i class="text-danger" style="font-size:15px;">*</i></label> 
                                <select class="form-control" name="provinsi" id="provinsi" required="">

                                </select> 
                            </div>
                            
                            <div class="form-group" style="position: static;"> 
                                <label for="Kabupaten">DISTRICT / CITY <i class="text-danger" style="font-size:15px;">*</i></label> 
                                <select class="form-control" name="kabupaten" id="kabupaten" required="">
                                </select> 
                            </div> 

                            <div class="form-group">
                                <label for="register-name">Phone Number (Optional) </label>
                                <input type="number" name="nomor_hp" id="nomor_hp" class="form-control" value="<?=$data['FalseRegister']['phone'];?>" placeholder="Enter your phone number...">
                            </div>
                            
                            <div class="form-group">
                                <label for="register-name">Upload ID Card (KTP) / Family Card (KK) - (Optional)</label><br>
                                <img src="" id="ktp" name="ktp">
                                <input type="file" name="gambar_ktp" id="ktp">
                            </div>

                            <div class="form-group">
                                <label for="register-name">Upload Photo Profile (Optional)</label><br>
                                <img src="" id="foto" name="foto">
                                <input type="file" name="foto" id="foto">
                            </div>

                            <div class="form-group">
                                <label for="register-name">ID Number / NIK (Optional)</label>
                                <input type="number" name="id_ktp" id="id_ktp" class="form-control" value="<?=$data['FalseRegister']['id_number'];?>" placeholder="Enter your ID number / NIK...">
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
<script>
<?php if (Session::check('_login_again')):?>
    // Set the date we're counting down to
    var countDownDate = new Date("<?=date('M d, Y H:i:s', strtotime(Session::get('_login_again'))) ?>").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();
        var date = new Date();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
        if (now > countDownDate) {
                document.getElementById("timer").innerHTML = "NOW";
        } else {
                document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";
        }
            
        // If the count down is over, write some text 
        if (distance < 0) {
                clearInterval(x); 
        }
    }, 1000);
<?php endif;?>
    const portal = $('#data').data('id');

    // alert(portal);
    $(document).ready(function () {
        $("#provinsi").append('<option value="">Pilih</option>');
        $("#kabupaten").html('');
        $("#kecamatan").html('');
        $("#kelurahan").html('');
        $("#kabupaten").append('<option value="">Pilih</option>');
        $("#kecamatan").append('<option value="">Pilih</option>');
        $("#kelurahan").append('<option value="">Pilih</option>'); 
        $.ajax({
            url: '<?=url('provinsi');?>',
            type: 'POST',
            dataType: 'json',
            success: function (result) {
                for (var i = 0; i < result.length; i++) {
                    $("#provinsi").append('<option value="' + result[i].id_prov + '">' + result[i].nama + '</option>');

                }
            }

        });

    });
    $("#provinsi").change(function () {

        var id_prov = $("#provinsi").val();

        $("#kabupaten").html('');
        $("#kecamatan").html('');
        $("#kelurahan").html('');
        $("#kabupaten").append('<option value="">Pilih</option>');
        $("#kecamatan").append('<option value="">Pilih</option>');
        $("#kelurahan").append('<option value="">Pilih</option>');
        var url = portal + '/kabupaten/' + id_prov;

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            success: function (result) {
                for (var i = 0; i < result.length; i++) {
                    $("#kabupaten").append('<option value="' + result[i].id_kab + '">' + result[i].nama + '</option>');

                }

            }
        });

    });

    $('.form-register').submit(function(event) {
        // event.stopPropagation();
        // event.preventDefault(); 
        $(this).find('button').html('Loading....');
    });
</script>