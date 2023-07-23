@extends('admin.Layout.app');
@section('content')


            <!-- start page title -->
            <div class="row" >
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">LOGIN</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">TRANG CHỦ</a></li>

                            </ol>
                        </div>
                        <h4 class="page-title">TRANG CHỦ</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card-box">
                        <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                        <h4 class="mt-0 font-16">Số lượng mỹ phẩm</h4>
                        <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">
                            {{count($listPro)}}</span>
                        </h2>

                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card-box">
                        <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                        <h4 class="mt-0 font-16">Số sản phẩm sale</h4>
                        <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{count($listSale)}}</span></h2>

                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card-box">
                        <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                        <h4 class="mt-0 font-16">Đơn hàng bán</h4>
                        <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{count($listOrd)}}</span></h2>

                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card-box">
                        <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                        <h4 class="mt-0 font-16">Doanh thu</h4>
                         <h2 class="text-primary my-3 text-center"><span >{{number_format($tg,0,',','.')}} VND</span></h2>

                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right d-none d-md-inline-block">
                                <div class="btn-group mb-2">
                                    <button type="button" class="btn btn-xs btn-light">Ngày</button>
                                    <button type="button" class="btn btn-xs btn-secondary">Tuần</button>
                                    <button type="button" class="btn btn-xs btn-light">Tháng</button>
                                </div>
                            </div>
                            <h4 class="header-title">Biểu đồ đường</h4>

                            <div class="row mt-4 text-center">
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Giảm</p>
                                    <h4><i class="fe-arrow-down text-danger mr-1"></i>7.8%</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Tuần trước</p>
                                    <h4><i class="fe-arrow-up text-success mr-1"></i>1.4%</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Tháng trước</p>
                                    <h4><i class="fe-arrow-down text-danger mr-1"></i>15%</h4>
                                </div>
                            </div>

                            <div class="mt-3" dir="ltr">
                                <div id="apex-area" class="apex-charts"></div>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right d-none d-md-inline-block">
                                <div class="btn-group mb-2">
                                    <button type="button" class="btn btn-xs btn-secondary">Ngày</button>
                                    <button type="button" class="btn btn-xs btn-light">Tuần</button>
                                    <button type="button" class="btn btn-xs btn-light">Tháng</button>
                                </div>
                            </div>
                            <h4 class="header-title">Biểu đồ tròn</h4>
                            <div class="row mt-4 text-center">
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Giảm</p>
                                    <h4><i class="fe-arrow-down text-danger mr-1"></i>3.8%</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Tuần trước</p>
                                    <h4><i class="fe-arrow-up text-success mr-1"></i>1.1%</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Tháng trước</p>
                                    <h4><i class="fe-arrow-down text-danger mr-1"></i>25%</h4>
                                </div>
                            </div>
                            <div class="mt-3" dir="ltr">
                                <div id="apex-pie-2" class="apex-charts"></div>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                    <div class="col-xl-4">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-sm bg-success rounded-circle">
                                        <i class="fe-aperture avatar-title font-22 text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark my-1"><span data-plugin="counterup">{{count($listReview)}}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Số phản hồi</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <span data-plugin="peity-bar" data-colors="#3bafda,#ebeff2" data-width="100%" data-height="36">5,3,9,6,5,9,7,3,5,2,9,7,2,1,3,5,2,9,7,2,5,3,9,6,5,9,7</span>
                            </div>
                        </div> <!-- end card-box-->
                    </div> <!-- end col -->

                    <div class="col-xl-4">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-sm bg-primary rounded-circle">
                                        <i class="fe-users avatar-title font-22 text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark my-1"><span data-plugin="counterup">{{count($listStaff)}}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Số nhân viên</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <span data-plugin="peity-line" data-fill="#1abc9c" data-stroke="#1abc9c" data-width="100%" data-height="36">3,5,2,9,7,2,5,3,9,6,5,9,7</span>
                            </div>
                        </div> <!-- end card-box-->
                    </div> <!-- end col -->

                    <div class="col-xl-4">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-sm bg-secondary rounded-circle">
                                        <i class="fe-shopping-bag avatar-title font-22 text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark my-1"><span data-plugin="counterup">{{count($listContact)}}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Số liên hệ</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 text-center">
                                <span data-plugin="peity-line" data-fill="#fff" data-stroke="#6c757d" data-width="100%" data-height="36">5,3,9,6,5,9,7,3,5,2</span>
                            </div>
                        </div> <!-- end card-box-->
                    </div> <!-- end col -->

                </div>
                <!-- end row -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0">Bản đồ</h4>

                            <div id="cardCollpase4" class="collapse pt-3 show">
                                <div id="world-map-markers" style="height: 433px"></div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0">Mỹ phẩm sale</h4>

                            <div id="cardCollpase5" class="collapse pt-3 show">
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Khuyến mãi</th>
                                                {{-- <th>Amount</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($listTopSale as $item)
                                                <tr>
                                                    <td>{{$item->product->ProName}}</td>
                                                    <td>{{number_format($item->Price,0,',','.')}}đ</td>
                                                    <td style="text-align:center">{{$item->Offer}}</td>

                                                </tr>
                                           @endforeach

                                        </tbody>
                                    </table>
                                </div> <!-- end table responsive-->
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
<!-- content -->

    <!-- Footer Start -->

    <!-- end Footer -->

</div>
@endsection
