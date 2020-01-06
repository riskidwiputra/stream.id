<!-- Content
================================================== -->
<div class="site-content">
    <div class="container">
        <div class="row">

            <!-- Content -->
            <div class="content col-lg-8">

                <!-- Article -->
                <article class="card post post--single">

                    <div class="card__content">
                        <div class="post__category">
                            <span class="label posts__cat-label posts__cat-label--category-2"><?= $data['content']['label']?></span>
                        </div>
                        <header class="post__header">
                            <h2 class="post__title"><?= $data['content']['judul'] ?></h2>
                            <ul class="post__meta meta">
                                <li class="meta__item meta__item--author"><img src="<?= asset('assets/images/samples/avatar-6-xs.jpg'); ?>" alt="Post Author Avatar"> by <?= $data['content']['penulis'] ?></li>

                                <li class="meta__item meta__item--date">
                                    <time datetime="2018-08-27"><?= $data['content']['tanggal'] ?></time>
                                </li>
                                <li class="meta__item meta__item--views"><?= $data['content']['views']; ?></li>
                            </ul>
                        </header>

                        <figure class="post__thumbnail post__thumbnail--square">
                            <img src="<?=asset(paths('path_home_NewsGame_0'));?><?= $data['content']['gambar'] ?>" alt="">
                        </figure>

                        <div class="post__content post__content--inner">
                            <?= htmlspecialchars_decode($data['content']['isi']); ?>
                        </div>

                        <footer class="post__footer">
                            <div class="post__tags post__tags--simple">
                                <?php
                                    $kalimat    = $data['content']['tag'];
                                    echo data_tag($kalimat);
                                ?>
                            
                            </div>
                        </footer>

                    </div>
                </article>
                <!-- Article / End -->

                <!-- Post Sharing Buttons -->
                <div class="post-sharing">
                    <a href="#" class="btn btn-default btn-facebook btn-icon btn-block"><i class="fa fa-facebook"></i> <span class="post-sharing__label hidden-xs">Share on Facebook</span></a>
                    <a href="#" class="btn btn-default btn-twitter btn-icon btn-block"><i class="fa fa-twitter"></i> <span class="post-sharing__label hidden-xs">Share on Twitter</span></a>
                </div>
                <!-- Post Sharing Buttons / End -->

                <!-- Related Posts -->
                <div class="post-related">
                    <div class="card card--clean">
                        <div class="card__header">
                            <h4>Related Articles</h4>
                        </div>
                        <div class="card__content">
                            <!-- Posts Grid -->
                            <div class="posts posts--tile posts--tile-alt post-grid row">

                                <div class="post-grid__item col-sm-6">
                                    <div class="posts__item posts__item--tile posts__item--category-2  card">
                                        <figure class="posts__thumb">
                                            <img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img5-card.jpg" alt="">
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-2">L.O. Heroes</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">A new class is added to the human&#x27;s race</a></h6>
                                                <time datetime="2018-08-23" class="posts__date">July 16th, 2018</time>
                                            </div>
                                        </figure>
                                        <a href="_esports_blog-post-1.html" class="posts__cta"></a>
                                        <footer class="posts__footer card__footer">
                                            <div class="post-author">
                                                <figure class="post-author__avatar">
                                                    <img src="<?= BASEURL ?>/public/assets/images/football/samples/avatar-6-xs.jpg" alt="Post Author Avatar">
                                                </figure>
                                                <div class="post-author__info">
                                                    <h4 class="post-author__name">Lagertha Dax</h4>
                                                </div>
                                            </div>
                                            <ul class="post__meta meta">
                                                <li class="meta__item meta__item--views">2369</li>
                                                <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like icon-heart"></i> 530</a></li>
                                                <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                                            </ul>
                                        </footer>
                                    </div>
                                </div>
                                <div class="post-grid__item col-sm-6">
                                    <div class="posts__item posts__item--tile posts__item--category-3  card">
                                        <figure class="posts__thumb">
                                            <img src="<?= BASEURL ?>/public/assets/images/esports/samples/post-img8-card.jpg" alt="">
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-3">Striker GO</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">New Tech vehicles will be added in July&#x27;s patch</a></h6>
                                                <time datetime="2018-08-23" class="posts__date">May 14th, 2018</time>
                                            </div>
                                        </figure>
                                        <a href="_esports_blog-post-1.html" class="posts__cta"></a>
                                        <footer class="posts__footer card__footer">
                                            <div class="post-author">
                                                <figure class="post-author__avatar">
                                                    <img src="<?= BASEURL ?>/public/assets/images/football/samples/avatar-6-xs.jpg" alt="Post Author Avatar">
                                                </figure>
                                                <div class="post-author__info">
                                                    <h4 class="post-author__name">Lagertha Dax</h4>
                                                </div>
                                            </div>
                                            <ul class="post__meta meta">
                                                <li class="meta__item meta__item--views">2369</li>
                                                <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like icon-heart"></i> 530</a></li>
                                                <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                                            </ul>
                                        </footer>
                                    </div>
                                </div>

                            </div>
                            <!-- Post Grid / End -->
                        </div>
                    </div>
                </div>
                <!-- Related Posts / End -->

                <!-- Post Comments -->
                <div class="post-comments card">
                    <header class="post-commments__header card__header">
                        <h4><?= $data['comment'] ?> Comments</h4>
                    </header>
                    <div class="post-comments__content card__content">

                        <ul class="comments comments--alt">
                            
                            <!-- / -->
                            <li class="comments__item">
                                <div id="comment" data-id="<?= BASEURL ?>"></div>
                                <div id="display_comment" data-id="<?= $data['content']['url'];?>">
                               
                                <!-- comment -->

                                </div>
                            </li>
                            
                            <!-- / -->
                        </ul>
                    </div>

                    <footer class="card__footer post__comments-load-more">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-block">Load More Comments (0)</button>
                            </div>
                        </div>
                    </footer>

                </div>
                <!-- Post Comments / End -->

                <!-- Post Comment Form -->
                <div class="post-comment-form card">
                    <header class="post-comment-form__header card__header">
                        <h4>Write a Comment</h4>
                    </header>
                    <div class="post-comment-form__content card__content">
                        <form method="post" id="form_komen"  >

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="input-name">Your Name <span class="required">*</span></label>
                                            <input type="text" name="nama_pengirim" id="nama_pengirim" class="form-control" placeholder="Masukkan Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="input-email">Your Email <span class="required">*</span></label>
                                            <input type="email" id="email_pengirim" name="email_pengirim" class="form-control" placeholder="Masukkan Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="textarea-comment">Your Comment <span class="required">*</span></label>
                                    <textarea name="komen" id="komen" rows="4" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-0 text-right">

                                    <input type="hidden" name="komentar_id" id="komentar_id" value="0" />
                                    <input type="submit" name="submit" id="submit" class="btn btn-primary-inverse" value="Post Your Comment" />
                                </div>
                            </form>
                    </div>
                </div>
                <!-- Post Comment Form / End -->

            </div>
            <!-- Content / End -->

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

                                        
                                        
                                        <?php if ($data['newest']): ?>
                                            <?php foreach ($data['newest'] as $row): ?>
                                                
                                           
                                        <li class="posts__item posts__item--category-1 posts__item--category-4 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                            <a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><img src="<?=asset(paths('path_home_NewsGame_0'));?><?= $row['gambar'] ?>" width="125px" height="112" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-1"><?= $row['label'] ?></span><span class="label posts__cat-label posts__cat-label--category-4">Xenowatch</span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><?= strtoupper($row['judul']); ?></a></h6>
                                                <time datetime="2018-09-27" class="posts__date"><?= $row['tanggal'] ?></time>
                                            </div>
                                        </li>
                                        
                                     <?php endforeach ?>
                                            
                                        <?php endif ?>
                                    </ul>
                                </div>
                                <!-- Commented -->
                                <div role="tabpanel" class="tab-pane fade" id="widget-tabbed-commented">
                                    <ul class="posts posts--simple-list">
                                        
                                    <?php if ($data['commented']): ?>
                                            <?php foreach ($data['commented'] as $row): ?>
                                        <li class="posts__item posts__item--category-2 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                            <a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><img src="<?=asset(paths('path_home_NewsGame_0'));?><?= $row['gambar'] ?>" width="125px" height="112" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-2"><?= $row['label'] ?></span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><?= strtoupper($row['judul']); ?></a></h6>
                                                <time datetime="2018-09-27" class="posts__date"><?= $row['tanggal'] ?></time>
                                            </div>
                                        </li>
                                     <?php endforeach ?>
                                            
                                        <?php endif ?>               
                                    </ul>
                                </div>
                                <!-- Popular -->
                                <div role="tabpanel" class="tab-pane fade" id="widget-tabbed-popular">
                                    <ul class="posts posts--simple-list">
                                        
                                        
                                        
                                        <?php if ($data['popular']): ?>
                                            <?php foreach ($data['popular'] as $row): ?>
                                        <li class="posts__item posts__item--category-3 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><img src="<?=asset(paths('path_home_NewsGame_0'));?><?= $row['gambar'] ?>" width="125px" height="112" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label posts__cat-label--category-3"><?= $row['label'] ?>  </span>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><?= strtoupper($row['judul']); ?></a></h6>
                                                <time datetime="2018-09-27" class="posts__date">September 5th, 2018</time>
                                            </div>
                                        </li>

                                        <?php endforeach ?>
                                            
                                        <?php endif ?>
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
