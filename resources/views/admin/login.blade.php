<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Minton - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="\Assets\Front\Admins\assets\images\favicon.ico">

        <!-- App css -->
        <link href="\Assets\Front\Admins\assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="\Assets\Front\Admins\assets\css\icons.min.css" rel="stylesheet" type="text/css">
        <link href="\Assets\Front\Admins\assets\css\app.min.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="\Assets\Front\Admins\assets\images\logo-dark.png" alt="" height="22"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Vui lòng nhập Tên đăng nhập và Mật khẩu</p>
                                </div>

                                <form method="POST" action="{{ route('login') }}" class="user">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{$error}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    @endif
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Tên đăng nhập </label>
                                        <input class="form-control"type="email" name="email" id="email" value="{{ old('email') }}" required autofocus placeholder="Hãy nhập địa chỉ Email... ">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Mật khẩu</label>
                                        <input class="form-control" type="password" name="password" id="password" placeholder="Hãy nhập password...">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="remember" id="remember">
                                            <label class="custom-control-label" for="checkbox-signin">Nhớ tài khoản</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Đăng nhập</button>
                                    </div>

                                </form>

                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">Đăng nhập với</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        {{-- <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="pages-recoverpw.html" class="text-muted ml-1">Forgot your password?</a></p>
                                <p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-primary font-weight-medium ml-1">Sign Up</a></p>
                            </div> <!-- end col -->
                        </div> --}}
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2016 - 2019 &copy; Minton theme by <a href="" class="text-muted">Coderthemes</a>
        </footer>

        <!-- Vendor js -->
        <script src="\Assets\Front\Admins\assets\js\vendor.min.js"></script>

        <!-- App js -->
        <script src="\Assets\Front\Admins\assets\js\app.min.js"></script>

    </body>
</html>
