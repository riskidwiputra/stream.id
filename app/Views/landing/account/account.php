<!-- Content
  ================================================== -->
  <div class="site-content">
    <div class="container">

        <div class="row">

            <div class="col-lg-8">

                <aside class="widget widget--sidebar card widget-tabbed">
                    <div class="widget__title card__header">
                        <h4>MY ACCOUNT</h4>
                    </div>
                    <div class="widget__content card__content" id="data" data-id="<?= BASEURL ?>">
                        <div class="widget-tabbed__tabs">
                            <!-- Widget Tabs -->
                            <ul class="nav nav-tabs nav-justified widget-tabbed__nav" role="tablist">
                                <li class="nav-item"><a href="javascript:void(0);" class="nav-link active">PERSONAL INFORMATION</a></li>
                                <li class="nav-item"><a href="#change-password" class="nav-link">CHANGE PASSWORD</a></li>
                                <li class="nav-item"><a href="<?=url('my-team');?>" class="nav-link">MY TEAM</a></li>
                            </ul>

                            <!-- Widget Tab panes -->
                            <div class="tab-content widget-tabbed__tab-content">
                                <!-- Newest -->
                                <div role="tabpanel" class="tab-pane fade active show" id="personalinformation">
                                    <div class="col-lg-12">
                                        <?php Flasher::flash();?>
                                    </div>
                                    <form action="<?= url('update-account');?>" method="post" enctype="multipart/form-data">

                                        <div class="form-group form-group--upload">
                                            <div class="form-group__avatar form-group__avatar--center">
                                                <label class="form-group__avatar-wrapper">
                                                    <figure class="form-group__avatar-img">
                                                        <?php if (!empty($data['content']['image'])) : ?>
                                                        <img src="<?= cdn(paths('backup_users')).$data['content']['user_id'].'/'.$data['content']['image'];?>" alt="" style="width:80px;height:80px;">
                                                        <?php else :?>
                                                        <img src="<?=asset('assets/images/esports/avatar-placeholder-80x80.jpg');?>" alt="">
                                                        <?php endif; ?>
                                                        <span class="position-absolute" style="top:2px;right:6px;font-size:10px;"><i class="fa fa-pencil"></i></span>
                                                    </figure>
                                                    <div class="form-group__label">
                                                        <h6><?= $data['content']['username'] ?><?php if($data['content']['status'] == "player"){ ?><i class="far fa-check-circle pl-2 text-success"></i><?php }?></h6>
                                                        <span>Min size 80x80px</span> 
                                                    </div>
                                                    <input type="file" name="foto" style="display: none;">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="account-email">Email <abbr class="required" title="required">*</abbr></label>
                                                    <input type="email" class="form-control" value="<?= $data['content']['email'] ?>" name="account-email" id="account-email" placeholder="lagerthadax@yourmail.com" readonly disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="account-username">Username</label>
                                                    <input type="text" class="form-control" value="<?= $data['content']['username'] ?>" name="account-username" id="account-username" placeholder="Lagertha Dax" required="">
                                                </div>
                                            </div>
                                        </div>
 
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="select-default">Date of birth</label>
                                                    <div class="input-group">
                                                        <select id="select-default" name="tanggal" class="form-control" required="">
                                                            <?php $tanggal = date("d",strtotime($data['content']['tgl_lahir'])); ?>
                                                            <option readonly="" value="<?= $tanggal ?>" hidden=""><?= $tanggal ?></option>
                                                            <?php   for ($i=01; $i <= 31 ; $i++) { ?>
                                                                <?php if ($i <= 9){ ?>
                                                            <option value="0<?= $i ?>"><?= '0'.$i ?></option>
                                                                <?php }else{ ?>
                                                            <option value="<?= $i ?>"><?= $i ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                        <select id="select-default" name="bulan" class="form-control" required="">
                                                            <?php $bulan = date("m",strtotime($data['content']['tgl_lahir'])); ?>
                                                            <option readonly="" value="<?= $bulan ?>" hidden=""><?= $bulan ?></option>
                                                            <?php $bulan=array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); ?>
                                                            <?php  for ($i=1;$i<=12;$i++){ ?>
                                                            <option value="<?= $i ?>"><?= $bulan[$i] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <select id="select-default" name="tahun" class="form-control" required="">
                                                            <?php $tahun = date("Y",strtotime($data['content']['tgl_lahir'])); ?>
                                                            <option readonly="" value="<?= $tahun ?>" hidden=""><?= $tahun ?></option>
                                                            <?php for ($i=2020; $i>=1945 ; $i--) { ?>
                                                            <option value="<?= $i ?>"><?= $i ?></option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group ml-5">
                                                    <label for="" class="d-block"> Gender</label> 
                                                    <label class="radio radio-inline mr-2">
                                                        <input type="radio" name="jenis_kelamin" value="laki-laki" <?php if($data[ 'content'][ 'jenis_kelamin']=='laki-laki' ){?>checked
                                                        <?php } ?> required=""> Male
                                                        <span class="radio-indicator"></span>
                                                    </label>
                                                    <label class="radio radio-inline mr-2">
                                                        <input type="radio" name="jenis_kelamin" value="perempuan" <?php if($data[ 'content'][ 'jenis_kelamin']=='perempuan' ){?>checked
                                                        <?php } ?> required=""> Female
                                                        <span class="radio-indicator"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="register-name">Address</label>
                                                    <textarea class="form-control" name="alamat" id="alamat" value="<?= $data['content']['alamat'] ?>   " placeholder="Enter your Address..." required="" rows="3"><?= $data['content']['alamat'];?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" style="position: static;">
                                                    <label for="Provinsi">PROVINCE</label>
                                                    <input type="text" value="<?= $data['content']['nama_p'] ?>" class="form-control " readonly="" disabled>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" style="position: static;">
                                                    <label for="Kabupaten">DISTRICT / CITY</label>
                                                    <input type="text" value="<?= $data['content']['nama'] ?>" class="form-control" readonly="" disabled>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <?php if ($data['content']['id_status'] == 2 AND $data['content']['id_card'] != ''):?>
                                                <label class="d-block text-center">Upload ID Card (KTP) / Family Card (KK) - (Optional)</label>
                                                <label class="d-block text-center text-warning" style="font-size:10px;"> (Waiting Verification) </label>
                                                <?php elseif ($data['content']['id_status'] == 3 AND $data['content']['id_card'] != ''): ?>
                                                <label class="d-block text-center">Upload ID Card (KTP) / Family Card (KK) - (Optional)</label>
                                                <label class="d-block text-center text-success" style="font-size:10px;"> (Verified) </label>
                                                <?php elseif ($data['content']['id_status'] == 1 AND $data['content']['id_card'] != ''): ?>
                                                <label class="d-block text-center">Upload ID Card (KTP) / Family Card (KK) - (Optional)</label>
                                                <label class="d-block text-center text-danger" style="font-size:10px;"> (Not - Verified) </label>
                                                <input type="file" class="d-block mx-auto" name="gambar_ktp" id="gambar_ktp">
                                                <?php else:?>    
                                                <div class="form-group">
                                                    <label for="register-name">Upload ID Card (KTP) / Family Card (KK) - (Optional)</label>
                                                    <input type="file" name="gambar_ktp" id="gambar_ktp">
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <?php if ($data['content']['id_status'] == 2 AND $data['content']['id_card_number'] != ''):?>
                                                <label class="d-block text-center">Input ID Card Number (NIK) (Optional)</label>
                                                <label class="d-block text-center text-warning" style="font-size:10px;"> (Waiting Verification) </label>
                                                <?php elseif ($data['content']['id_status'] == 3 AND $data['content']['id_card_number'] != ''): ?>
                                                <label class="d-block text-center">Input ID Card Number (NIK) (Optional)</label>
                                                <label class="d-block text-center text-success" style="font-size:10px;"> (Verified) </label>
                                                <?php elseif ($data['content']['id_status'] == 1 AND $data['content']['id_card_number'] != ''): ?>
                                                <label class="d-block text-center">Input ID Card Number (NIK) (Optional)</label>
                                                <label class="d-block text-center text-danger" style="font-size:10px;"> (Not - Verified) </label>
                                                <input type="text" name="id_card_number" value="<?= $data['content']['id_card_number'] ?>" class="form-control" placeholder="Enter your phone number...">
                                                <?php else:?>    
                                                <div class="form-group">
                                                    <label for="register-name">Input ID Card Number (NIK) (Optional)</label>
                                                    <input type="text" name="id_card_number" value="<?= $data['content']['id_card_number'] ?>" class="form-control" placeholder="Enter your phone number...">
                                                </div>
                                                <?php endif; ?>
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label for="register-name">Phone Number (Optional)</label>
                                                    <input type="text" name="no_hp" value="<?= $data['content']['nomor_hp'] ?>" class="form-control" placeholder="Enter your phone number...">
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="row"> 
                                        </div> 

                                        <div class="form-group--submit text-center">
                                            <button type="submit" class="btn btn-primary-inverse">Save all changes</button>
                                        </div>

                                    </form>
                                </div>
                                <!-- Commented -->
                                <div role="tabpanel" class="tab-pane fade" id="mygame" >

                                </div>
                            </div>

                        </div>
                    </div>
                </aside>

                <aside class="widget widget--sidebar card widget-tabbed" id="change-password">
                    <div class="widget__title card__header">
                        <h4>CHANGE PASSWORD</h4>
                    </div>
                    <div class="widget__content card__content" id="data" data-id="<?= BASEURL ?>">
                        <div class="widget-tabbed__tabs">
                            <!-- Widget Tab panes -->
                            <div class="tab-content widget-tabbed__tab-content">
                                <!-- Newest -->
                                <div role="tabpanel" class="tab-pane fade active show" id="personalinformation">
                                    <div class="col-lg-12">
                                        <?php Flasher::flashLogin();?>
                                    </div>
                                    <form action="<?= url('change-password');?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="current-password">Current Password <abbr class="required" title="required">*</abbr></label>
                                                    <input type="password" class="form-control" name="current-password" id="current-password" placeholder="Enter Current Password" required>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="new-password">New Password <abbr class="required" title="required">*</abbr></label>
                                                    <input type="password" class="form-control" name="new-password" id="new-password" placeholder="Enter New Password" required>
                                                    <i class="text-muted ml-2" style="font-size:12px;">The password must be a combination of letters and numbers</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="confirm-password">Confirm Password <abbr class="required" title="required">*</abbr></label>
                                                    <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Enter Confirm Password" required>
                                                    <i class="text-muted ml-2" style="font-size:12px;">The password must be a combination of letters and numbers</i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group--submit text-center">
                                            <button type="submit" class="btn btn-primary-inverse">Change Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>  

            <div class="col-lg-4">
            
                <!-- Widget: Achievements -->
                <aside class="widget card card--no-paddings widget--sidebar widget-achievements">
                    <div class="widget__title card__header card__header--has-arrows js-alc-achievements-carousel-header">
                        <h4>My Game</h4>
                    </div>
                    <div class="widget__content card__content">
                
                        <div class="alc-achievements js-alc-achievements-carousel">
                
                            <div class="alc-achievements__item">
                                <div class="alc-achievements__content">
                                    <div class="alc-achievements__icon alc-icon alc-icon--xl">
                                        <img src="<?=asset('assets\images\esports\bg\Mobile-Legend.png');?>" alt="">
                                    </div>
                                    <h5 class="alc-achievements__event-title">Mobile Legends Bang Bang</h5>
                                    <div class="alc-achievements__event-date">LordFahdan</div>
                                    <button type="submit" class="btn btn-primary-inverse mt-3" data-toggle="modal" data-target="#game">View Details</button>
                                </div>
                                <div class="alc-achievements__meta">
                                    <div class="alc-achievements__meta-item">
                                        <h6 class="alc-achievements__meta-value">YE QIU</h6>
                                        <div class="alc-achievements__meta-name">Team Captain</div>
                                    </div>
                                    <!-- <div class="alc-achievements__meta-item">
                                        <h6 class="alc-achievements__meta-value">637</h6>
                                        <div class="alc-achievements__meta-name">Team Kills</div>
                                    </div> -->
                                    <div class="alc-achievements__meta-item">
                                        <h6 class="alc-achievements__meta-value">940</h6>
                                        <div class="alc-achievements__meta-name">Player User</div>
                                    </div>
                                </div>
                            </div>
                            <div class="alc-achievements__item">
                                <div class="alc-achievements__content">
                                    <div class="alc-achievements__icon alc-icon alc-icon--xl">
                                        <img src="<?=asset('assets\images\esports\bg\Icon-PUBGM.png');?>" alt="">
                                    </div>
                                    <h5 class="alc-achievements__event-title">PUBG Mobile</h5>
                                    <div class="alc-achievements__event-date">FZRaizy</div>
                                    <button type="submit" class="btn btn-primary-inverse mt-3" data-toggle="modal" data-target="#game">View Details</button>
                                </div>
                                <div class="alc-achievements__meta">
                                    <div class="alc-achievements__meta-item">
                                        <h6 class="alc-achievements__meta-value">Sung Jin-Woo</h6>
                                        <div class="alc-achievements__meta-name">Team Captain</div>
                                    </div>
                                    <!-- <div class="alc-achievements__meta-item">
                                        <h6 class="alc-achievements__meta-value">825</h6>
                                        <div class="alc-achievements__meta-name">Team Kills</div>
                                    </div> -->
                                    <div class="alc-achievements__meta-item">
                                        <h6 class="alc-achievements__meta-value">940</h6>
                                        <div class="alc-achievements__meta-name">Player User</div>
                                    </div>
                                </div>
                            </div>
                            <div class="alc-achievements__item">
                                <div class="alc-achievements__content">
                                    <div class="alc-achievements__icon alc-icon alc-icon--xl">
                                        <img src="<?=asset('assets\images\esports\bg\Dota2.png');?>" alt="">
                                    </div>
                                    <h5 class="alc-achievements__event-title">Dota 2</h5>
                                    <div class="alc-achievements__event-date">Androctonuss</div>
                                    <button type="submit" class="btn btn-primary-inverse mt-3" data-toggle="modal" data-target="#game">View Details</button>
                                </div>
                                <div class="alc-achievements__meta">
                                    <div class="alc-achievements__meta-item">
                                        <h6 class="alc-achievements__meta-value">Wawan</h6>
                                        <div class="alc-achievements__meta-name">Team Captain</div>
                                    </div>
                                    <!-- <div class="alc-achievements__meta-item">
                                        <h6 class="alc-achievements__meta-value">521</h6>
                                        <div class="alc-achievements__meta-name">Team Kills</div>
                                    </div> -->
                                    <div class="alc-achievements__meta-item">
                                        <h6 class="alc-achievements__meta-value">940</h6>
                                        <div class="alc-achievements__meta-name">Player User</div>
                                    </div>
                                </div>
                            </div>
                
                        </div>
                    </div>
                </aside>
                <!-- Widget: Achievements / End -->
                
                <!-- Modal My Game -->
                <div class="modal fade" id="game" tabindex="-1" role="dialog" aria-labelledby="dota2Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content border-0 rounded-circle">
                            <form method="post" class="form-identity">
                                <div class="modal-header border-success" style="background-color: #4B3B60;">
                                    <h1 style="padding:0;margin:0;">PUBG Mobile / Dota 2 / ML</h1>  
                                </div>
                                <div class="modal-body border-success" style="background-color: #4B3B60;">
                                    <div class="form-group form-group--sm">
                                        <label for="username_in_game">Username In Game <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="username_in_game" id="username_in_game" class="form-control username_in_game" placeholder="Enter Username In Game..." value="" autocomplete="off" required>
                                    </div>
                                    <div class="form-group form-group--sm">
                                        <label for="id_in_game<?=$game_id;?>">ID In Game <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="id_in_game" id="id_in_game" class="form-control id_in_game" placeholder="Enter ID In Game..." value="" autocomplete="off" onkeypress="return number(event)" required>
                                    </div>
                                </div>
                                <div class="modal-footer border-success" style="background-color: #4B3B60;">
                                    <a href="" class="btn btn-info btn-outline">Join / Create Team</a>
                                    <button type="submit" class="btn btn-primary create-team">Save</button>
                                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal My Game END -->

                <!-- Widget: Featured Player - Alternative Extended -->
						<aside class="widget card widget--sidebar widget-player widget-player--sm">
							<div class="widget__title card__header js-alc-achievements-carousel-header2">
								<h4>My Team</h4>
                            </div>

                            <!-- Carousel 2 -->
                            <div class="js-alc-achievements-carousel2">

                                <!-- Item 1 -->
                                <div class="alc-achievements__item">
                                <div class="widget__content card__content">
                                    <figure class="widget-player__photo">
                                        <img src="<?=asset('assets\images\esports\logos\pirates-114x98.png');?>" alt="">
                                    </figure>
                                    <header class="widget-player__header clearfix">
                                        <h4 class="widget-player__name">
                                            <span class="widget-player__first-name">Evos</span>
                                            <span class="widget-player__last-name">Esport</span>
                                        </h4>
                                        <span class="widget-player__info">Mobile Legends Bang Bang</span>
                                        <!-- <span class="widget-player__rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span> -->
                                    </header>
                                    <div class="widget-player__overlay effect-duotone effect-duotone--base"></div>
                                </div>
                            
                                <!-- Secondary (stats) -->
                                <div class="widget__content-secondary">
                            
                                    <!-- Player Details -->
                                    <div class="widget-player__details">
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">Evos Oura</span>
                                                    <span class="widget-player__details-desc">Captain</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">Evos Donkey</span>
                                                    <span class="widget-player__details-desc">Member</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">Evos Luminare</span>
                                                    <span class="widget-player__details-desc">Member</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">Evos Wann</span>
                                                    <span class="widget-player__details-desc">Member</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">Evos Rekt</span>
                                                    <span class="widget-player__details-desc">Member</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">-</span>
                                                    <span class="widget-player__details-desc"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Player Details / End -->
                            
                                </div>
                                <!-- Secondary (stats) / End -->
                            
                                <!-- Tertiary -->
                                <div class="widget__content-tertiary">
                                    <div class="widget__content-inner">
                                        <div class="widget-player__stats row align-items-center">
                                            <div class="col-6 col-sm-3">
                                                <div class="widget-player__stat-item">
                                                    <div class="widget-player__stat--value">4.2</div>
                                                    <div class="widget-player__stat--label">Avg Kills</div>
                                                    <div class="widget-player__stat--desc">in her career</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-3">
                                                <div class="widget-player__stat-item">
                                                    <div class="widget-player__stat--value">1.8</div>
                                                    <div class="widget-player__stat--label">Avg Deaths</div>
                                                    <div class="widget-player__stat--desc">in her career</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-3">
                                                <div class="widget-player__stat-item">
                                                    <div class="widget-player__stat--value">6.5</div>
                                                    <div class="widget-player__stat--label">Avg Assists</div>
                                                    <div class="widget-player__stat--desc">in her career</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-3">
                                                <div class="widget-player__stat-item">
                                                    <div class="widget-player__stat-circular circular circular--size-80">
                                                        <div class="circular__bar" data-percent="84.1">
                                                            <span class="circular__percents">84.1<small>%</small><span class="circular__label">Win Rate</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tertiary / End -->
                                </div>
                                <!-- Item 1 END -->
                                
                                <!-- Item 2 -->
                                <div class="alc-achievements__item">
                                <div class="widget__content card__content">
                                    <figure class="widget-player__photo">
                                        <img src="<?=asset('assets\images\esports\logos\alchemists-213x241.png');?>" alt="">
                                    </figure>
                                    <header class="widget-player__header clearfix">
                                        <h4 class="widget-player__name">
                                            <span class="widget-player__first-name">RRQ</span>
                                            <span class="widget-player__last-name">Hoshi</span>
                                        </h4>
                                        <span class="widget-player__info">Mobile Legends Bang Bang</span>
                                        <!-- <span class="widget-player__rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span> -->
                                    </header>
                                    <div class="widget-player__overlay effect-duotone effect-duotone--base"></div>
                                </div>
                            
                                <!-- Secondary (stats) -->
                                <div class="widget__content-secondary">
                            
                                    <!-- Player Details -->
                                    <div class="widget-player__details">
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">Vyn</span>
                                                    <span class="widget-player__details-desc">Captain</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">Jamesss</span>
                                                    <span class="widget-player__details-desc">Member</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">R7</span>
                                                    <span class="widget-player__details-desc">Member</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">TUTURU</span>
                                                    <span class="widget-player__details-desc">Member</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">Lemon</span>
                                                    <span class="widget-player__details-desc">Member</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">WizzKing</span>
                                                    <span class="widget-player__details-desc">Member</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">LJ</span>
                                                    <span class="widget-player__details-desc">Member</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">Xin</span>
                                                    <span class="widget-player__details-desc">Member</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Player Details / End -->
                            
                                </div>
                                <!-- Secondary (stats) / End -->
                            
                                <!-- Tertiary -->
                                <div class="widget__content-tertiary">
                                    <div class="widget__content-inner">
                                        <div class="widget-player__stats row align-items-center">
                                            <div class="col-6 col-sm-3">
                                                <div class="widget-player__stat-item">
                                                    <div class="widget-player__stat--value">4.2</div>
                                                    <div class="widget-player__stat--label">Avg Kills</div>
                                                    <div class="widget-player__stat--desc">in her career</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-3">
                                                <div class="widget-player__stat-item">
                                                    <div class="widget-player__stat--value">1.8</div>
                                                    <div class="widget-player__stat--label">Avg Deaths</div>
                                                    <div class="widget-player__stat--desc">in her career</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-3">
                                                <div class="widget-player__stat-item">
                                                    <div class="widget-player__stat--value">6.5</div>
                                                    <div class="widget-player__stat--label">Avg Assists</div>
                                                    <div class="widget-player__stat--desc">in her career</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-3">
                                                <div class="widget-player__stat-item">
                                                    <div class="widget-player__stat-circular circular circular--size-80">
                                                        <div class="circular__bar" data-percent="84.1">
                                                            <span class="circular__percents">84.1<small>%</small><span class="circular__label">Win Rate</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tertiary / End -->
                                </div>
                                <!-- Item 2 End -->

                                <!-- Item 3 -->
                                <div class="alc-achievements__item">
                                <div class="widget__content card__content">
                                    <figure class="widget-player__photo">
                                        <img src="<?=asset('assets\images\esports\logos\sharks-244x207.png');?>" alt="">
                                    </figure>
                                    <header class="widget-player__header clearfix">
                                        <h4 class="widget-player__name">
                                            <span class="widget-player__first-name">Bigetron</span>
                                            <span class="widget-player__last-name">RA</span>
                                        </h4>
                                        <span class="widget-player__info">PUBG Mobile</span>
                                        <!-- <span class="widget-player__rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span> -->
                                    </header>
                                    <div class="widget-player__overlay effect-duotone effect-duotone--base"></div>
                                </div>

                                <!-- Secondary (stats) -->
                                <div class="widget__content-secondary">
                            
                                    <!-- Player Details -->
                                    <div class="widget-player__details">
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">Zuxxy</span>
                                                    <span class="widget-player__details-desc">Captain</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">Luxxy</span>
                                                    <span class="widget-player__details-desc">Member</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">Ryzen</span>
                                                    <span class="widget-player__details-desc">Member</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">Microboy</span>
                                                    <span class="widget-player__details-desc">Member</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">Sanss</span>
                                                    <span class="widget-player__details-desc">Member</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="widget-player__details__item">
                                            <div class="widget-player__details-desc-wrapper">
                                                <span class="widget-player__details-holder">
                                                    <span class="widget-player__details-label">Alice</span>
                                                    <span class="widget-player__details-desc">Sub-Member</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Player Details / End -->
                            
                                </div>
                                <!-- Secondary (stats) / End -->
                            
                                <!-- Tertiary -->
                                <div class="widget__content-tertiary">
                                    <div class="widget__content-inner">
                                        <div class="widget-player__stats row align-items-center">
                                            <div class="col-6 col-sm-3">
                                                <div class="widget-player__stat-item">
                                                    <div class="widget-player__stat--value">4.2</div>
                                                    <div class="widget-player__stat--label">Avg Kills</div>
                                                    <div class="widget-player__stat--desc">in her career</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-3">
                                                <div class="widget-player__stat-item">
                                                    <div class="widget-player__stat--value">1.8</div>
                                                    <div class="widget-player__stat--label">Avg Deaths</div>
                                                    <div class="widget-player__stat--desc">in her career</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-3">
                                                <div class="widget-player__stat-item">
                                                    <div class="widget-player__stat--value">6.5</div>
                                                    <div class="widget-player__stat--label">Avg Assists</div>
                                                    <div class="widget-player__stat--desc">in her career</div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-3">
                                                <div class="widget-player__stat-item">
                                                    <div class="widget-player__stat-circular circular circular--size-80">
                                                        <div class="circular__bar" data-percent="84.1">
                                                            <span class="circular__percents">84.1<small>%</small><span class="circular__label">Win Rate</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tertiary / End -->
                                </div>
                                <!-- Item 3 END -->

                            </div>
                            <!-- Carousel 2 END -->
						</aside>
						<!-- Widget: Featured Player - Alternative Extended / End -->


            

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
                        </div>
                        <div class="widget-player__details__item">
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