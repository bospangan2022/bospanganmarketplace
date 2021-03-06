<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/home2-default.html   11 Nov 2019 12:22:28 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bos Pangan | Login</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/marketplace/images/favicon.png') }}" />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/marketplace/css/plugins.css') }}">
    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/marketplace/css/bootstrap.min.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/marketplace/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/marketplace/css/responsive.css') }}">
</head>

<body class="page-template belle">
    <div id="pre-loader">
        <img src="{{ asset('assets/marketplace/images/loader.gif') }}" alt="Loading..." />
    </div>
    <div class="pageWrapper">
        <!--Promotion Bar-->
        <!-- <div class="notification-bar mobilehide">
    <a href="#" class="notification-bar__message">20% off your very first purchase, use promo code: belle fashion</a>
        <span class="close-announcement">×</span>
    </div> -->
        <!--End Promotion Bar-->
        <!--Search Form Drawer-->
        <div class="search">
            <div class="search__form">
                <form class="search-bar__form" action="{{ url('search') }}">
                    <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                    <input class="search__input" type="text" name="cari"
                        placeholder="Masukkan Nama Barang Yang Anda Cari" aria-label="Search" autocomplete="off">
                </form>
                <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
            </div>
        </div>
        <!--End Search Form Drawer-->
        <!--Top Header-->
        <div class="top-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 col-sm-8 col-md-5 col-lg-4">
                        <div class="language-dropdown">
                            <span class="language-dd">Indonesia</span>
                            <ul id="language">
                                <li class="">English</li>
                            </ul>
                        </div>
                        <p class="phone-no"><i class="anm anm-phone-s"></i> +62 8383383383</p>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                        <div class="text-center">
                            <p class="top-header_middle-text"> Bos Pangan Masalah Pangan Beres</p>
                        </div>
                    </div>
                    <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                        <span class="user-menu d-block d-lg-none"><i class="anm anm-user-al"
                                aria-hidden="true"></i></span>
                        <ul class="customer-links list-inline">
                            <?php

                            use Illuminate\Support\Facades\Auth;

                            if (!Auth::check()) { ?>

                            <li><a href="{{ url('login') }}">Login</a></li>
                            <li><a href="{{ url('register') }}">Create Account</a></li>

                            <?php } else { ?>

                            <li><a href="{{ url('wishlist') }}">Wishlist</a></li>
                            <li><a href="{{ url('profil') }}">{{ Auth::user()->name }} </a></li>
                            <li><a href="{{ url('logout') }}">Log Out </a></li>

                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--End Top Header-->
        <!--Header-->
        <div class="header-wrap animated d-flex border-bottom">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!--Desktop Logo-->
                    <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                        <a href="{{ url('/') }}">
                            <img src="assets/marketplace/images/logo.svg" alt="" title="" />
                        </a>
                    </div>
                    <!--End Desktop Logo-->
                    <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                        <div class="d-block d-lg-none">
                            <button type="button"
                                class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                                <i class="icon anm anm-times-l"></i>
                                <i class="anm anm-bars-r"></i>
                            </button>
                        </div>
                        <!--Desktop Menu-->
                        <nav class="grid__item" id="AccessibleNav">
                            <!-- for mobile -->
                            <ul id="siteNav" class="site-nav medium center hidearrow">
                                <li class="lvl1 parent megamenu">
                                    <a href="{{ url('/') }}">Home <i class="anm anm-angle-down-l"></i></a>
                                </li>
                                <li class="lvl1 parent megamenu">
                                    <a href="{{ url('belanja') }}">Belanja <i class="anm anm-angle-down-l"></i></a>
                                </li>
                                <li class="lvl1 parent megamenu">
                                    <a href="{{ url('aboutus') }}">Tentang Kami <i
                                            class="anm anm-angle-down-l"></i></a>
                                </li>
                            </ul>
                        </nav>
                        <!--End Desktop Menu-->
                    </div>
                    <!--Mobile Logo-->
                    <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                        <div class="logo">
                            <a href="index.html">
                                <img class="logo-mobile" src="assets/marketplace/images/logo.svg" alt="" />
                            </a>
                        </div>
                    </div>
                    <!--Mobile Logo-->

                    {{-- <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                	
                   
                    <div class="site-header__search">
                    	<button type="button" class="search-trigger"><i class="icon anm anm-search-l"></i></button>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
        <!--End Header-->

        <!--Mobile Menu-->
        <div class="mobile-nav-wrapper" role="navigation">
            <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
            <ul id="MobileNav" class="mobile-nav">
                <li class="lvl1 parent megamenu"><a href="{{ url('/') }}">Home <i
                            class="anm anm-angle-right-l"></i></a>

                </li>
                <li class="lvl1 parent megamenu"><a href="{{ url('belanja') }}">Belanja <i
                            class="anm anm-angle-right-l"></i></a>

                </li>
                <li class="lvl1 parent megamenu"><a href="{{ url('aboutus') }}">Tentang Kami <i
                            class="anm anm-angle-right-l"></i></a>
                </li>
            </ul>
        </div>
        <!--End Mobile Menu-->

        <!--Body Content-->
        @yield('content')
        <!--End Body Content-->

        <!--Footer-->
        <footer id="footer" class="footer-2">
            <div class="newsletter-section">
                <div class="container">
                    <div class="row">

                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <div class="footer-social">
                                <ul class="list--inline site-footer__social-icons social-icons">
                                    <li><a class="social-icons__link"
                                            href="https://www.facebook.com/people/Bos-Pangan/100073475478664/?sk=about"
                                            target="_blank"
                                            title="Belle Multipurpose Bootstrap 4 Template on Facebook"><i
                                                class="icon icon-facebook"></i></a></li>
                                    <li><a class="social-icons__link" href="https://twitter.com/bospangan"
                                            target="_blank"
                                            title="Belle Multipurpose Bootstrap 4 Template on Twitter"><i
                                                class="icon icon-twitter"></i> <span
                                                class="icon__fallback-text">Twitter</span></a></li>
                                    <li><a class="social-icons__link" href="https://www.instagram.com/bospangan/"
                                            target="_blank"
                                            title="Belle Multipurpose Bootstrap 4 Template on Instagram"><i
                                                class="icon icon-instagram"></i> <span
                                                class="icon__fallback-text">Instagram</span></a></li>
                                    <li><a class="social-icons__link"
                                            href="https://www.youtube.com/channel/UCnSct6D9nTIi8i4u-QS6MHA/featured"
                                            target="_blank"
                                            title="Belle Multipurpose Bootstrap 4 Template on YouTube"><i
                                                class="icon icon-youtube"></i> <span
                                                class="icon__fallback-text">YouTube</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer">
                <div class="container">
                    <!--Footer Links-->
                    <div class="footer-top">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">
                                <img src="{{ asset('assets/marketplace/images/aft-checkout.jpg') }}" alt="">
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                                <h4 class="h4">Quick Shop</h4>
                                <ul>
                                    @foreach ($katlimit as $k)
                                        <li>
                                            <a href="{{ url('belanja_kat', $k->id_kategori) }}">
                                                {{ $k->nama_kategori }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                                <h4 class="h4">Informations</h4>
                                <ul>
                                    <li><a href="{{ url('aboutus') }}">About us</a></li>
                                    <li><a href="{{ url('profil') }}">My Account</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">
                                <h4 class="h4">Contact Us</h4>
                                <ul class="addressFooter">
                                    <li><i class="icon anm anm-map-marker-al"></i>
                                        <p>Jl Ciliwung No.167A ,<br>Kecamatan Kepanjen Kidul ,<br> Kota Blitar , 66116
                                        </p>
                                    </li>
                                    <li class="phone"><i class="icon anm anm-phone-s"></i>
                                        <p>+62 813-3817-6731</p>
                                    </li>
                                    <li class="email"><i class="icon anm anm-envelope-l"></i>
                                        <p>bospangan2022@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End Footer Links-->
                    <hr>
                    <div class="footer-bottom">
                        <div class="row">
                            <!--Footer Copyright-->
                            <div
                                class="col-12 col-sm-12 col-md-12 col-lg-12 order-1 order-md-0 order-lg-0 order-sm-1 copyright text-center">
                                <span></span> <a href="templateshub.net">Bos Pangan Group </a>
                            </div>
                            <!--End Footer Copyright-->
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--End Footer-->
        <!--Scoll Top-->
        <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
        <!--End Scoll Top-->

        <!--Quick View popup-->
        <div class="modal fade quick-view-popup" id="content_quickview">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div id="ProductSection-product-template" class="product-template__container prstyle1">
                            <div class="product-single">
                                <!-- Start model close -->
                                <a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right"
                                    title="close"><span class="icon icon anm anm-times-l"></span></a>
                                <!-- End model close -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="product-details-img">
                                            <div class="pl-20">
                                                <img src="assets/marketplace/images/product-detail-page/camelia-reversible-big1.jpg"
                                                    alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="product-single__meta">
                                            <h2 class="product-single__title">Product Quick View Popup</h2>
                                            <div class="prInfoRow">
                                                <div class="product-stock"> <span class="instock ">In
                                                        Stock</span> <span class="outstock hide">Unavailable</span>
                                                </div>
                                                <div class="product-sku">SKU: <span
                                                        class="variant-sku">19115-rdxs</span></div>
                                            </div>
                                            <p class="product-single__price product-single__price-product-template">
                                                <span class="visually-hidden">Regular price</span>
                                                <s id="ComparePrice-product-template"><span
                                                        class="money">$600.00</span></s>
                                                <span
                                                    class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                                    <span id="ProductPrice-product-template"><span
                                                            class="money">$500.00</span></span>
                                                </span>
                                            </p>
                                            <div class="product-single__description rte">
                                                Belle Multipurpose Bootstrap 4 Html Template that will give you and your
                                                customers a smooth shopping experience which can be used for various
                                                kinds of stores such as fashion,...
                                            </div>

                                            <form method="post" action="http://annimexweb.com/cart/add"
                                                id="product_form_10508262282" accept-charset="UTF-8"
                                                class="product-form product-form-product-template hidedropdown"
                                                enctype="multipart/form-data">
                                                <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                                    <div class="product-form__item">
                                                        <label class="header">Color: <span
                                                                class="slVariant">Red</span></label>
                                                        <div data-value="Red"
                                                            class="swatch-element color red available">
                                                            <input class="swatchInput" id="swatch-0-red"
                                                                type="radio" name="option-0" value="Red">
                                                            <label class="swatchLbl color medium rectangle"
                                                                for="swatch-0-red"
                                                                style="background-image:url(assets/marketplace/images/product-detail-page/variant1-1.jpg);"
                                                                title="Red"></label>
                                                        </div>
                                                        <div data-value="Blue"
                                                            class="swatch-element color blue available">
                                                            <input class="swatchInput" id="swatch-0-blue"
                                                                type="radio" name="option-0" value="Blue">
                                                            <label class="swatchLbl color medium rectangle"
                                                                for="swatch-0-blue"
                                                                style="background-image:url(assets/marketplace/images/product-detail-page/variant1-2.jpg);"
                                                                title="Blue"></label>
                                                        </div>
                                                        <div data-value="Green"
                                                            class="swatch-element color green available">
                                                            <input class="swatchInput" id="swatch-0-green"
                                                                type="radio" name="option-0" value="Green">
                                                            <label class="swatchLbl color medium rectangle"
                                                                for="swatch-0-green"
                                                                style="background-image:url(assets/marketplace/images/product-detail-page/variant1-3.jpg);"
                                                                title="Green"></label>
                                                        </div>
                                                        <div data-value="Gray"
                                                            class="swatch-element color gray available">
                                                            <input class="swatchInput" id="swatch-0-gray"
                                                                type="radio" name="option-0" value="Gray">
                                                            <label class="swatchLbl color medium rectangle"
                                                                for="swatch-0-gray"
                                                                style="background-image:url(assets/marketplace/images/product-detail-page/variant1-4.jpg);"
                                                                title="Gray"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                                    <div class="product-form__item">
                                                        <label class="header">Size: <span
                                                                class="slVariant">XS</span></label>
                                                        <div data-value="XS" class="swatch-element xs available">
                                                            <input class="swatchInput" id="swatch-1-xs" type="radio"
                                                                name="option-1" value="XS">
                                                            <label class="swatchLbl medium rectangle" for="swatch-1-xs"
                                                                title="XS">XS</label>
                                                        </div>
                                                        <div data-value="S" class="swatch-element s available">
                                                            <input class="swatchInput" id="swatch-1-s" type="radio"
                                                                name="option-1" value="S">
                                                            <label class="swatchLbl medium rectangle" for="swatch-1-s"
                                                                title="S">S</label>
                                                        </div>
                                                        <div data-value="M" class="swatch-element m available">
                                                            <input class="swatchInput" id="swatch-1-m" type="radio"
                                                                name="option-1" value="M">
                                                            <label class="swatchLbl medium rectangle" for="swatch-1-m"
                                                                title="M">M</label>
                                                        </div>
                                                        <div data-value="L" class="swatch-element l available">
                                                            <input class="swatchInput" id="swatch-1-l" type="radio"
                                                                name="option-1" value="L">
                                                            <label class="swatchLbl medium rectangle" for="swatch-1-l"
                                                                title="L">L</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Action -->
                                                <div class="product-action clearfix">
                                                    <div class="product-form__item--quantity">
                                                        <div class="wrapQtyBtn">
                                                            <div class="qtyField">
                                                                <a class="qtyBtn minus" href="javascript:void(0);"><i
                                                                        class="fa anm anm-minus-r"
                                                                        aria-hidden="true"></i></a>
                                                                <input type="text" id="Quantity" name="quantity"
                                                                    value="1" class="product-form__input qty">
                                                                <a class="qtyBtn plus" href="javascript:void(0);"><i
                                                                        class="fa anm anm-plus-r"
                                                                        aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-form__item--submit">
                                                        <button type="button" name="add"
                                                            class="btn product-form__cart-submit">
                                                            <span>Add to cart</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- End Product Action -->
                                            </form>
                                            <div class="display-table shareRow">
                                                <div class="display-table-cell">
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="#"
                                                            title="Add to Wishlist"><i class="icon anm anm-heart-l"
                                                                aria-hidden="true"></i> <span>Add to Wishlist</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End-product-single-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Quick View popup-->

        <!-- Newsletter Popup -->

        <!-- End Newsletter Popup -->

        <!-- Including Jquery -->
        <script src="{{ asset('assets/marketplace/js/vendor/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('assets/marketplace/js/vendor/modernizr-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/marketplace/js/vendor/jquery.cookie.js') }}"></script>
        <script src="{{ asset('assets/marketplace/js/vendor/wow.min.js') }}"></script>
        <!-- Including Javascript -->
        <script src="{{ asset('assets/marketplace/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/marketplace/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/marketplace/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/marketplace/js/lazysizes.js') }}"></script>
        <script src="{{ asset('assets/marketplace/js/main.js') }}"></script>
        <!--For Newsletter Popup-->
        <script>
            function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
        {{--  --}}
        <!--End For Newsletter Popup-->
    </div>
</body>

<!-- belle/home2-default.html   11 Nov 2019 12:23:42 GMT -->

</html>
