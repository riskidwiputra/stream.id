<!-- Content
		================================================== -->
		<div class="site-content">
    <div class="container">

        <div class="row">

            <div class="col-lg-8">

                <!-- Widget: Trending News -->
            <aside class="widget widget--sidebar card widget-tabbed">
							<div class="widget__title card__header">
								<h4>My Account</h4>
							</div>
							<div class="widget__content card__content">
								<div class="widget-tabbed__tabs">
									<!-- Widget Tabs -->
									<ul class="nav nav-tabs nav-justified widget-tabbed__nav" role="tablist">
										<li class="nav-item"><a href="#data" class="nav-link active" aria-controls="data" role="tab" data-toggle="tab">Personal Information</a></li>
										<li class="nav-item"><a href="#widget-tabbed-commented" class="nav-link" aria-controls="widget-tabbed-commented" role="tab" data-toggle="tab">My Game</a></li>
									</ul>
						
									<!-- Widget Tab panes -->
									<div class="tab-content widget-tabbed__tab-content">
										<!-- Personal Information -->
                <div class="card">
                    <div class="card__header">
                        <h4>Personal Information</h4>
                    </div>
                    <div class="col-lg-12">
							<?php Flasher::flash();?>
                    </div>
                    <div class="card__content" id="data" data-id="<?= BASEURL ?>">
                    <form action="<?= url('update-account/').$data['content']['user_id'];?>" method="post" enctype="multipart/form-data">

                            <div class="form-group form-group--upload">
                                <div class="form-group__avatar form-group__avatar--center">
                                    <label class="form-group__avatar-wrapper">
                                        <figure class="form-group__avatar-img">
                                        
                                        <?php if (!empty($data['content']['image'])) { ?>
                                        <img src="<?= asset(paths('path_home_Users_0')).$data['content']['image'];?>" alt="" width="120px" height="160px">
                                        <?php  }else{    ?> 
                                            <img src="<?=asset('assets/images/esports/avatar-placeholder-80x80.jpg');?>" alt="">
                                            <?php } ?>
                                        </figure>
                                        <div class="form-group__label">
                                        <h6><?= $data['content']['username'] ?><?php if($data['content']['status'] == "player"){ ?><i style="color:green; font-size:15px" class="far fa-check-square pl-2"></i><?php }else{} ?></h6>
                                            <span>Min size 80x80px</span>
                                            <b><span>ID : <?= $data['content']['user_id'] ?></span></b>
                                        </div>
                                        <input type="file" name="foto" style="display: none;">
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account-email">Email <abbr class="required" title="required">*</abbr></label>
                                        <input type="email" class="form-control" value="<?= $data['content']['email'] ?>" name="account-email" id="account-email" placeholder="lagerthadax@yourmail.com" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account-username">Username</label>
                                        <input type="text" class="form-control" value="<?= $data['content']['username'] ?>" name="account-username" id="account-username" placeholder="Lagertha Dax" required="">
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account-password">Change Password</label>
                                        <input type="password" class="form-control" value="" name="account-password" id="account-password" placeholder="**********">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account-password-repeat">Repeat Password</label>
                                        <input type="password" class="form-control" value="" name="account-password-repeat" id="account-password-repeat" placeholder="**********">
                                    </div>
                                </div>
                            </div> -->

                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Gender</label><br>
                                    <label class="radio radio-inline mr-2">
                                        <input type="radio" name="jenis_kelamin" id="inlineRadio1" value="laki-laki"<?php if($data['content']['jenis_kelamin'] == 'laki-laki'){?>checked <?php } ?>  required=""> Male
                                        <span class="radio-indicator"></span>
                                    </label>
                                    <label class="radio radio-inline mr-2">
                                        <input type="radio" name="jenis_kelamin" id="inlineRadio2" value="perempuan" <?php if($data['content']['jenis_kelamin'] == 'perempuan'){?>checked <?php } ?> required=""> Female
                                        <span class="radio-indicator"></span>
                                    </label>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="select-default">Date of birth</label>
                                    <div class="input-group ">
                                    <select id="select-default" name="tanggal" class="form-control col-lg-3" required="">
                                    <?php $tanggal = date("d",strtotime($data['content']['tgl_lahir'])); ?>
                                    
                                    <option readonly=""  value="<?= $tanggal ?>" hidden=""><?= $tanggal ?></option>
                                    <?php   for ($i=01; $i <= 31 ; $i++) { ?>
                                        <?php if ($i <= 9){ ?>
                                        <option value="0<?= $i ?>">0<?= $i ?></option>
                                        <?php }else{ ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                    </select>
                                    <select  id="select-default" name="bulan" class="form-control col-lg-3" required="">
                                    <?php $bulan = date("m",strtotime($data['content']['tgl_lahir'])); ?>
                                    <option readonly=""  value="<?= $bulan ?>" hidden=""><?= $bulan ?></option>
                                    <?php $bulan=array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); ?>
                                        <?php  for ($i=1;$i<=12;$i++){ ?>
                                        <option value="<?= $i ?>"><?= $bulan[$i] ?></option>
                                        <?php } ?>
                                    </select>
                                    <select  id="select-default" name="tahun" class="form-control col-lg-3" required="">
                                    <?php $tahun = date("Y",strtotime($data['content']['tgl_lahir'])); ?>
                                    <option readonly=""  value="<?= $tahun ?>" hidden=""><?= $tahun ?></option>
                                    <?php for ($i=2020; $i>=1945 ; $i--) { ?> 
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php } ?>
                                    
                                    </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="register-name">Address</label>
                                <textarea class="form-control" name="alamat" id="alamat" value="<?= $data['content']['alamat'] ?>   " placeholder="Enter your Address..." required="" rows="3"><?= $data['content']['alamat'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="position: static;"> 
                                        <label for="Provinsi">PROVINCE</label> 
                                        <input type="text"  value="<?= $data['content']['nama_p'] ?>"  class="form-control " readonly="" disabled>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="position: static;"> 
                                        <label for="Kabupaten">DISTRICT / CITY</label> 
                                        <input type="text"  value="<?= $data['content']['nama'] ?>"  class="form-control" readonly="" disabled>
                        
                                    </div> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                <?php if(!empty($data['content']['id_card'])){ ?>
                                <div class="form-group text-center">
                                <label class="control-label" for="gambar">Input ID Card / Family Card (May be Empty / Optional)</label><br>
                                <img  src="<?= asset(paths('path_home_Users_0')).$data['content']['id_card'];?>" id="gambar" width="150" height="100" alt="" />
                                <br>
                                <?php if($data['content']['status'] == "guest") { ?>
                                <div  for="gambar">(Belum Terverifikasi)</div>
                                <div class="form-group mb-1 mt-1">
                                <input type="file" name="gambar_ktp" id="gambar_ktp">
                                </div>
                                <?php }else if($data['content']['status'] == "player") { ?>
                                <label class="control-label" for="gambar">(Sudah Terverifikasi)<label>
                                <?php }else{} ?>
                                </div>
                                <?php } else { ?> 
                                    <div class="form-group">
                                        <label for="register-name">Input ID Card / Family Card (May be Empty / Optional)</label><br>
                                        <input type="file" name="gambar_ktp" id="gambar_ktp">
                                    </div>
                                    <?php } ?>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                
                                    <div class="form-group">
                                    <label for="register-name">ID Number (May be Empty / Optional)</label>
                                    <input type="text"  value="<?= $data['content']['id_number'] ?>"  class="form-control" <?php if(!empty($data['content']['id_number'])){ ?> name="id_number" <?php }else{} ?> placeholder="Enter your ID number..."  <?php if(!empty($data['content']['id_number'])){ ?> readonly <?php }else{} ?>>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="register-name">Phone Number (May be Empty / Optional)</label>
                                    <input type="text" name="no_hp" value="<?= $data['content']['nomor_hp'] ?>" class="form-control" placeholder="Enter your phone number...">
                                    </div>
                                </div>  
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="register-name">Username Game (May be Empty / Optional)</label>
                                        <input type="text" name="username_game" value="<?= $data['content']['username_game'] ?>" class="form-control" placeholder="Enter your username game...">
                                    </div>
                                </div> 
                            </div>





                            <div class="form-group--submit text-center">
                                <button type="submit" class="btn btn-primary-inverse">Save all changes</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- Personal Information / End -->

										<!-- Commented -->
										<div role="tabpanel" class="tab-pane fade" id="widget-tabbed-commented">
											<h4>Ini Masih Kosong</h4>
                                        </div>
                                        <!-- END Commented -->

									</div>
						
								
							
						</aside>
						<!-- Widget: Trending News / End -->
            </div>

            <div class="col-lg-4">
                <!-- Widget: Featured Player - Alternative without Image -->
                <aside class="widget card widget--sidebar widget-player widget-player--alt">
                    <div class="widget__title card__header">
                        <h4>Total Career Stats</h4>
                    </div>
                    <div class="widget__content-secondary">

                        <!-- Player Details -->
                        <div class="widget-player__details">

                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Matches Played</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">19</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Tournaments Played</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">2</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Total Kills</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">3640</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Total Deaths</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">908</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Total Assists</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">1953</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Total Pentakills</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">307</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Total Gold</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">28</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">First Blood</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">19</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Damage Made</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">963K</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Damage Received</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">637K</span>
                                </div>
                            </div>

                        </div>
                        <!-- Player Details / End -->

                    </div>

                    <div class="widget__content-tertiary widget__content--bottom-decor">
                        <div class="widget__content-inner">
                            <div class="widget-player__stats widget-player__stats--center">
                                <div class="widget-player__stat-item widget-player__stat-item--number-side">
                                    <div class="widget-player__stat--value widget-player__stat--value-primary">7960</div>
                                    <div class="widget-player__stat-inner">
                                        <div class="widget-player__stat--label">Total Minutes Played</div>
                                        <div class="widget-player__stat--desc">in his career</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </aside>

                <aside class="widget card widget--sidebar widget-player widget-player--alt">
                    <div class="widget__title card__header">
                        <h4>PUBG Mobile Career Stats</h4>
                    </div>
                    <div class="widget__content-secondary">

                        <!-- Player Details -->
                        <div class="widget-player__details">

                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Rounds</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">1900</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Wins</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">500</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Top 10</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">640</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Kills</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">908</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Headshots</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">708</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Headshots (%)</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">80%</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Most Kills</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">24</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Highest Damage</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">2450</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Average Damage</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">1001.90</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Accuracy</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">35%</span>
                                </div>
                            </div>
                            

                        </div>
                        <!-- Player Details / End -->

                    </div>

                    <div class="widget__content-tertiary widget__content--bottom-decor">
                        <div class="widget__content-inner">
                            <div class="widget-player__stats widget-player__stats--center">
                                <div class="widget-player__stat-item widget-player__stat-item--number-side">
                                    <div class="widget-player__stat--value widget-player__stat--value-primary">04.89</div>
                                    <div class="widget-player__stat-inner">
                                        <div class="widget-player__stat--label">K/D Ratio</div>
                                        <div class="widget-player__stat--desc">in his career</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </aside>


                <aside class="widget card widget--sidebar widget-player widget-player--alt">
                    <div class="widget__title card__header">
                        <h4>Mobile Legends Bang Bang Career Stats</h4>
                    </div>
                    <div class="widget__content-secondary">

                        <!-- Player Details -->
                        <div class="widget-player__details">

                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Matches</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">602</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">MVP</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">485</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Legendary</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">450</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Maniac</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">305</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Double Kill</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">508</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Savage</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">229</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Triple Kill</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">401</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Highest Damage</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">2450</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">MVP Form Losing Team</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">23</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">KDA</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">21.5%</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Battle Rate</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">71%</span>
                                </div>
                            </div><div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Gold/Min</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">931</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Damage To Hero/Min</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">749</span>
                                </div>
                            </div>
                            <div class="widget-player__details__item">
                                <div class="widget-player__details-desc-wrapper">
                                    <span class="widget-player__details-holder">
												<span class="widget-player__details-label">Deaths/Match</span>
                                    <span class="widget-player__details-desc">in his career</span>
                                    </span>
                                    <span class="widget-player__details-value">0.9</span>
                                </div>
                            </div>

                        </div>
                        <!-- Player Details / End -->

                    </div>

                    <div class="widget__content-tertiary widget__content--bottom-decor">
                        <div class="widget__content-inner">
                            <div class="widget-player__stats widget-player__stats--center">
                                <div class="widget-player__stat-item widget-player__stat-item--number-side">
                                    <div class="widget-player__stat--value widget-player__stat--value-primary">94.02%</div>
                                    <div class="widget-player__stat-inner">
                                        <div class="widget-player__stat--label">Win Rate</div>
                                        <div class="widget-player__stat--desc">in his career</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </aside>

                <!-- Widget: Featured Player - Alternative without Image / End -->

            </div>

        </div>

<!-- Content / End -->