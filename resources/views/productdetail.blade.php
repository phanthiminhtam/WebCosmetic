@extends('user.Layout.app_2');
<script>
    var csrfToken = "{{ csrf_token() }}";
  </script>
@section('scripts')
<script>

    function Send(){

            const Email = $("#txtEmail").val();
            const PhoneNumber = $("#txtPhoneNumber").val().trim();
            const Content = $("#txtContent").val().trim();
            const Vote = $("#Vote").val().trim();

            var formData = new FormData();
            formData.append('_token', csrfToken); // Thêm CSRF token vào formData
            formData.append('Vote',Vote)
            formData.append('PhoneNumber',PhoneNumber)
            formData.append('Email',Email)
            formData.append('Content',Content)

            $.ajax({
                url: "/Review/storeRV",
                type: 'POST',
                contentType: false, //Không có header
                processData: false, //không xử lý dữ liệu
                data: formData,
                success: function (res) {
                    if (res.message == true) {
                                alert('Gửi đánh giá thành công! Vui lòng chờ duyệt!');
                                //review.resetForm();
                                $('#Vote').val('');
                                $('#txtEmail').val('');
                                $('#txtPhoneNumber').val('');
                                $('#txtContent').val('');
                    }
                    else{
                     alert('Tài khoản của bạn chưa được phép đánh giá!')
                 };
                }
            })
        }

        // function Send(){
        //     debugger
        //     var data = new FormData();
        //     data.append('Email',document.getElementById('txtEmail').value)
        //     data.append('PhoneNumber',document.getElementById('txtPhoneNumber').value)
        //     data.append('Content', document.getElementById('txtContent').value)
        //     // date.append('Vote', document.getElementById('Vote').value)

        //     console.log(data)
        //     $.ajax({
        //         url: "/api/Contact/storeRV",
        //         type: 'POST',
        //         data: data,
        //         async: true,
        //         contentType: false, //Không có header
        //         processData: false, //không xử lý dữ liệu,
        //         success: function (res) {
        //             console.log((res));
        //             if (res.message == true) {
        //                         alert('Gửi đánh giá thành công! Vui lòng chờ duyệt!');
        //                         //review.resetForm();
        //                         // $('#Vote').val('');
        //                         $('#txtEmail').val('');
        //                         $('#txtPhoneNumber').val('');
        //                         $('#txtContent').val('');
        //             };
        //             // else{
        //             //     alert('Tài khoản của bạn chưa được phép đánh giá!')
        //             // };

        //         }
        //     });
        // }

    </script>
    @endsection
@section('content')

<div class="product-details-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                    <!-- Start Large Image -->
                    <div class="product-large-image product-large-image-horaizontal swiper-container">
                        <div class="swiper-wrapper">
                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                <img src="/storage/uploads/Specificproduct/{{$specificProduct->Image}}" alt="">
                            </div>
                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                <img src="/storage/uploads/Specificproduct/{{$specificProduct->Image1}}" alt="">
                            </div>
                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                <img src="/storage/uploads/Specificproduct/{{$specificProduct->Image2}}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- End Large Image -->
                    <!-- Start Thumbnail Image -->
                    <div style="margin-top: -36px !important" class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5">
                        <div class="swiper-wrapper">
                            <div class="product-image-thumb-single swiper-slide">
                                <img class="img-fluid" src="/storage/uploads/Specificproduct/{{$specificProduct->Image}}" alt="">
                            </div>
                            <div class="product-image-thumb-single swiper-slide">
                                <img class="img-fluid" src="/storage/uploads/Specificproduct/{{$specificProduct->Image1}}" alt="">
                            </div>
                            <div class="product-image-thumb-single swiper-slide">
                                <img class="img-fluid" src="/storage/uploads/Specificproduct/{{$specificProduct->Image2}}" alt="">
                            </div>
                            <div class="product-image-thumb-single swiper-slide">
                                <img class="img-fluid" src="/storage/uploads/Specificproduct/{{$specificProduct->Image2}}" alt="">
                            </div>
                        </div>
                        <!-- Add Arrows -->
                        <div style="margin-top: -278px  !important" class="gallery-thumb-arrow swiper-button-next"></div>
                        <div style="margin-top: -278px  !important" class="gallery-thumb-arrow swiper-button-prev"></div>
                    </div>
                    <!-- End Thumbnail Image -->
                </div>
            </div>
            <div class="col-xl-7 col-lg-6">
                <div class="product-details-content-area product-details--golden" data-aos="fade-up" data-aos-delay="200">
                    <!-- Start  Product Details Text Area-->
                    <div class="product-details-text">
                        <h4 class="title">{{ $specificProduct->Product->ProName}}</h4>
                        <div class="d-flex align-items-center">
                            <ul class="review-star">
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="empty"><i class="ion-android-star"></i></li>
                            </ul>

                        </div>
                        <div><span class="price">{{number_format($specificProduct->Price,0,',','.')}}đ</span></div>
                        <p>Giá thị trường: <span>{{number_format($specificProduct->Price + 50000,0,',','.')}}₫ </span> - Tiết kiệm: <span>50.000₫ </span> (<span style="color: red;">- 10%</span>)</p>
                        <p>- Chiết xuất từ thành phần tự nhiên an toàn cho da</p>
                        <p>- Cấp nước và giữ ẩm cho da cực tốt</p>
                        <p> - Dưỡng da sáng khỏe, mịn màng đầy sức sống</p>
                        <p>- Phù hợp với mọi loại da</p>
                    </div> <!-- End  Product Details Text Area-->
                    <!-- Start Product Variable Area -->
                    <div class="product-details-variable">

                        <div class="d-flex align-items-center ">
                            <div class="variable-single-item ">
                                <span>Số lượng</span>
                                <div class="product-variable-quantity">
                                    <input min="1" max="100" value="1" type="number">
                                </div>
                            </div>

                            <div class="product-add-to-cart-btn">
                                {{-- <a onclick="AddCart(@Model.SpId)" class="btn btn-block btn-lg btn-black-default-hover">+ Thêm vào giỏ hàng</a> --}}
                                <a href="{{route('add_to_cart',$specificProduct->SpId)}}" class="btn btn-block btn-lg btn-black-default-hover">+ Thêm vào giỏ hàng</a>
                            </div>
                        </div>

                    </div>
                    <div class="product-details-social">
                        <span class="title">Chia sẻ mỹ phẩm:</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> <!-- End  Product Details Social Area-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Product Content Tab Section -->
<div class="product-details-content-tab-section section-top-gap-100" style="margin-top:100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-details-content-tab-wrapper" data-aos="fade-up"  data-aos-delay="0">

                    <!-- Start Product Details Tab Button -->
                    <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                        <li>
                            <a class="nav-link active" data-bs-toggle="tab" href="#description">
                                Mô tả
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" data-bs-toggle="tab" href="#specification">
                                Cụ thể
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" data-bs-toggle="tab" href="#review">
                                Góp ý
                            </a>
                        </li>
                    </ul>

                    <!-- Start Product Details Tab Content -->
                    <div class="product-details-content-tab">
                        <div class="tab-content">
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane active show" id="description">
                                <div class="single-tab-content-item">
                                    <p>
                                        <strong>Gel dưỡng ẩm I'm From Vitamin Tree Water Gel 75gr</strong>
                                        là sản phẩm chăm sóc da đang rất được tín đồ <a href="Trangdiem.html" style="text-decoration: none;color: #6b97f5;">làm đẹp</a> thế giới yêu thích.
                                        Với hàng loạt công dụng đa dạng được tích hợp trọn vẹn trong hũ gel: cấp nước dưỡng ẩm, dưỡng trắng, kiềm dầu, trả lại làn da vẻ trắng sáng rực rỡ,... sản phẩm hứa hẹn sẽ làm hài lòng những cô nàng khó tính nhất.
                                    </p>
                                    <p>
                                        Dù mùa nào đi nữa thì cấp ẩm cho da luôn là điều cần thiết. Đó là lý do vì sao bạn không nên bỏ lỡ <em>gel dưỡng ẩm Vitamin Tree Water-Gel</em> của nhãn hiệu I’m From.
                                        Với khả năng cấp nước tức thì và giữ ẩm cho da cực tốt, gel dưỡng ẩm I'm From Vitamin Tree Water mang đến cho bạn gái làn da căng bóng ẩm mượt đầy sức sống.
                                    </p><br>
                                    <p>
                                        Sản phẩm <a href="Chamsocda.html" style="text-decoration: none;color: #6b97f5;">dưỡng da</a> Vitamin Tree Water với kết cấu dạng gel mỏng nhẹ, màu trắng đục. Khi bôi trên da cảm giác rất mướt như lướt trên nước,
                                        sản phẩm lỏng vừa đủ, khi bôi trên da thấm rất nhanh, nhưng không hề có cảm giác rít hay nhờn dính nên cực kỳ tuyệt vời. Chỉ sau một thời gian sử dụng, bạn sẽ nhận thấy sự thay đổi rõ rệt trên da,
                                        da kiểm soát dầu tốt hơn, luôn ẩm mịn, căng mướt, lỗ chân lông se nhỏ hẳn,...
                                    </p>
                                    <p>Gel dưỡng da thải độc hội tụ những công dụng dưỡng da cực tuyệt vời:</p>
                                    <p>- Cấp nước tức thì và giữ ẩm cho da, bạn sẽ cảm nhận làn da căng bóng mịn màng suốt cả ngày.</p>
                                    <p>- Giảm thiểu ngay tình trang da khô nứt, khô ráp thiếu sức sống vì thiếu nước, làm dịu mát da, se khít lỗ chân lông và xóa mờ thâm nám.</p>
                                    <p>- Hoạt chất dưỡng trắng giúp cải thiện sắc tố màu của da, cho bạn làn da chắc khỏe, tươi trẻ và căng bóng mịn màng.</p>
                                    <p>- Phục hồi làn da bị cháy nắng, giúp da được cấp nước kiểm soát dầu nhờn.</p>
                                    <p>- Phù hợp với tất cả các loại da kể cả da khô, da dầu da có vấn đề về mụn và lỗ chân lông.</p>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane" id="specification">
                                <div class="single-tab-content-item">
                                    <table class="table table-bordered mb-20">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Hãng sản xuất</th>
                                                <td>{{$specificProduct->Product->CosmeticLine->Brand}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Dung tích</th>
                                                <td>{{$specificProduct->Measure}}</td>
                                            <tr>
                                                <th scope="row">Loại</th>
                                                <td>{{$specificProduct->Type}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>
                                        <strong>Gel dưỡng ẩm I'm From Vitamin Tree Water Gel 75gr</strong>
                                        là sản phẩm chăm sóc da đang rất được tín đồ <a href="Trangdiem.html" style="text-decoration: none;color: #6b97f5;">làm đẹp</a> thế giới yêu thích.
                                        Với hàng loạt công dụng đa dạng được tích hợp trọn vẹn trong hũ gel: cấp nước dưỡng ẩm, dưỡng trắng, kiềm dầu, trả lại làn da vẻ trắng sáng rực rỡ,... sản phẩm hứa hẹn sẽ làm hài lòng những cô nàng khó tính nhất.
                                        Dù mùa nào đi nữa thì cấp ẩm cho da luôn là điều cần thiết. Đó là lý do vì sao bạn không nên bỏ lỡ <em>gel dưỡng ẩm Vitamin Tree Water-Gel</em> của nhãn hiệu I’m From.
                                        Với khả năng cấp nước tức thì và giữ ẩm cho da cực tốt, gel dưỡng ẩm I'm From Vitamin Tree Water mang đến cho bạn gái làn da căng bóng ẩm mượt đầy sức sống.
                                        Sản phẩm <a href="Chamsocda.html" style="text-decoration: none;color: #6b97f5;">dưỡng da</a> Vitamin Tree Water với kết cấu dạng gel mỏng nhẹ, màu trắng đục. Khi bôi trên da cảm giác rất mướt như lướt trên nước,
                                        sản phẩm lỏng vừa đủ, khi bôi trên da thấm rất nhanh, nhưng không hề có cảm giác rít hay nhờn dính nên cực kỳ tuyệt vời. Chỉ sau một thời gian sử dụng, bạn sẽ nhận thấy sự thay đổi rõ rệt trên da,
                                        da kiểm soát dầu tốt hơn, luôn ẩm mịn, căng mướt, lỗ chân lông se nhỏ hẳn,...
                                    </p>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane" id="review">
                                <div class="single-tab-content-item">
                                    <!-- Start - Review Comment -->
                                    <ul class="comment">
                                        @foreach ($reviews as $item)
                                            @if ($item->Status == 1)
                                            <li class="comment-list">
                                                <div class="comment-wrapper">
                                                    <div class="comment-img">
                                                        <img src="/Assets/Front/Admins/assets/images/email/unnamed.png" alt="">
                                                    </div>
                                                    <div class="comment-content">
                                                        <div class="comment-content-top">
                                                            <div class="comment-content-left">
                                                                <h6 class="comment-name">{{$item->CusName}}</h6>
                                                                @if ($item->Vote == 1)

                                                                    <ul class="review-star">
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                                    </ul>

                                                                @elseif ($item->Vote == 2)

                                                                    <ul class="review-star">
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                                    </ul>

                                                                @elseif ($item->Vote == 3)

                                                                    <ul class="review-star">
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                                    </ul>

                                                                @else

                                                                    <ul class="review-star">
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                                    </ul>

                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="para-content">
                                                            <p>{{$item->Content}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Start - Review Comment Reply-->

                                            </li>
                                            @endif
                                        @endforeach

                                    </ul>
                                    <div class="review-form">
                                        <div class="review-form-text-top">
                                            <h4 style="font-weight:700">Thêm đánh giá </h4>
                                            <p style="color:red; margin-right:700px;margin-top:13px">*Bạn phải nhập số điện thoại và email*</p>
                                        </div>
                                        <form  >

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="default-form-box">
                                                        <label >Số điện thoại <span>*</span></label>
                                                        <input id="txtPhoneNumber" type="text" name="PhoneNumber" placeholder="Hãy nhập số điện thoại của bạn!" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="default-form-box">
                                                        <label >Email <span>*</span></label>
                                                        <input id="txtEmail" type="email" name="Email" placeholder="Hãy nhập Email của bạn!" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="default-form-box">
                                                        <label for="comment-choose">Lượt bình chọn: <span>*</span></label>
                                                        <select class="country_option nice-select wide" name="Vote" id="Vote">
                                                            <option value="0">Chọn</option>
                                                            <option value="1">Trung bình</option>
                                                            <option value="2">Khá</option>
                                                            <option value="3">Tốt</option>
                                                            <option value="4">Xuất sắc</option>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="default-form-box">
                                                        <label for="comment-review-text">Nội dung <span>*</span></label>
                                                        <textarea id="txtContent" placeholder="Nội dung" name="Content" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="btn btn-md btn-black-default-hover" onclick="Send()"  >Gửi</div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                        </div>
                    </div> <!-- End Product Details Tab Content -->

                </div>
            </div>
        </div>
    </div>
</div> <!-- End Product Content Tab Section -->

<!-- Start Product Default Slider Section -->
<div class="product-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper" data-aos="fade-up"  data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3 class="section-title">SẢN PHẨM LIÊN QUAN</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper" data-aos="fade-up"  data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-1row default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-default-slider-4grid-1row">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                @foreach ($list as $item)
                                <div class="product-default-single-item product-color--golden swiper-slide">
                                    <div class="image-box">
                                        <a href="" class="image-link">
                                            <img src="/storage/uploads/Specificproduct/{{$item->Image}}" alt="">
                                        </a>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="{{route('add_to_cart',$item->SpId)}}">Thêm giỏ hàng</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="icon-magnifier"></i></a>
                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="">{{$item->Product->ProName}}</a></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price">{{number_format($specificProduct->Price,0,',','.')}}đ</span>
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
