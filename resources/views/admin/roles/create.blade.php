@extends('admin.Layout.app')

@section('content')
<div class="row">
    <div class="col-md-8" style="margin:auto">
        <div class="card-box">
            <h3 class="header-title mb-3" style="text-align:center">THÊM MỚI CHỨC VỤ</h3>

    <form   class="form-horizontal" role="form" action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="title" class="col-sm-3 col-form-label" style="font-size: 16px">Tên chức vụ</label>
            <div class="col-sm-9">
                <input required  class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Chức vụ...">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="example-textarea" style="font-size: 16px">Quyền</label>
            <div class="col-md-12">
                <select  style="height: 150px" class="form-control" id="permissions" name="permissions[]" multiple required>
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="form-group mb-0 justify-content-end row" style="margin-left:400px">
            <div class="col-sm-9">
                <button type="submit" class="btn btn-info waves-effect waves-light">Lưu</button>
                <button type="" class="btn btn-info waves-effect waves-light">
                    <a href="{{route('roles.index')}}" style="text-decoration-line: none; color:white">Hủy</a>
                </button>
            </div>
        </div>

    </form>
        </div>
    </div>
</div>
@endsection
