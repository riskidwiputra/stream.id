
<div class="site-content">
    <div class="container">
        <div class="row">
            <?php foreach ($data['content'] as $rows) { ?>
                
            <div class="col-lg-4">
                <aside class="widget widget--sidebar card widget-preview">
                    <div class="widget__title card__header">
                        <h4><?= $rows['tournament_name'] ?></h4>
					</div>            
					<div class="widget__content card__content">	
								<!-- Match Preview -->
						<div class="match-preview">		
							<div class="match-preview__match-info match-preview__match-info--header">
								<div class="image" style="height: 11rem;"><img src="<?=asset(paths('path_home_Kompetisi_0'));?><?= $rows['gambar'];?>" class="card-img-top" alt="..."></div>
                            </div>
							<div class="match-preview__content" style="height: 11rem;" >
                                <ul class="list-unstyled">
                                    <li class="media mb-2">
                                        <i class="fas fa-gamepad" style="font-size: 20px;"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 ml-3"><?= $rows['nama_kompetisi'] ?></h5>
                                        </div>
                                    </li>
                                    <li class="media mb-2">
                                        <i class="fas fa-users" style="font-size: 18px;"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 ml-3"><?= $rows['total_team'] ?> participants/ team</h5>
                                        </div>
                                    </li>
                                    <li class="media mb-3">
                                        <i class="fas fa-calendar-alt" style="font-size: 25px;"></i>
                                        <div class="media-body">
                                            <h5 class="mt-1 mb-1 ml-3"><?= $rows['date'] ?></h5>
                                        </div>
                                    </li>
                                    <li class="media mb-2">
                                        <i class="fas fa-map-marked-alt" style="font-size: 20px;"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 ml-3"><?= $rows['nama_kota'] ?></h5>
                                        </div>
                                    </li>
                                    <li class="media mb-2">
                                        <i class="fas fa-map-marker" style="font-size: 26px;"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 ml-3">Jl. Veteran No. 34</h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
							<div class="countdown__content text-center">        
								<div class="countdown-counter match-preview__action--ticket text-center" data-date="July 17, 2019 21:00:00"></div>	
									<a href="#" class="btn btn-primary-inverse text-center">View</a>
                                </div>
                                
							</div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Created at <time class="match-preview__match-time" datetime="2019-05-04 09:00">Sunday, May 4th</time> <span class="badge badge-danger float-right">ONGOiNG...</span></small>
                        </div>
                    </aside>
                </div>
            <?php } ?>
            <div class="col-lg-4">
                            <aside class="widget widget--sidebar card widget-preview">
                                    <div class="widget__title card__header">
                                     <h4>TOURNAMENT PUBG MOBILE</h4>
							        </div>
                                    
							<div class="widget__content card__content">
						
								<!-- Match Preview -->
								<div class="match-preview">
								
										<div class="match-preview__match-info match-preview__match-info--header">
											<div class="image" style="height: 11rem;"><img src="<?= BASEURL ?>/public/assets/images/esports/streamgaming.png" class="card-img-top" alt="..."></div>
                                        </div>
                                       
						
										<div class="match-preview__content" style="height: 11rem;">
                                        <ul class="list-unstyled">
                                        <li class="media mb-2">
                                        <i class="fas fa-gamepad" style="font-size: 20px;"></i>
                                            <div class="media-body">
                                            <h5 class="mt-0 mb-1 ml-3">PUBG MOBILE</h5>
                                            </div>
                                        </li>
                                        <li class="media mb-2">
                                        <i class="fas fa-users" style="font-size: 18px;"></i>
                                            <div class="media-body">
                                            <h5 class="mt-0 mb-1 ml-3">14 participants</h5>
                                            </div>
                                        </li>
                                        <li class="media mb-3">
                                        <i class="fas fa-calendar-alt" style="font-size: 25px;"></i>
                                            <div class="media-body">
                                            <h5 class="mt-1 mb-1 ml-3">January 20, 2020</h5>
                                            </div>
                                        </li>
                                        <li class="media mb-2">
                                        <i class="fas fa-map-marked-alt" style="font-size: 20px;"></i>
                                            <div class="media-body">
                                            <h5 class="mt-0 mb-1 ml-3">Medan, Sumatera Utara</h5>
                                            </div>
                                        </li>
                                        <li class="media mb-2">
                                        <i class="fas fa-map-marker" style="font-size: 26px;"></i>
                                            <div class="media-body">
                                            <h5 class="mt-0 mb-1 ml-3">Jl. Veteran No. 34</h5>
                                            </div>
                                        </li>
                                        </ul>
										</div>
				
									<div class="countdown__content text-center">
                                    
										<div class="countdown-counter match-preview__action--ticket text-center" data-date="July 17, 2019 21:00:00"></div>
									
									
										<a href="#" class="btn btn-primary-inverse text-center">View</a>
                                        </div>
								</div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Created at <time class="match-preview__match-time" datetime="2019-05-04 09:00">Sunday, May 4th</time></small>
                            </div>
                        </aside>
            </div>
			<div class="col-lg-4">
                            <aside class="widget widget--sidebar card widget-preview">
                                    <div class="widget__title card__header">
                                     <h4>TOURNAMENT PUBG MOBILE</h4>
							        </div>
                                    
							<div class="widget__content card__content">
						
								<!-- Match Preview -->
								<div class="match-preview">
								
										<div class="match-preview__match-info match-preview__match-info--header">
											<div class="image" style="height: 11rem;"><img src="<?= BASEURL ?>/public/assets/images/esports/streamgaming.png" class="card-img-top" alt="..."></div>
                                        </div>
                                       
						
										<div class="match-preview__content" style="height: 11rem;">
                                        <ul class="list-unstyled">
                                        <li class="media mb-2">
                                        <i class="fas fa-gamepad" style="font-size: 20px;"></i>
                                            <div class="media-body">
                                            <h5 class="mt-0 mb-1 ml-3">PUBG MOBILE</h5>
                                            </div>
                                        </li>
                                        <li class="media mb-2">
                                        <i class="fas fa-users" style="font-size: 18px;"></i>
                                            <div class="media-body">
                                            <h5 class="mt-0 mb-1 ml-3">14 participants</h5>
                                            </div>
                                        </li>
                                        <li class="media mb-3">
                                        <i class="fas fa-calendar-alt" style="font-size: 25px;"></i>
                                            <div class="media-body">
                                            <h5 class="mt-1 mb-1 ml-3">January 20, 2020</h5>
                                            </div>
                                        </li>
                                        <li class="media mb-2">
                                        <i class="fas fa-map-marked-alt" style="font-size: 20px;"></i>
                                            <div class="media-body">
                                            <h5 class="mt-0 mb-1 ml-3">Medan, Sumatera Utara</h5>
                                            </div>
                                        </li>
                                        <li class="media mb-2">
                                        <i class="fas fa-map-marker" style="font-size: 26px;"></i>
                                            <div class="media-body">
                                            <h5 class="mt-0 mb-1 ml-3">Jl. Veteran No. 34</h5>
                                            </div>
                                        </li>
                                        </ul>
										</div>
				
									<div class="countdown__content text-center">
                                    
										<div class="countdown-counter match-preview__action--ticket text-center" data-date="July 17, 2019 21:00:00"></div>
									
									
										<a href="#" class="btn btn-primary-inverse text-center">View</a>
                                        </div>
								</div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Created at <time class="match-preview__match-time" datetime="2019-05-04 09:00">Sunday, May 4th</time></small>
                            </div>
                        </aside>
            </div>