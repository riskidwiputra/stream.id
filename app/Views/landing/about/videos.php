<!-- Content
		================================================== -->
		<div class="site-content">
    <div class="container">

        <!-- Filter -->
        <ul class="isotope-filter js-isotope-filter list-unstyled">
            <li class="isotope-filter__item">
                <button class="btn btn-link isotope-filter__link isotope-filter__link--active" data-filter="*">All Videos</button>
            </li>
            <li class="isotope-filter__item">
                <button class="btn btn-link isotope-filter__link" data-filter=".post-tag-1">Streams</button>
            </li>
            <li class="isotope-filter__item">
                <button class="btn btn-link isotope-filter__link" data-filter=".post-tag-2">Competitions</button>
            </li>
            <li class="isotope-filter__item">
                <button class="btn btn-link isotope-filter__link" data-filter=".post-tag-3">Gameplays</button>
            </li>
            <li class="isotope-filter__item">
                <button class="btn btn-link isotope-filter__link" data-filter=".post-tag-4">Unboxing</button>
            </li>
        </ul>
        <!-- Filter / End -->

        <!-- Posts - Videos -->
        <div class="posts posts--card-compact row js-posts--filterable">

            <?php foreach($data['content'] as $row):
                if ($row['label_color'] == 1) { 
                    $label = '<span class="label posts__cat-label posts__cat-label--category-3">'.$row['label'].'</span>'; 
                } elseif ($row['label_color'] == 2) { 
                    $label = '<span class="label posts__cat-label posts__cat-label--category-4">'.$row['label'].'</span>'; 
                } elseif ($row['label_color'] == 3) { 
                    $label = '<span class="label posts__cat-label posts__cat-label--category-5">'.$row['label'].'</span>'; 
                } elseif ($row['label_color'] == 4) {
                    $label = '<span class="label posts__cat-label posts__cat-label--category-2">'.$row['label'].'</span>'; 
                } elseif ($row['label_color'] == 5) {
                    $label = '<span class="label posts__cat-label posts__cat-label--category-1">'.$row['label'].'</span>'; 
                }
                ?>
            <div class="post-grid__item post-tag-1 post-tag-4  col-sm-6 col-lg-4">
                <div class="posts__item posts__item--category-1 posts__item--category-4  card">
                    <figure class="posts__thumb posts__thumb--video">
                        <a href="<?=url('watch/').$row['url'];?>" class=""><img src="<?=cdn(paths('backup_videos')).$row['thumbnail'];?>?<?=time();?>" alt="" style="height:200px;"></a>
                    </figure>
                    <div class="posts__inner card__content">
                        <div class="posts__cat">
                            <?=$label;?>
                        </div>
                        <?php if (strlen($row['title']) > 41) {
                            $title = substr($row['title'] ,0 ,41).'....';
                        } else {
                            $title = $row['title'];
                        }?>
                        <h6 class="posts__title posts__title--color-hover"><a href="<?=url('watch/'.$row['url']);?>"><?=$title;?></a></h6>
                        <ul class="post__meta meta">
                            <li class="meta__item meta__item--date"><?=date('F d, Y', strtotime($row['created_at']));?></li>
                            <li class="meta__item meta__item--views"><?=$row['view'];?></li>
                            <!-- <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like icon-heart"></i> 530</a></li>
                            <li class="meta__item meta__item--comments"><a href="#">18</a></li> -->
                        </ul>
                    </div>
                </div>
            </div> 
            <?php endforeach;?>

        </div>
        <!-- Posts - Videos / End -->

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

    </div>
</div>

<!-- Content / End -->