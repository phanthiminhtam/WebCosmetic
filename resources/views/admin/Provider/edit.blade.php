
@extends('admin.Layout.app');
@section('content')
<div class="row">
    <div class="col-md-6" style="margin:auto; width: 60%">
        <div class="card-box">
            <h3 class="header-title mb-6" style="text-align:center">SỬA NHÀ CUNG CẤP</h3>

            <form class="form-horizontal" role="form" method="post" action="{{route('home2.Provider.save',$pr->PrvId)}}">
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
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label">Tên nhà cung cấp</label>
                    <div class="col-sm-9">
                        <input required  class="form-control" id="PrvName" name="PrvName" value="{{$pr->PrvName}}" placeholder="Tên nhà cung cấp...">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label">Địa chỉ</label>
                    <div class="col-sm-9">
                        <input required  class="form-control" id="Address" name="Address" value="{{$pr->Address}}" placeholder="Xã-Huyện-Tỉnh..">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label">Số điện thoại</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="PhoneNumber" name="PhoneNumber" value="{{$pr->PhoneNumber}}" placeholder="VD :0946676367">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input required  type="email" id="example-email" class="form-control" name="Email" value="{{$pr->Email}}" placeholder="abc@gmail.com...">
                    </div>
                </div>
                <div class="form-group mb-0 justify-content-end row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Lưu</button>
                        <button type="" class="btn btn-info waves-effect waves-light">
                            <a href="{{route('home2.Provider.index')}}" style="text-decoration-line: none; color:white">Hủy</a>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

