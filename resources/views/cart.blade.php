@extends('user.Layout.app_2');
@section('content')
<div class="cart-section">
    <!-- Start Cart Table -->
    <div class="cart-table-wrapper"  data-aos="fade-up"  data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="table_page table-responsive">
                            <table>
                                <!-- Start Cart Table Head -->
                                <thead>
                                    <tr>
                                        <th class="product_remove">Xoá</th>
                                        <th class="product_thumb">Hình ảnh</th>
                                        <th class="product_name">Mỹ phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product_quantity">Số lượng</th>
                                        <th class="product_total">Thành tiền</th>
                                    </tr>
                                </thead> <!-- End Cart Table Head -->
                                <tbody>
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)

                                            <tr data-id="{{$id}}">
                                                <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                                <td class="product_thumb"><a href=""><img src="/storage/uploads/Specificproduct/{{$details['Image']}}" alt=""></a></td>
                                                <td class="product_name"><a href="">{{$details['ProName']}}</a></td>
                                                <td class="product-price"> {{number_format($details['Price'],0,',','.')}}đ</td>
                                                <td class="product_quantity" data-th="Quantity"><label>Số lượng</label> <input min="1" max="100" value="{{$details['quantity']}}" type="number" class="quantity cart_update"></td>
                                                <td class="product_total">{{number_format($details['quantity'] * $details['Price'],0,',','.')}}đ</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <div class="cart_submit">
                            {{-- <button class="btn btn-md btn-golden" type="submit">Cập nhật</button> --}}
                            <a href="{{route('home.index')}}" class="btn btn-md btn-golden">Tiếp tục mua hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Cart Table -->

    <!-- Start Coupon Start -->
    <div class="coupon_area">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-6 col-md-6">
                    <div class="coupon_code left"  data-aos="fade-up"  data-aos-delay="200">
                        <h3>Coupon</h3>
                        <div class="coupon_inner">
                            <p>Enter your coupon code if you have one.</p>
                            <input class="mb-2" placeholder="Coupon code" type="text">
                            <button type="submit" class="btn btn-md btn-golden">Apply coupon</button>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code right"  data-aos="fade-up"  data-aos-delay="400">
                        <h3>Tạm tính</h3>
                        @php
                            $total =0;
                        @endphp
                        @foreach (session('cart') as $id => $details)
                            @php
                                $total+=  $details['Price']*$details['quantity']
                            @endphp
                        @endforeach
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Thành tiền</p>
                                <p class="cart_amount price">{{number_format($total,0,',','.')}}đ</p>
                            </div>
                            <div class="cart_subtotal ">
                                <p>Phí ship(toàn quốc)</p>
                                <p class="cart_amount"> 30.000đ</p>
                            </div>


                            <div class="cart_subtotal">
                                <p>Tổng tiền</p>
                                <p class="cart_amount price">{{number_format($total+30000,0,',','.')}}đ</p>
                            </div>
                            <div class="checkout_btn">
                                <a href="{{route('home.checkout')}}" class="btn btn-md btn-golden" id="btnPayment"> Tiến hành đặt hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Coupon Start -->
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
                $(".cart_update").change(function(e){

                var ele = $(this);

                    $.ajax({
                        url:'{{route('update_cart')}}',
                        method: "POST",
                        data: {
                            _token:'{{csrf_token()}}',
                            id: ele.parents("tr").attr("data-id"),
                            quantity: ele.parents("tr").find(".quantity").val()
                        },
                        success: function(response){
                            window.location.reload();
                        }
                    });

            });
        });
        $(document).ready(function() {
            $(".product_remove").click(function(e) {
                e.preventDefault();
                var ele = $(this);
                if (confirm("Bạn có muốn xoá mỹ phẩm?")) {
                    $.ajax({
                        url: '{{ route('remove_from_cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });
        });
    </script>
@endsection
