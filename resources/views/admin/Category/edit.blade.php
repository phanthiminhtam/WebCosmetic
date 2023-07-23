@extends('admin.Layout.app');
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.21.0/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('Description');
    </script>
@endsection
@section('content')

<div class="row">
    <div class="col-md-6" style="margin:auto">
        <div class="card-box">
            <h3 class="header-title mb-3" style="text-align:center">SỬA LOẠI MỸ PHẨM</h3>

            <form class="form-horizontal" role="form" method="post" action="{{route('home2.Category.save', $sp->CatId)}}">
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label">Tên loại</label>
                    <div class="col-sm-9">
                        <input required  class="form-control" id="CatName" name="CatName" value="{{$sp->CatName}}" placeholder="Tên loại...">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="example-textarea">Mô tả</label>
                    <div class="col-md-12">
                        <textarea class="form-control" id="Description" rows="6" name="Description"  placeholder="Mô tả...." required style="width: 500px">
                            {{$sp->Description}}
                        </textarea>
                    </div>
                </div>
                <div class="form-group mb-0 justify-content-end row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Lưu</button>
                        <button type="" class="btn btn-info waves-effect waves-light">
                            <a href="{{route('home2.Category.index')}}" style="text-decoration-line: none; color:white">Hủy</a>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
