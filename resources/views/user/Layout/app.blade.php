<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2021 00:31:46 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>HONO - Multi Purpose HTML Template</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="/Assets/Front/Users/assets/images/favicon.ico" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/Assets/Front/Users/assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="/Assets/Front/Users/assets/css/vendor/ionicons.css">
    <link rel="stylesheet" href="/Assets/Front/Users/assets/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="/Assets/Front/Users/assets/css/vendor/jquery-ui.min.css">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="/Assets/Front/Users/assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="/Assets/Front/Users/assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="/Assets/Front/Users/assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="/Assets/Front/Users/assets/css/plugins/venobox.min.css">
    <link rel="stylesheet" href="/Assets/Front/Users/assets/css/plugins/jquery.lineProgressbar.css">
    <link rel="stylesheet" href="/Assets/Front/Users/assets/css/plugins/aos.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/Assets/Front/Users/assets/css/style.css">


    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="/Assets/Front/Users/assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="/Assets/Front/Users/assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="/Assets/Front/Users/assets/css/style.min.css"> -->




</head>
<body>
    @include('user.Layout.header')
    <!-- Start Mobile Header -->

    <!-- End Mobile Header -->

    <!--  Start Offcanvas Mobile Menu Section -->
    <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-mobile-menu-wrapper">
            <!-- Start Mobile Menu  -->
            <div class="mobile-menu-bottom">
                <!-- Start Mobile Menu Nav -->
                <div class="offcanvas-menu">
                    <ul>
                        <li>
                            <a href="#"><span>Home</span></a>
                            <ul class="mobile-sub-menu">
                                <li><a href="index.html">Home 1</a></li>
                                <li><a href="index-2.html">Home 2</a></li>
                                <li><a href="index-3.html">Home 3</a></li>
                                <li><a href="index-4.html">Home 4</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Shop</span></a>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#">Shop Layout</a>
                                    <ul class="mobile-sub-menu">
                                        <li><a href="shop-grid-sidebar-left.html">Grid Left Sidebar</a></li>
                                        <li><a href="shop-grid-sidebar-right.html">Grid Right Sidebar</a></li>
                                        <li><a href="shop-full-width.html">Full Width</a></li>
                                        <li><a href="shop-list-sidebar-left.html">List Left Sidebar</a></li>
                                        <li><a href="shop-list-sidebar-right.html">List Right Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#">Shop Pages</a>
                                    <ul class="mobile-sub-menu">
                                        <li><a href="{{route('home.cart')}}">Cart</a></li>
                                        <li><a href="empty-{{route('home.cart')}}">Empty Cart</a></li>
                                        <li><a href="{{route('home.wishlist')}}">Wishlist</a></li>
                                        <li><a href="compare.html">Compare</a></li>
                                        <li><a href="{{route('home.checkout')}}">Checkout</a></li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="{{route('home.myaccount')}}">My Account</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#">Product Single</a>
                                    <ul class="mobile-sub-menu">
                                        <li><a href="product-details-default.html">Product Default</a></li>
                                        <li><a href="product-details-variable.html">Product Variable</a></li>
                                        <li><a href="product-details-affiliate.html">Product Referral</a></li>
                                        <li><a href="product-details-group.html">Product Group</a></li>
                                        <li><a href="product-details-single-slide.html">Product Slider</a></li>
                                        <li><a href="product-details-tab-left.html">Product Tab Left</a></li>
                                        <li><a href="product-details-tab-right.html">Product Tab Right</a></li>
                                        <li><a href="product-details-gallery-left.html">Product Gallery Left</a></li>
                                        <li><a href="product-details-gallery-right.html">Product Gallery Right</a></li>
                                        <li><a href="product-details-sticky-left.html">Product Sticky Left</a></li>
                                        <li><a href="product-details-sticky-right.html">Product Sticky right</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Blogs</span></a>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#">Blog Grid</a>
                                    <ul class="mobile-sub-menu">
                                        <li><a href="blog-grid-sidebar-left.html">Blog Grid Sidebar left</a></li>
                                        <li><a href="blog-grid-sidebar-right.html">Blog Grid Sidebar Right</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blog-full-width.html">Blog Full Width</a>
                                </li>
                                <li>
                                    <a href="#">Blog List</a>
                                    <ul class="mobile-sub-menu">
                                        <li><a href="blog-list-sidebar-left.html">Blog List Sidebar left</a></li>
                                        <li><a href="blog-list-sidebar-right.html">Blog List Sidebar Right</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Blog Single</a>
                                    <ul class="mobile-sub-menu">
                                        <li><a href="blog-single-sidebar-left.html">Blog Single Sidebar left</a></li>
                                        <li><a href="blog-single-sidebar-right.html">Blog Single Sidebar Right</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Pages</span></a>
                            <ul class="mobile-sub-menu">
                                <li><a href="faq.html">Frequently Questions</a></li>
                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                <li><a href="404.html">404 Page</a></li>
                            </ul>
                        </li>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                    </ul>
                </div> <!-- End Mobile Menu Nav -->
            </div> <!-- End Mobile Menu -->

            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info">
                <div class="logo">
                    <a href="{{route('home.index')}}"><img src="/Assets/Front/Users/assets/images/logo/logo_white.png" alt=""></a>
                </div>

                <address class="address">
                    <span>Address: 4710-4890 Breckinridge St, Fayettevill</span>
                    <span>Call Us: (+800) 345 678, (+800) 123 456</span>
                    <span>Email: yourmail@mail.com</span>
                </address>

                <ul class="social-link">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>

                <ul class="user-link">
                    <li><a href="{{route('home.wishlist')}}">Wishlist</a></li>
                    <li><a href="{{route('home.cart')}}">Cart</a></li>
                    <li><a href="{{route('home.checkout')}}">Checkout</a></li>
                </ul>
            </div>
            <!-- End Mobile contact Info -->

        </div> <!-- End Offcanvas Mobile Menu Wrapper -->
    </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

    <!-- Start Offcanvas Mobile Menu Section -->
    <div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info">
            <div class="logo">
                <a href="{{route('home.index')}}"><img src="/Assets/Font/images/logo/logo_white.png" alt=""></a>
            </div>

            <address class="address">
                <span>Địa chỉ: 157 phố hàng Mã, Hà Nội</span>
                <span>Số điện thoại: (+800) 345 678, (+800) 123 456</span>
                <span>Email: yourmail@mail.com</span>
            </address>
            <ul class="social-link">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>

            <ul class="user-link">
                <li><a href="/GioHang/Wishlist">Yêu thích</a></li>
                <li><a href="/GioHang/Cart">Giỏ hàng</a></li>
                <li><a href="/GioHang/Checkout">Đặt hàng</a></li>
                <li><a href="/GioHang/MyCcount">Tài khoản của tôi</a></li>
            </ul>
        </div>
        <!-- End Mobile contact Info -->
    </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->


    <!-- Start Offcanvas Addcart Section -->
    <div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->

        <!-- Start  Offcanvas Addcart Wrapper -->
        <div class="offcanvas-add-cart-wrapper">
            <h4 class="offcanvas-title">Giỏ hàng</h4>
            <ul class="offcanvas-cart">
                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        <li class="offcanvas-cart-item-single">
                            <div class="offcanvas-cart-item-block">
                                <a href="#" class="offcanvas-cart-item-image-link">
                                    <img src="/storage/uploads/Specificproduct/{{$details['Image']}}" alt="" class="offcanvas-cart-image">
                                </a>
                                <div class="offcanvas-cart-item-content">
                                    <a href="#" class="offcanvas-cart-item-link">{{$details['ProName']}}</a>
                                    <div class="offcanvas-cart-item-details">
                                        <span class="offcanvas-cart-item-details-quantity">{{$details['quantity']}} x </span>
                                        <span class="offcanvas-cart-item-details-price">{{number_format($details['Price'],0,',','.')}}đ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="offcanvas-cart-item-delete text-right">
                                <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </li>
                    @endforeach
                @endif

            </ul>
            <div class="offcanvas-cart-total-price">
                @php
                    $total =0;
                @endphp
                @if (session('cart')!='')
                      @foreach (session('cart') as $id => $details)
                    @php
                        $total+= $details['Price']*$details['quantity']
                    @endphp
                    @endforeach
                <span class="offcanvas-cart-total-price-text">Tổng cộng:</span>
                <span class="offcanvas-cart-total-price-value">{{number_format($total,0,',','.')}}đ</span>
                @else
                    <span class="offcanvas-cart-total-price-text">Tổng cộng:</span>
                    <span class="offcanvas-cart-total-price-value">0đ</span>
                @endif

            </div>
            <ul class="offcanvas-cart-action-button">
                <li><a href="{{route('home.cart')}}" class="btn btn-block btn-green">Giỏ Hàng</a></li>
                <li><a href="{{route('home.checkout')}}" class=" btn btn-block btn-green mt-5">Thanh Toán</a></li>
            </ul>
        </div> <!-- End  Offcanvas Addcart Wrapper -->

    </div> <!-- End  Offcanvas Addcart Section -->

    <!-- Start Offcanvas Mobile Menu Section -->
    <div id="offcanvas-wishlish" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- ENd Offcanvas Header -->

        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-wishlist-wrapper">
            <h4 class="offcanvas-title">Yêu thích</h4>
            <ul class="offcanvas-wishlist">
                @if (session('cartWL'))
                    @foreach (session('cartWL') as $id => $detail)
                        <li class="offcanvas-wishlist-item-single">
                            <div class="offcanvas-wishlist-item-block">
                                <a href="#" class="offcanvas-wishlist-item-image-link">
                                    <img src="/storage/uploads/Specificproduct/{{$detail['Image']}}" alt="" class="offcanvas-wishlist-image">
                                </a>
                                <div class="offcanvas-wishlist-item-content">
                                    <a href="#" class="offcanvas-wishlist-item-link">{{$details['ProName']}}</a>
                                    <div class="offcanvas-wishlist-item-details">
                                        <span class="offcanvas-wishlist-item-details-quantity">{{$details['quantity']}} x </span>
                                        <span class="offcanvas-wishlist-item-details-price">{{number_format($details['Price'],0,',','.')}}đ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="offcanvas-wishlist-item-delete text-right">
                                <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
            <ul class="offcanvas-wishlist-action-button">
                <li><a href="{{route('home.wishlist')}}" class="btn btn-block btn-green">Yêu thích</a></li>
            </ul>
        </div> <!-- End Offcanvas Mobile Menu Wrapper -->

    </div> <!-- End Offcanvas Mobile Menu Section -->

    <!-- Start Offcanvas Search Bar Section -->
    <div id="search" class="search-modal">
        <button type="button" class="close">×</button>
        <form action="" >
            <input type="search"  name="ProName" id="txtKeyword" placeholder="Nhập tên mỹ phẩm bạn muốn tìm!" />
            <div class="btn btn-lg btn-golden" onclick="search()">Tìm kiếm</div>
            <ul class="result-search" style="margin-left: 633px; margin-top: 200px; ">
            </ul>

        </form>
        {{-- {{csrf_field()}} --}}
    </div>
    <!-- End Offcanvas Search Bar Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- Start Hero Slider Section-->

    <!-- End Hero Slider Section-->

    @if (session('success'))
    {{-- <div class="modal fade" id="modalAddcart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right">
                                <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="modal-add-cart-product-img">
                                            <img class="img-fluid" src="/Assets/Front/Users/assets/images/product/default/home-1/default-1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="modal-add-cart-info"><i class="fa fa-check-square"></i>{{session('success')}}!!</div>
                                        <div class="modal-add-cart-product-cart-buttons">
                                            <a href="{{route('home.cart')}}">View Cart</a>
                                            <a href="{{route('home.checkout')}}">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 modal-border">
                                <ul class="modal-add-cart-product-shipping-info">
                                    <li> <strong><i class="icon-shopping-cart"></i> There Are 5 Items In Your Cart.</strong></li>
                                    <li> <strong>TOTAL PRICE: </strong> <span>$187.00</span></li>
                                    <li class="modal-continue-button"><a href="#" data-bs-dismiss="modal">CONTINUE SHOPPING</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <!-- Start Company Logo Section -->
    @yield('content')
    <!-- Start Section Content Text Area -->

    <!-- End Blog Slider Section -->

   <!-- Start Footer Section -->
   @include('user.Layout.footer')
   <!-- End Footer Section -->

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <!-- Start Modal Add cart -->

    <!-- End Modal Add cart -->

    <!-- Start Modal Quickview cart -->
    <div class="modal fade" id="modalQuickview" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right">
                                <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-details-gallery-area mb-7">
                                    <!-- Start Large Image -->
                                    <div class="product-large-image modal-product-image-large swiper-container">
                                            <div class="swiper-wrapper">
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="/Assets/Front/Users/assets/images/product/default/home-1/default-1.jpg" alt="">
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="/Assets/Front/Users/assets/images/product/default/home-1/default-2.jpg" alt="">
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="/Assets/Front/Users/assets/images/product/default/home-1/default-3.jpg" alt="">
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="/Assets/Front/Users/assets/images/product/default/home-1/default-4.jpg" alt="">
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="/Assets/Front/Users/assets/images/product/default/home-1/default-5.jpg" alt="">
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="/Assets/Front/Users/assets/images/product/default/home-1/default-6.jpg" alt="">
                                                </div>
                                            </div>
                                    </div>
                                    <!-- End Large Image -->
                                        <!-- Start Thumbnail Image -->
                                    <div class="product-image-thumb modal-product-image-thumb swiper-container pos-relative mt-5">
                                            <div class="swiper-wrapper">
                                                <div class="product-image-thumb-single swiper-slide">
                                                    <img class="img-fluid" src="/Assets/Front/Users/assets/images/product/default/home-1/default-1.jpg" alt="">
                                                </div>
                                                <div class="product-image-thumb-single swiper-slide">
                                                    <img class="img-fluid" src="/Assets/Front/Users/assets/images/product/default/home-1/default-2.jpg" alt="">
                                                </div>
                                                <div class="product-image-thumb-single swiper-slide">
                                                    <img class="img-fluid" src="/Assets/Front/Users/assets/images/product/default/home-1/default-3.jpg" alt="">
                                                </div>
                                                <div class="product-image-thumb-single swiper-slide">
                                                    <img class="img-fluid" src="/Assets/Front/Users/assets/images/product/default/home-1/default-4.jpg" alt="">
                                                </div>
                                                <div class="product-image-thumb-single swiper-slide">
                                                    <img class="img-fluid" src="/Assets/Front/Users/assets/images/product/default/home-1/default-5.jpg" alt="">
                                                </div>
                                                <div class="product-image-thumb-single swiper-slide">
                                                    <img class="img-fluid" src="/Assets/Front/Users/assets/images/product/default/home-1/default-6.jpg" alt="">
                                                </div>
                                        </div>
                                        <!-- Add Arrows -->
                                        <div class="gallery-thumb-arrow swiper-button-next"></div>
                                        <div class="gallery-thumb-arrow swiper-button-prev"></div>
                                    </div>
                                        <!-- End Thumbnail Image -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-details-content-area">
                                    <!-- Start  Product Details Text Area-->
                                    <div class="product-details-text">
                                        <h4 class="title">Nonstick Dishwasher PFOA</h4>
                                        <div class="price"><del>$70.00</del>$80.00</div>
                                    </div> <!-- End  Product Details Text Area-->
                                    <!-- Start Product Variable Area -->
                                    <div class="product-details-variable">
                                        <!-- Product Variable Single Item -->
                                        <div class="variable-single-item">
                                            <span>Color</span>
                                            <div class="product-variable-color">
                                                <label for="modal-product-color-red">
                                                    <input name="modal-product-color" id="modal-product-color-red" class="color-select" type="radio" checked>
                                                    <span class="product-color-red"></span>
                                                </label>
                                                <label for="modal-product-color-tomato">
                                                    <input name="modal-product-color" id="modal-product-color-tomato" class="color-select" type="radio">
                                                    <span class="product-color-tomato"></span>
                                                </label>
                                                <label for="modal-product-color-green">
                                                    <input name="modal-product-color" id="modal-product-color-green" class="color-select" type="radio">
                                                    <span class="product-color-green"></span>
                                                </label>
                                                <label for="modal-product-color-light-green">
                                                    <input name="modal-product-color" id="modal-product-color-light-green" class="color-select" type="radio">
                                                    <span class="product-color-light-green"></span>
                                                </label>
                                                <label for="modal-product-color-blue">
                                                    <input name="modal-product-color" id="modal-product-color-blue" class="color-select" type="radio">
                                                    <span class="product-color-blue"></span>
                                                </label>
                                                <label for="modal-product-color-light-blue">
                                                    <input name="modal-product-color" id="modal-product-color-light-blue" class="color-select" type="radio">
                                                    <span class="product-color-light-blue"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <!-- Product Variable Single Item -->
                                        <div class="d-flex align-items-center flex-wrap">
                                            <div class="variable-single-item ">
                                                <span>Quantity</span>
                                                <div class="product-variable-quantity">
                                                    <input min="1" max="100" value="1" type="number">
                                                </div>
                                            </div>

                                            <div class="product-add-to-cart-btn">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart">Add To Cart</a>
                                            </div>
                                        </div>
                                    </div> <!-- End Product Variable Area -->
                                    <div class="modal-product-about-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel recusandae</p>
                                    </div>
                                    <!-- Start  Product Details Social Area-->
                                    <div class="modal-product-details-social">
                                        <span class="title">SHARE THIS PRODUCT</span>
                                        <ul>
                                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>

                                    </div> <!-- End  Product Details Social Area-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Modal Quickview cart -->

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <script src="/Assets/Front/Users/assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="/Assets/Front/Users/assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="/Assets/Front/Users/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="/Assets/Front/Users/assets/js/vendor/popper.min.js"></script>
    <script src="/Assets/Front/Users/assets/js/vendor/bootstrap.min.js"></script>
    <script src="/Assets/Front/Users/assets/js/vendor/jquery-ui.min.js"></script>

    <!--Plugins JS-->
    <script src="/Assets/Front/Users/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="/Assets/Front/Users/assets/js/plugins/material-scrolltop.js"></script>
    <script src="/Assets/Front/Users/assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="/Assets/Front/Users/assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="/Assets/Front/Users/assets/js/plugins/venobox.min.js"></script>
    <script src="/Assets/Front/Users/assets/js/plugins/jquery.waypoints.js"></script>
    <script src="/Assets/Front/Users/assets/js/plugins/jquery.lineProgressbar.js"></script>
    <script src="/Assets/Front/Users/assets/js/plugins/aos.min.js"></script>
    <script src="/Assets/Front/Users/assets/js/plugins/jquery.instagramFeed.js"></script>
    <script src="/Assets/Front/Users/assets/js/plugins/ajax-mail.js"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="/Assets/Front/Users/assets/js/vendor/vendor.min.js"></script>
    <script src="/Assets/Front/Users/assets/js/plugins/plugins.min.js"></script> -->
    <!-- Main JS -->
    <script src="/Assets/Front/Users/assets/js/main.js"></script>
    @yield('scripts')
    <script>
        var csrfToken = "{{ csrf_token() }}";
    </script>
    <script>

        function search(){
            let name = $("#txtKeyword").val();
            $.ajax({
                url: "search/"+name,
                type: 'get',
                success: function (res) {
                    console.log(res.list)
                    let str = ''
                    $.each(res.list, (index, value) => {
                        str += `<li><a style="color:#fff" href="/productdetail/${value.SpId}">${value.product.ProName}</a></li>`
                    })
                    $(".result-search").html(str)
                }
            })
        }
    </script>
</body>


</html>
