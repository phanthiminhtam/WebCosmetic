<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Đơn hàng vừa mua</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="/Assets/Front/Admins/assets/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <style>
        .fw-bold {
            font-weight: 600 !important;
        }

        .process-item span {
            color: #d2d1d4;
        }

        .process-item {
            color: #77757f;
        }

            .process-item.active span {
                color: white;
                background-color: black;
            }

            .process-item.active {
                color: black;
            }

        .cart-content {
            padding: 0 80px;
        }

        .col.item {
            width: 44%;
        }

        .col.price {
            width: 17%;
        }

        .col.qty {
            width: 17%;
        }

        .col.subtotal {
            width: 18%;
        }

        .col {
            text-align: left;
        }

        thead .col {
            padding: 10px 25px 10px 16px;
            background-color: var(--primary-text-color);
            color: #e8e8ea;
            font-weight: 500;
            font-size: 14px;
            border: none;
        }

        .cart-content__left, .cart-content__right {
            padding: 40px 40px 20px 40px;
            background-color: #f9f9f9;
            height: 100%;
        }

        .item-name {
            text-decoration: none;
            color: #77757f;
            margin-bottom: 2px;
            line-height: 23px;
            display: inline-block;
        }

            .item-name:hover, tbody tr:hover .item-name {
                color: var(--primary-text-color);
                text-decoration: underline;
            }

        tbody tr:hover .cart-item__remove {
            display: block;
        }

        tbody .col {
            font-size: 14px;
            padding: 22px 25px 22px 16px;
            vertical-align: middle;
        }

        .img-item {
            width: 60px;
            margin-right: 12px;
        }

        .item-size {
            font-size: 13px;
        }

        .btn-minus {
            background-image: url(../img/tru-icon.svg);
        }

        .btn-plus {
            background-image: url(../img/cong-icon.svg);
        }

        .btn-minus, .btn-plus {
            width: 24px;
            height: 24px;
            display: block;
            background-position: center;
            background-repeat: no-repeat;
            border: none;
            background-color: transparent;
            cursor: pointer;
        }

        .input-cart-qty {
            width: 33px;
            border: none;
            background-color: #f9f9f9;
            text-align: center;
        }

        .cart-item__remove {
            background-image: url('../img/close.svg');
            width: 24px;
            height: 24px;
            background-position: center;
            background-repeat: no-repeat;
            display: none;
            cursor: pointer;
        }

        .actions {
            padding: 22px 0;
            vertical-align: top;
        }

        .btn-order {
            width: 100%;
            background-color: #333f48;
            color: white;
            outline: none;
            border: none;
            font-weight: 600;
            padding: 12px;
            transition: all ease 0.1s;
        }

            .btn-order:hover {
                opacity: 0.8;
                cursor: pointer;
            }

        .cart-content {
            margin-bottom: 80px;
        }

        .slick-slide.product {
            padding: 0 3px !important;
        }

        .old-price {
            display: block;
            color: #fdaa63;
            text-decoration: line-through;
            margin-top: 12px;
            font-weight: 400;
        }
    </style>
</head>

<body>

    <div class="account-pages mt-5 mb-5">
        <h3 class="text-center">THÔNG TIN ĐƠN HÀNG CỦA BẠN</h3>
        <div style="width: 60%;" class="bg-white mx-auto mt-4 border rounded p-4 bill shadow">
            <div class="d-flex align-items-center justify-content-between py-3">
                <div class="d-flex align-items-center">
                    <p>ĐƠN HÀNG: {{$list->OrdId}}</p>
                     @if ($list->Status == "DXT")

                        <p class="badge bg-success ms-2"> Chờ vận chuyển</p>

                    @endif
                </div> <p class="text-secondary">Ngày đặt: {{date('d/m/Y', strtotime($list->OrderDate))}}</p>
            </div>
            <table class="mt-3 cart-list w-100 mb-5">
                <thead style="background-color: #333f48; color:white;">
                    <tr>
                        <th class="col item" style="width: 40%">Sản phẩm</th>
                        <th class="col" style="width: 20%">Giá bán</th>
                        <th class="col" style="width: 20%">Số lượng</th>
                        <th class="col" style="width: 20%">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>

                        @foreach ($list->orderdetail as $item2)
                        <tr  class="border-bottom">
                            <td class="col">
                                <div class="d-flex">
                                    <a href="#">
                                        <img class="img-item" src="/storage/uploads/Specificproduct/{{$item2->SpecificProduct->Image}}" alt="">
                                    </a>
                                    <div style="width:100%" class="flex-grow-1 d-flex align-items-center">
                                        <a href="" class="item-name">{{$item2->SpecificProduct->Product->ProName}}</a>

                                    </div>
                                </div>
                            </td>
                            @if ($item2->SpecificProduct->Offer!=0)
                                <td class="product-price price">{{number_format($item2->Price -($item2->Offer * $item2->Price),0,',','.')}}đ</td>
                            @else
                                <td class="product-price price">{{number_format($item2->SpecificProduct->Price,0,',','.')}}đ</td>
                            @endif

                            <td class="col">
                                {{$item2->Quantity}}
                            </td>

                            @if ($item2->SpecificProduct->Offer!=0)
                                <td class="col">
                                    <span class="price"> {{number_format($item2->Quantity *($item2->SpecificProduct->Price - $item2->SpecificProduct->Price* $item2->SpecificProduct->Offer),0,',','.')}}đ</span>
                                </td>

                            @else
                                <td class="product-price price">{{number_format($item2->SpecificProduct->Price*$item2->Quantity,0,',','.')}}đ</td>
                            @endif

                        </tr>
                        @endforeach

                </tbody>
            </table>
            <div class="mt-4">
                <div class="d-flex  py-2 border-bottom justify-content-end">
                    <p class="me-3 fs-5" style="width:180px">Tổng thanh toán </p> <span class="fs-5 price">{{number_format($list->MoneyTotal,0,',','.')}}đ</span>
                </div>
                <div class="d-flex py-2 border-bottom justify-content-end">
                    <p class="me-3" style="width:180px">Phí giao hàng</p> <span>30.000đ</span>
                </div>
                <div class="d-flex  py-2 border-bottom justify-content-end">
                    <p class="me-3 fs-5" style="width:180px">Tổng thanh toán </p> <span class="fs-5 price">{{number_format($list->MoneyTotal+30000,0,',','.')}}đ</span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 text-center">
                <p class="text-muted"> <a href="{{route('home.index')}}" class="text-muted font-weight-medium ml-1" style="font-weight:700; font-size:18px">Tiếp tục mua hàng</a></p>

            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/Assets/Front/Admins/assets/js/vendor.min.js"></script>


    <script src="/Assets/Front/Admins/assets/js/app.min.js"></script>

</body>
</html>
