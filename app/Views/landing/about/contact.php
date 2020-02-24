<!-- Content
================================================== -->
<div class="site-content">
			<div class="container">
		
				<!-- Jumbotron -->
				<div class="jumbotron jumbotron--style1">
					<div class="container">
						<div class="row">
							<div class="col align-self-end">
								<figure class="jumbotron__img">
									<img src="<?=asset('assets/images/esports/streamgaming.png');?>" alt="">
								</figure>
							</div>
							<div class="col align-self-center">
								<div class="jumbotron__content text-center">
									<h5 class="jumbotron__subtitle">Any Question?</h5>
									<h1 class="jumbotron__title">Join <span class="highlight">Us!</span></h1>
									<p class="jumbotron__desc">Send us a message and we’ll be in touch!</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Jumbotron / End -->
		
				<div class="row">
					<div class="col-md-8">
		
						<!-- Contact Form Card -->
						<div class="card">
							<div class="card__header">
								<h4>Send Us a Message</h4>
							</div>
							<div class="card__content">
		
								<!-- Contact Form -->
								<form action="#" class="contact-form">
									<div class="row">
										<div class="col-12 col-sm-6">
											<div class="form-group">
												<label for="contact-form-name">Your Name <span class="required">*</span></label>
												<input type="text" name="contact-form-name" id="contact-form-name" class="form-control" placeholder="Your full name...">
											</div>
										</div>
										<div class="col-12 col-sm-6">
											<div class="form-group">
												<label for="contact-form-email">Your Email <span class="required">*</span></label>
												<input type="email" name="contact-form-email" id="contact-form-email" class="form-control" placeholder="Your email...">
											</div>
										</div>
										<div class="w-100"></div>
										<div class="col-12 col-sm-12">
											<div class="form-group">
												<label for="select-preferred-game">Subject</label>
												<select name="select-preferred-game" id="select-preferred-game" class="form-control">
													<option value="1">Stream Gaming</option>
													<option value="2">Stream Cash</option>
												</select>
											</div>
										</div>
									</div>
		
									<div class="form-group">
										<label for="contact-form-message">Your Message <span class="required">*</span></label>
										<textarea name="name" rows="5" class="form-control" placeholder="Enter your message here..."></textarea>
									</div>
									<div class="form-group form-group--submit text-right">
										<button type="submit" class="btn btn-primary-inverse">Send Your Message</button>
									</div>
								</form>
								<!-- Contact Form / End -->
		
							</div>
						</div>
						<!-- Contact Form Card / End -->
		
					</div>
					<div class="col-md-4">
		
						<!-- Contat Info -->
						<?php foreach ($data['content'] as $rows) { ?>
						
					
						<div class="card card--info">
							<div class="card__header">
								<h4>Contact Info</h4>
							</div>
							<div class="card__content">
								<p class="mb-0"><?= $rows['contact_info'] ?></p>
							</div>
							<div class="card__footer contact-info">
								<address class="contact-info__item">
									<div class="contact-info__icon">
										<i class="fa fa-envelope-o"></i>
									</div>
									<div class="contact-info__label">
										<a href="mailto:astreamgaming@gmail.com"><?= $rows['email'] ?></a>
									</div>
								</address>
								<address class="contact-info__item">
									<div class="contact-info__icon">
										<i class="fa fa-map-o"></i>
									</div>
									<div class="contact-info__label">
									<?= $rows['location'] ?>
									</div>
								</address>
							</div>
						</div>
						<?php } ?>
						<!-- Contat Info / End -->
		
					</div>
				</div>
		
			</div>
			
		</div>
		
		<!-- Content / End -->
