@extends('user.Layout.app_2');
@section('content')
<div class="customer-login">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6"  style="margin:auto">
                <div class="account_form" data-aos="fade-up"  data-aos-delay="0">
                    <h3>Đăng nhập</h3>
                    <form action="{{route('client.login')}}" method="post">
                        @csrf
                        <div class="default-form-box">
                            <label> Email <span>*</span></label>
                            <input type="text" name="Email" required>
                        </div>
                        <div class="default-form-box">
                            <label>Mật khẩu <span>*</span></label>
                            <input type="text" name="PassWord" required>
                        </div>
                        <div class="login_submit">
                            <button class="btn btn-md btn-black-default-hover mb-4" type="submit">Đăng nhập</button>
                            <label class="checkbox-default mb-4" for="offer">
                                <input type="checkbox" id="offer">
                                <span>Nhớ tài khoản</span>
                            </label>
                            <a href="{{route('home.registration')}}">Đăng ký</a>

                        </div>
                    </form>
                </div>
            </div>
            <!--login area start-->

            <!--register area start-->

            <!--register area end-->
        </div>
    </div>
</div>
@endsection
