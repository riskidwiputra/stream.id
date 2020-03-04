<!-- Content
  ================================================== -->
  
    <div class="site-content">
        <div class="container">

            <div class="row">

                <div class="col-lg-8">

                    <aside class="widget widget--sidebar card widget-tabbed">
                        <div class="widget__title card__header">
                            <h4>MY TEAM</h4>
                        </div>
                        <div class="widget__content card__content" id="data" data-id="<?= BASEURL ?>">
                            <div class="widget-tabbed__tabs">
                                <!-- Widget Tabs -->
                                <ul class="nav nav-tabs nav-justified widget-tabbed__nav" role="tablist">
                                    <li class="nav-item"><a href="<?=url('account');?>" class="nav-link">PERSONAL INFORMATION</a></li>
                                    <li class="nav-item"><a href="<?=url('my-game');?>" class="nav-link">MY GAME</a></li>
                                    <li class="nav-item"><a href="javascript:void(0);" class="nav-link active">MY TEAM</a></li>
                                </ul>

                                <!-- Widget Tab panes -->
                                <div class="tab-content widget-tabbed__tab-content"> 
                                    <!-- Commented -->
                                    <div role="tabpanel" class="tab-pane fade active show" id="mygame">
                                        <?php 
                                        $i = 0;
                                        foreach ($data['content'] as $team_player):
                                            $team = $this->db->table('team')->where('team_id', $team_player['team_id']);
                                            $game = $this->db->table('game_list')->where('id_game_list', $team['game_id']); 
                                            // var_dump($team);
                                            $conf_game = $game['player_on_team']+$game['substitute_player'];
                                            $player0 = explode(',', $team_player['player_id']);
                                            $player1 = explode(',', $team_player['substitute_id']);
                                            $all_request = $this->db->query('SELECT * FROM team_request WHERE team_id = "'.$team['team_id'].'" ORDER BY created_at DESC');
                                            $all_request = $this->db->resultSet();
                                            $new_request = [
                                                'team_id'   => $team_player['team_id'],
                                                'status'    => 1
                                            ];
                                            $new_request = $this->db->table('team_request')->countRows($new_request);
                                            if ($team_player['substitute_id'] == '') {
                                                $player1 = [];
                                            }
                                        ?>
                                        <a href="javascript:void(0);" class="btn-social-counter btn-social-counter--twitch mb-3" data-toggle="modal" data-target="#game<?=$team['team_id'];?>">
                                            <div class="btn-social-counter__icon">
                                                <img class="card-img" src="<?=path('path_portal_TeamLogo').$team['team_logo'];?>" alt="" style="height: 80px;"> 
                                            </div>
                                            <h6 class="btn-social-counter__title"><?=$team['team_name'];?></h6>
                                            <span class="btn-social-counter__count"><span class="btn-social-counter__count-num"></span><?=$game['name'];?></span>
                                            <span class="btn-social-counter__count"><span class="btn-social-counter__count-num"></span>Member : <?=count($player0)+count($player1).'/'.$conf_game;?></span>
                                            <span class="btn-social-counter__add-icon"></span>
                                        </a>
                                        <div class="modal fade" id="game<?=$team['team_id'];?>">
                                            <div class="modal-dialog" >
                                                <div class="modal-content border-0 rounded-circle">
                                                    <form method="post" class="form-identity<?=$team['team_id'];?>">
                                                        <div class="modal-header border-success" style="background-color: #4B3B60;">
                                                            <h3 style="padding:0;margin:0;"><?=$team['team_name'];?></h3>  
                                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#invite<?=$team['team_id'];?>" onclick="$('#game<?=$team['team_id'];?>').modal('hide');"><i class="fa fa-plus"></i> INVITE</a>
                                                        </div>
                                                        <div class="modal-body border-success" style="background-color: #4B3B60;">
                                                            <?php if (Session::check('users') == $team['leader_id']):?>
                                                            <a href="javascript:void(0);" class="float-right" data-toggle="modal" data-target="#join<?=$team['team_id'];?>" onclick="$('#game<?=$team['team_id'];?>').modal('hide');"><?php if ($new_request > 0){echo '<span class="badge badge-danger">'.$new_request.'</span> ';};?>REQUESTING JOIN</a>
                                                            <?php endif;?>
                                                            <h5>Primary Player</h5> 
                                                            <ul>
                                                                <?php  
                                                                $i=0;
                                                                for ($i=0;$i<count($player0);$i++):
                                                                    $pl = [
                                                                        'users_id'  => $player0[$i],
                                                                        'game_id'   => $team['game_id']
                                                                    ];
                                                                    $pl = $this->db->table('identity_ingame')->where($pl); 
                                                                    if ($team['leader_id'] == $pl['users_id']) {
                                                                        $lead = ' <span class="font-weight-bold text-primary">(CAPTAIN)</span>';
                                                                    } else {
                                                                        $lead = ''; 
                                                                    }
                                                                ?>
                                                                <li><?=$pl['username_ingame'].$lead;?></li>
                                                                <?php endfor;?>
                                                            </ul>
                                                            <h5>Substitute Player</h5>
                                                                <?php  
                                                                $i=0;
                                                                for ($i=0;$i<count($player1);$i++):
                                                                    $pl = [
                                                                        'users_id'  => $player1[$i],
                                                                        'game_id'   => $team['game_id']
                                                                    ];
                                                                    $pl = $this->db->table('identity_ingame')->where($pl); 
                                                                ?>
                                                                <li><?=$pl['username_ingame'];?></li>
                                                                <?php endfor;?>
                                                            <ul>     
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer border-success" style="background-color: #4B3B60;">  
                                                            <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                        <?php if (Session::check('users') == $team['leader_id']):?>
                                        <div class="modal fade" id="join<?=$team['team_id'];?>">
                                            <div class="modal-dialog" >
                                                <div class="modal-content border-0 rounded-circle">
                                                    <form method="post" class="form-identity<?=$team['team_id'];?>">
                                                        <div class="modal-header border-success" style="background-color: #4B3B60;">
                                                            <h3 style="padding:0;margin:0;">Requesting Join <sub class="text-muted"><?=$team['team_name'];?></sub></h3>  
                                                        </div>
                                                        <div class="modal-body border-success" style="background-color: #4B3B60;">
                                                            <div class="table-responsive">
                                                                <table>
                                                                    <?php foreach($all_request as $all):
                                                                        $req_nick = [
                                                                            'users_id'  => $all['users_id'],
                                                                            'game_id'   => $team['game_id']
                                                                        ];
                                                                        $req_nick = $this->db->table('identity_ingame')->where($req_nick);
                                                                    ?>
                                                                    <tr >
                                                                        <td><?=$req_nick['username_ingame'];?></td> 
                                                                        <td>
                                                                            <?php if ($all['status'] == 1):?>
                                                                            <a href="javascript:void(0);" class="accept<?=$all['request_id'];?>" data-id="<?=$all['request_id'];?>" data-name="<?=$req_nick['username_ingame'];?>"><i class="fa fa-check-circle"></i></a>
                                                                            <a href="javascript:void(0);" class="declined<?=$all['request_id'];?>" data-id="<?=$all['request_id'];?>" data-name="<?=$req_nick['username_ingame'];?>"><i class="fa fa-times-circle"></i></a>
                                                                            <?php elseif ($all['status'] == 0):?>
                                                                            <a href="javascript:void(0);"><i>&nbsp;&nbsp;&nbsp;| DECLINED</i></a>
                                                                            <?php elseif ($all['status'] == 2):?>
                                                                            <a href="javascript:void(0);"><i>&nbsp;&nbsp;&nbsp;| ACCEPTED</i></a>
                                                                            <?php endif;?>
                                                                        </td>
                                                                    </tr>
                                                                    <script>
                                                                        $('.accept<?=$all['request_id'];?>').click(function(){
                                                                            var t = $(this);
                                                                            var data = t.data('id');
                                                                            var user = t.data('name');
                                                                            bootbox.confirm({ 
                                                                                message: "Are you sure want to accept <b>"+user+"</b> in your team ?",
                                                                                buttons: {
                                                                                    confirm: {
                                                                                        label: 'Yes',
                                                                                        className: 'btn-success'
                                                                                    },
                                                                                    cancel: {
                                                                                        label: 'No',
                                                                                        className: 'btn-danger'
                                                                                    }
                                                                                },
                                                                                callback: function (result) {
                                                                                    if (result == true) {
                                                                                        $.ajax({
                                                                                            url : '<?=url('accept-join/')?>' + data,
                                                                                            method : 'POST',
                                                                                            dataType : 'json',
                                                                                            success : function(m){
                                                                                                if (m.status == true) {
                                                                                                    $(t).after('<a href="javascript:void(0);"><i>&nbsp;&nbsp;&nbsp;| ACCEPTED</i>')
                                                                                                    $('.accept'+data).remove();
                                                                                                    $('.declined'+data).remove();
                                                                                                } else {
                                                                                                    var dialog = bootbox.dialog({
                                                                                                        message: '<p class="text-center mb-0"><i class="fa fa-times-circle"></i> '+m.message+'</p>'
                                                                                                    }); 
                                                                                                }
                                                                                            }
                                                                                        });                                                                                        
                                                                                    }
                                                                                }
                                                                            });
                                                                        });

                                                                        $('.declined<?=$all['request_id'];?>').click(function() {
                                                                            var t = $(this);
                                                                            var data = t.data('id');
                                                                            var user = t.data('name'); 
                                                                            bootbox.confirm({ 
                                                                                message: "Are you sure want to declined <b>"+user+"</b> in your team ?",
                                                                                buttons: {
                                                                                    confirm: {
                                                                                        label: 'Yes',
                                                                                        className: 'btn-success'
                                                                                    },
                                                                                    cancel: {
                                                                                        label: 'No',
                                                                                        className: 'btn-danger'
                                                                                    }
                                                                                },
                                                                                callback: function (result) {
                                                                                    if (result == true) {
                                                                                        $.ajax({
                                                                                            url : '<?=url('declined-join/')?>' + data,
                                                                                            method : 'POST',
                                                                                            dataType : 'json',
                                                                                            success : function(m){
                                                                                                if (m.status == true) {
                                                                                                    $(t).after('<a href="javascript:void(0);"><i>&nbsp;&nbsp;&nbsp;| DECLINED</i>')
                                                                                                    $('.accept'+data).remove();
                                                                                                    $('.declined'+data).remove();
                                                                                                } else {
                                                                                                    var dialog = bootbox.dialog({
                                                                                                        message: '<p class="text-center mb-0"><i class="fa fa-times-circle"></i> '+m.message+'</p>'
                                                                                                    }); 
                                                                                                }
                                                                                            }
                                                                                        });                                                                    
                                                                                    }
                                                                                }
                                                                            });
                                                                        });

                                                                        $('.nick_name').select2({
                                                                            theme : 'bootstrap',
                                                                            minimumInputLength: 1,
                                                                            allowClear: true,
                                                                            placeholder: 'Enter Username In Game',
                                                                            ajax: {
                                                                                dataType: 'json',  
                                                                                method: 'POST',
                                                                                url: '<?=url('list-users/'.$team['team_id']);?>',
                                                                                delay: 400,
                                                                                data: function(params) {
                                                                                    // console.log(params);
                                                                                    return {
                                                                                        search: params.term ,
                                                                                        team : '<?=$team['team_id'];?>'
                                                                                    } 
                                                                                },
                                                                                processResults: function(data){ 
                                                                                    // console.log(data);
                                                                                    return {
                                                                                        results:  $.map(data, function (item) {
                                                                                            return {
                                                                                                text:  item.username_game+ ' - ' + item.id_game,
                                                                                                id: item.id
                                                                                            }
                                                                                        })
                                                                                    };
                                                                                }
                                                                            }
                                                                        });
                                                                    </script>
                                                                    <?php endforeach;?>
                                                                </table>
                                                            </div> 
                                                        </div>
                                                        <div class="modal-footer border-success" style="background-color: #4B3B60;">  
                                                            <a href="#" class="btn btn-default" data-dismiss="modal" onclick="$('#game<?=$team['team_id'];?>').modal('show');">Cancel</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                        <?php endif;?>
                                        <?php if (Session::check('users') == $team['leader_id']):?>
                                        <div class="modal fade" id="invite<?=$team['team_id'];?>">
                                            <div class="modal-dialog" >
                                                <div class="modal-content border-0 rounded-circle">
                                                    <form method="post" class="form-invite<?=$team['team_id'];?>">
                                                        <div class="modal-header border-success" style="background-color: #4B3B60;">
                                                            <h3 style="padding:0;margin:0;">Inviting Join <sub class="text-muted"><?=$team['team_name'];?></sub></h3>  
                                                        </div>
                                                        <div class="modal-body border-success" style="background-color: #4B3B60;">
                                                            <div class="form-group form-group--sm">
                                                                <label for="nick_name">Username In Game <abbr class="required" title="required">*</abbr></label>
                                                                <select name="nick_name" class="form-control nick_name" required></select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-success" style="background-color: #4B3B60;"> 
                                                            <button type="submit" class="btn btn-primary invite-btn">Invite</button>
                                                            <a href="#" class="btn btn-default" data-dismiss="modal" onclick="$('#game<?=$team['team_id'];?>').modal('show');">Cancel</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                        <?php endif;?>
                                        <script>
                                            $('.form-identity<?=$game_id;?>').submit(function(event) {
                                                event.stopPropagation();
                                                event.preventDefault();
                                                $('.create-team').html('Loading....');
                                                $.ajax({
                                                    url : '<?=url('update-identity/'.$game_id);?>',
                                                    method : 'POST',
                                                    data : {
                                                        id : $(this).find('.id_in_game').val(),
                                                        username : $(this).find('.username_in_game').val()
                                                    },
                                                    dataType : 'json',
                                                    success : function(m) { 
                                                        // console.log(m);
                                                        if (m.status == true) {
                                                            location.reload();
                                                        } else {
                                                            $('.create-team').html('Save');
                                                            $('.modal-body').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+ m.message +'</div>');
                                                        }
                                                    }
                                                });
                                            });
                                            $('.form-invite<?=$team['team_id'];?>').submit(function(event) {
                                                event.stopPropagation();
                                                event.preventDefault();
                                                $('.invite-btn').html('Loading....');
                                                $.ajax({
                                                    url : '<?=url('invite-join/'.$team['team_id']);?>',
                                                    method : 'POST',
                                                    data : {
                                                        data : $('.nick_name option:selected').val(),
                                                    },
                                                    dataType : 'json',
                                                    success : function(m) { 
                                                        console.log(m);
                                                        // if (m.status == true) {
                                                        //     location.reload();
                                                        // } else {
                                                        //     $('.create-team').html('Save');
                                                        //     $('.modal-body').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+ m.message +'</div>');
                                                        // }
                                                    }
                                                });
                                            });
                                        </script> 
                                        <?php endforeach; 
                                        if (count($data['content']) == 0){
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
