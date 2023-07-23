@extends('admin.Layout.app');
@section('scripts')
    <script src="\Assets\Front\Admins\assets\framework\dirPagination.js"></script>
    <script src="\Assets\Front\Admins\assets\js\specificproduct.js"></script>

@endsection
@section('content')
<main id="main" class="main" ng-app="specificproductApp" ng-controller="SpecificproductController">
    <h3 class="fw-bold">CHI TIẾT MỸ PHẨM</h3>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body pt-4">
                        <div class="text-end mb-3 d-flex justify-content-between align-items-center">
                          <div class="d-flex align-items-center">
                            <input type="text" class="form-control" ng-model="searchText" ng-change="getPage(1)" style="width:300px; box-sizing: border-box"
                            placeholder="Tìm kiếm theo tên hoặc đối tượng"/>
                                <select ng-model="pageSize" class="limitShow form-control col-sm-3" >
                                    <option ng-click="getPageSize('5')" value="5">5</option>
                                    <option ng-click="getPageSize('10')" value="10">10</option>
                                    <option ng-click="getPageSize('15')" value="15">15</option>
                                    <option ng-click="getPageSize('20')" value="20">20</option>
                                    <option ng-click="getPageSize('50')" value="50">50</option>
                                    <option ng-click="getPageSize('70')" value="70">70</option>
                                </select>


                            </div>
                            <a class="btn btn-primary me-2" ng-click="Add()" href="" data-bs-toggle="modal" data-bs-target="#Addcategory">Thêm mới</a>
                        </div>
                        <table class="table table-striped table-hover table-bordered pt-4" >
                            <thead class="thead-dark" style="text-align:center">
                                <tr>
                                    <th class="text-white font-18">
                                        STT
                                    </th>
                                    <th class="text-white font-18">
                                        Hình ảnh
                                    </th>
                                    <th class="text-white font-18">
                                        Tên mỹ phẩm
                                    </th>
                                    <th class="text-white font-18">
                                        Đơn vị tính
                                    </th>
                                    {{-- <th class="text-white font-18">
                                        Kiểu chi tiết mỹ phẩm
                                    </th> --}}
                                    <th class="text-white font-18">
                                        Giá bán
                                    </th>
                                    <th class="text-white font-18">
                                        Khuyến mại
                                    </th>
                                    {{-- <th class="text-white font-18">
                                        Ngày bắt đầu
                                    </th>
                                    <th class="text-white font-18">
                                        Ngày kết thúc
                                    </th> --}}

                                    {{-- <th class="text-white font-18">
                                        Hình ảnh 1
                                    </th>
                                    <th class="text-white font-18">
                                        Hình ảnh 2
                                    </th> --}}
                                    <th class="text-white font-18">
                                        Sửa/ Xoá/ Xem
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="category-wrap"  style="text-align:center">
                                <tr dir-paginate="s in specificproducts | itemsPerPage: pageSize" total-items="totalCount">
                                    <td>
                                        @{{$index+1}}
                                    </td>
                                    <td>
                                        <img src='/storage/uploads/Specificproduct/@{{s.Image}}' style='width:70px'>
                                    </td>
                                    <td>
                                        @{{s.product.ProName}}
                                    </td>
                                    <td>
                                        @{{s.Measure}}
                                    </td>
                                    {{-- <td>
                                        @{{s.Type}}
                                    </td> --}}
                                    <td>
                                        @{{s.Price | number}}
                                    </td>
                                    <td>
                                        @{{s.Offer}}
                                    </td>
                                    {{-- <td>
                                        @{{s.StartedDate | date:"dd/MM/yyyy" }}

                                    </td>
                                    <td>
                                        @{{s.StopDate | date:"dd/MM/yyyy" }}

                                    </td> --}}

                                    {{-- <td>
                                        @{{s.Image1}}
                                    </td>
                                    <td>
                                        @{{s.Image2}}
                                    </td> --}}

                                    <td>
                                        <a class="btn-update" ng-click="Edit(s,$index)" data-bs-toggle="modal" data-bs-target="#Editcategory" href=""><i class="remixicon-edit-box-fill" style="font-size: 20px"></i></a> ||

                                        <a href="" class="btn-delete btn-deleteHome" ng-click="Delete(s)"><i class="remixicon-delete-bin-line" style="font-size: 20px"></i></a>



                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pagination sortPagiBar">
                            <dir-pagination-controls max-size="maxSize"
                                                     boundary-links="true"
                                                     direction-links="true"
                                                     on-page-change="getPage(newPageNumber)"></dir-pagination-controls>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Modal thêm danh mục-->
    <div class="modal fade" id="Addcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">THÊM CHI TIẾT MỸ PHẨM</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border: none"> <i class="remixicon-close-line" style="font-size:20px"></i></button>
                </div>
                <div class="modal-body">
                    <form name="createForm" novalidate>
                        <div class="form-horizontal">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="col-sm-6 col-form-label" style="font-size: 17px">Tên mỹ phẩm</label>
                                    <div class="col-sm-12">
                                    <select class="form-control" aria-label="Default select example" ng-model="specificproduct.ProId">
                                            @foreach ($listSP as $item)
                                                <option value="{{ $item->ProId }}">{{$item->ProName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-6 col-form-label" style="font-size: 17px" >Ảnh mỹ phẩm</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" onchange="angular.element(this).scope().setFile(this)" >
                                        <span ng-show="createForm.$submitted || createForm.Image.$dirty">
                                            <span class="error" ng-show="createForm.Image.$error.required">Tên mỹ phẩm không được để trống</span>
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Đơn vị tính</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="Measure" class="form-control" ng-model="specificproduct.Measure" >

                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Kiểu chi tiết</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="Type" class="form-control" ng-model="specificproduct.Type" >

                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-6 col-form-label" style="font-size: 17px">Ngày bắt đầu</label>
                                    <div class="col-sm-12">
                                        <input type="date" name="StartedDate" class="form-control" ng-model="specificproduct.StartedDate" required>
                                        <span ng-show="createForm.$submitted || createForm.StartedDate.$dirty">
                                            <span class="error" ng-show="createForm.StartedDate.$error.required">Tên mỹ phẩm không được để trống</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-6 col-form-label" style="font-size: 17px">Ngày kết thúc</label>
                                    <div class="col-sm-12">
                                        <input type="date" name="StopDate" class="form-control" ng-model="specificproduct.StopDate" required>
                                        <span ng-show="createForm.$submitted || createForm.StopDate.$dirty">
                                            <span class="error" ng-show="createForm.StopDate.$error.required">Mô tả không được để trống</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Khuyến mại</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="Offer" class="form-control" ng-model="specificproduct.Offer" >

                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Hình ảnh 1</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="Image1" class="form-control" onchange="angular.element(this).scope().setFile1(this)">

                                    </div>
                                </div>
                            </div>
                           <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Hình ảnh 2</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="Image1" class="form-control" onchange="angular.element(this).scope().setFile2(this)">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Giá</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="Price" class="form-control" ng-model="specificproduct.Price" required>
                                        <span ng-show="createForm.$submitted || createForm.Price.$dirty">
                                            <span class="error" ng-show="createForm.Price.$error.required">Tên mỹ phẩm không được để trống</span>
                                        </span>
                                    </div>
                                </div>
                           </div>

                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button class="btn btn-primary" ng-click="SaveAdd(true)">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <!--sửa danh mục-->
    {{-- <div class="modal fade" id="Editcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="editForm" novalidate>
                        <div class="form-horizontal">

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-form-label">Tên mỹ phẩm</label>
                                <div class="col-sm-8">
                                    <input type="text" name="ProName" class="form-control" ng-model="product.ProName" required>
                                    <span ng-show="createForm.$submitted || createForm.ProName.$dirty">
                                        <span class="error" ng-show="createForm.ProName.$error.required">Tên mỹ phẩm không được để trống</span>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-form-label">Thương hiệu</label>
                                <div class="col-sm-8">
                                    <input type="text" name="Description" class="form-control" ng-model="product.Description" required>
                                    <span ng-show="createForm.$submitted || createForm.Description.$dirty">
                                        <span class="error" ng-show="createForm.Description.$error.required">Thương hiệu không được để trống</span>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Tên dòng</label>
                                <div class="col-sm-8">
                                <select class="form-select" aria-label="Default select example" ng-model="product.LineId">
                                        @foreach ($listPros as $item)
                                            <option value="{{ $item->LineId }}">{{ $item->LineName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button class="btn btn-primary" ng-click="SaveEdit()">Lưu</button>
                </div>

            </div>
        </div>
    </div> --}}
</main>
@endsection

