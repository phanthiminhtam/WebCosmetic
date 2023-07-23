@extends('user.Layout.app_2');
@php
    $index=1;
@endphp
@section('content')
<div class="account-dashboard">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-black-default-hover active">Tổng quan</a></li>
                        <li> <a href="#orders" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-black-default-hover">Đơn đặt hàng</a></li>
                        <!--<li><a href="#downloads" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-black-default-hover">Chi tiết đơn hàng</a></li>
                        <li><a href="#address" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-black-default-hover">Địa chỉ</a></li>-->
                        <!-- <li><a href="#account-details" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-black-default-hover">Chi tiết tài khoản</a></li> -->
                        <!--<li><a href="login.html" class="nav-link btn btn-block btn-md btn-black-default-hover">login</a></li>-->
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content" data-aos="fade-up"  data-aos-delay="200">
                    <div class="tab-pane fade show active" id="dashboard">

                        <div class="col-lg-8 col-md-6" style="margin-left:250px;margin-top:-50px !important">
                            <div class="account_form aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                                <h3 style="text-align:center">Thông tin cá nhân</h3>
                                <form action="#" method="POST">
                                    <div class="comment-img" style="margin-left: 230px">
                                        <img src="/Assets/Front/Admins/assets/images/email/unnamed.png" style="border-radius: 50%" alt="">
                                    </div>
                                    <div class="default-form-box" style="display:flex">
                                        <label class="col-md-6" style="font-size: 18px">Họ và tên: </label>
                                        <input style="font-size: 18px; margin-top: -13px; margin-left: -77px" value="{{$customer->CusName}}" />
                                    </div>
                                    <div class="default-form-box" style="display:flex">
                                        <label style="font-size: 18px">Email:  </label>
                                        <input style="font-size: 18px; margin-top: -13px; margin-left: 139px " value="{{$customer->Email}}" />
                                    </div>
                                    <div class="default-form-box" style="display:flex">
                                        <label style="font-size: 18px" class="col-md-6">Số điện thoại: </label>
                                        <input style="font-size: 18px; margin-top: -13px; margin-left: -76px"  value="{{ $customer->PhoneNumber }}" />
                                    </div>
                                    <div class="default-form-box" style="display:flex">
                                        <label class="col-md-3" style="font-size: 18px">Địa chỉ:  </label>
                                        <input style="font-size: 18px; margin-top: -13px; margin-left: 57px" value="{{$customer->Address}}" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="orders">
                        <h4>Đơn đã đặt gần đây</h4>
                        <div class="table_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Thời gian</th>
                                        <th>Số điện thoại</th>
                                        <th>Hình thức trả tiền</th>
                                        <th>Chi tiết đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                    <tr>
                                        <td>{{$index++}}</td>
                                        <td>{{$item->OrderDate}}</td>
                                        <td>{{$item->PhoneNumber}}</td>

                                            @if ($item->Payment==1)
                                                <td>Trả tiền mặt</td>
                                            @else
                                                <td>Chuyển khoản</td>
                                            @endif

                                        <td><a href="{{route('home.chitietdonhang',$item->OrdId)}}" class="view">view</a></td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="downloads">
                        <h4>Downloads</h4>
                        <div class="table_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Downloads</th>
                                        <th>Expires</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Shopnovilla - Free Real Estate PSD Template</td>
                                        <td>May 10, 2018</td>
                                        <td><span class="danger">Expired</span></td>
                                        <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                    </tr>
                                    <tr>
                                        <td>Organic - ecommerce html template</td>
                                        <td>Sep 11, 2018</td>
                                        <td>Never</td>
                                        <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="address">
                        <p>The following addresses will be used on the checkout page by default.</p>
                        <h5 class="billing-address">Billing address</h5>
                        <a href="#" class="view">Edit</a>
                        <p><strong>Bobby Jackson</strong></p>
                        <address>
                            House #15<br>
                                Road #1<br>
                                Block #C <br>
                                Banasree <br>
                                Dhaka <br>
                                1212
                        </address>
                        <p>Bangladesh</p>
                    </div>
                    <div class="tab-pane fade" id="account-details">
                        <h3>Account details </h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form action="#">
                                        <p>Already have an account? <a href="#">Log in instead!</a></p>
                                        <div class="input-radio">
                                            <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                                            <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                                        </div> <br>
                                        <div class="default-form-box mb-20">
                                            <label>First Name</label>
                                            <input type="text" name="first-name">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>Last Name</label>
                                            <input type="text" name="last-name">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>Email</label>
                                            <input type="text" name="email-name">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>Password</label>
                                            <input type="password" name="user-password">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>Birthdate</label>
                                            <input type="date" name="birthday">
                                        </div>
                                        <span class="example">
                                              (E.g.: 05/31/1970)
                                            </span>
                                        <br>
                                        <label class="checkbox-default" for="offer">
                                            <input type="checkbox" id="offer">
                                            <span>Receive offers from our partners</span>
                                        </label>
                                        <br>
                                        <label class="checkbox-default checkbox-default-more-text" for="newsletter">
                                            <input type="checkbox" id="newsletter">
                                            <span>Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em></span>
                                        </label>
                                        <div class="save_button mt-3">
                                            <button class="btn btn-md btn-black-default-hover" type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
