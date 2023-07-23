@extends('user.Layout.app_2');
@section('scripts')
<script>
    function Send(){

        var data = new FormData();
        data.append('ContactName',document.getElementById('txtName').value)
        data.append('Email',document.getElementById('txtEmail').value)
        data.append('PhoneNumber',document.getElementById('txtMobile').value)
        data.append('Content', document.getElementById('txtContent').value)

        console.log(data)
        $.ajax({
            url: "/api/Contact/store",
            type: 'POST',
            data: data,
            async: true,
            contentType: false, //Không có header
            processData: false, //không xử lý dữ liệu,
            success: function (res) {
                console.log((res));
                if (res.message == true) {
                            alert('Gửi liên hệ thành công!');
                            //review.resetForm();
                            $('#txtName').val('');
                            $('#txtEmail').val('');
                            $('#txtMobile').val('');
                            $('#txtContent').val('');
                };

            }
        });
    }

 </script>
@endsection
@section('content')
<div class="map-section" data-aos="fade-up"  data-aos-delay="0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=121%20King%20St%2C%20Melbourne%20VIC%203000%2C%20Australia&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...::::End  Map Section:::... -->

<!-- ...::::Start Contact Section:::... -->
<div class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <!-- Start Contact Details -->
                <div class="contact-details-wrapper section-top-gap-100" data-aos="fade-up" data-aos-delay="0">
                    <div class="contact-details">
                        <!-- Start Contact Details Single Item -->
                        <div class="contact-details-single-item">
                            <div class="contact-details-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="contact-details-content contact-phone">
                                <a href="tel:+012345678102">+012 345 678 102</a>
                                <a href="tel:+012345678102">+012 345 678 102</a>
                            </div>
                        </div> <!-- End Contact Details Single Item -->
                        <!-- Start Contact Details Single Item -->
                        <div class="contact-details-single-item">
                            <div class="contact-details-icon">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="contact-details-content contact-phone">
                                <a href="mailto:urname@email.com">urname@email.com</a>
                                <a href="http://www.yourwebsite.com/">www.yourwebsite.com</a>
                            </div>
                        </div> <!-- End Contact Details Single Item -->
                        <!-- Start Contact Details Single Item -->
                        <div class="contact-details-single-item">
                            <div class="contact-details-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="contact-details-content contact-phone">
                                <span>Address goes here,</span>
                                <span>street, Crossroad 123.</span>
                            </div>
                        </div> <!-- End Contact Details Single Item -->
                    </div>
                    <!-- Start Contact Social Link -->
                    <div class="contact-social">
                        <h4>Follow Us</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div> <!-- End Contact Social Link -->
                </div> <!-- End Contact Details -->
            </div>
            <div class="col-lg-8">
                <div class="contact-form section-top-gap-100" data-aos="fade-up" data-aos-delay="200">
                    <h3>Gửi thông tin liên hệ</h3>
                    <form  id="contact">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="default-form-box mb-20">
                                    <label for="contact-name">Họ tên</label>
                                    <input name="ContactName" type="text" id="txtName">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="default-form-box mb-20">
                                    <label for="contact-email">Email</label>
                                    <input name="Email" type="email" id="txtEmail">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="default-form-box mb-20">
                                    <label for="contact-subject">Số điện thoại</label>
                                    <input name="PhoneNumber" type="text" id="txtMobile">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="default-form-box mb-20">
                                    <label for="contact-message">Nội dung</label>
                                    <textarea name="Content" id="txtContent" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <a class="btn btn-lg btn-black-default-hover" onclick="Send()" id="btnSend" >Gửi</a>
                            </div>
                            <p class="form-messege"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
