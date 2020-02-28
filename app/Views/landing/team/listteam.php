<div class="site-content">
	<div class="container">
		
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
								<th class="team-schedule__tickets">Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="team-schedule__date">06 - 12 - 2018</td>
								<td class="team-schedule__versus">
									<div class="team-meta">
										<figure class="team-meta__logo">
											<img src="<?=asset('assets/images/samples/logos/lucky_clovers_shield.png"');?>" alt="">
										</figure>
										<div class="team-meta__info">
											<h6 class="team-meta__name">Lucky Clovers</h6>
											<span class="team-meta__place">Dota 2</span>
										</div>
									</div>
								</td>
								<th class="team-schedule__versus">Zoro</th>
								<td class="team-schedule__compet">We are the best</td>
								<td class="team-schedule__venue highlight">Jakarta</td>
								<td class="team-schedule__prize">4 out of 5 Players</td>
								<td class="team-schedule__tickets">
									<a href="#" class="btn btn-xs btn-default-alt btn-block ">
										Join
									</a>
								</td>
							</tr>
							<tr>
								<td class="team-schedule__date">06 - 12 - 2019</td>
								<td class="team-schedule__versus">
									<div class="team-meta">
										<figure class="team-meta__logo">
											<img src="<?=asset('assets/images/samples/logos/lucky_clovers_shield.png"');?>" alt="">
										</figure>
										<div class="team-meta__info">
											<h6 class="team-meta__name">E-Gaming</h6>
											<span class="team-meta__place">PUBGM</span>
										</div>
									</div>
								</td>
								<th class="team-schedule__versus">Jaka</th>
								<td class="team-schedule__compet">I hate you</td>
								<td class="team-schedule__venue highlight">Medan</td>
								<td class="team-schedule__prize">4 out of 4 Players</td>
								<td class="team-schedule__tickets">
									<a href="#" class="btn btn-xs btn-default-alt btn-block disabled">
										Full
									</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- Schedule & Tickets / End -->
		
		<!-- Team Pagination -->
		<nav class="post-pagination" aria-label="Team navigation">
			<ul class="pagination pagination--circle justify-content-center">
				<li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
				<li class="page-item active"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item"><span class="page-link">...</span></li>
				<li class="page-item"><a class="page-link" href="#">9</a></li>
				<li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
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
								<input type="text" name="team_name" class="form-control team_name" placeholder="Enter your Team name...">
							</div>

							<div class="form-group form-group--sm">
								<label for="game">Choose Game <abbr class="required" title="required">*</abbr></label>
								<select class="form-control game">
									<?php foreach ($data['game-list'] as $game_list):?>
									<option value="<?=$game_list['id_game_list'];?>"><?=$game_list['name'];?></option>
									<?php endforeach;?> 
								</select>
							</div>

							<div class="form-group form-group--sm">
								<label for="team_description">Team Description <abbr class="required" title="required">*</abbr></label>
								<textarea name="team_description" class="form-control team_description" placeholder="Enter your Team description..."></textarea>
							</div>

							<div class="form-group form-group--sm">
								<label for="venue">Venue <abbr class="required" title="required">*</abbr></label>
								<input type="text" name="venue" class="form-control venue" placeholder="Enter your Venue...">
							</div>

							<div class="form-group form-group--sm">
								<label for="team_logo">Team Logo <abbr class="required" title="required">*</abbr></label>
								<input type="file" name="team_logo" class="d-block" id="team_logo">
							</div>

						</div>
						<div class="modal-footer border-success" style="background-color: #4B3B60;"> 
							<button type="submit" class="btn btn-primary">Create</button>
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
		event.stopPropagation();
        event.preventDefault(); 
        form_data.append('team_name', $(this).find('.team_name').val());
        form_data.append('game', $(this).find('.game option:selected').val());
        form_data.append('team_description', $(this).find('.team_description').val());
        form_data.append('venue', $(this).find('.venue').val());
        form_data.append('logo', document.getElementById("team_logo").files[0]);
        $.ajax({
        	url : '<?=url('create-team');?>',
        	method : 'POST',
        	data : form_data,
        	contentType: false,
        	cache: false,
        	processData: false,
        	dateType : 'json',
        	success : function(m){
        		console.log(m);
        	}
        });
	});
</script>