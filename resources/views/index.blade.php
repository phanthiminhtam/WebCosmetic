@extends('user.Layout.app');
@section('content')
<div class="company-logo-section section-top-gap-100 section-fluid">
    <div class="company-logo-wrapper" data-aos="fade-up"  data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="company-logo-slider default-slider-nav-arrow">
                         <!-- Slider main container -->
                        <div class="swiper-container company-logo-slider">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img  class="img-fluid" src="/Assets/Front/Users/assets/images/company-logo/company-logo-1.png" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img class="img-fluid" src="/Assets/Front/Users/assets/images/company-logo/company-logo-2.png" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img class="img-fluid" src="/Assets/Front/Users/assets/images/company-logo/company-logo-3.png" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img class="img-fluid" src="/Assets/Front/Users/assets/images/company-logo/company-logo-4.png" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img class="img-fluid" src="/Assets/Front/Users/assets/images/company-logo/company-logo-5.png" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img class="img-fluid" src="/Assets/Front/Users/assets/images/company-logo/company-logo-6.png" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img class="img-fluid" src="/Assets/Front/Users/assets/images/company-logo/company-logo-7.png" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img class="img-fluid" src="/Assets/Front/Users/assets/images/company-logo/company-logo-8.png" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev d-none d-md-block"></div>
                        <div class="swiper-button-next d-none d-md-block"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Company Logo Section -->

<!-- Start Banner Section -->
<div class="banner-section section-top-gap-100 section-fluid">
    <div class="banner-wrapper">
        <div class="container">
            <div class="row mb-n6">
                <div class="col-md-4 col-12 mb-6">
                     <!-- Start Banner Single Item -->
                    <div class="banner-single-item banner-style-5 img-responsive" data-aos="fade-up"  data-aos-delay="0">
                        <a href="" class="image banner-animation">
                            <img src="/Assets/Front/Users/assets/images/banner/banner-style-5-img-1.jpg" alt="">
                        </a>
                    </div>
                    <!-- End Banner Single Item -->
                </div>
                <div class="col-md-4 col-12 mb-6">
                     <!-- Start Banner Single Item -->
                    <div class="banner-single-item banner-style-5 img-responsive" data-aos="fade-up"  data-aos-delay="200">
                        <a href="" class="image banner-animation">
                            <img src="/Assets/Front/Users/assets/images/banner/banner-style-5-img-2.jpg" alt="">
                        </a>
                    </div>
                    <!-- End Banner Single Item -->
                </div>
                <div class="col-md-4 col-12 mb-6">
                     <!-- Start Banner Single Item -->
                    <div class="banner-single-item banner-style-5 img-responsive" data-aos="fade-up"  data-aos-delay="400">
                        <a href="" class="image banner-animation">
                            <img src="/Assets/Front/Users/assets/images/banner/banner-style-5-img-3.jpg" alt="">
                        </a>
                    </div>
                    <!-- End Banner Single Item -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner Section -->

<!-- Start Product Default Slider Section -->
<div class="product-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper"  data-aos="fade-up"  data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3  class="section-title">sản phẩm mới về</h3>
                            <p>Đặt hàng ngay để được nhận giảm giá và quà tặng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper"  data-aos="fade-up"  data-aos-delay="200">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-1row default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-default-slider-4grid-1row">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                                @foreach ($specificproduct as $item)
                                        <div class="product-default-single-item product-color--green swiper-slide">
                                            <div class="image-box">
                                                <a href="{{route('home.productdetail',$item->SpId)}}" class="image-link">
                                                    <img src="/storage/uploads/Specificproduct/{{$item->Image}}"  alt="">
                                                </a>
                                                <div class="action-link">
                                                    <div class="action-link-left">
                                                        <a href="{{route('add_to_cart',$item->SpId)}}">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="action-link-right">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="icon-magnifier"></i></a>

                                                        <a href="compare.html"><i class="icon-shuffle"></i></a>
                                                        <a href="{{route('add_to_wishlist',$item->SpId)}}"><i class="icon-heart"></i></a>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="content-left">
                                                    <h6 class="title"><a href="{{route('home.productdetail',$item->SpId)}}">{{$item->Product->ProName}}</a></h6>
                                                    <ul class="review-star">
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="content-right">
                                                    <s></s class="price">{{number_format($item->Price,0,',','.')}}đ</span>

                                                </div>

                                            </div>
                                        </div>


                                @endforeach

                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Default Slider Section -->
<div class="product-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper"  data-aos="fade-up"  data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3  class="section-title">sản phẩm khuyến mại</h3>
                            <p>Đặt hàng ngay để được nhận giảm giá và quà tặng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper"  data-aos="fade-up"  data-aos-delay="200">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-1row default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-default-slider-4grid-1row">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                @foreach ($specificproduct2 as $item2)
                                    <div class="product-default-single-item product-color--green swiper-slide">
                                        <div class="image-box">
                                            <a href="{{route('home.productdetail',$item2->SpId)}}" class="image-link">
                                                <img src="/storage/uploads/Specificproduct/{{$item2->Image}}"  alt="">
                                            </a>
                                            <div class="tag">
                                                <span>sale</span>
                                            </div>
                                            <div class="action-link">
                                                <div class="action-link-left">
                                                    <a href="{{route('add_to_cart',$item2->SpId)}}">Thêm giỏ hàng</a>
                                                </div>
                                                <div class="action-link-right">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="icon-magnifier"></i></a>
                                                    <a href="{{route('add_to_wishlist',$item->SpId)}}"><i class="icon-heart"></i></a>
                                                    <a href="compare.html"><i class="icon-shuffle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="content-left">
                                                <h6 class="title"><a href="{{route('home.productdetail',$item2->SpId)}}">{{$item2->Product->ProName}}</a></h6>
                                                <ul class="review-star">
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="content-right">

                                                <span><del class="price">{{number_format($item2->Price,0,',','.')}}đ</del> <span class="price">{{number_format($item2->Price -($item2->Offer * $item2->Price),0,',','.')}}đ</span></span>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Banner Section -->
<div class="banner-section section-top-gap-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <!-- Start Banner Single Item -->
                <div class="banner-single-item banner-style-6 banner-animation img-responsive"  data-aos="fade-up"  data-aos-delay="0">
                    <div class="image">
                        <img src="/Assets/Front/Users/assets/images/banner/banner-style-6-img-1.jpg" alt="">
                    </div>
                    <div class="content">
                        <h6 class="sub-title">TRÀ XANH HOA NHÀI</h6>
                        <h2 class="title">
                            Sản phẩm tự nhiên
                            Bộ sưu tập cơ bản
                        </h2>
                        <p>Với sứ mệnh tạo ra sản phẩm chăm sóc da hoàn toàn tự nhiên mang lại kết quả rõ rệt, Herbivore đảm bảo mọi thành phần trong công thức của họ đều có mục đích cụ thể, mang lại hiệu quả cao...</p>
                        {{-- <a href="{{route('home.productdetail')}}" class="btn btn-lg btn-outline-green icon-space-left"><span class="d-flex align-items-center">Browse <i class="ion-ios-arrow-thin-right"></i></span></a> --}}
                    </div>
                </div>
                <!-- End Banner Single Item -->
            </div>
        </div>
    </div>
</div>
<!-- End Banner Section -->

<!-- Start Service Section -->
<div class="service-promo-section section-top-gap-100">
    <div class="service-wrapper">
        <div class="container">
            <div class="row">
                <!-- Start Service Promo Single Item -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="service-promo-single-item"  data-aos="fade-up"  data-aos-delay="0">
                       <div class="image">
                            <img src="/Assets/Front/Users/assets/images/icons/service-promo-5.png" alt="">
                       </div>
                        <div class="content">
                            <h6 class="title">FREE SHIPPING</h6>
                            <p>Nhận lại 10% tiền mặt, giao hàng miễn phí, trả lại miễn phí và hơn thế nữa tại hơn 1000 nhà bán lẻ hàng đầu!</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Promo Single Item -->
                <!-- Start Service Promo Single Item -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="service-promo-single-item"  data-aos="fade-up"  data-aos-delay="200">
                       <div class="image">
                            <img src="/Assets/Front/Users/assets/images/icons/service-promo-6.png" alt="">
                       </div>
                        <div class="content">
                            <h6 class="title">30 NGÀY HOÀN TIỀN</h6>
                            <p>Đảm bảo hài lòng 100% hoặc nhận lại tiền của bạn trong vòng 30 ngày!!</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Promo Single Item -->
                <!-- Start Service Promo Single Item -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="service-promo-single-item"  data-aos="fade-up"  data-aos-delay="400">
                       <div class="image">
                            <img src="/Assets/Front/Users/assets/images/icons/service-promo-7.png" alt="">
                       </div>
                        <div class="content">
                            <h6 class="title">THANH TOÁN AN TOÀN</h6>
                            <p>Thanh toán bằng các phương thức thanh toán an toàn và phổ biến nhất thế giới.</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Promo Single Item -->
                <!-- Start Service Promo Single Item -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="service-promo-single-item"  data-aos="fade-up"  data-aos-delay="600">
                       <div class="image">
                            <img src="/Assets/Front/Users/assets/images/icons/service-promo-8.png" alt="">
                       </div>
                        <div class="content">
                            <h6 class="title">KHÁCH HÀNG THÂN THIẾT</h6>
                            <p>Thẻ cho 30% giao dịch mua còn lại của họ với tỷ lệ hoàn tiền 1%.</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Promo Single Item -->
            </div>
        </div>
    </div>
</div>
<!-- End Service Section -->

<!-- Start Banner Section -->
<div class="banner-section section-top-gap-100">
    <div class="banner-wrapper clearfix">
        <!-- Start Banner Single Item -->
        <div class="banner-single-item banner-style-4 banner-animation banner-color--green float-left"  data-aos="fade-up"  data-aos-delay="0">
            <div class="image">
                <img class="img-fluid" src="/Assets/Front/Users/assets/images/banner/banner-style-4-img-5.jpg" alt="">
            </div>
            <a href="" class="content">
                <div class="inner">
                    <h4 class="title">TRANG ĐIỂM</h4>
                    {{-- <h6 class="sub-title">20 products</h6> --}}
                </div>
                <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
            </a>
        </div>
        <!-- End Banner Single Item -->
        <!-- Start Banner Single Item -->
        <div class="banner-single-item banner-style-4 banner-animation banner-color--green float-left"  data-aos="fade-up"  data-aos-delay="200">
            <div class="image">
                <img class="img-fluid" src="/Assets/Front/Users/assets/images/banner/banner-style-4-img-6.jpg" alt="">
            </div>
            <a href="" class="content">
                <div class="inner">
                    <h4 class="title">Chăm sóc da</h4>
                    {{-- <h6 class="sub-title">20 products</h6> --}}
                </div>
                <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
            </a>
        </div>
        <!-- End Banner Single Item -->
        <!-- Start Banner Single Item -->
        <div class="banner-single-item banner-style-4 banner-animation banner-color--green float-left"  data-aos="fade-up"  data-aos-delay="400">
            <div class="image">
                <img class="img-fluid" src="/Assets/Front/Users/assets/images/banner/banner-style-4-img-7.jpg" alt="">
            </div>
            <a href="" class="content">
                <div class="inner">
                    <h4 class="title">Sữa rửa mặt</h4>
                    {{-- <h6 class="sub-title">20 products</h6> --}}
                </div>
                <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
            </a>
        </div>
        <!-- End Banner Single Item -->
        <!-- Start Banner Single Item -->
        <div class="banner-single-item banner-style-4 banner-animation banner-color--green float-left"  data-aos="fade-up"  data-aos-delay="600">
            <div class="image">
                <img class="img-fluid" src="/Assets/Front/Users/assets/images/banner/banner-style-4-img-8.jpg" alt="">
            </div>
            <a href="" class="content">
                <div class="inner">
                    <h4>Son môi</h4>
                    {{-- <h6>20 products</h6> --}}
                </div>
                <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
            </a>
        </div>
        <!-- End Banner Single Item -->
    </div>
</div>
<!-- End Banner Section -->

<!-- Start Product List View Slider Section -->
<div class="product-list-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper"  data-aos="fade-up"  data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3  class="section-title">Sản phẩm tiêu biểu</h3>
                            <p>Các sản phẩm thường xuyên bán.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper"  data-aos="fade-up"  data-aos-delay="200">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-list-slider-3rows default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-listview-slider-4grid-3rows">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">

                               @foreach ($specificproduct3 as $item3)
                                    <div class="product-listview-single-item product-color--green swiper-slide">
                                        <div class="image-box">
                                            <a href="{{route('home.productdetail',$item3->SpId)}}" class="image-link">

                                                <img src="/storage/uploads/Specificproduct/{{$item3->Image}}"  alt="">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a href="{{route('home.productdetail',$item3->SpId)}}">{{$item3->Product->ProName}}</a></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                            @if ($item3->Offer != 0)

                                                <span class="price"><del >{{number_format($item3->Price,0,',','.')}}đ</del> <span class="price">{{number_format($item3->Price -($item3->Offer * $item3->Price),0,',','.')}}đ</span></span>

                                            @else
                                                <span class="price">{{number_format($item3->Price,0,',','.')}}đ</span>
                                            @endif

                                        </div>
                                    </div>

                               @endforeach

                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev d-none d-md-block"></div>
                        <div class="swiper-button-next d-none d-md-block"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product List View Slider Section -->

<!-- Start Banner Section -->
<div class="banner-section section-top-gap-100">
    <div class="banner-wrapper clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Start Banner Single Item -->
                    <div class="banner-single-item banner-style-13 banner-color--green"  data-aos="fade-up"  data-aos-delay="0">
                        <div class="image">
                            <img src="/Assets/Front/Users/assets/images/banner/banner-style-13-img-1.jpg" alt="">
                            <div class="content">
                                <div class="text">
                                    <h5 class="sub-title">GIẢM GIÁ 15% KHI MUA LẦN ĐẦU TIÊN CỦA BẠN</h5>
                                    <h2 class="title">CHĂM SÓC DA HỮU CƠ HONO</h2>

                                    <a href="" class="btn btn-lg btn-green icon-space-left"><span class="d-flex align-items-center">Shop Now <i class="ion-ios-arrow-thin-right"></i></span></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End Banner Single Item -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner Section -->

<!-- Start Blog Slider Section -->

<div class="section-title-wrapper" data-aos="fade-up"  data-aos-delay="0" style="margin-top: 50px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-content-gap">
                    <div class="secton-content">
                        <h3 class="section-title">Thông tin nổi bật</h3>
                        <p>Những bài viết rất thú vị và ý nghĩa về cửa hàng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Section Content Text Area -->
<div class="blog-wrapper" data-aos="fade-up"  data-aos-delay="200">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-default-slider default-slider-nav-arrow">
                    <!-- Slider main container -->
                    <div class="swiper-container blog-slider">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Start Product Default Single Item -->
                            @foreach ($news as $item4)
                                <div class="blog-default-single-item blog-color--green swiper-slide">
                                    <div class="image-box">
                                        <a href="blog-single-sidebar-left.html" class="image-link">
                                            <img class="img-fluid" src="/Assets/Front/Users/assets/images/blog/{{$item4->Image}}" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="{{route('home.News.detail', $item4->NewId)}}">{{$item4->Title}}</a></h6>
                                        <p>{{$item4->Content}}</p>
                                        <div class="inner">
                                            <a href="{{route('home.News')}}" class="read-more-btn icon-space-left">Đọc thêm <span><i class="ion-ios-arrow-thin-right"></i></span></a>
                                            <div class="post-meta">
                                                <a href="#" class="date">{{ date('d/m/Y', strtotime($item4->PublicDate))}} </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

