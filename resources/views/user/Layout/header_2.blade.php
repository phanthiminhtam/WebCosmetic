<header class="header-section d-none d-xl-block">
    <div class="header-wrapper">
        <div class="header-bottom header-bottom-color--golden section-fluid sticky-header sticky-color--golden">
            <div class="container-fluid">
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
                        <div class="main-menu menu-color--black menu-hover-color--golden">
                            <nav>
                                <ul>
                                    <li class="has-dropdown">
                                        <a class="active main-menu-link" href="{{route('home.index')}}">TRANG CHỦ <i class="fa fa-angle-down"></i></a>
                                        <!-- Sub Menu -->
                                        {{-- <ul class="sub-menu">
                                            <li><a href="index.html">Home 1</a></li>
                                            <li><a href="index-2.html">Home 2</a></li>
                                            <li><a href="index-3.html">Home 3</a></li>
                                            <li><a href="index-4.html">Home 4</a></li>
                                        </ul> --}}
                                    </li>
                                    <li class="has-dropdown has-megaitem">
                                        <a href="{{route('home.shop')}}">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                        <!-- Mega Menu -->
                                        <div class="mega-menu">
                                            <ul class="mega-menu-inner">
                                                <!-- Mega Menu Sub Link -->
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

                                                <!-- Mega Menu Sub Link -->
                                                {{-- <li class="mega-menu-item">
                                                    <a href="{{route('home.loaimypham')}}" class="mega-menu-item-title">Chăm sóc da</a>
                                                    <ul class="mega-menu-sub">
                                                        <li><a href="cart.html">Mask giấy</a></li>
                                                        <li><a href="empty-cart.html">Mặt nạ</a></li>
                                                        <li><a href="wishlist.html">Sữa rửa mặt</a></li>
                                                        <li><a href="compare.html">Dưỡng da mặt</a></li>
                                                        <li><a href="checkout.html">Tẩy da chết</a></li>
                                                        <li><a href="login.html">Dưỡng da mắt</a></li>
                                                        <li><a href="my-account.html">Lotion</a></li>
                                                    </ul>
                                                </li>
                                                <!-- Mega Menu Sub Link -->
                                                <li class="mega-menu-item">
                                                    <a href="{{route('home.loaimypham')}}" class="mega-menu-item-title">Nước hoa</a>
                                                    <ul class="mega-menu-sub">
                                                        <li><a href="ChitietSP.html">Nước hoa nữ</a></li>
                                                        <li><a href="product-details-variable.html">Nước hoa nam</a></li>
                                                        <li><a href="product-details-affiliate.html">Xịt body</a></li>
                                                        <li><a href="product-details-group.html">Sữa tắm</a></li>
                                                        <li><a href="product-details-single-slide.html">Tẩy lông</a></li>
                                                        <li><a href="product-details-group.html">Sữa dưỡng thể</a></li>
                                                        <li><a href="product-details-single-slide.html">Kem dưỡng tay</a></li>
                                                    </ul>
                                                </li>
                                                <!-- Mega Menu Sub Link -->
                                                <li class="mega-menu-item">
                                                    <a href="{{route('home.loaimypham')}}" class="mega-menu-item-title">Phụ kiện</a>
                                                    <ul class="mega-menu-sub">
                                                        <li><a href="product-details-tab-left.html">Dụng cụ trang điểm</a></li>
                                                        <li><a href="product-details-tab-right.html">Phụ kiện làm đẹp</a></li>
                                                        <li><a href="product-details-gallery-left.html">Sơn móng tay</a></li>
                                                        <li><a href="product-details-gallery-right.html">Rửa móng</a></li>
                                                        <li><a href="product-details-sticky-left.html">Mút đánh phấn</a></li>
                                                        <li><a href="product-details-sticky-right.html">Mặt nạ nén</a></li>
                                                    </ul>
                                                </li> --}}
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
                                        <a href="{{route('home.News')}}">Tin tức <i class="fa fa-angle-down"></i></a>
                                        <!-- Sub Menu -->
                                        <ul class="sub-menu">
                                            <li><a href="faq.html">Frequently Questions</a></li>
                                            <li><a href="{{route('home.csdoitra')}}">Chính sách đổi trả</a></li>
                                            <li><a href="{{route('home.myaccount')}}">Tài khoản của tôi</a></li>
                                            <li><a href="{{route('client.loginView')}}">Đăng nhập</a></li>
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
                        <ul class="header-action-link action-color--black action-hover-color--golden">
                            <li>
                                <a href="#offcanvas-wishlish" class="offcanvas-toggle">
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
                            <li>
                                <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Header Action Link -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Start Header Area -->

<!-- Start Mobile Header -->
<div class="mobile-header mobile-header-bg-color--golden section-fluid d-lg-block d-xl-none">
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
                    <ul class="header-action-link action-color--black action-hover-color--golden">
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
