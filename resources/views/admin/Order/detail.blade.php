@extends('admin.Layout.app');
@section('content')
<h3 style="margin-top:5px; text-align:center ">CHI TIẾT ĐƠN HÀNG</h3>

<div class="row">
    <div class="col-sm-6">
        <h4>Địa chỉ người nhận</h4>
        <address>
            {{-- @Model.Customer.CusName<br> --}}
            {{$list->ReceivingAddress}}<br>
            Số điện thoại: {{$list->PhoneNumber}}<br>

           @if($list->Payment == 1)

              <p>Hình thức thanh toán: <span style="font-weight:700">Trả tiền mặt</span></p>

            @else

                 <p>Hình thức thanh toán: <span style="font-weight:700">Chuyển khoản</span></p>

            @endif
        </address>
    </div> <!-- end col -->
    <div class="col-md-4 offset-md-2">
        <h4 style="margin-left:170px;">Thời gian đặt hàng</h4>
        <div class="mt-3 float-right" style="margin-top:0px !important; margin-right:23px;">
            <p class="m-b-10"><strong>Ngày đặt : </strong> <span class="float-right"> &nbsp;&nbsp;&nbsp;&nbsp;  {{date('d/m/Y', strtotime($list->OrderDate))}} </span></p>
            <p class="m-b-10"><strong>Tình trạng :
            @if ($list->Status=='DXT')
                </strong> <span class="float-right"><span class="badge badge-danger" style="margin-left:20px"> Chờ đóng hàng</span></span>
            @elseif($list->Status=='CVC')
                </strong> <span class="float-right"><span class="badge badge-danger" style="margin-left:20px"> Chờ vận chuyển</span></span>
            @else
                </strong> <span class="float-right"><span class="badge badge-danger" style="margin-left:20px"> Giao thành công</span></span>
            @endif

        </p>
            <p class="m-b-10"><strong>Mã đơn hàng : </strong> <span class="float-right">{{$list->OrdId}}</span></p>
        </div>
    </div><!-- end col -->

</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table mt-4 table-centered">
                <thead>
                    <tr>
                        <th>STT</th>
                        {{-- <th>Tên mỹ phẩm</th>
                        <th style="width: 15%">Số lượng</th>
                        <th style="width: 15%">Giá bán</th>
                        <th style="width: 15%" class="text-right">Tổng tiền</th> --}}
                        <th >Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th >Giá bán</th>
                        <th  >Số lượng</th>
                        <th  >Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $index=1;
                    @endphp
                    @foreach ($list->orderdetail as $item2)
                    <tr  class="border-bottom">
                        <td>{{$index++}}</td>
                        <td >
                            <div class="d-flex">
                                <a href="#">
                                    <img style="width:50px" class="img-item" src="/storage/uploads/Specificproduct/{{$item2->SpecificProduct->Image}}" alt="">
                                </a>

                            </div>
                        </td>
                        <td>
                            <div  class="flex-grow-1 d-flex align-items-center">
                                <a href="#" class="item-name">{{$item2->SpecificProduct->Product->ProName}}</a>

                            </div>
                        </td>
                        @if ($item2->SpecificProduct->Offer!=0)
                            <td style="margin-left:30px" class="product-price price">{{number_format($item2->Price -($item2->Offer * $item2->Price),0,',','.')}}đ</td>
                        @else
                            <td class="product-price price">{{number_format($item2->SpecificProduct->Price,0,',','.')}}đ</td>
                        @endif

                        <td >
                            {{$item2->Quantity}}
                        </td>

                        @if ($item2->SpecificProduct->Offer!=0)
                            <td >
                                <span class="price"> {{number_format($item2->Quantity *($item2->SpecificProduct->Price - $item2->SpecificProduct->Price* $item2->SpecificProduct->Offer),0,',','.')}}đ</span>
                            </td>

                        @else
                            <td class="product-price price">{{number_format($item2->SpecificProduct->Price*$item2->Quantity,0,',','.')}}đ</td>
                        @endif

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- end table-responsive -->
    </div> <!-- end col -->
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="">
            <h4 class="text-muted">Chú ý:</h4>
            <p class="text-muted" style="font-size:15px">
                {{$list->Note}}
            </p>
        </div>
    </div> <!-- end col -->
    <div class="col-sm-6">
        <div class="float-right">
            <p><b>Tạm tính:</b> <span class="float-right price"> &nbsp;&nbsp; {{number_format($list->MoneyTotal,0,',','.')}}đ</span></p>
            <p><b>Phí ship:</b> <span class="float-right"> &nbsp;&nbsp;&nbsp; 30.000đ</span></p>
            <h3>Tổng tiền: &nbsp;&nbsp; <span class="price">{{number_format($list->MoneyTotal+30000,0,',','.')}}đ</span></h3>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end col -->
</div>
<div class="mt-4 mb-1">
    <div class="text-right d-print-none">
        <a href="{{route('home2.Order.index')}}" class="btn btn-primary waves-effect waves-light"> Quay Lại</a>
        <a href="#" onclick="window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> In hoá đơn</a>
    </div>
</div>
@endsection
