@extends('admin.Layout.app')
@php
    $index=1;
@endphp
@section('content')
    <h2 style="margin-top:5px; text-align:center">QUẢN LÝ CHỨC VỤ</h2>

    <a href="{{ route('roles.create') }}" class="btn btn-primary">THÊM MỚI</a>

    <table class="table mt-3">
        <thead class="thead-dark ">
            <tr>
                <th class="text-white font-18">STT</th>
                <th class="text-white font-18">Tên chức vụ</th>
                <th class="text-white font-18" style="text-align:center;width:600px">Quyền</th>
                <th class="text-white font-18">Sửa/Xoá</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{$index++}}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->permissions->pluck('name')->implode(', ') }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role->id) }}"><i class="remixicon-edit-box-fill" style="font-size: 20px"></i></a> ||
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  onclick="return confirm('Bạn có chắc chắn muốn xoá quyền?')" style="border:none"><a href="#" style="font-size: 20px"><i class="remixicon-delete-bin-line"></i></a></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
