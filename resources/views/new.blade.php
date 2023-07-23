@extends('user.Layout.app_2');
@section('content')
<div class="blog-section">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-3">
                <!-- Start Sidebar Area -->
                <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">

                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">Tìm kiếm</h6>
                        <div class="default-search-style d-flex">
                            <input class="default-search-style-input-box" type="search" placeholder="Tìm..." required>
                            <button class="default-search-style-input-btn" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->
                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">DANH MỤC SẢN PHẨM</h6>
                        <div class="sidebar-content">
                            <ul class="sidebar-menu">
                                <li><a href="Trangdiem.html">Trang điểm</a></li>
                                <li><a href="Trangdiem.html">Trang điểm mắt</a></li>
                                <li><a href="Trangdiem.html">Trang điểm môi</a></li>
                                <li><a href="Trangdiem.html">Trang điểm mặt</a></li>
                                <li><a href="Chamsocda.html">Chăm sóc da</a></li>
                                <li><a href="Chamsocda.html">Chăm sóc tóc</a></li>
                                <li><a href="Phukien.html">Phụ kiện</a></li>
                                <li><a href="Nuochoa.html">Nước hoa</a></li>
                            </ul>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->
                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">Loại Sản phẩm review</h6>
                        <div class="sidebar-content">
                            <div class="tag-link">
                                <a href="#">Dưỡng da</a>
                                <a href="#">Mặt nạ</a>
                                <a href="#">Son</a>
                                <a href="#">Dưỡng thể</a>
                                <a href="#">Phấn trang điểm</a>
                            </div>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->
                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">Chương trình khuyến mại</h6>
                        <div class="sidebar-content">
                            <div class="tag-link">
                                <a href="#">Khai trương cửa hàng</a>
                                <a href="#">Các dịp lễ</a>
                                <a href="#">Đại sale</a>
                                <a href="#">Sale cuối năm</a>
                                <a href="#">Các tháng</a>
                            </div>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">Tin nổi bật</h6>
                        <div class="sidebar-content">
                            <ul class="sidebar-menu">
                                <li><a href="#">5 bước trang điểm</a></li>
                                <li><a href="#">Cách dùng nước hoa</a></li>
                                <li><a href="#">Cách kẻ mí</a></li>
                                <li><a href="#">Mỹ phẩm tốt</a></li>
                            </ul>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->
                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <div class="sidebar-content">
                            <a href="product-details-default.html" class="sidebar-banner img-hover-zoom">
                                <img class="img-fluid" src="/Assets/Front/Users/assets/images/anhSP/anhsale.jpg" alt="">
                            </a>
                        </div>
                    </div>

                </div> <!-- End Sidebar Area -->
            </div>
            <div class="col-lg-9">
                <div class="blog-wrapper">
                    <div class="row mb-n6">
                        @foreach ($news as $item)
                            <div class="col-md-6 col-12 mb-6">
                                <!-- Start Product Default Single Item -->
                                <div class="blog-list blog-grid-single-item blog-color--golden" data-aos="fade-up" data-aos-delay="0">
                                    <div class="image-box">
                                        <a href="#" class="image-link">
                                            <img class="img-fluid" style="height: 300px;" src="/Assets/Front/Users/assets/images/blog/{{$item->Image}}" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="{{route('home.News.detail', $item->NewId)}}">{{$item->Title}}</a></h6>
                                        <ul class="post-meta">
                                            <li>Người đăng : <a href="#" class="author">Minh Tâm</a></li>
                                            <li>Thời gian: <a href="#" class="date">{{date('d/m/Y', strtotime($item->PublicDate))}} </a></li>
                                        </ul>
                                        <p style="display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis; width:400px">{{$item->Content}}</p>
                                        <a href="#" class="read-more-btn icon-space-left">Đọc thêm <span class="icon"><i class="ion-ios-arrow-thin-right"></i></span></a>
                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                            </div>
                        @endforeach

                    </div>
                </div>

                <!-- Start Pagination -->
                <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                    <ul>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                    </ul>
                </div> <!-- End Pagination -->
            </div>
        </div>
    </div>
</div>
@endsection
