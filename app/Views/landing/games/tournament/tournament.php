
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
								<div class="image" ><img src="<?= cdn(paths('backup_competition')).$rows['gambar']; ?>" style="height: 11rem;" class="card-img-top" alt="..."></div>
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
                                            <h5 class="mt-0 mb-1 ml-3"><?= $rows['alamat'] ?></h5>
                                        </div>
                                    </li>
                                </ul>
                                
                            </div>
							<div class="countdown__content text-center">        
                            <?php $waktu = date("F d Y H:i",strtotime($rows['date'])); ?>

								<div class="countdown-counter match-preview__action--ticket text-center" data-date="<?= $waktu ?>"></div>	
                                    <?php if(strtotime(date('d-m-Y H:i')) >= strtotime($rows['date'])){ ?>
                                        <?php if ($rows['status'] == "pending") {?>
                                            <a  class="btn btn-primary-inverse text-center mr-2" data-toggle="tooltip" data-placement="top" title="ONCOMING">View</a>
                                            <a class="btn btn-info btn-outline text-center text-white" data-target="#modaljoin" data-toggle="modal" data-placement="top" title="ONCOMING">Join</a>
                                        <?php } else if ($rows['status'] == "starting"){?>
                                            <a href="<?= BASEURL ?>/tournament/<?= $rows['url'] ?>"class="btn btn-primary-inverse text-center mr-2">View</a>
                                            <a class="btn btn-info btn-outline text-center text-white" data-target="#modaljoin" data-toggle="modal" data-placement="top" title="ONCOMING">Join</a>
                                        <?php }else if ($rows['status'] == "complete") {?>
                                            <a href="<?= BASEURL ?>/tournament/<?= $rows['url'] ?>"class="btn btn-primary-inverse text-center mr-2">View</a>
                                            <a class="btn btn-info btn-outline text-center text-white" data-target="#modaljoin" data-toggle="modal" data-placement="top" title="ONCOMING">Join</a>
                                        <?php } ?>
                                
                                    <?php }else{?>  
                                    <a class="btn btn-primary-inverse text-center mr-2" data-toggle="tooltip" data-placement="top" title="ONCOMING">View</a>
                                    <a class="btn btn-info btn-outline text-center text-white" data-target="#modaljoin" data-toggle="modal" data-placement="top" title="ONCOMING">Join</a>
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
        <div class="modal fade" id="modaljoin" tabindex="-1" role="dialog" aria-labelledby="modaljoinLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content border-0 rounded-circle">
                    <div class="modal-header border-success" style="background-color: #4B3B60;">
                        <h1>Create A Team</h1>
                    </div>	
                    <div class="modal-body border-success" style="background-color: #4B3B60;">
                        <div class="form-group form-group--sm">
                            <label for="billing_address_1">Team Name <abbr class="required" title="required">*</abbr></label>
                            <input type="text" name="billing_address_1" id="billing_address_1" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="register-name">Payment Registration <abbr class="required" title="required">*</abbr></label>
                            <input type="number" class="form-control">
                        </div>
                        <label for="register-name">Payment Method <abbr class="required" title="required">*</abbr></label>
                        <div class="form-group">
                        		<label class="radio radio-inline mr-2">
								<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked> Stream Cash
								<span class="radio-indicator"></span>
							</label>
							<label class="radio radio-inline mr-2">
								<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Stream Point
								<span class="radio-indicator"></span>
							</label>
                        </div>
                            <label class="checkbox checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Term And Condition
                                <span class="checkbox-indicator"></span>
                            </label>
                    </div>
                    <div class="modal-footer border-success" style="background-color: #4B3B60;">
                        <a href="#" class="btn btn-info btn-outline">Join</a>
                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
