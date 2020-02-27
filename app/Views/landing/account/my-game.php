<!-- Content
  ================================================== -->
    <div class="site-content">
        <div class="container">

            <div class="row">

                <div class="col-lg-8">

                    <aside class="widget widget--sidebar card widget-tabbed">
                        <div class="widget__title card__header">
                            <h4>MY GAME</h4>
                        </div>
                        <div class="widget__content card__content" id="data" data-id="<?= BASEURL ?>">
                            <div class="widget-tabbed__tabs">
                                <!-- Widget Tabs -->
                                <ul class="nav nav-tabs nav-justified widget-tabbed__nav" role="tablist">
                                    <li class="nav-item"><a href="<?=url('account');?>" class="nav-link">PERSONAL INFORMATION</a></li>
                                    <li class="nav-item"><a href="javascript:void(0);" class="nav-link active">MY GAME</a></li>
                                </ul>

                                <!-- Widget Tab panes -->
                                <div class="tab-content widget-tabbed__tab-content"> 
                                    <!-- Commented -->
                                    <div role="tabpanel" class="tab-pane fade active show" id="mygame">
                                        <?php 
                                        $i = 0;
                                        foreach ($data['content']['game_id'] as $game_id):
                                            $game = $this->db->table('game_list')->where('id_game_list', $game_id);
                                            $identity = [
                                                'users_id'  => Session::get('users'),
                                                'game_id'   => $game_id
                                            ];
                                            $identity = $this->db->table('identity_ingame')->where($identity);
                                            if (empty($identity['id_ingame'])) {
                                                $identity['id'] = '-';
                                            } else { 
                                                $identity['id'] = $identity['id_ingame'];
                                            }
                                            if (empty($identity['username_ingame'])) {
                                                $identity['username'] = '-';
                                            } else {
                                                $identity['username'] = $identity['username_ingame'];
                                            }
                                            // var_dump($game);
                                        ?>
                                        <a href="javascript:void(0);" class="btn-social-counter btn-social-counter--twitch mb-3" data-toggle="modal" data-target="#game<?=$game_id;?>">
                                            <div class="btn-social-counter__icon">
                                                <img class="card-img" src="<?=path('path_portal_Gamelist').$game['logo'];?>" alt="" height="300px">
                                            </div>
                                            <h6 class="btn-social-counter__title"><?=$game['name'];?></h6>
                                            <span class="btn-social-counter__count"><span class="btn-social-counter__count-num"></span>Username : <?=$identity['username'];?></span>
                                            <span class="btn-social-counter__count"><span class="btn-social-counter__count-num"></span>Id Game : <?=$identity['id'];?></span>
                                            <span class="btn-social-counter__add-icon"></span>
                                        </a>
                                        <div class="modal fade" id="game<?=$game_id;?>" tabindex="-1" role="dialog" aria-labelledby="dota2Label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content border-0 rounded-circle">
                                                    <form method="post" class="form-identity<?=$game_id;?>">
                                                        <div class="modal-header border-success" style="background-color: #4B3B60;">
                                                            <h1><?=$game['name'];?></h1>  
                                                        </div>
                                                        <div class="modal-body border-success" style="background-color: #4B3B60;">
                                                            <div class="form-group form-group--sm">
                                                                <label for="username_in_game<?=$game_id;?>">Username In Game <abbr class="required" title="required">*</abbr></label>
                                                                <input type="text" name="username_in_game" id="username_in_game<?=$game_id;?>" class="form-control username_in_game" placeholder="Enter Username In Game..." value="<?=$identity['username_ingame'];?>" required>
                                                            </div>
                                                            <div class="form-group form-group--sm">
                                                                <label for="id_in_game<?=$game_id;?>">ID In Game <abbr class="required" title="required">*</abbr></label>
                                                                <input type="text" name="id_in_game" id="id_in_game<?=$game_id;?>" class="form-control id_in_game" placeholder="Enter ID In Game..." value="<?=$identity['id_ingame'];?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-success" style="background-color: #4B3B60;">
                                                            <a href="#" class="btn btn-info btn-outline">Join / Create Team</a>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                            <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                        <script>
                                            $('.form-identity<?=$game_id;?>').submit(function(event) {
                                                event.stopPropagation();
                                                event.preventDefault();
                                                $(this).find('button').html('Loading....');
                                                $.ajax({
                                                    url : '<?=url('update-identity/'.$game_id);?>',
                                                    method : 'POST',
                                                    data : {
                                                        id : $(this).find('.id_in_game').val(),
                                                        username : $(this).find('.username_in_game').val()
                                                    },
                                                    success : function(m) { 
                                                        // console.log(m);
                                                        location.reload();
                                                    }
                                                });
                                            });
                                        </script> 
                                        <?php endforeach; 
                                        if (empty($data['content']['game_id'])){
                                            echo '<h5 class="text-center">NOT FOUND</h5>';
                                        }
                                        ?>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </aside>
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