<!-- Content
		================================================== -->
		<div class="site-content">
    <div class="container">

        <div class="row">

            <div class="col-lg-8">

                <!-- Personal Information -->
                <div class="card">
                    <div class="card__header">
                        <h4>Personal Information</h4>
                    </div>
                    <div class="card__content">
                        <form action="#" class="df-personal-info">

                            <div class="form-group form-group--upload">
                                <div class="form-group__avatar form-group__avatar--center">
                                    <label class="form-group__avatar-wrapper">
                                        <figure class="form-group__avatar-img">
                                            <img src="<?=asset('assets/images/esports/avatar-placeholder-80x80.jpg');?>" alt="">
                                        </figure>
                                        <div class="form-group__label">
                                            <h6>Name</h6>
                                            <span>Min size 80x80px</span>
                                        </div>
                                        <input type="file" style="display: none;">
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account-email">Email <abbr class="required" title="required">*</abbr></label>
                                        <input type="email" class="form-control" value="" name="account-email" id="account-email" placeholder="lagerthadax@yourmail.com">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account-username">Username</label>
                                        <input type="text" class="form-control" value="" name="account-username" id="account-username" placeholder="Lagertha Dax">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account-password">Change Password</label>
                                        <input type="password" class="form-control" value="" name="account-password" id="account-password" placeholder="**********">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account-password-repeat">Repeat Password</label>
                                        <input type="password" class="form-control" value="" name="account-password-repeat" id="account-password-repeat" placeholder="**********">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account-first-name">First Name</label>
                                        <input type="text" class="form-control" value="" name="account-first-name" id="account-first-name" placeholder="Your first name...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account-last-name">Last Name</label>
                                        <input type="text" class="form-control" value="" name="account-last-name" id="account-last-name" placeholder="Your last name...">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group--submit text-center">
                                <button type="submit" class="btn btn-primary-inverse">Save all changes</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- Personal Information / End -->
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
                <!-- Widget: Featured Player - Alternative without Image / End -->

            </div>

        </div>
    </div>
</div>

<!-- Content / End -->