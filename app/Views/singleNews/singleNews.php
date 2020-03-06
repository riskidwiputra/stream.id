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
                            <?= $data['label']?>
                        </div>
                        <header class="post__header">
                            <h2 class="post__title"><?= $data['content']['judul'] ?></h2>
                            <ul class="post__meta meta">
                                <li class="meta__item meta__item--author"><img src="<?= asset('assets/images/samples/avatar-6-xs.jpg'); ?>" alt="Post Author Avatar"> by <?= $data['author'] ?></li>

                                <li class="meta__item meta__item--date">
                                    <time datetime="2018-08-27"><?= date('j F Y | H:i',strtotime($data['content']['created_at'])) ?></time>
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
                                <?php $tag = explode(',',$data['content']['tag']); 
                                foreach($tag as $t) {
                                    echo '<a href="javascript:void(0);">'.strtoupper($t).'</a>';
                                }?>                            
                            </div> 
                        </footer> 
                        <div class="d-flex justify-content-center mt-3" style="font-size:15px;">
                            <div class="d-flex justify-content-between">
                                <span class="mr-3"><i class="fa fa-eye"></i> <?=$data['single']['views'];?></span> 
                                <?php if (Session::check('users') == false) :?>
                                <span class="mr-3 like"><i class="far fa-heart"></i> <?=$data['like'];?></span>
                                <?php else:?>
                                    <?php if ($data['LikeMe'] == 0):?>
                                <span class="mr-3 like"><i class="far fa-heart"></i> <?=$data['like'];?></span> 
                                    <?php else:?>
                                <span class="mr-3"><i class="fas fa-heart"></i> <?=$data['like'];?></span>
                                    <?php endif;?>
                                <?php endif;?>

                                <span class="mr-3"><i class="far fa-comment"></i> <?=$data['comment_count'];?></span>
                            </div>
                        </div>

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
                                <!-- start foreach -->
                                <?php foreach ($data['related'] as $related):
                                    // var_dump($related);
                                    $author = $this->db->table('data_management')->where('stream_id', $related['penulis']);
                                    $author = $author['fullname'];
                                    $label = $this->db->table('kategori')->where('id_kategori', $related['label']); 
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
                                    $like = $this->db->table('news_like')->countRows('news_id', $related['id_news_game']);
                                    $whereNews = [
                                        'parent_komentar_id'    => 0,
                                        'id_news_game'  => $related['id_news_game']
                                    ];                                    
                                    $comment = $this->db->table('komentar')->countRows($whereNews);
                                    $whereMe = [
                                        'news_id'   => $related['id_news_game'],
                                        'users_id'  => Session::get('users')
                                    ];
                                    $data['LikeMe'] = $this->db->table('news_like')->countRows($whereMe);
                                ?>
                                <div class="post-grid__item col-sm-6">
                                    <div class="posts__item posts__item--tile posts__item--category-2  card">
                                        <a href="<?=url('news/'.$related['url']);?>">
                                            <figure class="posts__thumb">
                                                <img src="<?=asset(paths('path_home_NewsGame_0'));?><?= $related['gambar'] ?>" alt="">
                                                <div class="posts__inner">
                                                    <div class="posts__cat">
                                                        <?=$label; ?>
                                                    </div>
                                                    <h6 class="posts__title posts__title--color-hover"><a href="<?=$related['url'];?>"><?=$related['judul'];?></a></h6>
                                                    <time datetime="2018-08-23" class="posts__date"><?=date('d F Y H:i', strtotime($related['created_at']));?></time>
                                                </div>
                                            </figure>
                                        </a>           
                                        <a href="<?=$related['url'];?>" class="posts__cta"></a>
                                        <footer class="posts__footer card__footer">
                                            <div class="post-author">
                                                <figure class="post-author__avatar">
                                                    <img src="<?= asset('assets/images/samples/avatar-6-xs.jpg'); ?>" alt="Post Author Avatar">
                                                </figure>
                                                <div class="post-author__info">
                                                    <h4 class="post-author__name"><?=$author;?></h4>
                                                </div>
                                            </div>
                                            <ul class="post__meta meta">
                                                <li class="meta__item meta__item--views"><?= $related['views']; ?></li>                                   

                                                <?php if (Session::check('users') == false) :?>
                                                <li class="meta__item meta__item--likes"><a href="javascript:void(0);" class="like<?=$related['id_news_game'];?>"><i class="meta-like icon-heart"></i> <?=$like;?></a></li>
                                                <?php else:?>
                                                    <?php if ($data['LikeMe'] == 0):?>
                                                <li class="meta__item meta__item--likes"><a href="javascript:void(0);" class="like<?=$related['id_news_game'];?>"><i class="meta-like icon-heart"></i> <?=$like;?></a></li>
                                                    <?php else:?>
                                                <li class="meta__item meta__item--likes"><a href="javascript:void(0);"><i class="fas fa-heart mr-1" style="font-size:12px;"></i> <?=$like;?></a></li>
                                                    <?php endif;?>
                                                <?php endif;?>

                                                <li class="meta__item meta__item--comments"><a href="#"><?= $related['komentar']; ?></a></li>
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
                                <?php endforeach; ?>
                                <!-- endforeach -->
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
                                <div  id="display_comment" data-id="<?= $data['content']['url'];?>">
                                <!-- comment -->

                                </div>
                            </li>
                            
                            <!-- / -->
                        </ul>
                    </div>

                    <footer class="card__footer post__comments-load-more">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-block" id="komentar">Load More Comments</button>
                            </div>
                        </div>
                    </footer>

                </div>
                <!-- Post Comments / End -->

                <?php if (Session::check('users')):?>
                <!-- Post Comment Form -->
                <div class="post-comment-form card">
                    <header class="post-comment-form__header card__header">
                        <h4>Write a Comment</h4>
                    </header>
                    <div class="post-comment-form__content card__content">
                        <form method="post" id="form_komen"  >

                            <!-- <div class="row">
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
                            </div> -->
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
                <?php endif ;?>

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
                                            <a href="javascript:void(0);" class="berita" data-id="<?= $row['id_news_game'] ?>" onclick="window.location.href = '<?=url('news/'.$row['url']);?>'"><img src="<?=asset(paths('path_home_NewsGame_0'));?><?= $row['gambar'] ?>" width="125px" height="112" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <?=$label;?>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="javascript:void(0);" class="berita" data-id="<?= $row['id_news_game'] ?>" onclick="window.location.href = '<?=url('news/'.$row['url']);?>'"><?= strtoupper($row['judul']); ?></a></h6>
                                                <time datetime="2018-09-27" class="posts__date"><?= date('j F Y | H:i', strtotime($row['created_at'])) ?></time>
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
                                                <a href="javascript:void(0);" class="berita" data-id="<?= $row['id_news_game'] ?>" onclick="window.location.href = '<?=url('news/'.$row['url']);?>';"><img src="<?=asset(paths('path_home_NewsGame_0'));?><?= $row['gambar'] ?>" width="125px" height="112" alt=""></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <?=$label; ?>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="javascript:void(0);" class="berita" data-id="<?= $row['id_news_game'] ?>" onclick="window.location.href = '<?=url('news/'.$row['url']);?>'"><?= strtoupper($row['judul']); ?></a></h6>
                                                <time datetime="2018-09-27" class="posts__date"><?= date('j F Y | H:i', strtotime($row['created_at'])) ?></time>
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
                                                <a href="javascript:void(0);" class="berita" data-id="<?= $row['id_news_game'] ?>"><img src="<?=asset(paths('path_home_NewsGame_0'));?><?= $row['gambar'] ?>" width="125px" height="112" alt="" onclick="window.location.href = '<?=url('news/'.$row['url']);?>';"></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <?=$label; ?>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover"><a href="javascript:void(0);" class="berita" data-id="<?= $row['id_news_game'] ?>" onclick="window.location.href = '<?=url('news/'.$row['url']);?>'"><?= strtoupper($row['judul']); ?></a></h6>
                                                <time datetime="2018-09-27" class="posts__date"><?= date('j F Y | H:i', strtotime($row['created_at'])) ?></time>
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
<script> 
    $('.berita').on('click', function (e) {

        e.preventDefault();
        const view = $(this).data('id');
        const href = $(this).attr('href');
        url = $('#base').data('id') + '/getnews/' + view;

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                document.location.href = href;
            }
        });

    });

    $(document).ready(function () { 
        const id = $('#display_comment').data('id');

        $("#komentar").click(function () {
            url = $('#comment').data('id') + '/komen/' + id;
            $.ajax({
                type: "post",
                url: url,
                data: "urut=" + $(".baris:last").attr('id'),
                success: function (html) {
                    if (html) {
                        $("#display_comment").append(html);     
                    } 
                }
            });
        });
    });

    $(document).ready(function () {
        const BASEURL = $('#comment').data('id');
        const id = $('#display_comment').data('id');
        $('#form_komen').on('submit', function (event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            url = BASEURL + '/tambah-komen/' + id; 
            if (komen == 0) {
                $('#komen').focus();
                return false;
            }
            $.ajax({
                url: url,
                type: 'POST',
                data: form_data,
                success: function (data) {
                    $('#form_komen')[0].reset();
                    $('#komentar_id').val('0');
                    load_comment();
                    var dialog = bootbox.dialog({
                        message: '<p class="text-center mb-0"><i class="fa fa-check-circle"></i> Your comment has been post...</p>',
                        closeButton: false
                    });
                    setTimeout(function(){
                        dialog.modal('hide');
                    }, 3000);
                }
            });
        });

        load_comment();

        function load_comment() {
            url = BASEURL + '/ambil-komen/' + id;

            $.ajax({
                url: url,
                method: "post",
                success: function (data) {
                    $('#display_comment').html(data);
                }

            });

        }

        $(document).on('click', '.reply', function () {
            var komentar_id = $(this).attr("id");
            $('#komentar_id').val(komentar_id);
            $('#komen').focus();

        });
    });


    $('.like').click(function() {
        var t = $(this);
        $.ajax({
            url : '<?=url('add-like/'.$data['content']['id_news_game']);?>',
            method : 'POST',
            dataType : 'json',
            success: function (msg){
                // console.log(msg);
                if (msg.status == true) { 
                    t.html('<i class="fas fa-heart"></i> ' + msg.content);
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