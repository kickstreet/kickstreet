<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kickstreet</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicon
        ============================================ -->
        <!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"> -->

        <!-- Google Fonts
        ============================================ -->
        <link href='https://fonts.googleapis.com/css?family=Norican' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- Bootstrap CSS
        ============================================ -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Bootstrap CSS
        ============================================ -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!-- owl.carousel CSS
        ============================================ -->
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/css/owl.theme.css">
        <link rel="stylesheet" href="assets/css/owl.transitions.css">
        <!-- jquery-ui CSS
        ============================================ -->
        <link rel="stylesheet" href="assets/css/jquery-ui.css">
        <!-- meanmenu CSS
        ============================================ -->
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <!-- nivoslider CSS
        ============================================ -->
        <link rel="stylesheet" href="assets/lib/css/nivo-slider.css">
        <link rel="stylesheet" href="assets/lib/css/preview.css">
        <!-- animate CSS
        ============================================ -->
        <link rel="stylesheet" href="assets/css/animate.css">
        <!-- magic CSS
        ============================================ -->
        <link rel="stylesheet" href="assets/css/magic.css">
        <!-- normalize CSS
        ============================================ -->
        <link rel="stylesheet" href="assets/css/normalize.css">
        <!-- main CSS
        ============================================ -->
        <link rel="stylesheet" href="assets/css/main.css">
        <!-- style CSS
        ============================================ -->
        <link rel="stylesheet" href="assets/style.css">
        <!-- responsive CSS
        ============================================ -->
        <link rel="stylesheet" href="assets/css/responsive.css">
        <!-- modernizr JS
        ============================================ -->
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <!-- header area start -->
        <header>
            <div class="top-link">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-md-offset-3 col-sm-9 hidden-xs">
                            <!--div class="site-option">
                                <ul>
                                    <li class="currency"><a href="#">USD <i class="fa fa-angle-down"></i> </a>
                                        <ul class="sub-site-option">
                                            <li><a href="#">Eur</a></li>
                                            <li><a href="#">Usd</a></li>
                                        </ul>
                                    </li>
                                    <li class="language"><a href="#">English <i class="fa fa-angle-down"></i> </a>
                                        <ul class="sub-site-option">
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">English2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="call-support">
                                <p>Call support free: <span> (800) 123 456 789</span></p>
                            </div-->
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <div class="dashboard">
                                <div class="account-menu">
                                    <ul>
                                        <li class="search">
                                            <a href="#">
                                                <i class="fa fa-search"></i>
                                            </a>
                                            <ul class="search">
                                                <li>
                                                    <form action="#">
                                                        <input type="text">
                                                        <button type="submit"> <i class="fa fa-search"></i> </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                            <ul>
                                                <!--li><a href="my-account.html">my account</a></li>
                                                <li><a href="wishlist.html">my wishlist</a></li>
                                                <li><a href="cart.html">my cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="blog.html">Blog</a></li-->
                                                <?php if (session()->get('isLoggedIn')): ?>
                                                    <li><a href="/logout">Cerrar sesión</a></li>
                                                <?php else: ?>
                                                    <li><a href="/login">Iniciar sesión</a></li>
                                                <?php endif ?>
                                                
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!--div class="cart-menu">
                                    <ul>
                                        <li><a href="#"> <img src="assets/img/icon-cart.png" alt=""> <span>2</span> </a>
                                            <div class="cart-info">
                                                <ul>
                                                    <li>
                                                        <div class="cart-img">
                                                            <img src="assets/img/cart/1.png" alt="">
                                                        </div>
                                                        <div class="cart-details">
                                                            <a href="#">Fusce aliquam</a>
                                                            <p>1 x $174.00</p>
                                                        </div>
                                                        <div class="btn-edit"></div>
                                                        <div class="btn-remove"></div>
                                                    </li>
                                                    <li>
                                                        <div class="cart-img">
                                                            <img src="assets/img/cart/2.png" alt="">
                                                        </div>
                                                        <div class="cart-details">
                                                            <a href="#">Fusce aliquam</a>
                                                            <p>1 x $777.00</p>
                                                        </div>
                                                        <div class="btn-edit"></div>
                                                        <div class="btn-remove"></div>
                                                    </li>
                                                </ul>
                                                <h3>Subtotal: <span> $951.00</span></h3>
                                                <a href="checkout.html" class="checkout">checkout</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mainmenu-area home2 product-items">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="assets/img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="mainmenu">
                                <nav>
                                    <ul>
                                        <li><a href="shop.html">Tienda</a>
                                            <div class="sub-menu">
                                                <span>
                                                    <a href="#">Tenis</a>
                                                    <a href="#">Ropa</a>
                                                    <a href="#">Accesorios</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li><a href="shop.html">Tenis</a>
                                            <div class="sub-menu">
                                                <span>
                                                    <a href="#">Nike</a>
                                                    <a href="#">Adidas</a>
                                                    <a href="#">Converse</a>
                                                    <a href="#">Rebook</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li><a href="shop.html">Ropa</a>
                                            <div class="sub-menu">
                                                <span>
                                                    <a href="#">Chamarras</a>
                                                    <a href="#">Playeras</a>
                                                    <a href="#">Pants</a>
                                                    <a href="#">Shorts</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li><a href="shop.html">Accessorios</a></li>
                                        <li><a href="shop.html">FAQ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mobile-menu">
                                <nav>
                                    <ul>
                                        <li><a href="shop.html">Tienda</a>
                                            <ul>
                                                <li><a href="#">Tenis</a></li>
                                                <li><a href="#">Ropa</a></li>
                                                <li><a href="#">Accesorios</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Tenis</a>
                                            <ul>
                                                <li><a href="#">Nike</a></li>
                                                <li><a href="#">Adiddas</a></li>
                                                <li><a href="#">Converse</a></li>
                                                <li><a href="#">Rebook</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Ropa</a>
                                            <ul>
                                                <li><a href="#">Chamarras</a></li>
                                                <li><a href="#">Playeras</a></li>
                                                <li><a href="#">Pants</a></li>
                                                <li><a href="#">Shorts</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Accessorios</a></li>
                                        <li><a href="shop.html">FAQ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header area end -->
        <!-- product items banner start -->
        <div class="product-banner">
            <!-- <img src="assets/img/product/banner.jpg" alt=""> -->
            <img src="assets/img/Banner1.jpg" alt=""> 
        </div>
        <!-- product items banner end -->
        <!-- product main items area start -->
        <div class="product-main-items">
            <div class="container">
                <!--<div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="/" title="Ir a Inicio">Inicio</a></li>
                            </ul>
                        </div>
                    </div>
                </div>-->