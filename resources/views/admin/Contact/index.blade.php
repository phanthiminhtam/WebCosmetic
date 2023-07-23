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
                    <a href="#" class="list-group-item border-0 text-danger font-weight-bold"><i class="mdi mdi-inbox font-18 align-middle mr-2"></i>Hộp thư đến
                        <span class="badge badge-danger float-right ml-2 mt-1">
                            {{-- @Model.Count --}} {{Count($con)}}
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

                {{-- <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-horizontal font-18"></i> Khác
                        <i class="mdi mdi-chevron-down"></i>
                    </button>
                    <div class="dropdown-menu">
                        <span class="dropdown-header">Chọn :</span>
                        <a class="dropdown-item" href="javascript: void(0);">Thư chưa đọc</a>
                        <a class="dropdown-item" href="javascript: void(0);">Thư đã đọc</a>
                        <a class="dropdown-item" href="javascript: void(0);">Thêm dấu sao</a>
                    </div>
                </div> --}}

                <div class="mt-3">
                   <ul class="message-list">
                        @foreach ($con as $item)
                        <li class="unread">
                            <div class="col-mail col-mail-1" style="float:right !important; position:absolute">
                                <a style = "font-size:25px;color: #1abc9c !important" onclick="return confirm('Bạn có muốn xoá liên hê này không?')" href="{{route('home2.Category.del',$item->ContactId)}}">
                                    <i class="remixicon-delete-bin-line"></i></a>


                                <a href="{{route('home2.Contact.detail',$item->ContactId)}}" class="title" style="font-size:18px">{{$item->ContactName}}</a>
                            </div>
                            <div class="col-mail col-mail-2">

                                <div class="" style="margin-left: 340px; font-size:18px">{{date('d/m/Y', strtotime($item->CreateDate))}}</div>
                            </div>
                        </li>
                        @endforeach



                    </ul>
                </div>
                <!-- end .mt-4 -->

                <div class="row">

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
