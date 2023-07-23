@extends('user.Layout.app_2');
@section('content')
<div class="wishlist-section">
    <!-- Start Cart Table -->
    <div class="wishlish-table-wrapper"  data-aos="fade-up"  data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="table_page table-responsive">
                            <table>
                                <!-- Start Wishlist Table Head -->
                                <thead>
                                    <tr>
                                        <th class="product_remove">Xoá</th>
                                        <th class="product_thumb">Hình ảnh</th>
                                        <th class="product_name">Mỹ phẩn</th>

                                        <th class="product_stock">Giá</th>
                                        <th class="product_addcart">Thêm giỏ hàng</th>
                                    </tr>
                                </thead> <!-- End Cart Table Head -->
                                <tbody>
                                    <!-- Start Wishlist Single Item-->
                                    @if (session('cartWL'))
                                        @foreach (session('cartWL') as $id => $detail)

                                            <tr data-id="{{$id}}">
                                                <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                                <td class="product_thumb"><a href=""><img src="/storage/uploads/Specificproduct/{{$detail['Image']}}" alt=""></a></td>
                                                <td class="product_name"><a href="{{route('home.productdetail',$detail['SpId'])}}">{{$detail['ProName']}}</a></td>
                                                <td class="product-price"> {{number_format($detail['Price'],0,',','.')}}đ</td>
                                                <td class="product_addcart"><a href="{{route('add_to_cart',$detail['SpId'])}}" class="btn btn-md btn-golden">Thêm giỏ hàng</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="cart_submit">
                            {{-- <button class="btn btn-md btn-golden" type="submit">Cập nhật</button> --}}
                            <a href="{{route('home.cart')}}" class="btn btn-md btn-golden">Xem giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Cart Table -->
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(".product_remove").click(function(e) {
                e.preventDefault();
                var ele = $(this);
                if (confirm("Bạn có muốn xoá mỹ phẩm?")) {
                    $.ajax({
                        url: '{{ route('remove_wishlist') }}',
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
