<!--Content
		================================================== -->
		<div class="site-content">
    <div class="container">

        <!-- Album Heading -->
        <div class="album-heading">
            <div class="album-heading__icon alc-icon alc-icon--circle alc-icon--sm alc-icon--outline alc-icon--outline-md">
                <i class="icon-picture"></i>
            </div>
            <h2 class="album-heading__title">Galery Stream Gaming</h2>
            <h6 class="album-heading__subtitle">Updated: <?=$data['updated'];?></h6>
        </div>
        <!-- Album Heading / End -->

        <!-- Album -->
        <div class="album row js-album-masonry">

            <?php 
            $i=1; 
            foreach ($data['content'] as $row) : 
                $ii = $i++;
                $like = $this->db->table('gallery_like')->countRows('gallery_id', $row['gallery_id']);
                $likeMe = [
                    'gallery_id'    => $row['gallery_id'],
                    'users_id'      => Session::get('users')
                ];
                $likeMe = $this->db->table('gallery_like')->countRows($likeMe);
                ?>
            <div class="album__item col-4 col-sm-6 <?php if($row['position']==2){echo 'col-lg-8';}else{echo 'col-lg-4';}?>">
                <div class="album__item-holder">
                    <a href="<?=cdn(paths('backup_gallery')).$row['image'];?>" class="album__item-link mp_gallery">
                        <figure class="album__thumb">
                            <img src="<?=cdn(paths('backup_gallery')).$row['image'];?>" alt="">
                        </figure>
                        <div class="album__item-desc">
                            <h4 class="album__item-title"><?=$row['caption'];?></h4>
                            <time class="album__item-date" datetime="<?=date('Y-m-d H:i', strtotime($row['created_at']));?>"></time>
                        </div>
                    </a>
                    <ul class="album__item-meta meta">
                        <?php if ($likeMe > 0):?>
                        <li class="meta__item meta__item--likes"><a href="javascript:void(0);"><i class="meta-like meta-like--active fas fa-heart"></i> <?=$like;?></a></li>
                        <?php else:?>
                        <li class="meta__item meta__item--likes"><a href="javascript:void(0);" class="like" data-id="<?=$row['gallery_id'];?>"><i class="meta-like meta-like--active icon-heart"></i> <?=$like;?></a></li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- <div class="album__item col-4 col-sm-6 col-lg-8">
                <div class="album__item-holder">
                    <a href="<?=asset('assets/images/esports/samples/team-album1.jpg');?>" class="album__item-link mp_gallery">
                        <figure class="album__thumb">
                            <img src="<?=asset('assets/images/esports/samples/team-album1.jpg');?>" alt="">
                        </figure>
                        <div class="album__item-desc">
                            <h4 class="album__item-title">A new mage character is coming to the league</h4>
                            <time class="album__item-date" datetime="2016-08-23"></time>
                        </div>
                    </a>
                    <ul class="album__item-meta meta">
                        <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 26</a></li>
                    </ul>
                </div>
            </div>
            <div class="album__item col-4 col-sm-6 col-lg-4">
                <div class="album__item-holder">
                    <a href="<?=asset('assets/images/esports/samples/team-album3.jpg');?>" class="album__item-link mp_gallery">
                        <figure class="album__thumb">
                            <img src="<?=asset('assets/images/esports/samples/team-album3.jpg');?>" alt="">
                        </figure>
                        <div class="album__item-desc">
                            <h4 class="album__item-title">The Alchemists reach to the Xenowatch finals</h4>
                            <time class="album__item-date" datetime="2016-08-23"></time>
                        </div>
                    </a>
                    <ul class="album__item-meta meta">
                        <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 26</a></li>
                    </ul>
                </div>
            </div>
            <div class="album__item col-4 col-sm-6 col-lg-4">
                <div class="album__item-holder">
                    <a href="<?=asset('assets/images/esports/samples/team-album3.jpg');?>" class="album__item-link mp_gallery">
                        <figure class="album__thumb">
                            <img src="<?=asset('assets/images/esports/samples/team-album3.jpg');?>" alt="">
                        </figure>
                        <div class="album__item-desc">
                            <h4 class="album__item-title">The story behind Rurouni and his Robot Guardian</h4>
                            <time class="album__item-date" datetime="2016-08-23"></time>
                        </div>
                    </a>
                    <ul class="album__item-meta meta">
                        <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 26</a></li>
                    </ul>
                </div>
            </div>
            <div class="album__item col-4 col-sm-6 col-lg-4">
                <div class="album__item-holder">
                    <a href="<?=asset('assets/images/esports/samples/team-album5.jpg');?>" class="album__item-link mp_gallery">
                        <figure class="album__thumb">
                            <img src="<?=asset('assets/images/esports/samples/team-album5.jpg');?>" alt="">
                        </figure>
                        <div class="album__item-desc">
                            <h4 class="album__item-title">New Tech vehicles will be added in July&#x27;s patch</h4>
                            <time class="album__item-date" datetime="2016-08-23"></time>
                        </div>
                    </a>
                    <ul class="album__item-meta meta">
                        <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 26</a></li>
                    </ul>
                </div>
            </div>
            <div class="album__item col-4 col-sm-6 col-lg-4">
                <div class="album__item-holder">
                    <a href="<?=asset('assets/images/esports/samples/team-album6.jpg');?>" class="album__item-link mp_gallery">
                        <figure class="album__thumb">
                            <img src="<?=asset('assets/images/esports/samples/team-album6.jpg');?>" alt="">
                        </figure>
                        <div class="album__item-desc">
                            <h4 class="album__item-title">A new mage character is coming to the league</h4>
                            <time class="album__item-date" datetime="2016-08-23"></time>
                        </div>
                    </a>
                    <ul class="album__item-meta meta">
                        <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 26</a></li>
                    </ul>
                </div>
            </div>
            <div class="album__item col-4 col-sm-6 col-lg-4">
                <div class="album__item-holder">
                    <a href="<?=asset('assets/images/esports/samples/team-album7.jpg');?>" class="album__item-link mp_gallery">
                        <figure class="album__thumb">
                            <img src="<?=asset('assets/images/esports/samples/team-album7.jpg');?>" alt="">
                        </figure>
                        <div class="album__item-desc">
                            <h4 class="album__item-title">New Tech vehicles will be added in July&#x27;s patch</h4>
                            <time class="album__item-date" datetime="2016-08-23"></time>
                        </div>
                    </a>
                    <ul class="album__item-meta meta">
                        <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 26</a></li>
                    </ul>
                </div>
            </div>
            <div class="album__item col-4 col-sm-6 col-lg-4">
                <div class="album__item-holder">
                    <a href="<?=asset('assets/images/esports/samples/team-album8.jpg');?>" class="album__item-link mp_gallery">
                        <figure class="album__thumb">
                            <img src="<?=asset('assets/images/esports/samples/team-album8.jpg');?>" alt="">
                        </figure>
                        <div class="album__item-desc">
                            <h4 class="album__item-title">Futurictis Pirate class</h4>
                            <time class="album__item-date" datetime="2016-08-23"></time>
                        </div>
                    </a>
                    <ul class="album__item-meta meta">
                        <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 26</a></li>
                    </ul>
                </div>
            </div>
            <div class="album__item col-4 col-sm-6 col-lg-4">
                <div class="album__item-holder">
                    <a href="<?=asset('assets/images/esports/samples/team-album9.jpg');?>" class="album__item-link mp_gallery">
                        <figure class="album__thumb">
                            <img src="<?=asset('assets/images/esports/samples/team-album9.jpg');?>" alt="">
                        </figure>
                        <div class="album__item-desc">
                            <h4 class="album__item-title">A new mage character is coming to the league</h4>
                            <time class="album__item-date" datetime="2016-08-23"></time>
                        </div>
                    </a>
                    <ul class="album__item-meta meta">
                        <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 26</a></li>
                    </ul>
                </div>
            </div>
            <div class="album__item col-4 col-sm-6 col-lg-4">
                <div class="album__item-holder">
                    <a href="<?=asset('assets/images/esports/samples/team-album10.jpg');?>" class="album__item-link mp_gallery">
                        <figure class="album__thumb">
                            <img src="<?=asset('assets/images/esports/samples/team-album10.jpg');?>" alt="">
                        </figure>
                        <div class="album__item-desc">
                            <h4 class="album__item-title">The New AR Rifle 245 will be awarded as a prize</h4>
                            <time class="album__item-date" datetime="2016-08-23"></time>
                        </div>
                    </a>
                    <ul class="album__item-meta meta">
                        <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 26</a></li>
                    </ul>
                </div>
            </div>
            <div class="album__item col-4 col-sm-6 col-lg-4">
                <div class="album__item-holder">
                    <a href="<?=asset('assets/images/esports/samples/team-album11.jpg');?>" class="album__item-link mp_gallery">
                        <figure class="album__thumb">
                            <img src="<?=asset('assets/images/esports/samples/team-album11.jpg');?>" alt="">
                        </figure>
                        <div class="album__item-desc">
                            <h4 class="album__item-title">Sandbending ability and sandboats</h4>
                            <time class="album__item-date" datetime="2016-08-23"></time>
                        </div>
                    </a>
                    <ul class="album__item-meta meta">
                        <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 26</a></li>
                    </ul>
                </div>
            </div> -->

        </div>
        <!-- Gallery Album / End -->

        <div class="spacer-lg"></div>

        <div class="text-center">
            <a href="#" class="btn btn-primary-inverse btn-lg">Load More Photos...</a>
        </div>

    </div>
</div>

<!-- Content / End--->
<script>
    $('.like').click(function() {
        var t = $(this);
        var data = t.data('id');
        $.ajax({
            url : '<?=url('like-gallery/');?>' + data ,
            method : 'POST',
            dataType : 'json',
            success: function (msg){
                if (msg.status == true) {  
                    t.removeClass('like'); 
                    t.removeAttr('data-id');
                    t.html('<i class="meta-like meta-like--active fas fa-heart"></i> ' + msg.content);
                } else {
                    var dialog = bootbox.dialog({
                        message: '<p class="text-center mb-0"><i class="fa fa-times-circle"></i> '+ msg.message +'</p>',
                        closeButton: true
                    });
                    setTimeout(function(){
                        dialog.modal('hide');
                    }, 3000);
                }
                // console.log(msg);
            }
        });
        // console.log(data);
    });
</script>