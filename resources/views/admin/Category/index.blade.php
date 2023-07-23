@extends('admin.Layout.app');
@section('content')

@php
    $index=1;
@endphp
<h2 style="margin-top:5px;margin-left:260px">QUẢN LÝ LOẠI MỸ PHẨM</h2>

    <a href="{{route('home2.Category.create')}}"><p  class="btn btn-primary">Thêm mới</p></a>

<table class="table table-striped dt-responsive nowrap table-bordered text-center font-17" id="datatable-buttons">
    <thead class="thead-dark ">
        <tr>
            <th class="text-white font-18">
                STT
            </th>
            <th class="text-white font-18">
                Tên loại
            </th>
            <th class="text-white font-18">
                Mô tả
            </th>
            <th class="text-white font-18">
                Sửa/ Xoá
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cats as $item)
            <tr>
                <td>{{$index++}}</td>
                <td>
                    {{$item->CatName}}
                </td>
                <td>
                    {!!$item->Description!!}

                </td>
                <td>
                   <a href="{{route('home2.Category.edit',$item->CatId)}}"><i class="remixicon-edit-box-fill"></i></a>  ||
                    <a onclick="return confirm('Bạn có muốn xoá loại này không?')" href="{{route('home2.Category.del',$item->CatId)}}"> <i class="remixicon-delete-bin-line"></i></a>

                    {{-- sua @Html.ActionLink(" ", "Edit", new { id = item.CatId }, new { @class = "remixicon-edit-box-fill", @style = "font-size:25px" }) --}}
                </td>
                <td></td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection
