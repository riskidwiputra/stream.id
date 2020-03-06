<!--Content
================================================== -->
<div class="site-content">
    <div class="container">
        <div class="row">
            <!-- Content -->
            <div class="content col-lg-8">

                <!-- Posts Grid -->
                <div class="posts posts--cards post-grid post-grid--2cols row">
                    
                    <?php foreach ($data['content'] as $row):
                        $whereNews = [
                            'parent_komentar_id'    => 0,
                            'id_news_game'  => $row['id_news_game']
                        ];
                        $like = $this->db->table('news_like')->countRows('news_id', $row['id_news_game']);
                        $comment = $this->db->table('komentar')->countRows($whereNews);
                        $label = $this->db->table('kategori')->where('id_kategori', $row['label']); 
                        if ($label['color'] == 1) { 
                             $label = '<span class="label posts__cat-label posts__cat-label--category-3">'.$label['nama_kategori'].'</span>'; 
                        } elseif ($label['color'] == 2) { 
                             $label = '<span class="label posts__cat-label posts__cat-label--category-4">'.$label['nama_kategori'].'</span>'; 
                        } elseif ($label['color'] == 3) { 
                             $label = '<span class="label posts__cat-label posts__cat-label--category-5">'.$label['nama_kategori'].'</span>'; 
                        } elseif ($label['color'] == 4) {
                             $label = '<span class="label posts__cat-label posts__cat-label--category-2">'.$label['nama_kategori'].'</span>'; 
                        } elseif ($label['color'] == 5) {
                            $label = '<span class="label posts__cat-label posts__cat-label--category-1">'.$label['nama_kategori'].'</span>'; 
                        } 
                        $penulis = $this->db->table('data_management')->where('stream_id', $row['penulis']);
                        $penulis = $penulis['fullname'];
                        $whereMe = [
                            'news_id'   => $row['id_news_game'],
                            'users_id'  => Session::get('users')
                        ];
                        $data['LikeMe'] = $this->db->table('news_like')->countRows($whereMe);
                    ?>
                        
                    
                    <div class="post-grid__item col-sm-6">
                        <div class="posts__item posts__item--card posts__item--category-1 posts__item--category-4  card">
                            <figure class="posts__thumb">
                                <div class="posts__cat">
                                    <!-- <span class="label posts__cat-label posts__cat-label--category-5"><?= $label; ?></span> -->
                                    <?=$label;?>
                                </div>
                                <a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game']; ?>"><img src="<?=asset(paths('path_home_NewsGame_0'));?><?= $row['gambar'] ?>" alt="" style="height:300px;"></a>
                            </figure>
                            <div class="posts__inner card__content" style="height: 13rem;">
                                <time datetime="2018-08-23" class="posts__date"><?= date('j F Y | H:i',strtotime($row['created_at'])); ?></time>
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
                                        <h4 class="post-author__name"><?= $penulis; ?></h4>
                                    </div>
                                </div>
                                <ul class="post__meta meta">
                                    <li class="meta__item meta__item--views"><?= $row['views']; ?></li>                                   

                                    <?php if (Session::check('users') == false) :?>
                                    <li class="meta__item meta__item--likes"><a href="javascript:void(0);" class="like<?=$row['id_news_game'];?>"><i class="meta-like icon-heart"></i> <?=$like;?></a></li>
                                    <?php else:?>
                                        <?php if ($data['LikeMe'] == 0):?>
                                    <li class="meta__item meta__item--likes"><a href="javascript:void(0);" class="like<?=$row['id_news_game'];?>"><i class="meta-like icon-heart"></i> <?=$like;?></a></li>
                                        <?php else:?>
                                    <li class="meta__item meta__item--likes"><a href="javascript:void(0);"><i class="fas fa-heart mr-1" style="font-size:12px;"></i> <?=$like;?></a></li>
                                        <?php endif;?>
                                    <?php endif;?>

                                    <li class="meta__item meta__item--comments"><a href="#"><?= $row['komentar']; ?></a></li>
                                </ul>
                            </footer>
                        </div>
                    </div>
                    <script>
                        $('.like<?=$row['id_news_game'];?>').click(function() {
                            var t = $(this);
                            $.ajax({
                                url : '<?=url('add-like/'.$row['id_news_game']);?>',
                                method : 'POST',
                                dataType : 'json',
                                success: function (msg){
                                    // console.log(msg);
                                    if (msg.status == true) { 
                                        t.html('<i class="fas fa-heart mr-1" style="font-size:12px;"></i> ' + msg.content);
                                        t.removeClass('like');
                                    } else {
                                        var dialog = bootbox.dialog({
                                            message: '<p class="text-center mb-0"><i class="fa fa-times-circle"></i> '+ msg.message +'</p>',
                                            closeButton: false
                                        });
                                        setTimeout(function(){
                                            dialog.modal('hide');
                                        }, 3000);
                                    }
                                }
                            });
                        });
                    </script>
                    <?php endforeach ?>

                </div>
                <!-- Post Grid / End -->

                <!-- Post Pagination -->
                <nav class="post-pagination" aria-label="Blog navigation">
                    <ul class="pagination pagination--circle justify-content-center">
                        <?php if (isset($data['page'])) {
                        if ($data['page'] == 1) { ?>
                            <li class="page-item"><a class="page-link" ><i class="fa fa-angle-left"></i></a></li>
                        <?php  
                        }else {
                            $link_prev = ($data['page'] > 1)? $data['page'] - 1 : 1;
                        ?>
                        <li class="page-item"><a class="page-link" href="<?= BASEURL ?>/news-page/<?= $link_prev ?>"><i class="fa fa-angle-left"></i></a></li>
                        <?php
                        }
                        for ($i= $data['start_number']; $i <= $data['end_number']; $i++) { 
                            $link_active = ($data['page'] == $i)? 'active' : '';
                        ?>
                        <li class="page-item <?= $link_active ?>"><a class="page-link" href="<?= BASEURL ?>/news-page/<?= $i ?>"><?= $i ?></a></li>
                        <?php
                        }
                        if ($data['page'] == $data['jumlahHalaman']) {
                        ?>
                        
                        <li class="page-item"><a class="page-link"><i class="fa fa-angle-right"></i></a></li>
                        <?php
                        }else{
                            $link_next = ($data['page'] < $data['jumlahHalaman'])? $data['page'] + 1 : $data['jumlahHalaman'];
                        ?>
                        <li class="page-item"><a class="page-link" href="<?= BASEURL ?>/news-page/<?= $link_next ?>"><i class="fa fa-angle-right"></i></a></li>
                        <?php
                        }
                        }else{?>
                        <li class="page-item"><a class="page-link"><i class="fa fa-angle-left"></i></a></li>
                        <?php
                        for ($i=1; $i <= $data['jumlahHalaman']; $i++) { 
                        ?>
                        <li class="page-item"><a class="page-link" href="<?= BASEURL ?>/news-page/<?= $i ?>"><?= $i ?></a></li>
                        <?php    
                        }
                        ?>
                        <?php
                        if ($data['jumlahHalaman'] == 1) {
                        ?>
                        <li class="page-item"><a class="page-link"><i class="fa fa-angle-right"></i></a></li>
                        <?php
                        }else{
                        ?>
                        <li class="page-item"><a class="page-link" href="<?= BASEURL ?>/news-page/2"><i class="fa fa-angle-right"></i></a></li>

                    
                        <?php
                        }
                        }
                        ?>
                        
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

                            
                                        
                                        <?php if ($data['newest']): ?>
                                            <?php foreach ($data['newest'] as $row): 
                                                $label = $this->db->table('kategori')->where('id_kategori', $row['label']); 
                                                if ($label['color'] == 1) { 
                                                    $label = '<span class="label posts__cat-label posts__cat-label--category-3">'.$label['nama_kategori'].'</span>'; 
                                                } elseif ($label['color'] == 2) { 
                                                    $label = '<span class="label posts__cat-label posts__cat-label--category-4">'.$label['nama_kategori'].'</span>'; 
                                                } elseif ($label['color'] == 3) { 
                                                    $label = '<span class="label posts__cat-label posts__cat-label--category-5">'.$label['nama_kategori'].'</span>'; 
                                                } elseif ($label['color'] == 4) {
                                                    $label = '<span class="label posts__cat-label posts__cat-label--category-2">'.$label['nama_kategori'].'</span>'; 
                                                } elseif ($label['color'] == 5) {
                                                    $label = '<span class="label posts__cat-label posts__cat-label--category-1">'.$label['nama_kategori'].'</span>'; 
                                                }
                                            ?>
                                                
                                           
                                        <li class="posts__item posts__item--category-1 posts__item--category-4 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                            <a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><img src="<?=asset(paths('path_home_NewsGame_0'));?><?= $row['gambar'] ?>" width="125px" height="112" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <?=$label; ?>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><?= strtoupper($row['judul']); ?></a></h6>
                                                <time datetime="2018-09-27" class="posts__date"><?= date('d F Y H:i',strtotime($row['created_at'])) ?></time>
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
                                            <?php foreach ($data['commented'] as $row): 
                                                $label = $this->db->table('kategori')->where('id_kategori', $row['label']); 
                                                if ($label['color'] == 1) { 
                                                    $label = '<span class="label posts__cat-label posts__cat-label--category-3">'.$label['nama_kategori'].'</span>'; 
                                                } elseif ($label['color'] == 2) { 
                                                    $label = '<span class="label posts__cat-label posts__cat-label--category-4">'.$label['nama_kategori'].'</span>'; 
                                                } elseif ($label['color'] == 3) { 
                                                    $label = '<span class="label posts__cat-label posts__cat-label--category-5">'.$label['nama_kategori'].'</span>'; 
                                                } elseif ($label['color'] == 4) {
                                                    $label = '<span class="label posts__cat-label posts__cat-label--category-2">'.$label['nama_kategori'].'</span>'; 
                                                } elseif ($label['color'] == 5) {
                                                    $label = '<span class="label posts__cat-label posts__cat-label--category-1">'.$label['nama_kategori'].'</span>'; 
                                                }
                                            ?>
                                        <li class="posts__item posts__item--category-2 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                            <a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><img src="<?=asset(paths('path_home_NewsGame_0'));?><?= $row['gambar'] ?>" width="125px" height="112" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <?=$label; ?>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><?= strtoupper($row['judul']); ?></a></h6>
                                                <time datetime="2018-09-27" class="posts__date"><?= date('d F Y H:i',strtotime($row['created_at'])) ;?></time>
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
                                            <?php foreach ($data['popular'] as $row): 
                                                $label = $this->db->table('kategori')->where('id_kategori', $row['label']); 
                                                if ($label['color'] == 1) { 
                                                    $label = '<span class="label posts__cat-label posts__cat-label--category-3">'.$label['nama_kategori'].'</span>'; 
                                                } elseif ($label['color'] == 2) { 
                                                    $label = '<span class="label posts__cat-label posts__cat-label--category-4">'.$label['nama_kategori'].'</span>'; 
                                                } elseif ($label['color'] == 3) { 
                                                    $label = '<span class="label posts__cat-label posts__cat-label--category-5">'.$label['nama_kategori'].'</span>'; 
                                                } elseif ($label['color'] == 4) {
                                                    $label = '<span class="label posts__cat-label posts__cat-label--category-2">'.$label['nama_kategori'].'</span>'; 
                                                } elseif ($label['color'] == 5) {
                                                    $label = '<span class="label posts__cat-label posts__cat-label--category-1">'.$label['nama_kategori'].'</span>'; 
                                                }
                                            ?>
                                        <li class="posts__item posts__item--category-3 ">
                                            <figure class="posts__thumb posts__thumb--hover">
                                                <a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><img src="<?=asset(paths('path_home_NewsGame_0'));?><?= $row['gambar'] ?>" width="125px" height="112" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <?=$label; ?>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><?= strtoupper($row['judul']); ?></a></h6>
                                                <time datetime="2018-09-27" class="posts__date"><?= date('d F Y H:i',strtotime($row['created_at'])) ?></time>
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
<!-- Content / End