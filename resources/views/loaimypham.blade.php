@extends('user.Layout.app_2');
@section('content')
<div class="shop-section">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-3">
                <!-- Start Sidebar Area -->
                <div class="siderbar-section" data-aos="fade-up"  data-aos-delay="0">

                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget" >
                        <h6 class="sidebar-title">Danh mục sản phẩm</h6>
                        <div class="sidebar-content">
                            <ul class="sidebar-menu">
                                <li>
                                    <ul class="sidebar-menu-collapse">
                                        <!-- Start Single Menu Collapse List -->
                                       <li class="sidebar-menu-collapse-list">
                                           <div class="accordion">
                                               <a href="" class="accordion-title collapsed" data-bs-toggle="collapse" data-bs-target="#men-fashion" aria-expanded="false">Menu </a>
                                               <div id="men-fashion" class="collapse">

                                               </div>
                                           </div>
                                       </li> <!-- End Single Menu Collapse List -->
                                   </ul>
                                </li>
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


                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">Thương hiệu nổi bật</h6>
                        <div class="sidebar-content">
                            <div class="filter-type-select">
                                <ul>
                                    <li>
                                        <label class="checkbox-default" for="brakeParts">
                                            <span>Innisfree (297)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-default" for="accessories">
                                            <span>Neutrogena (123)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-default" for="EngineParts">
                                            <span>L'oreal Paris (117)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-default" for="hermes">
                                            <span>Maybeline (81)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-default" for="tommyHilfiger">
                                            <span>Vacosi (227)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-default" for="tommyHilfiger">
                                            <span>The Face Shop (167)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-default" for="tommyHilfiger">
                                            <span>Missha (51)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-default" for="tommyHilfiger">
                                            <span>Nước hoa (103)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-default" for="tommyHilfiger">
                                            <span>Pony(10)</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->

                    <!-- Start Single Sidebar Widget -->


                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">Loại sản phẩm</h6>
                        <div class="sidebar-content">
                            <div class="tag-link">
                                <a href="#">Phấn nước</a>
                                <a href="#">Kem nền</a>
                                <a href="#">Tạo khối</a>
                                <a href="#">Custion</a>
                                <a href="#">Phấn mắt</a>
                                <a href="#">Phấn má</a>
                                <a href="#">Tonner</a>
                                <a href="#">Chống nắng</a>
                                <a href="#">Xịt khoáng</a>
                            </div>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->

                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <div class="sidebar-content">
                            <a href="" class="sidebar-banner img-hover-zoom">
                                <img class="img-fluid" src="/Assets/Front/Users/assets/images/anhSP/anh nền trang điểm.jpg" alt="">
                            </a>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->

                </div> <!-- End Sidebar Area -->
            </div>
            <div class="col-lg-9">
                <!-- Start Shop Product Sorting Section -->
                <div class="shop-sort-section">
                    <div class="container">
                        <div class="row">
                            <!-- Start Sort Wrapper Box -->
                            <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column" data-aos="fade-up"  data-aos-delay="0">
                                <!-- Start Sort tab Button -->
                                <div class="sort-tablist d-flex align-items-center">
                                    <ul class="tablist nav sort-tab-btn">
                                        <li><a class="nav-link active" data-bs-toggle="tab" href="#layout-3-grid"><img src="/Assets/Front/Users/assets/images/icons/bkg_grid.png" alt=""></a></li>
                                        {{-- <li><a class="nav-link" data-bs-toggle="tab" href="#layout-list"><img src="/Assets/Front/Users/assets/images/icons/bkg_list.png" alt=""></a></li> --}}
                                    </ul>


                                </div> <!-- End Sort tab Button -->


                            </div> <!-- Start Sort Wrapper Box -->
                        </div>
                    </div>
                </div> <!-- End Section Content -->

                <!-- Start Tab Wrapper -->
                <div class="sort-product-tab-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content tab-animate-zoom">
                                    <!-- Start Grid View Product -->
                                    <div class="tab-pane sort-layout-single active" id="layout-3-grid">
                                        <div class="row">
                                            @foreach ($list as $item)
                                            <div class="col-xl-4 col-sm-6 col-12">
                                                <!-- Start Product Default Single Item -->
                                                <div class="product-default-single-item product-color--golden">
                                                    <div class="image-box">
                                                        <a href="" class="image-link">
                                                            <img src="/storage/uploads/Specificproduct/{{$item->Image}}" alt="">
                                                        </a>
                                                        <div class="action-link">
                                                            <div class="action-link-left">
                                                                <a href="{{route('add_to_cart',$item->SpId)}}" >Thêm giỏ hàng</a>
                                                            </div>
                                                            <div class="action-link-right">
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="icon-magnifier"></i></a>
                                                                <a href="{{route('add_to_wishlist',$item->SpId)}}"><i class="icon-heart"></i></a>
                                                                {{-- <a href="compare.html"><i class="icon-shuffle"></i></a> --}}
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
                                                            @if ($item->Offer != 0)

                                                            <span class="price"><del >{{number_format($item->Price,0,',','.')}}đ</del> <span class="price">{{number_format($item->Price -($item->Offer * $item->Price),0,',','.')}}đ</span></span>

                                                            @else
                                                                <span class="price">{{number_format($item->Price,0,',','.')}}đ</span>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- End Product Default Single Item -->
                                            </div>
                                            @endforeach

                                        </div>
                                    </div> <!-- End Grid View Product -->
                                    <!-- Start List View Product -->
                                  <!-- End List View Product -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Tab Wrapper -->

                <!-- Start Pagination -->
                <div class="page-pagination text-center" data-aos="fade-up"  data-aos-delay="0">
                    <ul>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                    </ul>
                </div> <!-- End Pagination -->
            </div> <!-- End Shop Product Sorting Section  -->
        </div>
    </div>
</div>
@endsection
