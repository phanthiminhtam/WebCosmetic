
@extends('admin.Layout.app');
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.21.0/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('Content');
    </script>
@endsection
@section('content')
<div class="row">
    <div class="col-md-8" style="margin:auto">
        <div class="card-box">
            <h3 class="header-title mb-3" style="text-align:center">THÊM LOẠI MỸ PHẨM</h3>

            <form class="form-horizontal" role="form" method="post" action="{{route('home2.Category.save2')}}">
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label" style="font-size: 16px">Tên loại</label>
                    <div class="col-sm-9">
                        <input required  class="form-control" id="CatName" name="CatName" value="" placeholder="Tên loại...">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="example-textarea" style="font-size: 16px">Mô tả</label>
                    <div class="col-md-12">
                        <textarea class="form-control" id="Content" name="Content" rows="5" placeholder="Mô tả...."  ></textarea>
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

