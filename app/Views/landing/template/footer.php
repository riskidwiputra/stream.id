   <!-- Footer
		================================================ -->
            <footer id="footer" class="footer">

                <!-- Sponsors -->
                <div class="sponsors-wrapper">
                    <div class="container">
                        <div id="base" data-id="<?= BASEURL ?>"></div>
                        <div class="sponsors">
                            <ul class="sponsors-logos">
                                <li class="sponsors__item">
                                    <a href="#" target="_blank"><img src="<?=asset('assets/images/mitra/indihome.png');?>" alt="Indihome"></a>
                                </li>
                                <li class="sponsors__item">
                                    <a href="#" target="_blank"><img src="<?=asset('assets/images/mitra/stream-universe.png');?>" alt="Stream Universe"></a>
                                </li>
                                <li class="sponsors__item">
                                    <a href="#" target="_blank"><img src="<?=asset('assets/images/mitra/stream-cash.png');?>" alt="Stream Cash"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Sponsors / End -->
                <!-- Footer Widgets -->

    
                <div class="footer-widgets effect-duotone effect-duotone--base">
                    <div class="footer-widgets__inner">
                        <div class="container">
                        <hr>
                            <div class="row">

                                <div class="col-sm-6 col-lg-3">
                                    <div class="footer-col-inner">

                                        <!-- Widget: Popular Posts / End -->
                                        <div class="widget widget--footer widget-popular-posts">
                                            <div class="widget__content">
                                                <img src="<?=asset('assets/images/esports/streamgaming.png');?>"> 
                                            </div>
                                            <!-- Widget: Popular Posts / End -->

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="footer-col-inner">

                                        <!-- Widget: Popular Posts / End -->
                                        <div class="widget widget--footer widget-popular-posts">
                                            <h4 class="widget__title">Popular News</h4>
                                            <div class="widget__content">
                                                <ul class="posts posts--simple-list">
                                                <?php if ($data['populared']): ?>
                                                <?php foreach ($data['populared'] as $row): ?>
                                                    <li class="posts__item posts__item--category-4 ">
                                                        <figure class="posts__thumb posts__thumb--hover">
                                                            <a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><img src="<?=asset(paths('path_home_NewsGame_0'));?><?= $row['gambar'] ?>" width="90" height="68" alt=""></a>
                                                        </figure>
                                                        <div class="posts__inner">
                                                            <div class="posts__cat">
                                                                <span class="label posts__cat-label posts__cat-label--category-4"><?= $row['label'] ?></span>
                                                            </div>
                                                            <h6 class="posts__title posts__title--color-hover"><a href="<?=url('news/'.$row['url']);?>" class="berita" data-id="<?= $row['id_news_game'] ?>"><?= strtoupper($row['judul']); ?></a></h6>
                                                            <time datetime="2018-09-27" class="posts__date"><?= $row['tanggal'] ?></time>
                                                        </div>
                                                    </li>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Widget: Popular Posts / End -->

                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="footer-col-inner">
                                                <!-- Widget: Links -->
                                                <aside class="widget widget--footer widget_nav_menu">
                                                    <div class="widget__content">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h4 class="widget__title">Useful Links</h4>
                                                                <ul class="widget__list">
                                                                    <li><a href="index.php?page=home">Home</a></li>
                                                                    <li><a href="index.php?page=news">News</a></li>
                                                                    <li><a href="index.php?page=game-list">Game</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col">
                                                                <h4 class="widget__title">Turnament</h4>
                                                                <ul class="widget__list">
                                                                    <li><a href="index.php?page=next-matchs">Next Matchs</a></li>
                                                                    <li><a href="index.php?page=tournament">Tournament</a></li>
                                                                    <li><a href="index.php?page=match-stats">Match Stats</a></li>
                                                                    <li><a href="index.php?page=galery">Gallery</a></li>
                                                                    <li><a href="index.php?page=videos-list">Videos</a></li>
                                                                    <li><a href="index.php?page=marchandise">Merchandise</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </aside>
                                                <!-- Widget: Links / End -->
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-3 col-md-3">
                                            <div class="footer-col-inner">
                                                <!-- Widget: Links -->
                                                <aside class="widget widget--footer widget_nav_menu">
                                                    <h4 class="widget__title">About Us</h4>
                                                    <div class="widget__content">
                                                        <ul class="widget__list">
                                                            <li><a href="index.php?page=contact">Contact</a></li>
                                                            <li><a href="index.php?page=faqs">FAQs</a></li>
                                                            <li><a href="index.php?page=sponsors">Sponsors</a></li>
                                                        </ul>
                                                    </div>
                                                </aside>
                                                <!-- Widget: Links / End -->
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-3 col-md-3">
                                            <div class="footer-col-inner">
                                                <!-- Widget: Pages -->
                                                <aside class="widget widget--footer widget_pages">
                                                    <h4 class="widget__title">Login</h4>
                                                    <div class="widget__content">
                                                        <ul class="widget__list">
                                                            <li><a href="index.php?page=login">Register/Login</a></li>
                                                            <li><a href="index.php?page=privacy-policy">Privacy Policy</a></li>
                                                        </ul>
                                                    </div>
                                                </aside>
                                                <!-- Widget: Pages / End -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Footer Widgets / End -->

                    <!-- Footer Social Links -->
                    <div class="footer-social">
                        <div class="container">
                            <ul class="footer-social__list list-unstyled">
                                <li class="footer-social__item">
                                    <a href="#" class="footer-social__link">
                                        <span class="footer-social__icon">
                                    <i class="fa fa-facebook-square"></i>
                                </span>
                                        <div class="footer-social__txt">
                                            <span class="footer-social__name">Facebook</span>
                                            <span class="footer-social__user">/alchemistsgaming</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="footer-social__item">
                                    <a href="#" class="footer-social__link">
                                        <span class="footer-social__icon">
                                    <i class="fa fa-twitter"></i>
                                </span>
                                        <div class="footer-social__txt">
                                            <span class="footer-social__name">Twitter</span>
                                            <span class="footer-social__user">@alchemistsgaming</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="footer-social__item">
                                    <a href="#" class="footer-social__link">
                                        <span class="footer-social__icon">
                                    <i class="fa fa-youtube-play"></i>
                                </span>
                                        <div class="footer-social__txt">
                                            <span class="footer-social__name">YouTube</span>
                                            <span class="footer-social__user">@alchemistsgaming</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="footer-social__item">
                                    <a href="#" class="footer-social__link">
                                        <span class="footer-social__icon">
                                    <i class="fa fa-instagram"></i>
                                </span>
                                        <div class="footer-social__txt">
                                            <span class="footer-social__name">Instagram</span>
                                            <span class="footer-social__user">@alchemistsgaming</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> 
                    <!-- Footer Social Links / End -->
            </footer>
            <!-- Footer / End -->

            </div>

            <!-- Javascript Files
	================================================== -->
            <!-- Core JS -->
            <script src="<?=asset('assets/vendor/jquery/jquery.min.js');?>"></script>
            <script src="<?=asset('assets/vendor/jquery/jquery-migrate.min.js"');?>"></script>
            <script src="<?=asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
            <script src="<?=asset('assets/js/core.js');?>"></script>

            <!-- Vendor JS -->
            <script src="<?=asset('assets/vendor/twitter/jquery.twitter.js');?>"></script>
           

            <!-- REVEAL ADD-ON FILES -->
            <!-- TYPEWRITER ADD-ON FILES -->
            <script type='text/javascript' src="<?=asset('assets/vendor/revolution-addons/typewriter/js/revolution.addon.typewriter.min.js');?>"></script>

            <!-- REVOLUTION JS FILES -->
            <script type="text/javascript" src="<?=asset('assets/vendor/revolution/js/jquery.themepunch.tools.min.js');?>"></script>
            <script type="text/javascript" src="<?=asset('assets/vendor/revolution/js/jquery.themepunch.revolution.min.js');?>"></script>

            <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
            <script type="text/javascript" src="<?=asset('assets/vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js');?>"></script>
            <script type="text/javascript" src="<?=asset('assets/vendor/revolution/js/extensions/revolution.extension.migration.min.js');?>"></script>
            <script type="text/javascript" src="<?=asset('assets/vendor/revolution/js/extensions/revolution.extension.parallax.min.js');?>"></script>
            <script type="text/javascript" src="<?=asset('assets/vendor/revolution/js/extensions/revolution.extension.slideanims.min.js');?>"></script>

            <script type="text/javascript">
                var revapi, tpj;
                (function() {
                    if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
                    else onLoad();

                    function onLoad() {
                        if (tpj === undefined) {
                            tpj = jQuery;
                            if ("off" == "on") {
                                tpj.noConflict();
                            }
                        }
                        if (tpj("#hero-revslider").revolution == undefined) {
                            revslider_showDoubleJqueryError("#hero-revslider");
                        } else {
                            revapi = tpj("#hero-revslider").show().revolution({
                                sliderType: "standard",
                                jsFileLocation: "revolution/js/",
                                sliderLayout: "auto",
                                dottedOverlay: "fourxfour",
                                delay: 9000,
                                revealer: {
                                    direction: "tlbr_skew",
                                    color: "#1d1429",
                                    duration: "1500",
                                    delay: "0",
                                    easing: "Power3.easeOut",
                                    spinner: "2",
                                    spinnerColor: "rgba(0,0,0,",
                                },
                                navigation: {
                                    keyboardNavigation: "off",
                                    keyboard_direction: "horizontal",
                                    mouseScrollNavigation: "off",
                                    mouseScrollReverse: "default",
                                    onHoverStop: "off",
                                    arrows: {
                                        style: "metis",
                                        enable: true,
                                        hide_onmobile: false,
                                        hide_onleave: false,
                                        tmp: '',
                                        left: {
                                            container: "layergrid",
                                            h_align: "right",
                                            v_align: "bottom",
                                            h_offset: 72,
                                            v_offset: 0
                                        },
                                        right: {
                                            container: "layergrid",
                                            h_align: "right",
                                            v_align: "bottom",
                                            h_offset: 12,
                                            v_offset: 0
                                        }
                                    }
                                },
                                responsiveLevels: [1200, 992, 768, 576],
                                visibilityLevels: [1200, 992, 768, 576],
                                gridwidth: [1420, 992, 768, 576],
                                gridheight: [620, 580, 460, 400],
                                lazyType: "none",
                                parallax: {
                                    type: "scroll",
                                    origo: "slidercenter",
                                    speed: 400,
                                    speedbg: 0,
                                    speedls: 0,
                                    levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, -10, -15, -20, -25, 50, 51, 55],
                                },
                                shadow: 0,
                                spinner: "spinner5",
                                stopLoop: "off",
                                stopAfterLoops: -1,
                                stopAtSlide: -1,
                                shuffle: "off",
                                autoHeight: "off",
                                hideThumbsOnMobile: "off",
                                hideSliderAtLimit: 0,
                                hideCaptionAtLimit: 0,
                                hideAllCaptionAtLilmit: 0,
                                debugMode: false,
                                fallbacks: {
                                    simplifyAll: "off",
                                    nextSlideOnWindowFocus: "off",
                                    disableFocusListener: false,
                                }
                            });
                        }; /* END OF revapi call */

                        

                    }; /* END OF ON LOAD FUNCTION */
                }()); /* END OF WRAPPING FUNCTION */
            </script>

            <!-- Template JS -->
            <script src="<?=asset('assets/js/init.js');?>"></script>
            <script src="<?=asset('assets/js/custom.js');?>"></script>
            <script src="<?=asset('assets/js/script.js');?>"></script>
            <script>
            $(document).ready(function(){
            $('.dropdown-submenu a.test').on("click", function(e){
                $(this).next('ul').toggle();
        
            });
            });
            </script>
            
            

</body>

</html>