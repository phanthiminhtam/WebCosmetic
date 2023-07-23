@extends('admin.Layout.app');
@php
    $index=1;
@endphp
@section('content')
<main id="main" class="main">
    <h4 class="fw-bold">QUẢN LÝ KHÁCH HÀNG</h4>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body pt-4">

                        <table class="table table-striped table-bordered text-center font-17 w-100 nowrap" id="scroll-horizontal-datatable" >
                            <thead class="thead-dark" style="text-align:center">
                                <tr>
                                    <th class="text-white font-18">
                                        STT
                                    </th>
                                    <th class="text-white font-18">
                                        Tên khách hàng
                                    </th>
                                    <th class="text-white font-18">
                                        Số điện thoại
                                    </th>
                                    <th class="text-white font-18">
                                        Địa chỉ
                                    </th>
                                    <th class="text-white font-18">
                                        Email
                                    </th>
                                    {{-- <th class="text-white font-18">
                                        UserName
                                    </th> --}}
                                    {{-- <th class="text-white font-18">
                                        PassWord
                                    </th> --}}
                                    <th class="text-white font-18">
                                        Xoá
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cus as $item)
                                <tr>

                                    <td>
                                        {{$index++}}
                                    </td>
                                    <td>
                                        {{$item->CusName}}
                                    </td>
                                    <td>
                                        {{$item->PhoneNumber}}
                                    </td>
                                    <td>
                                        {{$item->Address}}
                                    </td>
                                    <td>
                                        {{$item->Email}}
                                    </td>
                                    {{-- <td >
                                         {{$item->UserName}}
                                    </td> --}}
                                    {{-- <td >
                                        {{$item->PassWord}}
                                   </td> --}}
                                    <td>
                                        <a onclick="return confirm('Bạn có muốn xoá khách hàng này không?')" href="{{route('home2.Customer.del',$item->CusId)}}"> <i class="remixicon-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
