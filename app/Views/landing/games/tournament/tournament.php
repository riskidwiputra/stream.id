
<div class="site-content">
    <div class="container">
        <div class="row">
            <?php foreach ($data['content'] as $rows) { ?>
                
            <div class="col-lg-4">
                <aside class="widget widget--sidebar card widget-preview">
                    <div class="widget__title card__header" style="height: 5rem;">
                        <h4><?= $rows['tournament_name'] ?></h4>
					</div>            
					<div class="widget__content card__content">	
								<!-- Match Preview --> 
						<div class="match-preview">		
							<div class="match-preview__match-info match-preview__match-info--header">
								<div class="image" ><img src="<?=asset(paths('path_home_Kompetisi_0'));?><?= $rows['gambar'];?>" style="height: 11rem;" class="card-img-top" alt="..."></div>
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
                            <?php $waktu = date("F d Y H:i",strtotime($rows['date'])); ?>
                            
								<div class="countdown-counter match-preview__action--ticket text-center" data-date="<?= $waktu ?>"></div>	
                                    <?php if(date('d-m-Y H:i') >= $rows['date']){ ?>
                                        <?php if ($rows['status'] == "pending") {?>
                                            <a  class="btn btn-primary-inverse text-center" data-toggle="tooltip" data-placement="top" title="ONCOMING" ">View</a>
                                        <?php } else if ($rows['status'] == "starting"){?>
                                            <a href="<?= BASEURL ?>/tournament/<?= $rows['url'] ?>"class="btn btn-primary-inverse text-center">View</a>
                                        <?php }else if ($rows['status'] == "complete") {?>
                                            <a href="<?= BASEURL ?>/tournament/<?= $rows['url'] ?>"class="btn btn-primary-inverse text-center">View</a>
                                        <?php } ?>
                                
                                    <?php }else{?>  
                                    <a href="#" class="btn btn-primary-inverse text-center" data-toggle="tooltip" data-placement="top" title="ONCOMING">View</a>
                                    <?php } ?>
                                </div>
                    
							</div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Created at <time class="match-preview__match-time" datetime="2019-05-04 09:00"><?= $rows['created_at'] ?></time> <span class="badge <?php if ($rows['status'] == "pending") {?> badge-danger <?php } else if ($rows['status'] == "starting"){?>badge-warning <?php }else if ($rows['status'] == "complete") {?>badge-success <?php } ?>  float-right" style="font-size:15px; line-height:100%; margin-top:3px;"><?php if ($rows['status'] == "pending") {?> ONCOMING <?php } else if ($rows['status'] == "starting"){?> ONGOING <?php }else if ($rows['status'] == "complete") {?> FINISH <?php } ?>  </span></small>
                        </div>
                    </aside>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
