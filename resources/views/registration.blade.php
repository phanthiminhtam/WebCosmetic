@extends('user.Layout.app_2');
@section('content')
<div class="customer-login">
    <div class="container">
        <div class="row">
            <!--login area start-->

            <!--register area start-->
            <div class="col-lg-6 col-md-6"  style="margin:auto">
                <div class="account_form register"  data-aos="fade-up"  data-aos-delay="200">
                    <h3>Đăng ký</h3>
                    <form action="{{route('client.register')}}" method="post">
                        @csrf
                        @if ($errors->has('PhoneNumber'))
                        <div class="alert alert-danger">
                            {{ $errors->first('PhoneNumber') }}
                        </div>
                    @endif

                    @if ($errors->has('Email'))
                        <div class="alert alert-danger">
                            {{ $errors->first('Email') }}
                        </div>
                @endif
                        <div class="default-form-box">
                            <label>Email <span>*</span></label>
                            <input type="email" required name="Email" >
                        </div>
                        <div class="default-form-box">
                            <label>Tên khách hàng <span>*</span></label>
                            <input type="text" required name="CusName">
                        </div>
                        <div class="default-form-box">
                            <label>Số điện thoại <span>*</span></label>
                            <input type="text" name="PhoneNumber">
                        </div>
                        <div class="default-form-box">
                            <label>Địa chỉ <span>*</span></label>
                            <input type="text" name="Address">
                        </div>
                        <div class="default-form-box">
                            <label>Mật khẩu <span>*</span></label>
                            <input type="password" name="PassWord">
                        </div>
                        <div class="login_submit">
                            <button class="btn btn-md btn-black-default-hover" value="Save" type="submit">Đăng ký</button>

                        </div>
                    </form>
                </div>
            </div>
            <!--register area end-->
        </div>
    </div>
</div>
@endsection
