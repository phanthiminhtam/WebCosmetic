<header class="header-section d-none d-xl-block">
    <div class="header-wrapper">
        <!-- Start Header Top -->
        <div class="header-top header-top-bg--black section-fluid">
            <div class="container">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <div class="header-top-left">
                        <div class="header-top-contact header-top-contact-color--white header-top-contact-hover-color--green">
                            <a href="tel:(+800)345678" class="icon-space-right"><i class="icon-call-in"></i>(+800) 345 678</a>
                            <a href="mailto:support@plazathemes.com" class="icon-space-right"><i class="icon-envelope"></i>Support@plazathemes.com</a>
                        </div>
                    </div>
                    <div class="header-top-right">
                        <div class="header-top-user-link header-top-user-link-color--white header-top-user-link-hover-color--green">
                            <a href="{{route('home.wishlist')}}">Yêu thích</a>
                            <a href="{{route('home.cart')}}">Giỏ hàng</a>
                            <a href="{{route('home.checkout')}}">Thanh toán</a>
                            @if (request()->hasCookie('CustomerName'))
                                <a href="{{route('home.getInfo',request()->cookie('CustomerId'))}}">{{request()->cookie('CustomerName')}}</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- End Header Top -->
        <!-- Start Header Bottom -->
        <div class="header-bottom header-bottom-color--green section-fluid sticky-header sticky-color--white">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                         <!-- Start Header Logo -->
                        <div class="header-logo">
                            <div class="logo">
                                <a href="{{route('home.index')}}"><img src="/Assets/Front/Users/assets/images/logo/logo_black.png" alt=""></a>
                            </div>
                        </div>
                        <!-- End Header Logo -->

                        <!-- Start Header Main Menu -->
                        <div class="main-menu menu-color--black menu-hover-color--green">
                            <nav>
                                <ul>
                                    <li class="has-dropdown">
                                        <a class="active main-menu-link" href="{{route('home.index')}}">TRANG CHỦ</a>
                                        <!-- Sub Menu -->
                                        {{-- <ul class="sub-menu">
                                            <li><a href="index.html">Home 1</a></li>
                                            <li><a href="index-2.html">Home 2</a></li>
                                            <li><a href="index-3.html">Home 3</a></li>
                                            <li><a href="index-4.html">Home 4</a></li>
                                        </ul> --}}
                                    </li>
                                    <li class="has-dropdown has-megaitem">
                                        <a href="">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                        <!-- Mega Menu -->
                                        <div class="mega-menu">
                                            <ul class="mega-menu-inner">
                                                @foreach ($list as $item)
                                                    <li class="mega-menu-item">
                                                        <a href="{{route('home.loaimypham',$item->CatId)}}" class="mega-menu-item-title">{{$item->CatName}}</a>
                                                        <ul class="mega-menu-sub">
                                                            @foreach ($item->cosmeticline as $child)
                                                                <li><a href="shop-grid-sidebar-left.html">{{$child->LineName}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="menu-banner">
                                                <a href="#" class="menu-banner-link">
                                                    <img class="menu-banner-img" src="/Assets/Front/Users/assets/images/banner/menu-banner.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="blog-single-sidebar-left.html">Thương Hiệu<i class="fa fa-angle-down"></i></a>
                                        <!-- Sub Menu -->
                                        <ul class="sub-menu">
                                            <li><a href="#">3CE</a></li>
                                            <li><a href="#">3W Clinic</a></li>
                                            <li><a href="">A'PIEU</a></li>
                                            <li><a href="">Aritaum</a></li>
                                            <li><a href="">Avene</a></li>
                                            <li><a href="">Bath and body works</a></li>
                                            <li><a href="">Benton</a></li>
                                            <li><a href="">Biodema</a></li>
                                            <li><a href="">Careline</a></li>
                                            <li><a href="">City color</a></li>
                                            <li><a href="">Covergril</a></li>
                                            <li><a href="">DHC</a></li>
                                            <li><a href="">Dr.Belmeur</a></li>
                                            <li><a href="">Etude House</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="{{route('home.News')}}">Tin tức<i class="fa fa-angle-down"></i></a>
                                        <!-- Sub Menu -->
                                        <ul class="sub-menu">
                                            <li><a href="faq.html">Frequently Questions</a></li>
                                            <li><a href="{{route('home.csdoitra')}}">Chính sách đổi trả</a></li>
                                            <li><a href="{{route('home.myaccount')}}">Tài khoản của tôi</a></li>
                                            <li><a href="{{route('client.loginView')}}">Đăng nhập  </a></li>
                                            <li><a href="{{route('client.registerView')}}">Đăng ký</a></li>
                                            <li><a href="{{route('client.logout')}}">Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{route('home.aboutus')}}">Về chúng tôi</a>
                                    </li>
                                    <li>
                                        <a href="{{route('home.contactus')}}">Liên hệ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- End Header Main Menu Start -->

                        <!-- Start Header Action Link -->
                        <ul class="header-action-link action-color--black action-hover-color--green">
                            <li>
                                <a  href="#offcanvas-wishlish" class="offcanvas-toggle">
                                    <i class="icon-heart"></i>
                                    <span class="item-count">{{count((array) session('cartWL'))}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                    <i class="icon-bag"></i>
                                    <span class="item-count">{{count((array) session('cart'))}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Header Action Link -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
    </div>
</header>
<div class="mobile-header mobile-header-bg-color--white section-fluid d-lg-block d-xl-none">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <!-- Start Mobile Left Side -->
                <div class="mobile-header-left">
                    <ul class="mobile-menu-logo">
                        <li>
                            <a href="index.html">
                                <div class="logo">
                                    <img src="/Assets/Front/Users/assets/images/logo/logo_black.png" alt="">
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                 <!-- End Mobile Left Side -->
                 <!-- Start Mobile Right Side -->
                <div class="mobile-right-side">
                    <ul class="header-action-link action-color--black action-hover-color--green">
                        <li>
                            <a href="#search">
                                <i class="icon-magnifier"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                <i class="icon-heart"></i>
                                <span class="item-count">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                <i class="icon-bag"></i>
                                <span class="item-count">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                 <!-- End Mobile Right Side -->
            </div>
        </div>
    </div>
</div>
<div class="hero-slider-section">
    <!-- Slider main container -->
    <div class="hero-slider-active swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Start Hero Single Slider Item -->
            <div class="hero-single-slider-item swiper-slide">
                <!-- Hero Slider Image -->
                <div class="hero-slider-bg">
                    <img src="/Assets/Front/Users/assets/images/hero-slider/home-2/hero-slider-1.jpg" alt="">
                </div>
                <!-- Hero Slider Content -->
                <div class="hero-slider-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-auto">
                                <div class="hero-slider-content">
                                    <h4 class="subtitle">Made of Fresh Ingredients</h4>
                                    <h1 class="title">A natural & <br> organic Skincare </h1>
                                    <a href="product-details-default.html" class="btn btn-lg btn-outline-green">shop now </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Hero Single Slider Item -->
            <!-- Start Hero Single Slider Item -->
            <div class="hero-single-slider-item swiper-slide">
                <!-- Hero Slider Image -->
                <div class="hero-slider-bg">
                    <img src="/Assets/Front/Users/assets/images/hero-slider/home-2/hero-slider-2.jpg" alt="">
                </div>
                <!-- Hero Slider Content -->
                <div class="hero-slider-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-auto">
                                <div class="hero-slider-content">
                                    <h4 class="subtitle">Premium Facial Skincare</h4>
                                    <h1 class="title">Fresh Face <br> Natural Skincare</h1>
                                    <a href="product-details-default.html" class="btn btn-lg btn-outline-green">shop now </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Hero Single Slider Item -->
        </div>

        <!-- If we need pagination -->
        <div class="swiper-pagination active-color-green"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev d-none d-lg-block"></div>
        <div class="swiper-button-next d-none d-lg-block"></div>
    </div>
</div>
