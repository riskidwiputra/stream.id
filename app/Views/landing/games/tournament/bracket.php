<!-- Content
		================================================== -->
        <div class="site-content">
    <div class="container">
        
        <div class="card card--clean">
					<header class="card__header">
						<h4>Tournament Bracket</h4>
					</header>
					<div class="card__content">
		
						<!-- Brackets -->
						<div class="tournament-bracket">
                        <?php if ($data['round32']) { ?>

							<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">32th finals</h6>
								<ul class="tournament-bracket__list">
                                <?php foreach ($data['round32'] as $rows) { ?>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team<?php if($rows['team1'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?> ">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>
														data-nama="<?= $rows['team_1'] ?>"
														data-nama_kota="<?= $rows['nama_kota_1'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" id="image" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_1'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_1'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score1'])){echo " -- ";}else{ echo $rows['score1']; } ?></span>
														</td>
													</tr>
													<tr class="tournament-bracket__team<?php if($rows['team2'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?>  ">
														<td class="tournament-bracket__inner">
														<a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>"
														data-nama="<?= $rows['team_2'] ?>"
														data-nama_kota="<?= $rows['nama_kota_2'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" id="image" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_2'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_2'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score2'])){echo " -- ";}else{ echo $rows['score2']; } ?></span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
								<?php } ?>	

								</ul>
							</div>
                            <?php }else{} ?> 
                            <?php if ($data['round16'] ) { ?> 
							
							<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">16th finals</h6>
								<ul class="tournament-bracket__list">
								<?php $field16 = 8 - $data['round16_not'] ?>
								<?php if($field16 != 8){ ?>

									<?php foreach ($data['round16'] as $rows) { ?>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team <?php if($rows['id_team1'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?> ">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>"
														data-nama="<?= $rows['team_1'] ?>"
														data-nama_kota="<?= $rows['nama_kota_1'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_1'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_1'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score1'])){echo " -- ";}else{ echo $rows['score1']; } ?></span>
														</td>
													</tr>
													<tr class="tournament-bracket__team <?php if($rows['id_team2'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?> ">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>"
														data-nama="<?= $rows['team_2'] ?>"
														data-nama_kota="<?= $rows['nama_kota_2'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_2'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_2'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score2'])){echo " -- ";}else{ echo $rows['score2']; } ?></span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
                                    <?php } ?>

									<?php for ($i=0; $i < $field16; $i++) { ?>
										<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team  ">
														<td class="tournament-bracket__inner">
                                                        <figure class="tournament-bracket__team-thumb">
																<img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">?</h6>
																<span class="tournament-bracket__team-desc text-truncate">?</a></span>
															</div>
														</td>
														<td class="tournament-bracket__score"><
															<span class="tournament-bracket__number"> -- </span>
														</td>
													</tr>
													<tr class="tournament-bracket__team">
														<td class="tournament-bracket__inner">
														<figure class="tournament-bracket__team-thumb">
																<img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate">?</h6>
																<span class="tournament-bracket__team-desc text-truncate">?</a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"> -- </span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
									<?php } ?>
									
								<?php }else{ ?> 
                                    <?php foreach ($data['round16'] as $rows) { ?>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team <?php if($rows['id_team1'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?> ">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>"
														data-nama="<?= $rows['team_1'] ?>"
														data-nama_kota="<?= $rows['nama_kota_1'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_1'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_1'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score1'])){echo " -- ";}else{ echo $rows['score1']; } ?></span>
														</td>
													</tr>
													<tr class="tournament-bracket__team <?php if($rows['id_team2'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?> ">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>"
														data-nama="<?= $rows['team_2'] ?>"
														data-nama_kota="<?= $rows['nama_kota_2'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_2'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_2'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score2'])){echo " -- ";}else{ echo $rows['score2']; } ?></span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
                                    <?php } ?>
								<?php } ?>
								</ul>
							</div>
							<?php }else if ($data['round16_1']){ ?>
								<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">16th finals</h6>
								<ul class="tournament-bracket__list">
                                    <?php foreach ($data['round16_1'] as $rows) { ?>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team <?php if($rows['team1'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?> ">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>"
														data-nama="<?= $rows['team_1'] ?>"
														data-nama_kota="<?= $rows['nama_kota_1'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_1'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_1'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score1'])){echo " -- ";}else{ echo $rows['score1']; } ?></span>
														</td>
													</tr>
													<tr class="tournament-bracket__team <?php if($rows['team2'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?> ">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>"
														data-nama="<?= $rows['team_2'] ?>"
														data-nama_kota="<?= $rows['nama_kota_2'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_2'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_2'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score1'])){echo " -- ";}else{ echo $rows['score1']; } ?></span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
                                    <?php } ?>

								</ul>
							</div>
							<?php }else{ ?>
							<?php if($data['round16_empty']){ ?>
								<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">16th finals</h6>
								<ul class="tournament-bracket__list">
								<?php foreach ($data['round16_empty'] as $rows) { ?>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team ">
														<td class="tournament-bracket__inner">
                                                        <figure class="tournament-bracket__team-thumb">
																<img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"> ? </h6>
																<span class="tournament-bracket__team-desc text-truncate"> ? </a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"> -- </span>
														</td>
													</tr>
													<tr class="tournament-bracket__team  ">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"> ? </h6>
																<span class="tournament-bracket__team-desc text-truncate"> ? </a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"> -- </span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
								<?php } ?>
								</ul>
							</div>
							<?php }else{} ?>
							<?php } ?>
                            <?php if ($data['qtf']) { ?>
							<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">Quarterfinals</h6>
								<ul class="tournament-bracket__list">
								<?php $fieldqtf = 4 - $data['qtf_not'] ?>
								<?php if($fieldqtf != 4){ ?>

								<?php foreach ($data['qtf'] as $rows) { ?>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team <?php if($rows['id_team1'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?>   ">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>"
														data-nama="<?= $rows['team_1'] ?>"
														data-nama_kota="<?= $rows['nama_kota_1'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_1'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_1'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score1'])){echo " -- ";}else{ echo $rows['score1']; } ?></span>
														</td>
													</tr>
													<tr class="tournament-bracket__team <?php if($rows['id_team2'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?>   ">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>"
														data-nama="<?= $rows['team_2'] ?>"
														data-nama_kota="<?= $rows['nama_kota_2'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_2'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_2'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score2'])){echo " -- ";}else{ echo $rows['score2']; } ?></span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
                                    </li>
                                    <?php } ?>

									<?php for ($i=0; $i < $fieldqtf ; $i++) {  ?>
										<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team   ">
														<td class="tournament-bracket__inner">
                                                        <figure class="tournament-bracket__team-thumb">
																<img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"> ? </h6>
																<span class="tournament-bracket__team-desc text-truncate"> ? </a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"> -- </span>
														</td>
													</tr>
													<tr class="tournament-bracket__team   ">
														<td class="tournament-bracket__inner">
														<figure class="tournament-bracket__team-thumb">
																<img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"> ? </h6>
																<span class="tournament-bracket__team-desc text-truncate"> ? </a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"> -- </span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
                                    </li>
									<?php } ?>

								<?php }else{ ?>
                                <?php foreach ($data['qtf'] as $rows) { ?>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team <?php if($rows['id_team1'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?>   ">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>"
														data-nama="<?= $rows['team_1'] ?>"
														data-nama_kota="<?= $rows['nama_kota_1'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_1'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_1'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score1'])){echo " -- ";}else{ echo $rows['score1']; } ?></span>
														</td>
													</tr>
													<tr class="tournament-bracket__team <?php if($rows['id_team2'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?>   ">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>"
														data-nama="<?= $rows['team_2'] ?>"
														data-nama_kota="<?= $rows['nama_kota_2'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_2'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_2'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score2'])){echo " -- ";}else{ echo $rows['score2']; } ?></span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
                                    </li>
                                    <?php } ?>
								<?php } ?>
								</ul>
							</div>
							<?php }else if($data['qtf_1']){?>
								<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">Quarterfinals</h6>
								<ul class="tournament-bracket__list">
                                <?php foreach ($data['qtf_1'] as $rows) { ?>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team <?php if($rows['team1'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?>   ">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>"
														data-nama="<?= $rows['team_1'] ?>"
														data-nama_kota="<?= $rows['nama_kota_1'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_1'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_1'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score1'])){echo " -- ";}else{ echo $rows['score1']; } ?></span>
														</td>
													</tr>
													<tr class="tournament-bracket__team <?php if($rows['team2'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?>   ">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>"
														data-nama="<?= $rows['team_2'] ?>"
														data-nama_kota="<?= $rows['nama_kota_2'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_2'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_2'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score2'])){echo " -- ";}else{ echo $rows['score2']; } ?></span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
                                    </li>
                                    <?php } ?>
								</ul>
							</div>
                            <?php }else{ ?>
							<?php if($data['qtf_empty']){ ?>
								<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">Quarter finals</h6>
								<ul class="tournament-bracket__list">
								<?php foreach ($data['qtf_empty'] as $rows) { ?>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team ">
														<td class="tournament-bracket__inner">
                                                        <figure class="tournament-bracket__team-thumb">
																<img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"> ? </h6>
																<span class="tournament-bracket__team-desc text-truncate"> ? </a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"> -- </span>
														</td>
													</tr>
													<tr class="tournament-bracket__team  ">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"> ? </h6>
																<span class="tournament-bracket__team-desc text-truncate"> ? </a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"> -- </span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
								<?php } ?>
								</ul>
							</div>
							<?php }else{} ?>
							<?php } ?>
                            <?php if ($data['smf']) { ?>
							<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">Semifinals</h6>
								<ul class="tournament-bracket__list">
								<?php $fieldsmf = 2 - $data['smf_not'] ?>
								<?php if($fieldsmf != 2){ ?>

									<?php foreach ($data['smf'] as $rows) { ?>
                                <li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team<?php if($rows['id_team1'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?>">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>"
														data-nama="<?= $rows['team_1'] ?>"
														data-nama_kota="<?= $rows['nama_kota_1'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_1'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_1'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score1'])){echo " -- ";}else{ echo $rows['score1']; } ?></span>
														</td>
													</tr>
													<tr class="tournament-bracket__team<?php if($rows['id_team2'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?>">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>"
														data-nama="<?= $rows['team_2'] ?>"
														data-nama_kota="<?= $rows['nama_kota_2'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_2'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_2'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score2'])){echo " -- ";}else{ echo $rows['score2']; } ?></span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
                                    </li>
									<?php } ?>
									<?php for ($i=0; $i < $fieldsmf ; $i++) { ?>
									
									
                                <li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team">
														<td class="tournament-bracket__inner">
														<figure class="tournament-bracket__team-thumb">
																<img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"> ? </h6>
																<span class="tournament-bracket__team-desc text-truncate"> ? </span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"> -- </span>
														</td>
													</tr>
													<tr class="tournament-bracket__team">
														<td class="tournament-bracket__inner">
														<figure class="tournament-bracket__team-thumb">
																<img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"> ? </h6>
																<span class="tournament-bracket__team-desc text-truncate"> ?</span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"> -- </span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
                                    </li>
									<?php } ?>
						

								
								<?php }else{ ?> 
                                <?php foreach ($data['smf'] as $rows) { ?>
                                <li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team<?php if($rows['id_team1'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?>">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>"
														data-nama="<?= $rows['team_1'] ?>"
														data-nama_kota="<?= $rows['nama_kota_1'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_1'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_1'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score1'])){echo " -- ";}else{ echo $rows['score1']; } ?></span>
														</td>
													</tr>
													<tr class="tournament-bracket__team<?php if($rows['id_team2'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?>">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>"
														data-nama="<?= $rows['team_2'] ?>"
														data-nama_kota="<?= $rows['nama_kota_2'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_2'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_2'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score2'])){echo " -- ";}else{ echo $rows['score2']; } ?></span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
                                    </li>
                                <?php } ?>
							<?php } ?>
								</ul>
                            </div>
							<?php }else if ($data['smf_1']) { ?>
								<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">Semifinals</h6>
								<ul class="tournament-bracket__list">
                                <?php foreach ($data['smf_1'] as $rows) { ?>
                                <li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team<?php if($rows['team1'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?>">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>"
														data-nama="<?= $rows['team_1'] ?>"
														data-nama_kota="<?= $rows['nama_kota_1'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_1'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_1'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score1'])){echo " -- ";}else{ echo $rows['score1']; } ?></span>
														</td>
													</tr>
													<tr class="tournament-bracket__team<?php if($rows['team2'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?>">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>"
														data-nama="<?= $rows['team_2'] ?>"
														data-nama_kota="<?= $rows['nama_kota_2'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_2'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_2'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score1'])){echo " -- ";}else{ echo $rows['score1']; } ?></span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
                                    </li>

                                <?php } ?>
								</ul>
                            </div>
                            <?php }else{ ?>
							<?php if($data['smf_empty']){ ?>
								<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">Semifinals</h6>
								<ul class="tournament-bracket__list">
								<?php foreach ($data['smf_empty'] as $rows) { ?>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team ">
														<td class="tournament-bracket__inner">
                                                        <figure class="tournament-bracket__team-thumb">
																<img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"> ? </h6>
																<span class="tournament-bracket__team-desc text-truncate"> ? </a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"> -- </span>
														</td>
													</tr>
													<tr class="tournament-bracket__team  ">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"> ? </h6>
																<span class="tournament-bracket__team-desc text-truncate"> ? </a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"> -- </span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
								<?php } ?>
								</ul>
							</div>
							<?php }else{} ?>
							<?php } ?>
							
                            <?php if ($data['final']) { ?>
                            <div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">Finals</h6>
								<ul class="tournament-bracket__list">

                                <?php foreach ($data['final'] as $rows) { ?>
                                <li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team<?php if($rows['id_team1'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?>">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>"
														data-nama="<?= $rows['team_1'] ?>"
														data-nama_kota="<?= $rows['nama_kota_1'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_1'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_1'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score1'])){echo " -- ";}else{ echo $rows['score1']; } ?></span>
														</td>
													</tr>
													<tr class="tournament-bracket__team<?php if($rows['id_team2'] == $rows['winner']){ ?> tournament-bracket__team--winner<?php }else{}?>">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>"
														data-nama="<?= $rows['team_2'] ?>"
														data-nama_kota="<?= $rows['nama_kota_2'] ?>"
														><figure class="tournament-bracket__team-thumb">
																<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_2']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_2'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_2'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"><?php if(empty($rows['score1'])){echo " -- ";}else{ echo $rows['score1']; } ?></span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
                                    </li>
                                <?php } ?>
                                    
								</ul>
                            </div>
							<?php }else{ ?>
							<?php if($data['final_empty']){ ?>
								<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">Semifinals</h6>
								<ul class="tournament-bracket__list">
								<?php foreach ($data['final_empty'] as $rows) { ?>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team ">
														<td class="tournament-bracket__inner">
                                                        <figure class="tournament-bracket__team-thumb">
																<img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"> ? </h6>
																<span class="tournament-bracket__team-desc text-truncate"> ? </a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"> -- </span>
														</td>
													</tr>
													<tr class="tournament-bracket__team  ">
														<td class="tournament-bracket__inner">
															<figure class="tournament-bracket__team-thumb">
																<img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
																<h6 class="tournament-bracket__team-name text-truncate"> ? </h6>
																<span class="tournament-bracket__team-desc text-truncate"> ? </a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<span class="tournament-bracket__number"> -- </span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</li>
								<?php } ?>
								</ul>
							</div>
							<?php }else{} ?>
							<?php } ?>
							<?php if($data['winner']){ ?>
                            <div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">Champion</h6>
								<ul class="tournament-bracket__list">
								<?php foreach ($data['winner'] as $rows) { ?>
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team  tournament-bracket__team--champ">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail"
														data-logo="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>"
														data-nama="<?= $rows['team_1'] ?>"
														data-nama_kota="<?= $rows['nama_kota_1'] ?>" 
														><figure class="tournament-bracket__team-thumb">
														<img src="<?= asset(paths('path_home_LogoTeam_0')).$rows['logo_1']; ?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
                                                            <h6 class="tournament-bracket__team-name text-truncate"><?= $rows['team_1'] ?></h6>
																<span class="tournament-bracket__team-desc text-truncate"><?= $rows['nama_kota_1'] ?></a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<div class="tournament-bracket__number tournament-bracket__champ-icon">
																<svg role="img" class="df-icon df-icon--trophy">
																	<use xlink:href="<?= BASEURL ?>/public/assets/images/esports/icons-esports.svg#trophy"/>
																</svg></a>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
                                    </li>
								<?php } ?>

                                    </ul>
                            </div>
							<?php }else{?>
								<div class="tournament-bracket__round">
								<h6 class="tournament-bracket__round-title d-block d-lg-none d-xl-none">Champion</h6>
								<ul class="tournament-bracket__list">
									<li class="tournament-bracket__item">
										<div class="tournament-bracket__match" tabindex="0">
											<table class="tournament-bracket__table">
												<tbody class="tournament-bracket__content">
													<tr class="tournament-bracket__team  tournament-bracket__team--champ">
														<td class="tournament-bracket__inner">
                                                        <a href=""  data-toggle="modal" data-target="#staticBackdrop" class="detail" 
														><figure class="tournament-bracket__team-thumb">
														<img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" alt="">
															</figure>
															<div class="tournament-bracket__team-info text-truncate">
                                                            <h6 class="tournament-bracket__team-name text-truncate">?</h6>
																<span class="tournament-bracket__team-desc text-truncate">?</a></span>
															</div>
														</td>
														<td class="tournament-bracket__score">
															<div class="tournament-bracket__number tournament-bracket__champ-icon">
																<svg role="img" class="df-icon df-icon--trophy">
																	<use xlink:href="<?= BASEURL ?>/public/assets/images/esports/icons-esports.svg#trophy"/>
																</svg></a>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
                                    </li>

                                    </ul>
                            </div>
							<?php } ?>
                        </div>
                        
						<!-- Brackets -->
		
					</div>
				</div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content bg-dark">
			<div class="modal-header border-success">
				<p><h4 class="modal-title text-uppercase" id="nama_team"></h4></p>
			</div>
			<div class="modal-body border-success">
				<div class="row">
					<div class="col lg-6 text-center">
					<div class="image"><img src="<?=asset('assets/images/esports/logos/alchemists-86x98.png');?>" id="image_preview"  style="height: 10rem; width:12rem; padding:10px 0px; margin-top:-11px;" class="card-img-top" alt="..."></div>
					</div>
					<div class="col lg-6">
					<h2 >Nama Kota :</h2>
					<h3 style="font-size:25px;" id="nama_kota"></h3>
				</div>
			</div>
			<div class="modal-footer border-success">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- Content / End -->