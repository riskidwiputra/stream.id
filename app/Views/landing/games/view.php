<?php  
$name = explode(' ', $data['content']['name']); 
$name1 = $name[0];
$name2 = $name[1];
?>
<!-- Content
================================================== -->
<div class="site-content">
    <div class="container">

        <!-- Single Player -->
        <div class="team-roster team-roster--card mb-0 pb-0">

            <!-- Player -->
            <div class="team-roster__item card card--no-paddings">
                <div class="card__content">
                    <div class="team-roster__content-wrapper">

                        <!-- Player Photo -->
                        <figure class="team-roster__player-img">
                            <div class="team-roster__player-shape effect-duotone effect-duotone--blue team-roster__player-shape--bg2"></div>
                            <img class="card-img" src="<?=cdn(paths('backup_gamelist')).$data['content']['logo'];?>" alt="Game Logo" style="padding:0;margin:0;width:400px;height:400px;">
                            
                        </figure>
                        <!-- Player Photo / End-->

                        <!-- Player Content -->
                        <div class="team-roster__content">
                            <?php if (Session::check('users') == true):?>
                                <?php if (in_array($data['content']['id_game_list'], $data['users_game'])):?>
                            <div class="team-roster__content-header text-right">
                                <a href="javascript:void(0);" class="btn btn-success btn-lg"><i class="fa fa-check"></i> Added</a>
                            </div> 
                                <?php else:?>
                            <div class="team-roster__content-header text-right">
                                <a href="javascript:void(0);" class="btn btn-success btn-outline btn-lg add add-game">Add To My Game</a>
                            </div> 
                                <?php endif;?>
                            <?php endif; ?>

                            <!-- Player Details -->
                            <div class="team-roster__player-details">
                                <div class="team-roster__player-info">
                                    <h5 class="team-roster__player-realname">Game</h5>
                                    <h3 class="team-roster__player-nickname"><?=$name1;?> <span class="highlight"><?=$name2;?></span></h3>
                                </div>
                            </div>
                            <!-- Player Details / End -->

                            <!-- Player Excerpt -->
                            <div class="team-roster__player-excerpt">
                                <?=$data['content']['content'];?>
                            </div>
                            <!-- Player Excerpt / End -->

                            <!-- Player Details - Common -->
                            <div class="team-roster__player-details-common">
                                <ul class="team-roster__player-social social-links social-links--circle-filled">
                                    <li class="social-links__item">
                                        <a href="#" class="social-links__link social-links__link--facebook"><i class="fa fa-facebook-official"></i></a>
                                    </li>
                                    <li class="social-links__item">
                                        <a href="#" class="social-links__link social-links__link--twitter"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="social-links__item">
                                        <a href="#" class="social-links__link social-links__link--twitch"><i class="fa fa-twitch"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Player Details - Common / End -->

                            <!-- Player Stats -->
                            <div class="team-roster__player-stats">

                                <div class="team-roster__player-stats-circular-bars">

                                    <div class="team-roster__player-stats-circular-bar">
                                        <div class="circular circular--size-80">
                                            <div class="circular__bar" data-percent="90">
                                                <span class="circular__percents">
                                                    940
                                                    <span class="circular__label">User</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="team-roster__player-stats-circular-bar">
                                        <div class="circular circular--size-80">
                                            <div class="circular__bar" data-percent="15">
                                                <span class="circular__percents">
                                                   15
                                                   <span class="circular__label">Turnament</span>
                                               </span>
                                           </div>
                                       </div>
                                   </div>

                               </div>

                               <div class="team-roster__player-stats-progress-bars">

                                    <!-- Progress Stats Table -->
                                    <table class="progress-table progress-table--simple">
                                        <tbody>
                                            <tr>
                                                <td class="progress-table__title">Player User</td>
                                                <td class="progress-table__progress-bar">
                                                    <div class="progress progress--lines">
                                                        <div class="progress__bar" style="width: 90%;" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td class="progress-table__progress-label progress-table__progress-label--highlight">940</td>
                                            </tr>
                                            <tr>
                                                <td class="progress-table__title">Total Turament</td>
                                                <td class="progress-table__progress-bar">
                                                    <div class="progress progress--lines">
                                                        <div class="progress__bar" style="width: 15%;" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td class="progress-table__progress-label progress-table__progress-label--highlight">15</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- Progress Stats Table / End -->
                                </div>
                            </div>
                            <!-- Player Stats / End -->
                        </div>
                        <!-- Player Content / End -->
                    </div>
                </div>
            </div>
            <!-- Player / End -->

            <!-- Single Player - General Stats -->
            <div class="player-general-stats row">

                <div class="player-general-stats__item col-sm-6 col-lg-3">
                    <div class="player-general-stats__card card">
                        <div class="player-general-stats__card-content card__content">
                            <div class="player-general-stats__icon alc-icon alc-icon--circle alc-icon--sm alc-icon--outline alc-icon--outline-md">
                                <svg role="img" class="df-icon df-icon--crosshair">
                                    <use xlink:href="<?=asset('assets/images/esports/icons-esports.svg#crosshair');?>" />
                                    </svg>
                                </div>
                                <div class="player-general-stats__body">
                                    <h5 class="player-general-stats__value">15</h5>
                                    <div class="player-general-stats__meta">
                                        <h6 class="player-general-stats__label">Turnament</h6>
                                        <div class="player-general-stats__sublabel">in total</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="player-general-stats__item col-sm-6 col-lg-3">
                        <div class="player-general-stats__card card">
                            <div class="player-general-stats__card-content card__content">
                                <div class="player-general-stats__icon alc-icon alc-icon--circle alc-icon--sm alc-icon--outline alc-icon--outline-md">
                                    <svg role="img" class="df-icon df-icon--dead-face">
                                        <use xlink:href="<?=asset('assets/images/esports/icons-esports.svg#dead-face');?>" />
                                        </svg>
                                    </div>
                                    <div class="player-general-stats__body">
                                        <h5 class="player-general-stats__value">940</h5>
                                        <div class="player-general-stats__meta">
                                            <h6 class="player-general-stats__label">User</h6>
                                            <div class="player-general-stats__sublabel">in total</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="player-general-stats__item col-sm-6 col-lg-3">
                            <div class="player-general-stats__card card">
                                <div class="player-general-stats__card-content card__content">
                                    <div class="player-general-stats__icon alc-icon alc-icon--circle alc-icon--sm alc-icon--outline alc-icon--outline-md">
                                        <svg role="img" class="df-icon df-icon--thumbs-up">
                                            <use xlink:href="<?=asset('assets/images/esports/icons-esports.svg#thumbs-up');?>" />
                                        </svg>
                                    </div>
                                    <div class="player-general-stats__body">
                                        <h5 class="player-general-stats__value">8627</h5>
                                        <div class="player-general-stats__meta">
                                            <h6 class="player-general-stats__label">User Like</h6>
                                            <div class="player-general-stats__sublabel">in total</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="player-general-stats__item col-sm-6 col-lg-3">
                            <div class="player-general-stats__card card">
                                <div class="player-general-stats__card-content card__content">
                                    <div class="player-general-stats__icon alc-icon alc-icon--circle alc-icon--sm alc-icon--outline alc-icon--outline-md">
                                        <svg role="img" class="df-icon df-icon--gamepad">
                                            <use xlink:href="<?=asset('assets/images/esports/icons-esports.svg#gamepad');?>" />
                                        </svg>
                                    </div>
                                    <div class="player-general-stats__body">
                                        <h5 class="player-general-stats__value">89.1<small>%</small></h5>
                                        <div class="player-general-stats__meta">
                                            <h6 class="player-general-stats__label">Request Turnament</h6>
                                            <div class="player-general-stats__sublabel">in total</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Single Player - General Stats / End -->

                </div>
                <!-- Single Player / End -->

            </div>
        </div>

        <!-- Content / End -->
        <script>
            $('.add-game').click(function() {
                $.ajax({
                    url : '<?=url('add-game/'.$data['content']['id_game_list']);?>',
                    method : 'POST',
                    success : function(m){
                        $('.add').removeClass('btn-outline');
                        $('.add').html('<i class="fa fa-check"></i> Added</a>');
                        $('.add').removeClass('add-game');
                        window.location.href = "<?=url('my-game');?>";
                    }
                });
            });
        </script>