
@extends('admin.Layout.app');
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.21.0/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('Content');
        let content = $("#ContentValue").text()
        CKEDITOR.instances['Content'].setData(content);
    </script>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title" style="text-align:center">SỬA BÀI VIẾT</h4>
            <div class="row">
                <div class="col-12">
                    <div class="p-2">
                        <form class="form-horizontal" role="form" method="post" action="{{route('home2.News.save', $sp->NewId)}}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="simpleinput">Tiêu đề</label>
                                <div class="col-sm-10">
                                    <input type="text" id="simpleinput" name="Title" class="form-control" value="{{$sp->Title}}" placeholder="Tiêu đề..." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="example-date">Thời gian đăng</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" name="PublicDate" value="{{$sp->PublicDate}}" id="example-date" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="example-fileinput">Hình ảnh</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="Image" value="{{$sp->Image}}" id="example-fileinput" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Người đăng</label>
                                <div class="col-sm-10">
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="example-textarea">Nội dung</label>
                                <div class="col-sm-10">
                                    <div id="ContentValue" class="d-none">{{$sp->Content}}</div>
                                    <textarea class="form-control" id="Content" name="Content" rows="5" placeholder="Mô tả...">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group mb-0 justify-content-end row">
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Lưu</button>
                                    <button type="" class="btn btn-info waves-effect waves-light">
                                        <a href="{{route('home2.News.index')}}" style="text-decoration-line: none; color:black">Hủy</a>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

@endsection




