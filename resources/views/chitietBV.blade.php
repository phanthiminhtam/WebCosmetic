@extends('user.Layout.app_2');
@section('content')

<div class="blog-section" style="width:100%">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
        <div class="col-lg-10" style="text-align: center">
            <div class="blog-wrapper">
                <div class="row " style="margin-left:100px; width:1000px !important" >
                    <div class="blog-single-wrapper" >
                        <div class="blog-single-img aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                            <iframe width="970" height="480" src="https://www.youtube.com/embed/cdPD8BAXfT8" title="Mặt Nạ Innisfree My Real Squeeze Mask Review" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        </div>
                        <ul class="post-meta aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <li>Người đăng : <a href="#" class="author">Minh Tâm</a></li>
                            <li>Thời gian : <a href="#" class="date">{{date('d/m/Y', strtotime($new->PublicDate))}}</a></li>
                        </ul>
                        <h4 class="post-title aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">{{$new->Title}}</h4>
                        <div class="para-content aos-init aos-animate" data-aos="fade-up" data-aos-delay="600" style="text-align:justify">
                            <p>
                                Bỏ qua những dòng mặt nạ đình đám, giá cao ngất ngưởng, hôm nay Beauty Garden sẽ review với các nàng một dòng nạ đang được rất nhiều cô gái yêu thích hiện nay – Đó chính là mặt nạ Innisfree It's Real Squeeze Mask. Mặt nạ miếng dạng giấy với vô số sự chọn lựa khác nhau từ chanh, dâu tây, lô hội, hoa hồng, trà xanh,… đều được trồng và chăm sóc trên hòn đảo Jeju xinh đẹp với quy trình đảm bảo an toàn và thân thiện với mọi loại da.
                                Bao bì của Innisfree ở tất cả các sản phẩm đều thật biết chiều lòng phái đẹp. Mọi thiết kế đều vô cùng xinh xắn, minh họa siêu dễ thương, mang cảm giác thiên nhiên tươi mới cho bất kỳ ai sử dụng.
                            </p>
                            <div class="blog-single-img aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                                <img class="img-fluid" src="/Assets/Front/Users/assets/images/blog/{{$new->Image}}" alt="">
                            </div>
                            <blockquote class="blockquote-content">

                                Sử dụng sản phẩm theo đúng quy trình: tẩy trang – rửa mặt – toner – mask. Không quá khó khăn, chỉ cần lấy ra và ướm lên mặt, tránh vùng mắt và môi. Cuối cùng tháo em ấy xuống sau khoảng 20 phút thư giãn. Cảm nhận đầu tiên là trên mặt còn lưu lại dưỡng chất dính dính, nhờn rít. Vì vậy, cần phải massage thêm và rửa sạch nếu không sẽ dễ bí da.
                            </blockquote>
                            <p>
                                Cảm nhận tiếp theo là da mướt, láng bóng luôn ý. Nói chúng là sáng, tươi mới hơn hẳn. Nếu những ngày mệt mỏi, căng thẳng và mất ngủ có bọng mắt và quầng thâm thì em ấy giúp cải thiện rõ rệt luôn.
                                Một miếng mặt nạ Innisfree chứa thật nhiều điều diệu kỳ phải không nào? Đừng quá suy nghĩ bởi so với giá như vậy cùng những thành phần tuyệt vời như thế thì cũng rất đáng để thử rồi.  Đã giúp bạn chọn được cho mình một mặt nạ giấy Innisfree ưng ý! Đừng quên để lại review của  về mặt nạ giấy Innisfree sau khi sử dụng dưới bài viết này nhé!
                            </p>
                            <p>
                                Sau đây, Beauty Garden sẽ liệt kê một số loại chiết xuất từ thành phần thiên nhiên, các nàng tha hồ chọn lựa để làm đẹp da mình: <br />
                                - Strawberry – dâu tây: giúp làm mềm và mướt da. <br />

                                - Bamboo – tre: làm dịu cơn khát của da bằng cách cấp nước nhanh chóng vào da, dưỡng ẩm cho da tăng 113%, mang đến cho bạn một làn da mịn màng, tươi sáng.<br />

                                - Green Tea – trà xanh: có tác dụng phục hồi độ đàn hồi và sự tươi trẻ cho da, chống oxy hóa, bảo vệ da khỏi những tác nhân gây hại từ môi trường bên ngoài.
                                <br />
                                - Pomegranate – lựu: chứa nhiều dưỡng chất giúp da mềm mại, mượt mà, săn chắc và tăng độ đàn hồi. Ngoài ra, mặt nạ còn chứa chứa chắc năng chống lão hóa hiệu quả.
                                <br />
                                - Bija – nhục đầu khấu: giúp chăm sóc làn da bị mụn đồng thời làm dịu, những sưng tấy do mụn gây ra.
                                <br />
                                - Lime – chanh: có khả năng làm trắng và cung cấp độ ẩm một cách hiệu quả, kiểm soát dầu thừa, ngăn ngừa hiện tượng bóng dầu, dễ gây nổi mụn trên da.
                            </p>
                        </div>

                    </div>
                </div>
            </div>


            {{-- <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                <ul>
                    <li><a class="active" href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                </ul>
            </div> --}}
        </div>
        </div>
    </div>
</div>
@endsection
