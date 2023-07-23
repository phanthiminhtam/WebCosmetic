@extends('admin.Layout.app');
@section('content')

@php
    $index=1;
    // use Carbon\Carbon;
    // $item->PublicDate
@endphp
<h2 style="margin-top:5px;margin-left:260px">QUẢN LÝ BÀI VIẾT</h2>

    <a href="{{route('home2.News.create')}}"><p  class="btn btn-primary">Thêm mới</p></a>

<table class="table table-striped dt-responsive nowrap table-bordered text-center font-17" id="datatable-buttons">
    <thead class="thead-dark ">
        <tr>
            <th class="text-white font-18">
                STT
            </th>
            <th class="text-white font-18">
                Hình ảnh
            </th>
            <th class="text-white font-18">
                Tiêu đề
            </th>
            <th class="text-white font-18">
                Nội dung
            </th>
            {{-- <th class="text-white font-18">
                Người đăng
            </th> --}}
            <th class="text-white font-18">
                Thời gian đăng
            </th>
            <th class="text-white font-18">
                Sửa/ Xoá
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($news as $item)
            <tr>
                <td>{{$index++}}</td>
                <td>
                    <img src='/Assets/Front/Users/assets/images/blog/{{$item->Image}}' style='width:100px'>
                </td>
                <td style="width:200px">
                    {{$item->Title}}
                </td>
                <td>
                    <p style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis; width:200px">{!!$item->Content !!}</p>
                </td>
                {{-- <td>
                    {{$item->UserId}}
                </td> --}}
                <td>
                    {{date('d/m/Y', strtotime($item->PublicDate))}}

                </td>


                <td>
                   <a href="{{route('home2.News.edit',$item->NewId)}}"><i class="remixicon-edit-box-fill"></i></a>  ||
                    <a onclick="return confirm('Bạn có muốn xoá bài viết này không?')" href="{{route('home2.News.del',$item->NewId)}}"> <i class="remixicon-delete-bin-line"></i></a>
                </td>
                <td></td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection
