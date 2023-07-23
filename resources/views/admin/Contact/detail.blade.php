@extends('admin.Layout.app');
@section('content')
<div class="row">
    <!-- Right Sidebar -->
    <div class="col-12">
        <div class="card-box">
            <!-- Left sidebar -->
            <div class="inbox-leftbar">

                <a href="email-compose.html" class="btn btn-danger btn-block waves-effect waves-light" style="font-size:20px">Phản hồi</a>

                <div class="mail-list mt-4" style="font-size:17px">
                    <a href="{{route('home2.Contact.index')}}" class="list-group-item border-0 text-danger font-weight-bold">
                        <i class="mdi mdi-inbox font-18 align-middle mr-2"></i>Hộp thư đến

                        <span class="badge badge-danger float-right ml-2 mt-1">
                            {{-- @Model.Count --}} {{Count($contact2)}}
                        </span>
                    </a>
                    <a href="#" class="list-group-item border-0"><i class="mdi mdi-star font-18 align-middle mr-2"></i>Có gắn dấu sao</a>
                    <a href="#" class="list-group-item border-0"><i class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Thư nháp</a>
                    <a href="#" class="list-group-item border-0"><i class="mdi mdi-send font-18 align-middle mr-2"></i>Đã gửi</a>
                    <a href="#" class="list-group-item border-0"><i class="mdi mdi-delete font-18 align-middle mr-2"></i>Thùng rác</a>
                </div>
            </div>
            <!-- End Left sidebar -->

            <div class="inbox-rightbar">


                <div class="mt-4">

                    <hr>

                    <div class="media mb-4 mt-1">
                        <img class="d-flex mr-2 rounded-circle avatar-sm" src="\Assets\Front\Admins\assets\images\email\images.png" style="width:80px; height:80px !important" alt="Generic placeholder image">
                        <div class="media-body">
                            <span class="float-right font-18">{{date('d/m/Y', strtotime($contact->CreateDate))}}</span>
                            <h3 class="m-0 font-20">{{$contact->ContactName}}</h3>
                            <small class="text-muted font-20">Từ: <span style="font-weight: 500;color: #343a40">{{$contact->Email}}</span>  </small><br>
                            <small class="text-muted font-20">Số điện thoại: <span style="font-weight: 500;color: #343a40">{{$contact->PhoneNumber}}</span></small>
                        </div>
                    </div>

                    {{-- <p><b>Hi Bro...</b></p> --}}
                    <p class="font-20">{{$contact->Content}} </p>

                    <hr>
                </div>
                <!-- end .mt-4 -->

                <div class="row">
                     <!-- end col-->
                    <div class="col-12">
                        <div class="btn-group float-right">
                            <button type="button" class="btn btn-light btn-sm"><i class="mdi mdi-chevron-left"></i></button>
                            <button type="button" class="btn btn-info btn-sm"><i class="mdi mdi-chevron-right"></i></button>
                        </div>
                    </div> <!-- end col-->
                </div>
                <!-- end row-->
            </div>
            <!-- end inbox-rightbar-->

            <div class="clearfix"></div>
        </div> <!-- end card-box -->

    </div> <!-- end Col -->
</div>
@endsection
