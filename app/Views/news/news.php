<!-- Content
================================================== -->
<div class="site-content">
    <div class="container">

        <div class="row">

            <!-- Content -->
            <div class="content col-lg-8">

                <!-- Posts Grid -->
                <div class="posts posts--cards post-grid post-grid--2cols row">
                    
                    <?php foreach ($data['content'] as $row): ?>
                        
                    
                    <div class="post-grid__item col-sm-6">
                        <div class="posts__item posts__item--card posts__item--category-1 posts__item--category-4  card">
                            <figure class="posts__thumb">
                                <div class="posts__cat">
                                    <span class="label posts__cat-label posts__cat-label--category-1"><?= $row['label'] ?></span>
                                </div>
                                <a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><img src="<?=asset(paths('path_home_NewsGame_0'));?><?= $row['gambar'] ?>" alt=""></a>
                            </figure>
                            <div class="posts__inner card__content">
                                <a href="#" class="posts__cta"></a>
                                <time datetime="2018-08-23" class="posts__date"><?= $row['tanggal'] ?></time>
                                <h6 class="posts__title posts__title--color-hover"><a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><?= strtoupper($row['judul']); ?></a></h6>
                                <div class="posts__excerpt">
                                   
                                </div>
                            </div>
                            <footer class="posts__footer card__footer">
                                <div class="post-author">
                                    <figure class="post-author__avatar">
                                        <img src="<?= BASEURL ?>/public/assets/images/samples/avatar-12-xs.jpg" alt="Post Author Avatar">
                                    </figure>
                                    <div class="post-author__info">
                                        <h4 class="post-author__name"><?= $row['penulis'] ?></h4>
                                    </div>
                                </div>
                                <ul class="post__meta meta">
                                    <li class="meta__item meta__item--views"><?= $row['views'] ?></li>
                                    <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like icon-heart"></i> 530</a></li>
                                    <li class="meta__item meta__item--comments"><a href="#"><?= $row['komentar'] ?></a></li>
                                </ul>
                            </footer>
                        </div>
                    </div>
                    <?php endforeach ?>

                </div>
                <!-- Post Grid / End -->

                <!-- Post Pagination -->
                <nav class="post-pagination" aria-label="Blog navigation">
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
                <!-- Post Pagination / End -->

			</div>
			<!-- Sidebar -->
            <div id="sidebar" class="sidebar col-lg-4">
                <!-- Widget: Trending News -->
                <aside class="widget widget--sidebar card widget-tabbed">
                    <div class="widget__title card__header">
                        <h4>Top Trending News</h4>
                    </div>
                    <div class="widget__content card__content">
                        <div class="widget-tabbed__tabs">
                            <!-- Widget Tabs -->
                            <ul class="nav nav-tabs nav-justified widget-tabbed__nav" role="tablist">
                                <li class="nav-item"><a href="#widget-tabbed-newest" class="nav-link active" aria-controls="widget-tabbed-newest" role="tab" data-toggle="tab">Newest</a></li>
                                <li class="nav-item"><a href="#widget-tabbed-commented" class="nav-link" aria-controls="widget-tabbed-commented" role="tab" data-toggle="tab">Most Commented</a></li>
                                <li class="nav-item"><a href="#widget-tabbed-popular" class="nav-link" aria-controls="widget-tabbed-popular" role="tab" data-toggle="tab">Popular</a></li>
                            </ul>

                            <!-- Widget Tab panes -->
                            <div class="tab-content widget-tabbed__tab-content">
                                <!-- Newest -->
                                <div role="tabpanel" class="tab-pane fade show active" id="widget-tabbed-newest">
                                    <ul class="posts posts--simple-list">
                                        <li class="posts__item posts__item--category-4 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="_esports_blog-post-1.html"><img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img4-sidebar-xs.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-4">Xenowatch</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">Xenowatch&#x27;s new patch will fix the faces bugs</a></h6>
                                                <time datetime="2018-09-27" class="posts__date">September 27th, 2018</time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-2 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="_esports_blog-post-1.html"><img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img2-sidebar-xs.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-2">L.O. Heroes</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">A new mage character is coming to the League</a></h6>
                                                <time datetime="2018-09-27" class="posts__date">August 5th, 2018</time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-3 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="_esports_blog-post-1.html"><img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img8-sidebar-xs.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-3">Striker GO</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">New Tech vehicles will be added in July&#x27;s patch</a></h6>
                                                <time datetime="2018-09-27" class="posts__date">September 5th, 2018</time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-1 posts__item--category-4 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="_esports_blog-post-1.html"><img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img1-sidebar-xs.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-1">The Team</span><span class="label posts__cat-label posts__cat-label--category-4">Xenowatch</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">The Alchemists reach to the Xenowatch finals</a></h6>
                                                <time datetime="2018-09-27" class="posts__date">August 14th, 2018</time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-1 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="_esports_blog-post-1.html"><img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img6-sidebar-xs.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-1">The Team</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">The Alchemists welcome &quot;Logan-X&quot; to the team</a></h6>
                                                <time datetime="2018-09-27" class="posts__date">August 14th, 2018</time>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Commented -->
                                <div role="tabpanel" class="tab-pane fade" id="widget-tabbed-commented">
                                    <ul class="posts posts--simple-list">
                                        <li class="posts__item posts__item--category-3 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="_esports_blog-post-1.html"><img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img8-sidebar-xs.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-3">Striker GO</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">New Teach vehicles will be added in July&#x27;s patch</a></h6>
                                                <time datetime="2018-09-27" class="posts__date">September 5th, 2018</time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-1 posts__item--category-4 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="_esports_blog-post-1.html"><img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img4-sidebar-xs.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-1">The Team</span><span class="label posts__cat-label posts__cat-label--category-4">Xenowatch</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">The Alchemists reach to the Xenowatch finals</a></h6>
                                                <time datetime="2018-09-27" class="posts__date">August 14th, 2018</time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-1 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="_esports_blog-post-1.html"><img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img6-sidebar-xs.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-1">The Team</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">The Alchemists welcome &quot;Logan-X&quot; to the team</a></h6>
                                                <time datetime="2018-09-27" class="posts__date">August 14th, 2018</time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-4 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="_esports_blog-post-1.html"><img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img1-sidebar-xs.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-4">Xenowatch</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">Xenowatch&#x27;s new patch will fix the faces bugs</a></h6>
                                                <time datetime="2018-09-27" class="posts__date">September 27th, 2018</time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-2 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="_esports_blog-post-1.html"><img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img2-sidebar-xs.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-2">L.O. Heroes</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">A new mage character is coming to the League</a></h6>
                                                <time datetime="2018-09-27" class="posts__date">August 5th, 2018</time>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Popular -->
                                <div role="tabpanel" class="tab-pane fade" id="widget-tabbed-popular">
                                    <ul class="posts posts--simple-list">
                                        <li class="posts__item posts__item--category-1 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="_esports_blog-post-1.html"><img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img6-sidebar-xs.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-1">The Team</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">The Alchemists welcome &quot;Logan-X&quot; to the team</a></h6>
                                                <time datetime="2018-09-27" class="posts__date">August 14th, 2018</time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-2 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="_esports_blog-post-1.html"><img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img2-sidebar-xs.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-2">L.O. Heroes</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">A new mage character is coming to the League</a></h6>
                                                <time datetime="2018-09-27" class="posts__date">August 5th, 2018</time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-4 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="_esports_blog-post-1.html"><img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img1-sidebar-xs.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-4">Xenowatch</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">Xenowatch&#x27;s new patch will fix the faces bugs</a></h6>
                                                <time datetime="2018-09-27" class="posts__date">September 27th, 2018</time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-1 posts__item--category-4 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="_esports_blog-post-1.html"><img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img4-sidebar-xs.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-1">The Team</span><span class="label posts__cat-label posts__cat-label--category-4">Xenowatch</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">The Alchemists reach to the Xenowatch finals</a></h6>
                                                <time datetime="2018-09-27" class="posts__date">August 14th, 2018</time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-3 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="_esports_blog-post-1.html"><img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img8-sidebar-xs.jpg" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-3">Striker GO</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">New Teach vehicles will be added in July&#x27;s patch</a></h6>
                                                <time datetime="2018-09-27" class="posts__date">September 5th, 2018</time>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </aside>
                <!-- Widget: Trending News / End -->

            </div>
            <!-- Sidebar / End -->
		</div>
	</div>
</div>
<!-- Content / End -->