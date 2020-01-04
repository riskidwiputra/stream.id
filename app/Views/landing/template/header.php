
<!DOCTYPE html>
<html lang="zxx">

<head>

    <!-- Basic Page Needs
	================================================== -->
    <title>Stream-Gaming</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sports Club, League and News HTML Template">
    <meta name="author" content="Dan Fisher">
    <meta name="keywords" content="sports club news HTML template">

    <!-- Favicons
	================================================== -->
    <link rel="shortcut icon" href="<?= BASEURL ?>/public/assets/images/esports/icons/icon-stream-gaming.ico">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= BASEURL ?>/public/assets/images/esports/icons/icon-stream-gaming.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= BASEURL ?>/public/assets/images/esports/icons/icon-stream-gaming.png">

    <!-- Mobile Specific Metas
	================================================== -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">

    <!-- Google Web Fonts
	================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700|Roboto+Condensed:400,400i,700,700i" rel="stylesheet">

    <!-- CSS
	================================================== -->
    <!-- Vendor CSS -->
    <link href="<?= BASEURL ?>/public/assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/public/assets/fonts/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/public/assets/fonts/font-awesome/css/v4-shims.min.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/public/assets/fonts/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/public/assets/vendor/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/public/assets/vendor/slick/slick.css" rel="stylesheet">

    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/public/assets/vendor/revolution/css/settings.css">

    <!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/public/assets/vendor/revolution/css/layers.css">

    <!-- REVOLUTION NAVIGATION STYLES -->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/public/assets/vendor/revolution/css/navigation.css">

    <!-- REVEAL ADD-ON FILES -->
    <link rel='stylesheet' href='<?= BASEURL ?>/public/assets/vendor/revolution-addons/reveal/css/revolution.addon.revealer.css?ver=1.0.0' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= BASEURL ?>/public/assets/vendor/revolution-addons/reveal/css/revolution.addon.revealer.preloaders.css?ver=1.0.0' type='text/css' media='all' />

    <!-- TYPEWRITER ADD-ON FILES -->
    <link rel='stylesheet' href='<?= BASEURL ?>/public/assets/vendor/revolution-addons/typewriter/css/typewriter.css' type='text/css' media='all' />

    <!-- Template CSS-->
    <link href="<?= BASEURL ?>/public/assets/css/style-esports.css" rel="stylesheet">

    <!-- Custom CSS-->
    <link href="<?= BASEURL ?>/public/assets/css/custom.css" rel="stylesheet">

    

</head>

<body data-template="template-esports">

    <div class="site-wrapper clearfix">
        <div class="site-overlay"></div>

        <!-- Header
		================================================== -->

        <!-- Header Mobile -->
        <div class="header-mobile clearfix" id="header-mobile">
            <div class="header-mobile__logo">
                <a href="index.php"><img src="<?= BASEURL ?>/public/assets/images/esports/streamgaming.png" width="250" srcset="assets/images/esports/streamgaming.png 2x" alt="Alchemists" class="header-mobile__logo-img"></a>
            </div>
            <div class="header-mobile__inner">
                <a id="header-mobile__toggle" class="burger-menu-icon"><span class="burger-menu-icon__line"></span></a>
                <span class="header-mobile__search-icon" id="header-mobile__search-icon"></span>
            </div>
        </div>
        <!-- Header Mobile / End -->

        <!-- Header Desktop -->
        <header class="header header--layout-3">

            <!-- Header Top Bar -->
            <div class="header__top-bar clearfix">
                <div class="container">
                    <div class="header__top-bar-inner">

                        <!-- Social Links -->
                        <ul class="social-links social-links--inline social-links--main-nav social-links--top-bar">
                            <li class="social-links__item">
                                <a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa fa-facebook-square"></i></a>
                            </li>
                            <li class="social-links__item">
                                <a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa fa-twitter"></i></a>
                            </li>
                            <li class="social-links__item">
                                <a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom" title="YouTube"><i class="fa fa fa-youtube-play"></i></a>
                            </li>
                            <li class="social-links__item">
                                <a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa fa-instagram"></i></a>
                            </li>
                        </ul>
                        <!-- Social Links / End -->

                        <!-- Account Navigation -->
                        <ul class="nav-account">
                        <li class="nav-account__item"><a href="index.php?page=account">My Account</a></li>
                            <li class="nav-account__item"><a href="index.php?page=login">Login</a></li>
                            <li class="nav-account__item nav-account__item--logout"><a href="#">Logout</a></li>
                        </ul>
                        <!-- Account Navigation / End -->
                    </div>
                </div>
            </div>
            <!-- Header Top Bar / End -->

            <!-- Header Primary -->
            <div class="header__primary">
                <div class="container">
                    <div class="header__primary-inner">

                        <!-- Header Logo -->
                        <div class="header-logo">
                            <a href="index.php"><img src="<?= BASEURL ?>/public/assets/images/esports/streamgaming.png" width="250" srcset="<?= BASEURL ?>/public/assets/images/esports/streamgaming.png 2x" alt="Alchemists" class="header-logo__img"></a>
                        </div>
                        <!-- Header Logo / End -->

                        <!-- Main Navigation -->
                        <nav class="main-nav">
                            <ul class="main-nav__list">
                                <li class="active"><a href="<?= BASEURL ?>/">Home</a></li>
                                <li class=""><a href="#">News</a>
                                    <ul class="main-nav__sub">
                                        <li class=""><a href="<?= BASEURL ?>/news">News</a></li>
                                        <li class=""><a href="<?= BASEURL ?>/next-matchs">Next Matchs</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="index.php?page=game-list">Games</a>
                                    <ul class="main-nav__sub">
                                    <li class=""><a href="<?= BASEURL ?>/dota">Dota</a></li>
                                        <li class=""><a href="<?= BASEURL ?>/mobile-legend">Mobile Legends</a></li>
                                        <li class=""><a href="<?= BASEURL ?>/pubg-mobile">PUBG Mobile</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="index.php?page=contact">About Me</a>
                                    <ul class="main-nav__sub">
                                        <li class=""><a href="index.php?page=contact">Contact</a></li>
                                        <li class=""><a href="index.php?page=faqs">FAQs</a></li>
                                        <li class=""><a href="index.php?page=sponsors">Sponsors</a></li>
                                        <li><a href="index.php?page=galery">Gallery</a></li>
                                        <li><a href="index.php?page=videos-list">Videos</a></li>
                                        <li><a href="index.php?page=marchandise">Merchandise</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <!-- Main Navigation / End -->

                        <div class="header__primary-spacer"></div>

                        <!-- Header Search Form -->
                        <div class="header-search-form ">
                            <form action="#" id="mobile-search-form" class="search-form">
                                <input type="text" class="form-control header-mobile__search-control" value="" placeholder="Enter your search here...">
                                <button type="submit" class="header-mobile__search-submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!-- Header Search Form / End -->

                       <!-- Header Info Block -->
						<ul class="info-block info-block--header">
						
                        <li class="info-block__item info-block__item--shopping-cart js-info-block__item--onclick">
                            <a href="_esports_shop-cart.html" class="info-block__link-wrapper">
                                <svg role="img" class="df-icon df-icon--shopping-cart">
                                    <use xlink:href="<?= BASEURL ?>/public/assets/images/esports/icons-esports.svg#cart"/>
                                </svg>
                                <h6 class="info-block__heading">Your Bag (8 items)</h6>
                                <span class="info-block__cart-sum">$256,30</span>
                            </a>
                        
                            <!-- Dropdown Shopping Cart -->
                            <ul class="header-cart header-cart--inventory">
                        
                                <li class="header-cart__item header-cart__item--title">
                                    <h5>Bag Inventory</h5>
                                </li>
                        
                                <li class="header-cart__item">
                                    <figure class="header-cart__product-thumb">
                                        <a href="_esports_shop-product.html">
                                            <img src="<?= BASEURL ?>/public/assets/images/esports/samples/cart-sm-1.jpg" alt="Jaxxy Framed Art Print">
                                        </a>
                                    </figure>
                                    <div class="header-cart__badges">
                                        <span class="badge badge-primary">2</span>
                                        <span class="badge badge-default badge-close"><i class="fa fa-times"></i></span>
                                    </div>
                                </li>
                                <li class="header-cart__item">
                                    <figure class="header-cart__product-thumb">
                                        <a href="_esports_shop-product.html">
                                            <img src="<?= BASEURL ?>/public/assets/images/esports/samples/cart-sm-2.jpg" alt="Tech Warrior Framed Art Print">
                                        </a>
                                    </figure>
                                    <div class="header-cart__badges">
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-default badge-close"><i class="fa fa-times"></i></span>
                                    </div>
                                </li>
                                <li class="header-cart__item">
                                    <figure class="header-cart__product-thumb">
                                        <a href="_esports_shop-product.html">
                                            <img src="<?= BASEURL ?>/public/assets/images/esports/samples/cart-sm-3.jpg" alt="Alchemists White Mug">
                                        </a>
                                    </figure>
                                    <div class="header-cart__badges">
                                        <span class="badge badge-default badge-close"><i class="fa fa-times"></i></span>
                                    </div>
                                </li>
                                <li class="header-cart__item">
                                    <figure class="header-cart__product-thumb">
                                        <a href="_esports_shop-product.html">
                                            <img src="<?= BASEURL ?>/public/assets/images/esports/samples/cart-sm-4.jpg" alt="Mercenaries Framed Art Print">
                                        </a>
                                    </figure>
                                    <div class="header-cart__badges">
                                        <span class="badge badge-default badge-close"><i class="fa fa-times"></i></span>
                                    </div>
                                </li>
                        
                                <li class="header-cart__item">
                                    <figure class="header-cart__product-thumb"></figure>
                                </li>
                                <li class="header-cart__item">
                                    <figure class="header-cart__product-thumb"></figure>
                                </li>
                                <li class="header-cart__item">
                                    <figure class="header-cart__product-thumb"></figure>
                                </li>
                                <li class="header-cart__item">
                                    <figure class="header-cart__product-thumb"></figure>
                                </li>
                                <li class="header-cart__item">
                                    <figure class="header-cart__product-thumb"></figure>
                                </li>
                        
                                <li class="header-cart__item header-cart__item--subtotal">
                                    <span class="header-cart__subtotal">Inventory Subtotal</span>
                                    <span class="header-cart__subtotal-sum">$256.30</span>
                                </li>
                                <li class="header-cart__item header-cart__item--action">
                                    <a href="index.php?page=shop" class="btn btn-primary btn-block">Go to Shopping</a>
                                    <a href="index.php?page=wishlist" class="btn btn-primary-inverse btn-block">See Wishlist</a>
                                    <a href="index.php?page=cart" class="btn btn-primary btn-block">Go to Cart</a>
                                    <a href="index.php?page=checkout" class="btn btn-primary-inverse btn-block">Proceed to Checkout</a>
                                </li>
                            </ul>
                            <!-- Dropdown Shopping Cart / End -->
                        
                        </li>
                    </ul>
                    <!-- Header Info Block / End -->

                    </div>
                </div>
            </div>
            <!-- Header Primary / End -->

        </header>
        <!-- Header / End -->