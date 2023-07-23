@extends('admin.Layout.app')
@php
    $index=1;
@endphp
@section('content')

    <h2 style="margin-top:5px; text-align:center">QUẢN LÝ NGƯỜI DÙNG</h2>

    <a href="{{ route('users.create') }}" class="btn btn-primary">THÊM MỚI</a>



    <table class="table mt-3">
        <thead class="thead-dark " style="text-align:center">
            <tr>
                <th class="text-white font-18">STT</th>
                <th class="text-white font-18">Tên người dùng</th>
                <th class="text-white font-18">Email</th>
                <th class="text-white font-18">Chức vụ</th>
                <th class="text-white font-18">Sửa/Xoá</th>
            </tr>
        </thead>
        <tbody style="text-align: center">
            @foreach($users as $user)
                <tr>
                    <td>{{$index++}}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}"><i class="remixicon-edit-box-fill" style="font-size: 20px"></i></a> ||
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xoá người dùng?')"style="border:none"><a href="#" style="font-size: 20px"><i class="remixicon-delete-bin-line"></i></a></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
