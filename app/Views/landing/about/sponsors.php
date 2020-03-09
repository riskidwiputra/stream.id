<!-- Content
================================================== -->
<div class="site-content">
    <div class="container">
        <div class="sponsors-grid row">
            <?php foreach ($data['content'] as $rows) { ?>

            <div class="col-sm-6 col-lg-4">
                <div class="card sponsor-card">
                    <header class="card__header text-center  ">
								<h4 ><?= $rows['title'] ?></h4>
					</header>
                    <header class="card__header sponsor-card__header">
                        <figure class="sponsor-card__logo">
                            <a href="#"><img src="<?=cdn(paths('backup_sponsors')).$rows['image'] ?>" ></a>
                        </figure>
                    </header>
                    <div class="card__content sponsor-card__content">
                        <div class="sponsor-card__excerpt">
                        <?= htmlspecialchars_decode($rows['content']); ?>
                        </div>
                    </div>
                    <footer class="card__footer sponsor-card__footer">
                        <a href="#" class="sponsor-card__link"><?= $rows['link'] ?></a>
                    </footer>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<!-- Content / End -->
