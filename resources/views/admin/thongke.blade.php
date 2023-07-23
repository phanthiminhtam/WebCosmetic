@extends('admin.Layout.app');
@section('content')

@php
    $index=1;
@endphp
<h2 style="margin-top:5px;margin-left:260px">THỐNG KÊ ĐƠN HÀNG TRONG NGÀY</h2>


<table class="table table-striped dt-responsive nowrap table-bordered text-center font-17" id="datatable-buttons">
    <thead class="thead-dark ">
        <tr>
            <th class="text-white font-18">
                STT
            </th>
            <th class="text-white font-18">
                Thời gian
            </th>
            <th class="text-white font-18">
                Số lượng
            </th>
            <th class="text-white font-18">
                Doanh số
            </th>

        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $item)
            <tr>
                <td>{{$index++}}</td>
                <td style="width:150px">
                    {{date('d/m/Y', strtotime($item->order_date))}}
                </td>
                <td>
                   {{$item->total_orders }}

                </td>
                <td>
                    {{number_format($item->total_money,0,',','.')}}đ

                </td>


        </tr>
        @endforeach
    </tbody>
</table>


@endsection
