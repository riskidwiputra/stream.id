<div class="site-content">
	<div class="container content-alert-join">
		
		<!-- Schedule & Tickets -->
		<div class="card card--has-table">
			<div class="card__header card__header--has-btn">
				<h4>List Team Gaming</h4>
				<!-- Result Filter -->
				<ul class="team-result-filter">
					<li class="team-result-filter__item">
						<select class="form-control input-xs">
							<option>Choose Game</option>
							<option>Dota 2</option>
							<option>PUBGM</option>
							<option>Mobile Legends</option>
						</select>
					</li>
					<li class="team-result-filter__item">
						<select class="form-control input-xs">
							<option>Select The Year of Creation</option>
							<option>2019</option>
							<option>2020</option>
							<option>2021</option>
							<option>2022</option>
						</select>
					</li>
					<li class="team-result-filter__item">
						<select class="form-control input-xs">
							<option>Choose The Condition Of The Team</option>
							<option>Full</option>
							<option>1 Empty Slots</option>
							<option>2 Empty Slots</option>
							<option>3 Empty Slots</option>
							<option>4 Empty Slots</option>
							<option>5 Empty Slots</option>
						</select>
					</li>
					<li class="team-result-filter__item">
						<button type="submit" class="btn btn-primary btn-sm card-header__button">Filter a Team</button>
					</li> 
					<?php if ($data['users']['status'] == 'player'):?>
					<li class="team-result-filter__item">
						<a href="javascript:void(0);" class="btn btn-success btn-outline btn-sm" data-toggle="modal" data-target="#createteam">Create a Team</a>
					</li> 
					<?php elseif ($data['users']['status'] == 'guest'):?>
					<li class="team-result-filter__item">
						<a href="javascript:void(0);" class="btn btn-success btn-outline btn-sm features-lock">Create a Team</a>
					</li>	
					<?php endif;?>
				</ul>
				<!-- Result Filter / End -->
			</div>
			<div class="card__content">
				<div class="table-responsive">
					<table class="table table-hover team-schedule team-schedule--full">
						<thead>
							<tr>
								<th class="team-schedule__date">Registered Date</th>
								<th class="team-schedule__versus">Team Name</th>
								<th class="team-schedule__versus">Team Captain</th>
								<th class="team-schedule__compet">Team Description</th>
								<th class="team-schedule__venue">Venue</th>
								<th class="team-schedule__prize">Slot</th>
								<?php if (Session::check('users')):?>
								<th class="team-schedule__tickets">Action</th>
								<?php endif;?>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data['content'] as $row):
								$game = $this->db->table('game_list')->where('id_game_list', $row['game_id']);
								$captain = $this->db->table('users')->where('user_id', $row['leader_id']);
								$captain = $captain['username'];
								$slot = $this->db->table('game_list')->where('id_game_list', $row['game_id']);
								$slot_total = $slot['player_on_team']+$slot['substitute_player'];
								$slot_space = $this->db->table('team_player')->where('team_id', $row['team_id']);
								$slot_space2 = explode(',', $slot_space['player_id']);
								$slot_space3 = explode(',', $slot_space['substitute_id']); 
								if (empty($slot_space['substitute_id'])) {
									$slot_space3 = []; 
								}
								$slot_space = count($slot_space2)+count($slot_space3);  
								$request_join = [
									'team_id'	=> $row['team_id'],
									'users_id' 	=> Session::get('users'),
									'status'	=> 1
								];
								$request_join = $this->db->table('team_request')->where($request_join);
							?>
							<tr>
								<td class="team-schedule__date"><?=date('d - M - Y', strtotime($row['created_at']));?></td>
								<td class="team-schedule__versus">
									<div class="team-meta">
										<figure class="team-meta__logo">
											<img src="<?=path('path_home_TeamLogo').$row['team_logo'];?>" alt="">
										</figure>
										<div class="team-meta__info">
											<h6 class="team-meta__name"><?=$row['team_name'];?></h6>
											<span class="team-meta__place"><?=$game['name'];?></span>
										</div>
									</div>
								</td>
								<th class="team-schedule__versus"><?=$captain;?></th>
								<td class="team-schedule__compet"><?=$row['team_description'];?></td>
								<td class="team-schedule__venue highlight"><?=$row['venue'];?></td>
								<td class="team-schedule__prize"><?=$slot_space;?> out of <?=$slot_total;?> Players</td>
								<?php if (Session::check('users')):?>
								<td class="team-schedule__tickets">
									<?php if (in_array( Session::get('users') , $slot_space2 ) OR in_array( Session::get('users') , $slot_space3 )):?>
									<button class="btn btn-xs btn-default-alt btn-block disabled">Joined</button>	 
									<?php elseif ($slot_space == $slot_total):?>
									<button class="btn btn-xs btn-default-alt btn-block disabled">Full</button>	
									<?php elseif ($request_join != false):?> 
									<button class="btn btn-xs btn-default-alt btn-block disabled">Waiting Confirm</button>	
									<?php else:?>
									<button class="btn btn-xs btn-default-alt btn-block join" data-id="<?=$row['team_id'];?>">Join</button>
									<?php endif;?>
								</td>
								<?php endif;?>
							</tr>
							<?php endforeach; ?> 
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- Schedule & Tickets / End -->
		
		<!-- Team Pagination -->
		<nav class="post-pagination" aria-label="Team navigation">
			<ul class="pagination pagination--circle justify-content-center">
				<?php
				$total_no_of_records = $data['content_count'];
				$records_per_page = $data['records_per_page'];
				$page_no = $data['page_no'];
				$total_no_of_pages = ceil($total_no_of_records/$records_per_page);
				$current_page = $page_no;
				if($current_page != 1) :
					$previous = $current_page-1;  
				?>
				<li class="page-item"><a class="page-link" href="<?=url('team/page/'.$previous);?>"><i class="fa fa-angle-left"></i></a></li>
				<?php else:?>
				<li class="page-item"><a class="page-link" href="javascript:void(0);" disabled><i class="fa fa-angle-left"></i></a></li>
				<?php endif; ?>
				<?php for($i=1; $i<=$total_no_of_pages; $i++) :
					if($i==$page_no) :?> 
				<li class="page-item active"><a class="page-link" href="<?=url('team/page/'.$i);?>"><?=$i;?></a></li>
					<?php else :?> 
				<li class="page-item"><a class="page-link" href="<?=url('team/page/'.$i);?>"><?=$i;?></a></li>
					<?php endif;?>  
				<?php endfor;?> 
				<?php if($current_page!=$total_no_of_pages) :
					$next = $current_page+1; 
				?>
				<li class="page-item"><a class="page-link" href="<?=url('team/page/'.$next);?>"><i class="fa fa-angle-right"></i></a></li>
				<?php else:?>
				<li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="fa fa-angle-right"></i></a></li>
				<?php endif;?>
			</ul>
		</nav>
		<!-- Team Pagination / End -->

		<div class="modal fade" id="createteam" tabindex="-1" role="dialog" aria-labelledby="createteamLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content border-0 rounded-circle">
					<form class="create-team" method="post"> 
						<div class="modal-header border-success" style="background-color: #4B3B60;">
							<h1 style="padding:0;margin:0;">Create A Team</h1>
						</div>	
						<div class="modal-body border-success" style="background-color: #4B3B60;">

							<div class="form-group form-group--sm">
								<label for="team_name">Team Name <abbr class="required" title="required">*</abbr></label>
								<input type="text" name="team_name" class="form-control team_name" placeholder="Enter your Team name..." required>
							</div>

							<div class="form-group form-group--sm">
								<label for="game">Choose Game <abbr class="required" title="required">*</abbr></label>
								<select class="form-control game" required>
									<?php foreach ($data['game-list'] as $game_list):?>
									<option value="<?=$game_list['id_game_list'];?>"><?=$game_list['name'];?></option>
									<?php endforeach;?> 
								</select>
							</div>

							<div class="form-group form-group--sm">
								<label for="team_description">Team Description <abbr class="required" title="required">*</abbr></label>
								<textarea name="team_description" class="form-control team_description" placeholder="Enter your Team description..." required></textarea>
							</div>

							<div class="form-group form-group--sm">
								<label for="venue">Venue <abbr class="required" title="required">*</abbr></label>
								<input type="text" name="venue" class="form-control venue" placeholder="Enter your Venue..." required>
							</div>

							<div class="form-group form-group--sm">
								<label for="team_logo">Team Logo <abbr class="required" title="required">*</abbr></label>
								<input type="file" name="team_logo" class="d-block" id="team_logo" required>
							</div>

						</div>
						<div class="modal-footer border-success" style="background-color: #4B3B60;"> 
							<button type="submit" class="btn btn-primary btn-create">Create</button>
							<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>
<script>
	$('.create-team').submit(function(event) {
		$('.btn-create').html('Please wait....'); 
		event.stopPropagation();
        event.preventDefault(); 
        var form_data = new FormData;
        form_data.append('team_name', $(this).find('.team_name').val());
        form_data.append('game', $(this).find('.game option:selected').val());
        form_data.append('team_description', $(this).find('.team_description').val());
        form_data.append('venue', $(this).find('.venue').val());
        form_data.append('logo', document.getElementById("team_logo").files[0]);
        $.ajax({
        	url : '<?=url('create-team');?>',
        	method : 'POST',
        	data : form_data,
        	dataType : 'json',
        	contentType: false,
        	cache: false,
        	processData: false,
        	dateType : 'json',
        	success : function(m){
        		if (m.status == true) {
        			location.reload();
        		} else {
        			$('.btn-create').html('Create');  
        			var dialog = bootbox.dialog({
                        message: '<p class="text-center mb-0"><i class="fa fa-times-circle"></i> '+m.message+'</p>'
                    }); 
        		}
        	}
        });
	});

	$('.join').click(function() { 		 
		var t = $(this);
		$.ajax({
			url : '<?=url('join-team/');?>' + $(this).data('id'),
			method : 'POST',
			dataType : 'json',
			success : function(m){ 
				if (m.status == true) {
					t.html('Waiting Confirm');
					t.addClass('disabled');
					t.removeAttr('data-id');
					t.removeClass('join');
				} else { 
					var dialog = bootbox.dialog({
                        message: '<p class="text-center mb-0"><i class="fa fa-times-circle"></i> '+m.message+'</p>'
                    }); 
				}
			}
		});
	});
</script>