@extends('admin.Layout.app');
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title" style="text-align:center">CHI TIẾT MỸ PHẨM</h4>
            <div class="row">
                <div class="col-12">
                    <div class="p-2">
                        <form class="form-horizontal">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="col-sm-4 col-form-label" for="simpleinput" style="font-size: 16px">Tên mỹ phẩm</label>
                                    <div class="col-sm-10">
                                        <input  name="ProName" class="form-control" value="{{$specificProduct->product->ProName}}" placeholder="Tiêu đề..." required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-sm-4 col-form-label" for="example-date" style="font-size: 16px">Tên dòng</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="LineName" value="{{$specificProduct->product->cosmeticline->LineName}}" id="example-date" required>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="col-sm-4 col-form-label" for="example-fileinput" style="font-size: 16px">Hình ảnh</label>
                                    <div class="col-sm-10">
                                         <img src="/storage/uploads/Specificproduct/{{$specificProduct->Image}}" style="width:70px" alt="">
                                        @if ($specificProduct->Image1 != '')
                                            <img src="/storage/uploads/Specificproduct/{{$specificProduct->Image1}}" style="width:70px" alt="">
                                        @endif
                                       @if ($specificProduct->Image1 != '')
                                       <img src="/storage/uploads/Specificproduct/{{$specificProduct->Image2}}" style="width:70px" alt="">
                                       @endif

                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-sm-4 col-form-label" for="example-date" style="font-size: 16px">Đơn vị tính</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="Measure" value="{{$specificProduct->Measure}}" id="example-date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="col-sm-4 col-form-label" for="example-fileinput" style="font-size: 16px">Loại</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="Type" value="{{$specificProduct->Type}}" id="example-date" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-sm-4 col-form-label" for="example-fileinput" style="font-size: 16px">Giá</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="Price" value="{{number_format( $specificProduct->Price,0,',','.')}}đ" id="example-date" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="col-sm-4 col-form-label" for="example-fileinput" style="font-size: 16px">Khuyến mại</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="Offer" value="{{$specificProduct->Offer}}" id="example-date" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-sm-4 col-form-label" for="example-fileinput" style="font-size: 16px">Ngày hết hạn</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="StopDate" value=" {{date('d/m/Y', strtotime($specificProduct->StopDate))}}" id="example-date" required>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>
@endsection
