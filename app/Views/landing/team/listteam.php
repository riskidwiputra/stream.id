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
                            <li class="team-result-filter__item">
                                <a href="#" class="btn btn-success btn-outline btn-sm" data-toggle="modal" data-target="#createteam">Create a Team</a>
							</li>
						</ul>
						<!-- Result Filter / End -->
					</div>
					<div class="card__content">
						<div class="table-responsive">
							<table class="table table-hover team-schedule team-schedule--full">
								<thead>
									<tr>
										<th class="team-schedule__date">Date of Manufacture</th>
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
                                                <div class="modal-header border-success" style="background-color: #4B3B60;">
                                                	<h1>Create A Team</h1>
                                                </div>	
                                                <div class="modal-body border-success" style="background-color: #4B3B60;">
													<div class="form-group form-group--sm">
														<label for="billing_address_1">Team Name <abbr class="required" title="required">*</abbr></label>
														<input type="text" name="billing_address_1" id="billing_address_1" class="form-control" placeholder="Enter your Team name...">
													</div>
													
													<div class="form-group form-group--sm">
														<label for="billing_address_1">Choose Game <abbr class="required" title="required">*</abbr></label>
														<select class="form-control">
															<option>Mobile Legends</option>
															<option>PUBG Mobile</option>
															<option>Dota</option>
														</select>
													</div>
													<div class="form-group form-group--sm">
														<label for="billing_address_1">Team Description <abbr class="required" title="required">*</abbr></label>
														<input type="text" name="billing_address_1" id="billing_address_1" class="form-control" placeholder="Enter your Team description...">
													</div>
													<div class="form-group form-group--sm">
														<label for="billing_address_1">Venue <abbr class="required" title="required">*</abbr></label>
														<input type="text" name="billing_address_1" id="billing_address_1" class="form-control" placeholder="Enter your Venue...">
													</div>
                                                </div>
                                                <div class="modal-footer border-success" style="background-color: #4B3B60;">
                                                    <a href="#" class="btn btn-info btn-outline">Join / Create Team</a>
                                                    <a href="#" class="btn btn-primary">Save</a>
                                                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

			</div>
		</div>