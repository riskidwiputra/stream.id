    <!-- Content
		================================================== -->
		<div class="site-content">
			<div class="container">
		
				<div class="row justify-content-center">
					<div class="col-md-8">
		
						<!-- FAQs -->
						<div class="accordion accordion--space-between" id="accordionFaqs">
						<?php $no=0; foreach ($data['content'] as $rows) {  ?>	
							<?php $no++ ?>			
							<div class="card">
								<div class="card__header" id="heading-<?= $no ?>">
									<h5 class="mb-0">
										<button class="btn btn-link accordion__header-link <?php if($no != 1){ ?>collapsed<?php }else{} ?> " type="button" data-toggle="collapse" data-target="#collapse-<?= $no ?>" aria-expanded="<?php if($no == 1){ ?> true <?php }else{ ?> false <?php } ?>" aria-controls="collapse-0">
											<?= $rows['title']; ?>
											<span class="accordion__header-link-icon"></span>
										</button>
									</h5>
								</div>
						<div id="collapse-<?= $no ?>" class="collapse <?php if($no == 1){ ?> show <?php }else{} ?>" aria-labelledby="heading-<?= $no ?>" data-parent="#accordionFaqs">
									<div class="card__content">
									<?= htmlspecialchars_decode($rows['content']); ?>
									</div>
								</div>
							</div>
					
							<?php } ?>
		
						</div>
						<!-- FAQs / End -->
		
					</div>
				</div>
		
			</div>
		</div>
		
		<!-- Content / End -->
