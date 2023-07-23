@extends('admin.Layout.app');
@section('content')
@section('scripts')
    <script>
        function ChangeStatus(id) {
            $.ajax({
                url: '/api/Order/ChangeStatus/' + id,
                type: "GET",
                success: function (res) {
                    if (res.message == true) {
                        alert("Chuyển đơn hàng thành công!");
                        window.location.href = "{{route('home2.Order.index1')}}"
                    }
                    else {
                        alert("Không cập nhật được!");
                    }
                }
            });
        }
    </script>
@endsection
@php
    $index=1;
@endphp
<h2 style="margin-top:5px; text-align:center">QUẢN LÝ ĐƠN HÀNG</h2>



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
                Số điện thoại
            </th>
            <th class="text-white font-18">
                Thanh toán
            </th>
            <th class="text-white font-18">
                Tình trạng
            </th>
            <th class="text-white font-18">
                Chi tiết
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $item)
            <tr>
                <td>{{$index++}}</td>
                <td>
                    {{date('d/m/Y', strtotime($item->OrderDate))}}
                </td>
                <td>
                    {{$item->PhoneNumber}}
                </td>
                <td>
                    @if ($item->Payment=1)
                        <p><span style="font-weight:700">Trả tiền mặt</span></p>
                    @else
                        <p><span style="font-weight:700">Chuyển khoản</span></p>
                    @endif
                </td>
                <td>
                    @if ($item->Status == "CVC" || $item->Status == "DG")
                        <button type="button" class="btnChanges btn btn-secondary waves-effect">Đã duyệt</button>
                    @else
                        <button type="button" onclick="ChangeStatus('{{$item->OrdId}}')" class="btnChanges btn btn-primary waves-effect waves-light">Duyệt</button>
                    @endif
                </td>
                <td>
                    {{-- <a href="{{route('home2.Order.detail1',$item->OrdId)}}"><i class="remixicon-eye-line" style="font-size: 20px"></i></a> --}}
                    <a href="{{route('home2.Order.detail',$item->OrdId)}}"><i class="remixicon-eye-line" style="font-size: 20px"></i></a>
                                             {{-- <i class="fas fa-grip-lines-vertical"></i> --}}
                </td>
                <td></td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection
