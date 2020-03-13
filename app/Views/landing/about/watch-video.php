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

                        <figure class="post__thumbnail post__thumbnail--square"> 
                            <iframe type="text/html" src="<?=$data['content']['video_url'];?>?modestbranding=1&rel=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width:100%;height:400px;"></iframe>
                        </figure>
                        
                        <header class="post__header">
                            <div class="post__category mt-4 mb-0 p-0">
                                <?= $data['label']; ?>
                            </div>
                            <h2 class="post__title pb-0 mb-0" style="font-size:23px;"><?= $data['content']['title'] ?></h2>
                            <div class="d-flex justify-content-between">
                                <ul class="post__meta meta p-0 m-0">
                                    <li class="meta__item meta__item--date" style="font-size:12px;"><?= $data['content']['view'];?> x watched </li>
                                    <li class="meta__item meta__item--date ml-1 mr-0" style="font-size:30px;">.</li>
                                    <li class="meta__item meta__item--date ml-0" style="font-size:12px;"><?= date('j M Y',strtotime($data['content']['created_at']));?></li>
                                </ul>
                                <?php if ($data['like_it'] != false):?>
                                <ul class="post__meta meta p-0 mt-0 mr-5 mb-0">
                                    <?php if ($data['like_it']['likes'] == 1):?>
                                    <li class="meta__item meta__item--date like" style="font-size:18px;" data-toggle="tooltip" data-placement="top" title="I Like It"><a href="javascript:void(0);"><i class="fas fa-thumbs-up"></i> <?=$data['like'];?></a></li>
                                    <?php else:?>
                                    <li class="meta__item meta__item--date like" style="font-size:18px;" data-toggle="tooltip" data-placement="top" title="I Like It"><a href="javascript:void(0);"><i class="far fa-thumbs-up"></i> <?=$data['like'];?></a></li>
                                    <?php endif;?>
                                    <li class="meta__item meta__item--date ml-1 mr-0" style="font-size:30px;">.</li>
                                    <?php if ($data['like_it']['dislike'] == 1):?>
                                    <li class="meta__item meta__item--date ml-0 dislike" style="font-size:18px;" data-toggle="tooltip" data-placement="top" title="I Dont Like It"><a href="javascript:void(0);"><i class="fas fa-thumbs-down"></i> <?=$data['dislike'];?></a></li>
                                    <?php else:?>
                                    <li class="meta__item meta__item--date ml-0 dislike" style="font-size:18px;" data-toggle="tooltip" data-placement="top" title="I Dont Like It"><a href="javascript:void(0);"><i class="far fa-thumbs-down"></i> <?=$data['dislike'];?></a></li>
                                    <?php endif;?>
                                </ul>
                                <?php else:?>
                                <ul class="post__meta meta p-0 mt-0 mr-5 mb-0">
                                    <li class="meta__item meta__item--date like" style="font-size:18px;" data-toggle="tooltip" data-placement="top" title="I Like It"><a href="javascript:void(0);"><i class="far fa-thumbs-up"></i> <?=$data['like'];?></a></li>
                                    <li class="meta__item meta__item--date ml-1 mr-0" style="font-size:30px;">.</li>
                                    <li class="meta__item meta__item--date ml-0 dislike" style="font-size:18px;" data-toggle="tooltip" data-placement="top" title="I Dont Like It"><a href="javascript:void(0);"><i class="far fa-thumbs-down"></i> <?=$data['dislike'];?></a></li>
                                </ul>
                                <?php endif;?>
                                <!-- <span></span> -->
                            </div>
                        </header> 
                        <hr/>
                        <div class="post__content post__content--inner p-0 m-0"><?= $data['content']['description']; ?></div> 

                    </div>
                </article>
                <!-- Article / End -->

                <!-- Post Sharing Buttons -->
                <div class="post-sharing">
                    <a href="#" class="btn btn-default btn-facebook btn-icon btn-block"><i class="fa fa-facebook"></i> <span class="post-sharing__label hidden-xs">Share on Facebook</span></a>
                    <a href="#" class="btn btn-default btn-twitter btn-icon btn-block"><i class="fa fa-twitter"></i> <span class="post-sharing__label hidden-xs">Share on Twitter</span></a>
                </div>
                <!-- Post Sharing Buttons / End --> 

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
                                    <!-- <div class="comments__inner">
                                        <header class="comment__header">
                                            <div class="comment__author">
                                                <figure class="comment__author-avatar comment__author-avatar--md">
                                                    <img src="" alt="">
                                                    <div class="baris" id="'.$row['komentar_id'].'">
                                                    </div>
                                                </figure>
                                            </div>
                                        </header>
                                        <div class="comment__inner-wrap">
                                            <div class="comment__author-info">
                                                <h5 class="comment__author-name">Madhan</h5>
                                                <time class="comment__post-date" datetime="2017-08-23">2 Nov 2020</time>
                                            </div>
                                            <div class="comment__body">
                                                Test
                                            </div>
                                            <div class="comment__reply" style="font-size:12px;">
                                                <a href="javascript:void(0);" class="comment__reply-link reply" id="id-reply">Reply</a>
                                                <span class="mx-1">|</span> 
                                                <a href="javascript:void(0);" class="comment__reply-link reply">Lihat Balasan (0)</a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="comments--children">
                                        <li class="comments__item">
                                            <div class="comments__inner">
                                                <header class="comment__header">
                                                    <div class="comment__author">
                                                        <figure class="comment__author-avatar comment__author-avatar--md">
                                                            <img src="" alt="">
                                                        </figure>
                                                    </div>
                                                </header>
                                                <div class="comment__inner-wrap">
                                                    <div class="comment__author-info">
                                                        <h5 class="comment__author-name">Name</h5>
                                                        <time class="comment__post-date" datetime="2017-08-23">2 Nov 2020</time>
                                                    </div>
                                                    <div class="comment__body">
                                                        HAI JUGA
                                                    </div> 
                                                </div>
                                            </div>
                                        </li>
                                    </ul> -->
                                <!-- endcomment -->
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
                <?php else:?>
                <div class="alert alert-info">
                    Please <a href="<?=url('login');?>">LOGIN</a> before if you want to give the comment.
                </div>
                <?php endif ;?>

            </div>
            <!-- Content / End -->

            <!-- Sidebar -->
            <div id="sidebar" class="sidebar col-lg-4">

                <!-- Widget: Trending News -->
                <aside class="widget widget--sidebar card widget-tabbed">
                    <div class="widget__title card__header">
                        <h4>Recommended</h4>
                    </div>
                    <div class="widget__content card__content">
                        <div class="widget-tabbed__tabs"> 

                            <!-- Widget Tab panes -->
                            <div class="tab-content widget-tabbed__tab-content">
                                <!-- Newest -->
                                <div role="tabpanel" class="tab-pane fade show active" id="widget-tabbed-newest">
                                    <ul class="posts posts--simple-list"> 
                                         
                                            <?php foreach ($data['recommended'] as $row):  
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
                                                if (strlen($row['title']) > 65) {
                                                    $title = strtoupper(substr($row['title'],0,65)).'....';
                                                } else {
                                                    $title = strtoupper($row['title']);
                                                }
                                            ?>
                                                
                                           
                                        <li class="posts__item posts__item--category-1 posts__item--category-4 ">
                                            <figure class="posts__thumb">
                                                <a href="javascript:void(0);" data-id=" " onclick="window.location.href = '<?=url('watch/'.$row['url']);?>'"><img src="<?=cdn(paths('backup_videos'));?><?= $row['thumbnail'] ?>" alt="" style="width:125px;height:73px;"></a>
                                            </figure>
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <?=$label;?>
                                                </div>
                                                <h6 class="posts__title posts__title--color-hover">
                                                    <a href="javascript:void(0);" data-id=" " onclick="window.location.href = '<?=url('watch/'.$row['url']);?>'"><?= $title; ?></a>
                                                </h6>
                                                <time datetime="2018-09-27" class="posts__date"><?= date('j F Y', strtotime($row['created_at'])) ?></time>
                                            </div>
                                        </li>
                                        
                                     <?php endforeach; ?> 
                                    </ul>
                                </div>
                                <!-- Commented --> 
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
    load_comment();
    $('.like').click(function() { 
        var t = $(this);
        $.ajax({
            url : '<?=url('like-video/'.$data['content']['videos_id']);?>',
            method : 'POST',
            dataType : 'json',
            success: function (msg){
                console.log(msg);
                if (msg.status == true) {
                    if (msg.result == 1.1) { //ketika belum ada like dan dislike 
                        t.find('a').html('<i class="fas fa-thumbs-up"></i> ' + msg.like); //penuh
                        $('.dislike').find('a').html('<i class="far fa-thumbs-down"></i> ' + msg.dislike); //kosong 
                    } else if (msg.result == 1.2) { //ketika udah like dan batal like 
                        t.find('a').html('<i class="far fa-thumbs-up"></i> ' + msg.like); //kosong
                        $('.dislike').find('a').html('<i class="far fa-thumbs-down"></i> ' + msg.dislike); //kosong 
                    } else if (msg.result == 1.3) { //ketika udah dislike dan mau like
                        t.find('a').html('<i class="fas fa-thumbs-up"></i> ' + msg.like); //penuh
                        $('.dislike').find('a').html('<i class="far fa-thumbs-down"></i> ' + msg.dislike); //kosong 
                    }
                } else {
                    var scroll = $(window).scrollTop(); 
                    var dialog = bootbox.dialog({
                        message: '<p class="text-center mb-0"><i class="fa fa-times-circle"></i> '+ msg.message +'</p>',
                        closeButton: true
                    });
                    setTimeout(function(){
                        $('html, body').animate({scrollTop : scroll},800);
                        dialog.modal('hide');
                    }, 3000);
                }
            }
        });
    });

    $('.dislike').click(function() { 
        var t = $(this);
        $.ajax({
            url : '<?=url('dislike-video/'.$data['content']['videos_id']);?>',
            method : 'POST',
            dataType : 'json',
            success: function (msg){
                if (msg.status == true) {
                    if (msg.result == 1.1) {
                        t.find('a').html('<i class="fas fa-thumbs-down"></i> ' + msg.dislike);  //penuh
                        $('.like').find('a').html('<i class="far fa-thumbs-up"></i> ' + msg.like); //kosong
                    } else if (msg.result == 1.2) {
                        t.find('a').html('<i class="far fa-thumbs-down"></i> ' + msg.dislike); //kosong
                        $('.like').find('a').html('<i class="far fa-thumbs-up"></i> ' + msg.like); //kosong
                    }  else if (msg.result == 1.3) { //ketika udah dislike dan mau like
                        t.find('a').html('<i class="fas fa-thumbs-down"></i> ' + msg.dislike); //penuh
                        $('.like').find('a').html('<i class="far fa-thumbs-up"></i> ' + msg.like); //kosong 
                    }
                } else {
                    var scroll = $(window).scrollTop(); 
                    var dialog = bootbox.dialog({
                        message: '<p class="text-center mb-0"><i class="fa fa-times-circle"></i> '+ msg.message +'</p>',
                        closeButton: true
                    });
                    setTimeout(function(){
                        dialog.modal('hide');
                        $('html, body').animate({scrollTop : scroll},800);
                    }, 3000);
                }
            }
        });
    });

    function load_comment() {  
        $.ajax({
            url: '<?=url('get-comment-video/').$data['content']['videos_id'];?>',
            method: "post",
            dataType : 'json',
            success: function (data) { 
                // console.log(data);               
                $('#display_comment').html(data.result);
                if (data.count < 5) {
                    $('#komentar').remove();
                }
            }
        });
    }

    $('#form_komen').on('submit', function (event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        var komen = $(this).find('#komen').val();
        if (komen == '') {
            $('#komen').focus();
            return false;
        } 
        $.ajax({
            url: '<?=url('add-comment-video/'.$data['content']['videos_id']);?>',
            type: 'POST',
            data: form_data,
            success: function (data) {
                // console.log(data);
                load_comment();
                var scroll = $(window).scrollTop(); 
                $('#form_komen')[0].reset();
                $('#komentar_id').val('0');
                var dialog = bootbox.dialog({
                    message: '<p class="text-center mb-0"><i class="fa fa-check-circle"></i> Your comment has been post...</p>',
                    closeButton: true,
                    callback: function(){
                    }
                });
                setTimeout(function(){
                    dialog.modal('hide');
                    $('html, body').animate({scrollTop : scroll},800);
                }, 3000);
            }
        });
    });

    $(document).on('click', '.reply', function () {
        var komentar_id = $(this).attr("id");
        $('#komentar_id').val(komentar_id);
        $('#komen').focus(); 
    }); 

    $("#komentar").click(function () { 
        var t = $(this); 
        $.ajax({
            url: '<?=url('LoadMore/').$data['content']['videos_id'];?>',
            type: "post",
            data: "urut=" + $(".baris:last").attr('id'),
            dataType : 'json',
            success: function (html) {
                if (html) { 
                    $("#display_comment").append(html.result);
                    if (html.count == 0) {
                        t.remove();
                    }      
                } 
            }
        });
    }); 

</script>