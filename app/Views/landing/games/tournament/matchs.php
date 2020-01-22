<!-- Content
		================================================== -->
<div class="site-content">
    <div class="container">
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
                                    <div class="match-preview__match-place">Xenowatch</div>
                                    <time class="match-preview__match-time" datetime="2019-05-04 09:00">Sunday, May 4th</time>
                                </div>

                                <header class="match-preview__header">
                                    <div class="match-preview__date">Xeno League</div>
                                    <h3 class="match-preview__title match-preview__title--lg">Round Of 32</h3>
                                </header>
                                <div class="match-preview__content">

                                    <!-- 1st Team -->
                                    <div class="match-preview__team match-preview__team--first">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?=asset(paths('path_home_LogoTeam_0'));?><?= $rows['logo_1'];?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_1'] ?></h5>
                                        <div class="match-preview__team-info"><?= $rows['nama_kota_1'] ?></div>
                                    </div>
                                    <!-- 1st Team / End -->

                                    <div class="match-preview__vs">
                                        <div class="match-preview__conj">VS</div>
                                        <div class="match-preview__match-info">
                                            <time class="match-preview__match-time" datetime="2017-08-12 09:00">9:00 PM</time>
                                            <div class="match-preview__match-place">Madison Cube Stadium</div>
                                        </div>
                                    </div>

                                    <!-- 2nd Team -->
                                    <div class="match-preview__team match-preview__team--second">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?=asset(paths('path_home_LogoTeam_0'));?><?= $rows['logo_2'];?>" height="100%""; alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name"><?= $rows['team_2'] ?></h5>
                                        <div class="match-preview__team-info"><?= $rows['nama_kota_2'] ?></div>
                                    </div>
                                    <!-- 2nd Team / End -->

                                </div>
                            </section>
                            <div class="countdown__content">
                                <div class="countdown-counter" data-date="July 17, 2019 21:00:00"></div>
                            </div>
                            <div class="match-preview__action match-preview__action--ticket text-center">
                                <a href="#" class="btn btn-primary-inverse">See Bracket</a>
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
        <div class="card card--clean">
            <header class="card__header">
                <h4>Round Of 16</h4>
            </header>
		</div>
        <div class="row">
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
                                    <div class="match-preview__match-place">Xenowatch</div>
                                    <time class="match-preview__match-time" datetime="2019-05-04 09:00">Sunday, May 4th</time>
                                </div>

                                <header class="match-preview__header">
                                    <div class="match-preview__date">Xeno League</div>
                                    <h3 class="match-preview__title match-preview__title--lg">Semifinals</h3>
                                </header>
                                <div class="match-preview__content">

                                    <!-- 1st Team -->
                                    <div class="match-preview__team match-preview__team--first">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name">Alchemists</h5>
                                        <div class="match-preview__team-info">United States</div>
                                    </div>
                                    <!-- 1st Team / End -->

                                    <div class="match-preview__vs">
                                        <div class="match-preview__conj">VS</div>
                                        <div class="match-preview__match-info">
                                            <time class="match-preview__match-time" datetime="2017-08-12 09:00">9:00 PM</time>
                                            <div class="match-preview__match-place">Madison Cube Stadium</div>
                                        </div>
                                    </div>

                                    <!-- 2nd Team -->
                                    <div class="match-preview__team match-preview__team--second">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?=asset('assets/images/samples/logo-sharks--sm.png');?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name">Sharks</h5>
                                        <div class="match-preview__team-info">South Korea</div>
                                    </div>
                                    <!-- 2nd Team / End -->

                                </div>
                            </section>
                            <div class="countdown__content">
                                <div class="countdown-counter" data-date="July 17, 2019 21:00:00"></div>
                            </div>
                            <div class="match-preview__action match-preview__action--ticket text-center">
                                <a href="#" class="btn btn-primary-inverse">See Bracket</a>
                            </div>
                        </div>
                        <!-- Match Preview / End -->

                    </div>
                </aside>
                <!-- Widget: Match Announcement / End -->
            </div>
    
        </div>

        <div class="spacer"></div>
        <div class="card card--clean">
            <header class="card__header">
                <h4>Quarter finals</h4>
            </header>
		</div>
        <div class="row">
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
                                    <div class="match-preview__match-place">Xenowatch</div>
                                    <time class="match-preview__match-time" datetime="2019-05-04 09:00">Sunday, May 4th</time>
                                </div>

                                <header class="match-preview__header">
                                    <div class="match-preview__date">Xeno League</div>
                                    <h3 class="match-preview__title match-preview__title--lg">Semifinals</h3>
                                </header>
                                <div class="match-preview__content">

                                    <!-- 1st Team -->
                                    <div class="match-preview__team match-preview__team--first">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name">Alchemists</h5>
                                        <div class="match-preview__team-info">United States</div>
                                    </div>
                                    <!-- 1st Team / End -->

                                    <div class="match-preview__vs">
                                        <div class="match-preview__conj">VS</div>
                                        <div class="match-preview__match-info">
                                            <time class="match-preview__match-time" datetime="2017-08-12 09:00">9:00 PM</time>
                                            <div class="match-preview__match-place">Madison Cube Stadium</div>
                                        </div>
                                    </div>

                                    <!-- 2nd Team -->
                                    <div class="match-preview__team match-preview__team--second">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?=asset('assets/images/samples/logo-sharks--sm.png');?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name">Sharks</h5>
                                        <div class="match-preview__team-info">South Korea</div>
                                    </div>
                                    <!-- 2nd Team / End -->

                                </div>
                            </section>
                            <div class="countdown__content">
                                <div class="countdown-counter" data-date="July 17, 2019 21:00:00"></div>
                            </div>
                            <div class="match-preview__action match-preview__action--ticket text-center">
                                <a href="#" class="btn btn-primary-inverse">See Bracket</a>
                            </div>
                        </div>
                        <!-- Match Preview / End -->

                    </div>
                </aside>
                <!-- Widget: Match Announcement / End -->
            </div>
    
        </div>

        <div class="spacer"></div>
        <div class="card card--clean">
            <header class="card__header">
                <h4>Semi Finals</h4>
            </header>
		</div>
        <div class="row">
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
                                    <div class="match-preview__match-place">Xenowatch</div>
                                    <time class="match-preview__match-time" datetime="2019-05-04 09:00">Sunday, May 4th</time>
                                </div>

                                <header class="match-preview__header">
                                    <div class="match-preview__date">Xeno League</div>
                                    <h3 class="match-preview__title match-preview__title--lg">Semifinals</h3>
                                </header>
                                <div class="match-preview__content">

                                    <!-- 1st Team -->
                                    <div class="match-preview__team match-preview__team--first">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name">Alchemists</h5>
                                        <div class="match-preview__team-info">United States</div>
                                    </div>
                                    <!-- 1st Team / End -->

                                    <div class="match-preview__vs">
                                        <div class="match-preview__conj">VS</div>
                                        <div class="match-preview__match-info">
                                            <time class="match-preview__match-time" datetime="2017-08-12 09:00">9:00 PM</time>
                                            <div class="match-preview__match-place">Madison Cube Stadium</div>
                                        </div>
                                    </div>

                                    <!-- 2nd Team -->
                                    <div class="match-preview__team match-preview__team--second">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?=asset('assets/images/samples/logo-sharks--sm.png');?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name">Sharks</h5>
                                        <div class="match-preview__team-info">South Korea</div>
                                    </div>
                                    <!-- 2nd Team / End -->

                                </div>
                            </section>
                            <div class="countdown__content">
                                <div class="countdown-counter" data-date="July 17, 2019 21:00:00"></div>
                            </div>
                            <div class="match-preview__action match-preview__action--ticket text-center">
                                <a href="#" class="btn btn-primary-inverse">See Bracket</a>
                            </div>
                        </div>
                        <!-- Match Preview / End -->

                    </div>
                </aside>
                <!-- Widget: Match Announcement / End -->
            </div>
    
        </div>

        <div class="spacer"></div>
        <div class="card card--clean">
            <header class="card__header">
                <h4>Finals</h4>
            </header>
		</div>
        <div class="row">
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
                                    <div class="match-preview__match-place">Xenowatch</div>
                                    <time class="match-preview__match-time" datetime="2019-05-04 09:00">Sunday, May 4th</time>
                                </div>

                                <header class="match-preview__header">
                                    <div class="match-preview__date">Xeno League</div>
                                    <h3 class="match-preview__title match-preview__title--lg">Semifinals</h3>
                                </header>
                                <div class="match-preview__content">

                                    <!-- 1st Team -->
                                    <div class="match-preview__team match-preview__team--first">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name">Alchemists</h5>
                                        <div class="match-preview__team-info">United States</div>
                                    </div>
                                    <!-- 1st Team / End -->

                                    <div class="match-preview__vs">
                                        <div class="match-preview__conj">VS</div>
                                        <div class="match-preview__match-info">
                                            <time class="match-preview__match-time" datetime="2017-08-12 09:00">9:00 PM</time>
                                            <div class="match-preview__match-place">Madison Cube Stadium</div>
                                        </div>
                                    </div>

                                    <!-- 2nd Team -->
                                    <div class="match-preview__team match-preview__team--second">
                                        <figure class="match-preview__team-logo">
                                            <img src="<?=asset('assets/images/samples/logo-sharks--sm.png');?>" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name">Sharks</h5>
                                        <div class="match-preview__team-info">South Korea</div>
                                    </div>
                                    <!-- 2nd Team / End -->

                                </div>
                            </section>
                            <div class="countdown__content">
                                <div class="countdown-counter" data-date="July 17, 2019 21:00:00"></div>
                            </div>
                            <div class="match-preview__action match-preview__action--ticket text-center">
                                <a href="#" class="btn btn-primary-inverse">See Bracket</a>
                            </div>
                        </div>
                        <!-- Match Preview / End -->

                    </div>
                </aside>
                <!-- Widget: Match Announcement / End -->
            </div>
    
        </div>

        <div class="spacer"></div>

        
						
    </div>
</div>

<!-- Content / End -->