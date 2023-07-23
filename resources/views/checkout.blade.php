@extends('user.Layout.app_2');
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

<script>
    var csrfToken = "{{ csrf_token() }}";
  </script>
  <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
   <script>

        /*render city district*/
var citis = document.getElementById("city");
var districts = document.getElementById("district");
var wards = document.getElementById("ward");
var Parameter = {
    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
    method: "GET",
    responseType: "application/json",
};
var promise = axios(Parameter);
promise.then(function (result) {
    listLocation = result.data
    renderCity(result.data);
});

function renderCity(data) {
    for (const x of data) {
        citis.options[citis.options.length] = new Option(x.Name, x.Id);
    }
    citis.onchange = function () {
        district.length = 1;
        ward.length = 1;
        if (this.value != "") {
            const result = data.filter(n => n.Id === this.value);

            for (const k of result[0].Districts) {
                district.options[district.options.length] = new Option(k.Name, k.Id);
            }
        }
    };
    district.onchange = function () {
        ward.length = 1;
        const dataCity = data.filter((n) => n.Id === citis.value);
        if (this.value != "") {
            const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

            for (const w of dataWards) {
                wards.options[wards.options.length] = new Option(w.Name, w.Id);
            }
        }
    };
}

    function submit(){
        const CusId = $("#CusId").val();
         const PhoneNumber = $("#Phone").val().trim();
         const CusName = $("#CusName").val().trim();
         const Email = $("#Email").val().trim();
         const Note = $("#order_note").val().trim();
         const ReceivingAddress = `${$("#ward option:selected").text()}, ${$("#district option:selected").text()}, ${$("#city option:selected").text()}` ;

        var formData = new FormData();
        formData.append('_token', csrfToken); // Thêm CSRF token vào formData
        formData.append('CusId',CusId)
        formData.append('PhoneNumber',PhoneNumber)
        formData.append('Email',Email)
        formData.append('CusName',CusName)
        formData.append('Note',Note)
        formData.append('ReceivingAddress',ReceivingAddress)
        $.ajax({
            url: "/checkout/save",
            type: 'POST',
            contentType: false, //Không có header
            processData: false, //không xử lý dữ liệu
            data: formData,
            success: function (res) {
                location.href = '/successfull/' + res.id
            }
        })
    }

    function sendOtp() {
    const firebaseConfig = {
        apiKey: "AIzaSyBxGlZJayQxdaKL34lTmk0lHBkEIfcGVQM",
    authDomain: "doan4-80a2f.firebaseapp.com",
    projectId: "doan4-80a2f",
    storageBucket: "doan4-80a2f.appspot.com",
    messagingSenderId: "942484298627",
    appId: "1:942484298627:web:be84a6fbc00fdd4997b4b6",
    measurementId: "G-RTL81E270H"
        };
    firebase.initializeApp(firebaseConfig);
    var a = document.getElementById('Phone').value;
    var b = "+84";
    var number = b + a.slice(-9);

    const appVerifier = new firebase.auth.RecaptchaVerifier('Confirm', { size: 'invisible' });
    firebase.auth().signInWithPhoneNumber(number, appVerifier).then(function (confirmationResult) {
        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
        appVerifier.reset();
    }).catch(function (error) {
        alert(error.message);
        appVerifier.reset();
    });
}

function Resend() {
    grecaptcha.reset();
    event.preventDefault()
    $(".btn-confirm").removeClass("disabled")
    const firebaseConfig = {
        apiKey: "AIzaSyBxGlZJayQxdaKL34lTmk0lHBkEIfcGVQM",
        authDomain: "doan4-80a2f.firebaseapp.com",
        projectId: "doan4-80a2f",
        storageBucket: "doan4-80a2f.appspot.com",
        messagingSenderId: "942484298627",
        appId: "1:942484298627:web:be84a6fbc00fdd4997b4b6",
        measurementId: "G-RTL81E270H"
    };
    if (!firebase.apps.length) {
        firebase.initializeApp(firebaseConfig);
    } else {
        firebase.app(); // if already initialized, use that one
    }

    var a = document.getElementById('Phone').value;
    var b = "+84";
    var number = b + a.slice(-9);
    if (!window.recaptchaVerifier) {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('Confirm', {
            'size': 'invisible',
            'callback': (response) => {
                console.log(response)
            },
            'expired-callback': () => {
            }
        });
    }
    firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
    }).catch(function (error) {
        alert(error.message);
    });
}

function codeverity() {
    var code = document.getElementById('partitioned').value;
    coderesult.confirm(code).then(function () {
        submit()
    }).catch(function (error) {
        // alert("Mã OTP không đúng!");
        alertError("Mã OTP không hợp lệ")
    })
}
    </script>

@endsection
@section('styles')
    <style>
        .nice-select.form-select{
            display: none !important;
        }
    </style>
@endsection
@section('content')
<div class="checkout-section">
    <div class="container">
        <div class="row">
            <!-- User Quick Action Form -->
            <div class="col-12">
                <div class="user-actions accordion" data-aos="fade-up"  data-aos-delay="0">
                    <h3>
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                        Bạn đã từng mua hàng?
                        <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_login" aria-expanded="true">Nhấn vào đây để đăng nhập</a>
                    </h3>

                </div>

            </div>
            <!-- User Quick Action Form -->
        </div>
        <!-- Start User Details Checkout Form -->
        <div class="checkout_form" data-aos="fade-up"  data-aos-delay="400">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form action="{{route('home.checkout.save')}}"  method="post">
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
                        <h3>Địa chỉ nhận hàng</h3>
                            @if ($customer!=null)
                            <input type="text" class="d-none" id="CusId" name="CusId" value="{{$customer->CusId}}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Họ và tên <span>*</span></label>
                                        <input type="text" id="CusName" name="CusName" value="{{$customer->CusName}}" required placeholder="VD: Phan Thị Minh Tâm">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Số điện thoại <span>*</span></label>
                                        <input type="text" id="Phone" name="PhoneNumber" value="{{$customer->PhoneNumber}}" required placeholder="VD: 0977423244">

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Email</label>
                                        <input type="email" id="Email" name="Email" required value="{{$customer->Email}}" placeholder="VD: tam@gmail.com">
                                        <div class="invalid-feedback" id="val-txtName"  style="display:none; margin-left: 135px;">Vui lòng nhập đúng thông tin!</div>
                                    </div>
                                </div>
                            @else
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Họ và tên <span>*</span></label>
                                        <input type="text" id="CusName" name="CusName" required placeholder="VD: Phan Thị Minh Tâm">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Số điện thoại <span>*</span></label>
                                        <input type="text" id="Phone" name="PhoneNumber" required placeholder="VD: 0977423244">

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Email</label>
                                        <input type="email" name="Email" id="Phone" required placeholder="VD: tam@gmail.com">
                                        <div class="invalid-feedback" id="val-txtName" style="display:none; margin-left: 135px;">Vui lòng nhập đúng thông tin!</div>
                                    </div>
                                </div>
                            @endif
                            {{-- <div class="col-12">
                                <div class="default-form-box">
                                    <label for="country">Thành phố <span>*</span></label>
                                    <select class="country_option nice-select wide" name="country" id="country">
                                        <option value="2">Bangladesh</option>
                                        <option value="3">Algeria</option>
                                        <option value="4">Afghanistan</option>
                                        <option value="5">Ghana</option>
                                        <option value="6">Albania</option>
                                        <option value="7">Bahrain</option>
                                        <option value="8">Colombia</option>
                                        <option value="9">Dominican Republic</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-12">
                                <div class="default-form-box">
                                    <label> Tỉnh / Thành phố <span>*</span></label>
                                    <select style="height: 40px" class="form-select d-block form-select-sm mt-4 mb-0 " id="city" name="city" aria-label="form-select-sm">
                                        <option value="" selected>Tỉnh / Thành phố</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="default-form-box">
                                    <label> Quận / Huyện <span>*</span></label>
                                    <select style="height: 40px" class="form-select d-block form-select-sm mt-4 mb-0" id="district" name="district" aria-label="form-select-sm">
                                        <option value="" selected>Quận / Huyện</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="default-form-box">
                                    <label> Phường / Xã <span>*</span></label>
                                    <select style="height: 40px" class="form-select d-block form-select-sm mt-4 mb-0" id="ward" name="ward" aria-label="form-select-sm">
                                        <option value="" selected>Phường / Xã</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-12 mt-3">
                                <div class="default-form-box" >

                                    <label for="order_note">Ghi chú</label>
                                    <textarea style="height: 100px" id="order_note" placeholder="Nhận sáng, chiều...." name="Note"></textarea>
                                </div>
                            </div>
                            <div class="payment_method" style="margin-top:25px">
                                <div class="panel-default">
                                    <label class="checkbox-default" for="currencyCod" data-bs-toggle="collapse" data-bs-target="#methodCod">
                                        <input type="checkbox" id="currencyCod" value="1" name="Payment">
                                        <span>Trả tiền khi nhận hàng</span>
                                    </label>

                                    <div id="methodCod" class="collapse" data-parent="#methodCod">
                                        <div class="card-body1">
                                            <p>Làm phiền bạn đưa tiền cho shipper khi nhận hàng!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-default" style="margin-top:15px">
                                    <label class="checkbox-default" for="currencyPaypal" data-bs-toggle="collapse" data-bs-target="#methodPaypal">
                                        <input type="checkbox" id="currencyPaypal" value="2" name="Payment">
                                        <span>Chuyển khoản</span>
                                    </label>
                                    <div id="methodPaypal" class="collapse " data-parent="#methodPaypal">
                                        <div class="card-body1">
                                            <p>Thanh toán qua PayPal; bạn có thể thanh toán bằng thẻ tín dụng của mình nếu bạn không có tài khoản PayPal.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order_button pt-3">
                            {{-- <div onclick="sendOtp()"data-toggle="modal" data-target="#exampleModal" class="btn btn-md btn-black-default-hover" id="order">Đặt hàng</div> --}}
                            <button class="btn btn-md btn-black-default-hover"  onclick="sendOtp()"  type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Đặt Hàng</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6">
                    <form action="#">
                        <h3>Sản phẩm</h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Mỹ phẩm</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)

                                            <tr data-id="{{$id}}">
                                                <td>{{$details['ProName']}} x <strong>  {{$details['quantity']}}</strong></td>
                                                <td>{{number_format($details['quantity'] * $details['Price'],0,',','.')}}đ</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                                <tfoot>
                                @php
                                    $total =0;
                                @endphp
                                @foreach (session('cart') as $id => $details)
                                    @php
                                        $total+= $details['Price']*$details['quantity']
                                    @endphp
                                @endforeach
                                    <tr>
                                        <th>Tạm tính</th>
                                        <td>{{number_format($total,0,',','.')}}đ</td>
                                    </tr>
                                    <tr>
                                        <th>Phí ship(toàn quốc)</th>
                                        <td><strong>30.000đ</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Tổng tiền</th>
                                        <td><strong>{{number_format($total+30000,0,',','.')}}đ</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </form>
                </div>
            </div>
        </div> <!-- Start User Details Checkout Form -->
    </div>
</div><!-- ...:::: End Checkout Section:::... -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">NHẬP MÃ OTP</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="d-none" id="Confirm"></div>
            <input id="partitioned" class="border border-secondary p-2" placeholder="Nhập mã OTP" type="text" maxlength="6" fdprocessedid="k7759">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="button" onclick="codeverity()" class="btn btn-primary">Gửi</button>
        </div>
      </div>
    </div>
  </div> --}}

  <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered" style="max-width:430px !important;min-width:400px !important">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-size: 25px; color: brown">NHẬP MÃ XÁC NHẬN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-none" id="Confirm"></div>
                <input id="partitioned" class="border border-secondary p-2" placeholder="Nhập mã OTP" type="text" maxlength="6" fdprocessedid="k7759">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" style="background-color: #5a6268; color:#fff !important" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" style="background-color: #1abc9c; color: #fff !important" onclick="codeverity()">Xác nhận</button>
            </div>
        </div>
    </div>
</div>

@endsection
