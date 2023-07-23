@extends('admin.Layout.app');
@section('content')

@php
    $index=1;
@endphp
<h2 style="margin-top:5px;margin-left:260px">QUẢN LÝ NHÀ CUNG CẤP</h2>

    <a href="{{route('home2.Provider.create')}}"><p  class="btn btn-primary">Thêm mới</p></a>

<table class="table table-striped dt-responsive nowrap table-bordered text-center font-17" id="datatable-buttons">
    <thead class="thead-dark ">
        <tr>
            <th class="text-white font-18">
                STT
            </th>
            <th class="text-white font-18">
                Tên nhà cung cấp
            </th>
            <th class="text-white font-18">
                Địa chỉ
            </th>
            <th class="text-white font-18">
                Số điện thoại
            </th>
            <th class="text-white font-18">
                Email
            </th>
            <th class="text-white font-18">
                Sửa/Xoá
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($provider as $item)
            <tr>
                <td>{{$index++}}</td>
                <td>
                    {{$item->PrvName}}
                </td>
                <td>
                    {{$item->Address}}
                </td>
                <td>
                    {{$item->PhoneNumber}}
                </td>
                <td>
                    {{$item->Email}}
                </td>
                <td>
                   <a href="{{route('home2.Provider.edit',$item->PrvId)}}"><i class="remixicon-edit-box-fill"></i></a>  ||
                    <a onclick="return confirm('Bạn có muốn xoá nhà cung cấp này không?')" href="{{route('home2.Provider.del',$item->PrvId)}}"> <i class="remixicon-delete-bin-line"></i></a>
                </td>
                <td></td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection
