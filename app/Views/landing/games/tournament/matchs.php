<!-- Content
		================================================== -->
        <div class="site-content">
    <div class="container">
        <div class="img">
        <img src="<?= BASEURL ?>/public/assets/images/esports/streamgaming.png" alt="" class="img-fluid" alt="Responsive image" width="100%">
        </div>
        <div class="card card--clean">
            <header class="card__header">
                <h4><?= $data['tournament']['tournament_name'] ?></h4>
            </header>
		</div>
        <?php if ($data['round32']) {?>
    
        
        <div class="card card--clean">
            <header class="card__header">
                <h4>Round Of 32</h4>
            </header>
		</div>
        <div class="row">
            <?php foreach ($data['round32'] as $rows) { ?>
                
            
            <div class="col-lg-4">
                <!-- Widget: Match Announcement -->
                <aside class="widget widget--sidebar card widget-preview">
                    <div class="widget__title card__header">
                        <h4>Next Match</h4>
                    </div>
                    <div class="widget__content card__content">

                        <!-- Match Preview -->
                        <div class="match-preview">
                            <section class="match-preview__body">

                                <div class="match-preview__match-info match-preview__match-info--header">
                                    <div class="match-preview__match-place"><?= $data['tournament']['nama_kota'] ?></div>
                                    <?php $date = date("l, d F Y",strtotime($rows['date'])); ?>
                                    <time class="match-preview__match-time" datetime="2019-05-04 09:00"><?= $date ?></time>
                                </div>

                                <header class="match-preview__header">
                                    <div class="match-preview__date"><?= $data['tournament']['nama_kota'] ?></div>
                                    <h3 class="match-preview__title match-preview__title--lg">Round Of 32</h3>
                                </header>
                                <div class="match-preview__content">

                                    <!-- 1st Team -->
                                    <div class="match-preview__team match-preview__team--first">

                                        <figure class="match-preview__team-logo">
                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_1'] ?></h5>
                                        <div class="match-preview__team-info"><?= $rows['nama_kota_1'] ?></div>
                                    </div>
                                    <!-- 1st Team / End -->

                                    <div class="match-preview__vs">
                                        <div class="match-preview__conj">VS</div>
                                        <div class="match-preview__match-info">
                                        <?php $time = date("H:i",strtotime($rows['date'])); ?>
                                            <time class="match-preview__match-time" datetime="2017-08-12 09:00"><?= $time ?> WIB</time>
                                            <div class="match-preview__match-place"><?= $data['tournament']['alamat'] ?></div>
                                        </div>
                                    </div>

                                    <!-- 2nd Team -->
                                    <div class="match-preview__team match-preview__team--second">
                                        <figure class="match-preview__team-logo">

                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>"  alt="">


                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_2'] ?></h5>
                                        <div class="match-preview__team-info"><?= $rows['nama_kota_2'] ?></div>
                                    </div>
                                    <!-- 2nd Team / End -->

                                </div>
                            </section>
                            <div class="countdown__content text-center" >
                            <h3>Verify The Winner</h3>
                            <!-- <div class="row justify-content-center rounded mt-0 mb-0">
                                <div class="col-lg-6 pt-0 text-center">
                                    <h6>WIN</h6>
                                </div>
                                <div class="col-lg-6 pt-0 text-center">
                                    <h6>LOSS</h6>
                                </div>
                            </div> -->
                            <div class="row mb-2 justify-content-center rounded">
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team1'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_1'] ?></h5>
                                </div>
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team2'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_2'] ?></h5>
                                </div>
                            </div>
                            <span class="badge <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?><?php if(!empty($rows['winner'])){ ?>badge-success <?php }else{ ?>  <?php if ($data['tournament']['status'] == "pending") { ?> badge-danger <?php } else if ($data['tournament']['status'] == "starting"){?>badge-warning <?php }else if ($data['tournament']['status'] == "complete") {?>badge-success <?php } ?><?php } ?><?php }else{ ?> badge-danger <?php } ?>  " style="font-size:15px; line-height:100%; margin-top:3px;"><?php if( strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?><?php if(!empty($rows['winner'])){ ?>FINISH <?php }else{ ?> <?php if ($data['tournament']['status'] == "pending") {?> ONCOMING <?php } else if ($data['tournament']['status'] == "starting"){?> ONGOING <?php }else if ($data['tournament']['status'] == "complete") {?> FINISH <?php } ?><?php } ?> <?php }else{ ?> ONCOMING <?php } ?>  </span>
                                <!-- <div class="countdown-counter" data-date="July 17, 2019 21:00:00"></div> -->
                            </div>
                            <div class="match-preview__action match-preview__action--ticket text-center">
                            <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?>
                                <a href="<?= BASEURL ?>/bracket/<?= $data['tournament']['url'] ?>" class="btn btn-primary-inverse">See Bracket</a>
                            <?php }else{ ?>
                                <a href="#" class="btn btn-primary-inverse " data-toggle="tooltip" data-placement="top" title="ONCOMING">See Bracket</a>
                            <?php } ?>
                            </div>
                        </div>
                        <!-- Match Preview / End -->

                    </div>
                </aside>
                <!-- Widget: Match Announcement / End -->
            </div>
            <?php } ?>
        </div>

        <div class="spacer"></div>
        <?php }else{} ?>  
        <?php if ($data['round16']) {?>
        
        <div class="card card--clean">
            <header class="card__header">
                <h4>Round Of 16</h4>
            </header>
		</div>
        <div class="row">
        <?php foreach ($data['round16'] as $rows) { ?>
            <div class="col-lg-4">
                <!-- Widget: Match Announcement -->
                <aside class="widget widget--sidebar card widget-preview">
                    <div class="widget__title card__header">
                        <h4>Next Match</h4>
                    </div>
                    <div class="widget__content card__content">

                        <!-- Match Preview -->
                        <div class="match-preview">
                            <section class="match-preview__body">

                                <div class="match-preview__match-info match-preview__match-info--header">
                                    <div class="match-preview__match-place"><?= $data['tournament']['nama_kota'] ?></div>
                                    <?php $date16 = date("l, d F Y",strtotime($rows['date'])); ?>
                                    <time class="match-preview__match-time" datetime="2019-05-04 09:00"><?= $date16 ?></time>
                                </div>

                                <header class="match-preview__header">
                                    <div class="match-preview__date"><?= $data['tournament']['nama_kota'] ?></div>
                                    <h3 class="match-preview__title match-preview__title--lg">Round Of 16</h3>
                                </header>
                                <div class="match-preview__content">

                                    <!-- 1st Team -->
                                    <div class="match-preview__team match-preview__team--first">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_1'] ?></h5>
                                        <div class="match-preview__team-info"><?= $rows['nama_kota_1'] ?></div>
                                    </div>
                                    <!-- 1st Team / End -->

                                    <div class="match-preview__vs">
                                        <div class="match-preview__conj">VS</div>
                                        <div class="match-preview__match-info">
                                        <?php $time16 = date("H:i",strtotime($rows['date'])); ?>
                                            <time class="match-preview__match-time" datetime="2017-08-12 09:00"><?= $time16 ?> WIB</time>
                                            <div class="match-preview__match-place"><?= $data['tournament']['alamat'] ?></div>
                                        </div>
                                    </div>

                                    <!-- 2nd Team -->
                                    <div class="match-preview__team match-preview__team--second">
                                        
                                        <figure class="match-preview__team-logo">

                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">

        
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_2'] ?></h5>
                                        <div class="match-preview__team-info"><?= $rows['nama_kota_2'] ?></div>
                                    </div>
                                    <!-- 2nd Team / End -->

                                </div>
                            </section>
                            <div class="countdown__content text-center">
                            <h3>Verify The Winner</h3>
                            <div class="row mb-2 justify-content-center rounded">
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team1'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_1'] ?></h5>
                                </div>
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team2'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_2'] ?></h5>
                                </div>
                            </div>
                            <span class="badge <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?><?php if(!empty($rows['winner'])){ ?>badge-success <?php }else{ ?>  <?php if ($data['tournament']['status'] == "pending") { ?> badge-danger <?php } else if ($data['tournament']['status'] == "starting"){?>badge-warning <?php }else if ($data['tournament']['status'] == "complete") {?>badge-success <?php } ?><?php } ?><?php }else{ ?> badge-danger <?php } ?>  " style="font-size:15px; line-height:100%; margin-top:3px;"><?php if( strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?><?php if(!empty($rows['winner'])){ ?>FINISH <?php }else{ ?> <?php if ($data['tournament']['status'] == "pending") {?> ONCOMING <?php } else if ($data['tournament']['status'] == "starting"){?> ONGOING <?php }else if ($data['tournament']['status'] == "complete") {?> FINISH <?php } ?><?php } ?> <?php }else{ ?> ONCOMING <?php } ?>  </span>
                                <!-- <div class="countdown-counter" data-date="July 17, 2019 21:00:00"></div> -->
                            </div>
                            <div class="match-preview__action match-preview__action--ticket text-center">
                            <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?>
                                <a href="<?= BASEURL ?>/bracket/<?= $data['tournament']['url'] ?>" class="btn btn-primary-inverse">See Bracket</a>
                            <?php }else{ ?>
                                <a href="#" class="btn btn-primary-inverse " data-toggle="tooltip" data-placement="top" title="ONCOMING">See Bracket</a>
                            <?php } ?>
                            </div>
                        </div>
                        <!-- Match Preview / End -->

                    </div>
                </aside>
                <!-- Widget: Match Announcement / End -->
            </div>
    
        <?php } ?>
        </div>
        <div class="spacer"></div>
        <?php }else if ($data['round16_1']){ ?>
            <div class="card card--clean">
            <header class="card__header">
                <h4>Round Of 16</h4>
            </header>
		</div>
        <div class="row">   
        <?php foreach ($data['round16_1'] as $rows) { ?>
            <div class="col-lg-4">
                <!-- Widget: Match Announcement -->
                <aside class="widget widget--sidebar card widget-preview">
                    <div class="widget__title card__header">
                        <h4>Next Match</h4>
                    </div>
                    <div class="widget__content card__content">

                        <!-- Match Preview -->
                        <div class="match-preview">
                            <section class="match-preview__body">

                                <div class="match-preview__match-info match-preview__match-info--header">
                                    <div class="match-preview__match-place"><?= $data['tournament']['nama_kota'] ?></div>
                                    <?php if(empty($rows['date'])){ }else{ ?>
                                    <?php $date16 = date("l, d F Y",strtotime($rows['date'])); ?>
                                    <?php }?>
                                    <time class="match-preview__match-time" datetime="2019-05-04 09:00"><?= $date16 ?></time>
                                </div>
                                <?= $rows['date'] ?>
                                <header class="match-preview__header">
                                    <div class="match-preview__date"><?= $data['tournament']['nama_kota'] ?></div>
                                    <h3 class="match-preview__title match-preview__title--lg">Round Of 16</h3>
                                </header>
                                <div class="match-preview__content">

                                    <!-- 1st Team -->
                                    <div class="match-preview__team match-preview__team--first">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_1'] ?></h5>
                                        <div class="match-preview__team-info"><?= $rows['nama_kota_1'] ?></div>
                                    </div>
                                    <!-- 1st Team / End -->

                                    <div class="match-preview__vs">
                                        <div class="match-preview__conj">VS</div>
                                        <div class="match-preview__match-info">
                                        <?php $time16 = date("H:i",strtotime($rows['date'])); ?>
                                            <time class="match-preview__match-time" datetime="2017-08-12 09:00"><?= $time16 ?> WIB</time>
                                            <div class="match-preview__match-place"><?= $data['tournament']['alamat'] ?></div>
                                        </div>
                                    </div>

                                    <!-- 2nd Team -->
                                    <div class="match-preview__team match-preview__team--second">
                                        
                                        <figure class="match-preview__team-logo">

                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">

        
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_2'] ?></h5>
                                        <div class="match-preview__team-info"><?= $rows['nama_kota_2'] ?></div>
                                    </div>
                                    <!-- 2nd Team / End -->

                                </div>
                            </section>
                            <div class="countdown__content text-center">
                            <h3>Verify The Winner</h3>
                            <div class="row mb-2 justify-content-center rounded">
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team1'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_1'] ?></h5>
                                </div>
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team2'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_2'] ?></h5>
                                </div>
                            </div>
                            <span class="badge <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?><?php if(!empty($rows['winner'])){ ?>badge-success <?php }else{ ?>  <?php if ($data['tournament']['status'] == "pending") { ?> badge-danger <?php } else if ($data['tournament']['status'] == "starting"){?>badge-warning <?php }else if ($data['tournament']['status'] == "complete") {?>badge-success <?php } ?><?php } ?><?php }else{ ?> badge-danger <?php } ?>  " style="font-size:15px; line-height:100%; margin-top:3px;"><?php if( strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?><?php if(!empty($rows['winner'])){ ?>FINISH <?php }else{ ?> <?php if ($data['tournament']['status'] == "pending") {?> ONCOMING <?php } else if ($data['tournament']['status'] == "starting"){?> ONGOING <?php }else if ($data['tournament']['status'] == "complete") {?> FINISH <?php } ?><?php } ?> <?php }else{ ?> ONCOMING <?php } ?>  </span>
                                <!-- <div class="countdown-counter" data-date="July 17, 2019 21:00:00"></div> -->
                            </div>
                            <div class="match-preview__action match-preview__action--ticket text-center">
                            <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?>
                                <a href="<?= BASEURL ?>/bracket/<?= $data['tournament']['url'] ?>" class="btn btn-primary-inverse">See Bracket</a>
                            <?php }else{ ?>
                                <a href="#" class="btn btn-primary-inverse " data-toggle="tooltip" data-placement="top" title="ONCOMING">See Bracket</a>
                            <?php } ?>
                            </div>
                        </div>
                        <!-- Match Preview / End -->

                    </div>
                </aside>
                <!-- Widget: Match Announcement / End -->
            </div>
    
        <?php } ?>
        </div>
        <div class="spacer"></div>
        <?php }else{} ?>
        <?php if ($data['qtf']) {?>
        <div class="card card--clean">
            <header class="card__header">
                <h4>Quarter finals</h4>
            </header>
		</div>
        <div class="row">
        <?php foreach ($data['qtf'] as $rows) { ?>
            <div class="col-lg-4">
                <!-- Widget: Match Announcement -->
                <aside class="widget widget--sidebar card widget-preview">
                    <div class="widget__title card__header">
                        <h4>Next Match</h4>
                    </div>
                    <div class="widget__content card__content">

                        <!-- Match Preview -->
                        <div class="match-preview">
                            <section class="match-preview__body">

                                <div class="match-preview__match-info match-preview__match-info--header">
                                    <div class="match-preview__match-place"><?= $data['tournament']['nama_kota'] ?></div>
                                    <?php $date8 = date("l, d F Y",strtotime($rows['date'])); ?>
                                    <time class="match-preview__match-time" datetime="2019-05-04 09:00"><?= $date8 ?></time>
                                </div>

                                <header class="match-preview__header">
                                    <div class="match-preview__date"><?= $data['tournament']['nama_kota'] ?></div>
                                    <h3 class="match-preview__title match-preview__title--lg">Quarter finals</h3>
                                </header>
                                <div class="match-preview__content">

                                    <!-- 1st Team -->
                                    <div class="match-preview__team match-preview__team--first">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_1'] ?></h5>
                                        <div class="match-preview__team-info"><?= $rows['nama_kota_1'] ?></div>
                                    </div>
                                    <!-- 1st Team / End -->

                                    <div class="match-preview__vs">
                                        <div class="match-preview__conj">VS</div>
                                        <div class="match-preview__match-info">
                                        <?php $time8 = date("H:i",strtotime($rows['date'])); ?>
                                            <time class="match-preview__match-time" datetime="2017-08-12 09:00"><?= $time8 ?> WIB</time>
                                            <div class="match-preview__match-place"><?= $data['tournament']['alamat'] ?></div>
                                        </div>
                                    </div>

                                    <!-- 2nd Team -->
                                    <div class="match-preview__team match-preview__team--second">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_2'] ?></h5>
                                        <div class="match-preview__team-info"><?= $rows['nama_kota_2'] ?></div>
                                    </div>
                                    <!-- 2nd Team / End -->

                                </div>
                            </section>
                            <div class="countdown__content text-center">
                            <h3>Verify The Winner</h3>
                            <div class="row mb-2 justify-content-center rounded">
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team1'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_1'] ?></h5>
                                </div>
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team2'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_2'] ?></h5>
                                </div>
                            </div>
                            <span class="badge <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?><?php if(!empty($rows['winner'])){ ?>badge-success <?php }else{ ?>  <?php if ($data['tournament']['status'] == "pending") { ?> badge-danger <?php } else if ($data['tournament']['status'] == "starting"){?>badge-warning <?php }else if ($data['tournament']['status'] == "complete") {?>badge-success <?php } ?><?php } ?><?php }else{ ?> badge-danger <?php } ?>  " style="font-size:15px; line-height:100%; margin-top:3px;"><?php if( strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?><?php if(!empty($rows['winner'])){ ?>FINISH <?php }else{ ?> <?php if ($data['tournament']['status'] == "pending") {?> ONCOMING <?php } else if ($data['tournament']['status'] == "starting"){?> ONGOING <?php }else if ($data['tournament']['status'] == "complete") {?> FINISH <?php } ?><?php } ?> <?php }else{ ?> ONCOMING <?php } ?>  </span>
                                <!-- <div class="countdown-counter" data-date="July 17, 2019 21:00:00"></div> -->
                            </div>
                            <div class="match-preview__action match-preview__action--ticket text-center">
                            <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?>
                                <a href="<?= BASEURL ?>/bracket/<?= $data['tournament']['url'] ?>" class="btn btn-primary-inverse">See Bracket</a>
                            <?php }else{ ?>
                                <a href="#" class="btn btn-primary-inverse " data-toggle="tooltip" data-placement="top" title="ONCOMING">See Bracket</a>
                            <?php } ?>
                            </div>
                        </div>
                        <!-- Match Preview / End -->

                    </div>
                </aside>
                <!-- Widget: Match Announcement / End -->
            </div>
        <?php } ?>
        </div>

        <div class="spacer"></div>
        <?php }else if($data['qtf_1']){?>
            <div class="card card--clean">
            <header class="card__header">
                <h4>Quarter finals</h4>
            </header>
		</div>
        <div class="row">
        <?php foreach ($data['qtf_1'] as $rows) { ?>
            <div class="col-lg-4">
                <!-- Widget: Match Announcement -->
                <aside class="widget widget--sidebar card widget-preview">
                    <div class="widget__title card__header">
                        <h4>Next Match</h4>
                    </div>
                    <div class="widget__content card__content">

                        <!-- Match Preview -->
                        <div class="match-preview">
                            <section class="match-preview__body">

                                <div class="match-preview__match-info match-preview__match-info--header">
                                    <div class="match-preview__match-place"><?= $data['tournament']['nama_kota'] ?></div>
                                    <?php $date8 = date("l, d F Y",strtotime($rows['date'])); ?>
                                    <time class="match-preview__match-time" datetime="2019-05-04 09:00"><?= $date8 ?></time>
                                </div>

                                <header class="match-preview__header">
                                    <div class="match-preview__date"><?= $data['tournament']['nama_kota'] ?></div>
                                    <h3 class="match-preview__title match-preview__title--lg">Quarter finals</h3>
                                </header>
                                <div class="match-preview__content">

                                    <!-- 1st Team -->
                                    <div class="match-preview__team match-preview__team--first">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_1'] ?></h5>
                                        <div class="match-preview__team-info"><?= $rows['nama_kota_1'] ?></div>
                                    </div>
                                    <!-- 1st Team / End -->

                                    <div class="match-preview__vs">
                                        <div class="match-preview__conj">VS</div>
                                        <div class="match-preview__match-info">
                                        <?php $time8 = date("H:i",strtotime($rows['date'])); ?>
                                            <time class="match-preview__match-time" datetime="2017-08-12 09:00"><?= $time8 ?> WIB</time>
                                            <div class="match-preview__match-place"><?= $data['tournament']['alamat'] ?></div>
                                        </div>
                                    </div>

                                    <!-- 2nd Team -->
                                    <div class="match-preview__team match-preview__team--second">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_2'] ?></h5>
                                        <div class="match-preview__team-info"><?= $rows['nama_kota_2'] ?></div>
                                    </div>
                                    <!-- 2nd Team / End -->

                                </div>
                            </section>
                            <div class="countdown__content text-center">
                            <h3>Verify The Winner</h3>
                            <div class="row mb-2 justify-content-center rounded">
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team1'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_1'] ?></h5>
                                </div>
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team2'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_2'] ?></h5>
                                </div>
                            </div>
                            <span class="badge <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?><?php if(!empty($rows['winner'])){ ?>badge-success <?php }else{ ?>  <?php if ($data['tournament']['status'] == "pending") { ?> badge-danger <?php } else if ($data['tournament']['status'] == "starting"){?>badge-warning <?php }else if ($data['tournament']['status'] == "complete") {?>badge-success <?php } ?><?php } ?><?php }else{ ?> badge-danger <?php } ?>  " style="font-size:15px; line-height:100%; margin-top:3px;"><?php if( strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?><?php if(!empty($rows['winner'])){ ?>FINISH <?php }else{ ?> <?php if ($data['tournament']['status'] == "pending") {?> ONCOMING <?php } else if ($data['tournament']['status'] == "starting"){?> ONGOING <?php }else if ($data['tournament']['status'] == "complete") {?> FINISH <?php } ?><?php } ?> <?php }else{ ?> ONCOMING <?php } ?>  </span>
                                <!-- <div class="countdown-counter" data-date="July 17, 2019 21:00:00"></div> -->
                            </div>
                            <div class="match-preview__action match-preview__action--ticket text-center">
                            <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?>
                                <a href="<?= BASEURL ?>/bracket/<?= $data['tournament']['url'] ?>" class="btn btn-primary-inverse">See Bracket</a>
                            <?php }else{ ?>
                                <a href="#" class="btn btn-primary-inverse " data-toggle="tooltip" data-placement="top" title="ONCOMING">See Bracket</a>
                            <?php } ?>
                            </div>
                        </div>
                        <!-- Match Preview / End -->

                    </div>
                </aside>
                <!-- Widget: Match Announcement / End -->
            </div>
        <?php } ?>
        </div>

        <div class="spacer"></div>
        <?php }else{} ?>
        <?php if ($data['smf']) {?>
        <div class="card card--clean">
            <header class="card__header">
                <h4>Semi Finals</h4>
            </header>
		</div>
        <div class="row">
        <?php foreach ($data['smf'] as $rows) { ?>
            <div class="col-lg-4">
                <!-- Widget: Match Announcement -->
                <aside class="widget widget--sidebar card widget-preview">
                    <div class="widget__title card__header">
                        <h4>Next Match</h4>
                    </div>
                    <div class="widget__content card__content">

                        <!-- Match Preview -->
                        <div class="match-preview">
                            <section class="match-preview__body">

                                <div class="match-preview__match-info match-preview__match-info--header">
                                    <div class="match-preview__match-place"><?= $data['tournament']['nama_kota'] ?></div>
                                    <?php $date4 = date("l, d F Y",strtotime($rows['date'])); ?>
                                    <time class="match-preview__match-time" datetime="2019-05-04 09:00"><?= $date4 ?></time>
                                </div>

                                <header class="match-preview__header">
                                    <div class="match-preview__date"><?= $data['tournament']['nama_kota'] ?></div>
                                    <h3 class="match-preview__title match-preview__title--lg">Semifinals</h3>
                                </header>
                                <div class="match-preview__content">

                                    <!-- 1st Team -->
                                    <div class="match-preview__team match-preview__team--first">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_1'] ?></h5>
                                        <div class="match-preview__team-info">United States</div>
                                    </div>
                                    <!-- 1st Team / End -->

                                    <div class="match-preview__vs">
                                        <div class="match-preview__conj">VS</div>
                                        <div class="match-preview__match-info">
                                        <?php $time4 = date("H:i",strtotime($rows['date'])); ?>
                                            <time class="match-preview__match-time" datetime="2017-08-12 09:00"><?= $time4 ?> WIB</time>
                                            <div class="match-preview__match-place"><?= $data['tournament']['alamat'] ?></div>
                                        </div>
                                    </div>

                                    <!-- 2nd Team -->
                                    <div class="match-preview__team match-preview__team--second">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_2'] ?></h5>
                                        <div class="match-preview__team-info"></div>
                                    </div>
                                    <!-- 2nd Team / End -->

                                </div>
                            </section>
                            <div class="countdown__content text-center">
                            <h3>Verify The Winner</h3>
                            <div class="row mb-2 justify-content-center rounded">
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team1'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_1'] ?></h5>
                                </div>
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team2'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_2'] ?></h5>
                                </div>
                            </div>
                            <span class="badge <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?> <?php if ($data['tournament']['status'] == "pending") { ?> badge-danger <?php } else if ($data['tournament']['status'] == "starting"){?>badge-warning <?php }else if ($data['tournament']['status'] == "complete") {?>badge-success <?php } ?><?php }else{ ?> badge-danger <?php } ?>  " style="font-size:15px; line-height:100%; margin-top:3px;"><?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?><?php if ($data['tournament']['status'] == "pending") {?> ONCOMING <?php } else if ($data['tournament']['status'] == "starting"){?> ONGOING <?php }else if ($data['tournament']['status'] == "complete") {?> FINISH <?php } ?> <?php }else{ ?> ONCOMING <?php } ?>  </span>
                                <!-- <div class="countdown-counter" data-date="July 17, 2019 21:00:00"></div> -->
                            </div>
                            <div class="match-preview__action match-preview__action--ticket text-center">
                            <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?>
                                <a href="<?= BASEURL ?>/bracket/<?= $data['tournament']['url'] ?>" class="btn btn-primary-inverse">See Bracket</a>
                            <?php }else{ ?>
                                <a href="#" class="btn btn-primary-inverse " data-toggle="tooltip" data-placement="top" title="ONCOMING">See Bracket</a>
                            <?php } ?>
                            </div>
                        </div>
                        <!-- Match Preview / End -->

                    </div>
                </aside>
                <!-- Widget: Match Announcement / End -->
            </div>
            <?php } ?>
        </div>

        <div class="spacer"></div>
        <?php }else if ($data['smf_1']) { ?>
            <div class="card card--clean">
            <header class="card__header">
                <h4>Semi Finals</h4>
            </header>
		</div>
        <div class="row">
        <?php foreach ($data['smf_1'] as $rows) { ?>
            <div class="col-lg-4">
                <!-- Widget: Match Announcement -->
                <aside class="widget widget--sidebar card widget-preview">
                    <div class="widget__title card__header">
                        <h4>Next Match</h4>
                    </div>
                    <div class="widget__content card__content">

                        <!-- Match Preview -->
                        <div class="match-preview">
                            <section class="match-preview__body">

                                <div class="match-preview__match-info match-preview__match-info--header">
                                    <div class="match-preview__match-place"><?= $data['tournament']['nama_kota'] ?></div>
                                    
                                    <?php $date4 = date("l, d F Y",strtotime($rows['date'])); ?>
                                    <time class="match-preview__match-time" datetime="2019-05-04 09:00"><?= $date4 ?></time>
                                </div>

                                <header class="match-preview__header">
                                    <div class="match-preview__date"><?= $data['tournament']['nama_kota'] ?></div>
                                    <h3 class="match-preview__title match-preview__title--lg">Semifinals</h3>
                                </header>
                                <div class="match-preview__content">

                                    <!-- 1st Team -->
                                    <div class="match-preview__team match-preview__team--first">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_1'] ?></h5>
                                        <div class="match-preview__team-info">United States</div>
                                    </div>
                                    <!-- 1st Team / End -->

                                    <div class="match-preview__vs">
                                        <div class="match-preview__conj">VS</div>
                                        <div class="match-preview__match-info">
                                        <?php $time4 = date("H:i",strtotime($rows['date'])); ?>
                                            <time class="match-preview__match-time" datetime="2017-08-12 09:00"><?= $time4 ?> WIB</time>
                                            <div class="match-preview__match-place"><?= $data['tournament']['alamat'] ?></div>
                                        </div>
                                    </div>

                                    <!-- 2nd Team -->
                                    <div class="match-preview__team match-preview__team--second">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_2'] ?></h5>
                                        <div class="match-preview__team-info"></div>
                                    </div>
                                    <!-- 2nd Team / End -->

                                </div>
                            </section>
                            <div class="countdown__content text-center">
                            <h3>Verify The Winner</h3>
                            <div class="row mb-2 justify-content-center rounded">
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team1'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_1'] ?></h5>
                                </div>
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team2'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_2'] ?></h5>
                                </div>
                            </div>
                            <span class="badge <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?> <?php if ($data['tournament']['status'] == "pending") { ?> badge-danger <?php } else if ($data['tournament']['status'] == "starting"){?>badge-warning <?php }else if ($data['tournament']['status'] == "complete") {?>badge-success <?php } ?><?php }else{ ?> badge-danger <?php } ?>  " style="font-size:15px; line-height:100%; margin-top:3px;"><?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?><?php if ($data['tournament']['status'] == "pending") {?> ONCOMING <?php } else if ($data['tournament']['status'] == "starting"){?> ONGOING <?php }else if ($data['tournament']['status'] == "complete") {?> FINISH <?php } ?> <?php }else{ ?> ONCOMING <?php } ?>  </span>
                                <!-- <div class="countdown-counter" data-date="July 17, 2019 21:00:00"></div> -->
                            </div>
                            <div class="match-preview__action match-preview__action--ticket text-center">
                            <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?>
                                <a href="<?= BASEURL ?>/bracket/<?= $data['tournament']['url'] ?>" class="btn btn-primary-inverse">See Bracket</a>
                            <?php }else{ ?>
                                <a href="#" class="btn btn-primary-inverse " data-toggle="tooltip" data-placement="top" title="ONCOMING">See Bracket</a>
                            <?php } ?>
                            </div>
                        </div>
                        <!-- Match Preview / End -->

                    </div>
                </aside>
                <!-- Widget: Match Announcement / End -->
            </div>
            <?php } ?>
        </div>

        <div class="spacer"></div>
        <?php }else{} ?>
        <?php if ($data['final']) {?>
        <div class="card card--clean">
            <header class="card__header">
                <h4>Finals</h4>
            </header>
		</div>
        <div class="row">
        <?php foreach ($data['final'] as $rows) { ?>
            <div class="col-lg-4 " style="align-center">
                <!-- Widget: Match Announcement -->
                <aside class="widget widget--sidebar card widget-preview">
                    <div class="widget__title card__header">
                        <h4>Next Match</h4>
                    </div>
                    <div class="widget__content card__content">

                        <!-- Match Preview -->
                        <div class="match-preview">
                            <section class="match-preview__body">

                                <div class="match-preview__match-info match-preview__match-info--header">
                                    <div class="match-preview__match-place"><?= $data['tournament']['nama_kota'] ?></div>
                                    <?php $date2 = date("l, d F Y",strtotime($rows['date'])); ?>
                                    <time class="match-preview__match-time" datetime="2019-05-04 09:00"><?= $date2  ?></time>
                                </div>

                                <header class="match-preview__header">
                                    <div class="match-preview__date"><?= $data['tournament']['nama_kota'] ?></div>
                                    <h3 class="match-preview__title match-preview__title--lg">Final</h3>
                                </header>
                                <div class="match-preview__content">

                                    <!-- 1st Team -->
                                    <div class="match-preview__team match-preview__team--first">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_1'] ?></h5>
                                        <div class="match-preview__team-info">United States</div>
                                    </div>
                                    <!-- 1st Team / End -->

                                    <div class="match-preview__vs">
                                        <div class="match-preview__conj">VS</div>
                                        <div class="match-preview__match-info">
                                        <?php $time2 = date("H:i",strtotime($rows['date'])); ?>
                                            <time class="match-preview__match-time" datetime="2017-08-12 09:00"><?= $time2 ?> WIB</time>
                                            <div class="match-preview__match-place"><?= $data['tournament']['alamat'] ?></div>
                                        </div>
                                    </div>

                                    <!-- 2nd Team -->
                                    <div class="match-preview__team match-preview__team--second">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_2'] ?></h5>
                                        <div class="match-preview__team-info"></div>
                                    </div>
                                    <!-- 2nd Team / End -->

                                </div>
                            </section>
                            <div class="countdown__content text-center">
                            <h3>Verify The Winner</h3>
                            <div class="row mb-2 justify-content-center rounded">
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team1'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_1'] ?></h5>
                                </div>
                                <div class="col-lg-6 pt-2 text-center border border-secondary <?php if($rows['team2'] == $rows['winner']){ ?>bg-success<?php }else{}?>">
                                    <h5><?= $rows['team_2'] ?></h5>
                                </div>
                            </div>
                            <span class="badge <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?><?php if(!empty($rows['winner'])){ ?>badge-success <?php }else{ ?>  <?php if ($data['tournament']['status'] == "pending") { ?> badge-danger <?php } else if ($data['tournament']['status'] == "starting"){?>badge-warning <?php }else if ($data['tournament']['status'] == "complete") {?>badge-success <?php } ?><?php } ?><?php }else{ ?> badge-danger <?php } ?>  " style="font-size:15px; line-height:100%; margin-top:3px;"><?php if( strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?><?php if(!empty($rows['winner'])){ ?>FINISH <?php }else{ ?> <?php if ($data['tournament']['status'] == "pending") {?> ONCOMING <?php } else if ($data['tournament']['status'] == "starting"){?> ONGOING <?php }else if ($data['tournament']['status'] == "complete") {?> FINISH <?php } ?><?php } ?> <?php }else{ ?> ONCOMING <?php } ?>  </span>
                                <!-- <div class="countdown-counter" data-date="July 17, 2019 21:00:00"></div> -->
                            </div>
                            <div class="match-preview__action match-preview__action--ticket text-center">
                            <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?>
                                <a href="<?= BASEURL ?>/bracket/<?= $data['tournament']['url'] ?>" class="btn btn-primary-inverse">See Bracket</a>
                            <?php }else{ ?>
                                <a href="#" class="btn btn-primary-inverse " data-toggle="tooltip" data-placement="top" title="ONCOMING">See Bracket</a>
                            <?php } ?>
                            </div>
                        </div>
                        <!-- Match Preview / End -->

                    </div>
                </aside>
                <!-- Widget: Match Announcement / End -->
            </div>
        <?php } ?>
        </div>

        <div class="spacer"></div>
        <?php }else{} ?>
        
						
    </div>
</div>

<!-- Content / End -->