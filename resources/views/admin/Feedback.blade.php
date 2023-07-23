@extends('admin.Layout.app');
@section('styles')
<link href="\Assets\Front\Admins\assets\libs\bootstrap-tagsinput\bootstrap-tagsinput.css" rel="stylesheet">
<link href="\Assets\Front\Admins\assets\libs\switchery\switchery.min.css" rel="stylesheet" type="text/css">
<link href="\Assets\Front\Admins\assets\libs\multiselect\multi-select.css" rel="stylesheet" type="text/css">
<link href="\Assets\Front\Admins\assets\libs\select2\select2.min.css" rel="stylesheet" type="text/css">
<link href="\Assets\Front\Admins\assets\libs\bootstrap-select\bootstrap-select.min.css" rel="stylesheet" type="text/css">
<link href="\Assets\Front\Admins\assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css" rel="stylesheet">
@endsection
@section('scripts')
    <script>
    {
        function ChangeStatus(id) {
            debugger
            $.ajax({
                url: '/api/Review/ChangeStatus/' + id,
                type: "GET",
                success: function (res) {
                    if (res.message == true) {
                        alert("Duyệt thành thành công!");

                    }
                    else {
                        alert("Không cập nhật được!");
                    }
                }
            });
        }

    }
    </script>

<script src="\Assets\Front\Admins\assets\libs\bootstrap-tagsinput\bootstrap-tagsinput.min.js"></script>
<script src="\Assets\Front\Admins\assets\libs\switchery\switchery.min.js"></script>
<script src="\Assets\Front\Admins\assets\libs\multiselect\jquery.multi-select.js"></script>
<script src="\Assets\Front\Admins\assets\libs\jquery-quicksearch\jquery.quicksearch.min.js"></script>
<script src="\Assets\Front\Admins\assets\libs\select2\select2.min.js"></script>
<script src="\Assets\Front\Admins\assets\libs\bootstrap-select\bootstrap-select.min.js"></script>
<script src="\Assets\Front\Admins\assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js"></script>
<script src="\Assets\Front\Admins\assets\libs\jquery-mask-plugin\jquery.mask.min.js"></script>

<!-- init js -->
<script src="\Assets\Front\Admins\assets\js\pages\form-advanced.init.js"></script>
@endsection
@section('content')

@php
    $index=1;
@endphp
<h2 style="margin-top:5px; text-align:center">QUẢN LÝ PHẢN HỒI</h2>

<table class="table table-striped dt-responsive nowrap table-bordered text-center font-17" id="datatable-buttons">
    <thead class="thead-dark ">
        <tr>
            <th class="text-white font-18">
                STT
            </th>
            <th class="text-white font-18">
                Email
            </th>
            <th class="text-white font-18">
                Nội dung
            </th>
            <th class="text-white font-18">
                Lượt vote
            </th>
            <th class="text-white font-18">
                Thời gian
            </th>
            <th class="text-white font-18">
                Tình trạng
            </th>

        </tr>
    </thead>
    <tbody>
        @foreach ($rev as $item)
            <tr>
                <td>{{$index++}}</td>
                <td>{{$item->Email}}</td>
                <td>{{$item->Content}}</td>
                <td>{{$item->Vote}}</td>
                <td>
                    {{date('d/m/Y', strtotime($item->CreateDate))}}
                </td>


                <td>
                    @if ($item->Status == 1)
                        <input type="checkbox" onchange="ChangeStatus('{{$item->ReviewId}}')" checked="" data-plugin="switchery" data-color="#00b19d" data-size="small">
                    @else
                        <input type="checkbox" onchange="ChangeStatus('{{$item->ReviewId}}')"  data-plugin="switchery" data-color="#00b19d" data-size="small">

                    @endif
                </td>


        </tr>
        @endforeach
    </tbody>
</table>


@endsection
