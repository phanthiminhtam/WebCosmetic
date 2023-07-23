@extends('admin.Layout.app');
@section('scripts')
    <script src="\Assets\Front\Admins\assets\framework\dirPagination.js"></script>
    <script src="\Assets\Front\Admins\assets\js\cosmeticline.js"></script>
    <script src="\Assets\Front\Admins\assets\framework\jquery.validate.min.js"></script>

@endsection
@section('content')
<main id="main" class="main" ng-app="cosmeticlineApp" ng-controller="CosmeticLineController">
    <h3 class="fw-bold">QUẢN LÝ DÒNG MỸ PHẨM</h3>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body pt-4">
                        <div class="text-end mb-3 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                {{-- <input type="text" class="form-control" placeholder="Tìm kiếm..." ng-change="getPage(1)" style="width:300px;"> --}}
                                <input type="text" class="form-control" ng-model="searchText" ng-change="getPage(1)" style="width:300px; box-sizing: border-box"
                                placeholder="Tìm kiếm theo tên hoặc đối tượng" />
                                <select ng-model="pageSize" class="limitShow form-control col-sm-3">
                                    <option ng-click="getPageSize('5')" value="5">5</option>
                                    <option ng-click="getPageSize('10')" value="10">10</option>
                                    <option ng-click="getPageSize('15')" value="15">15</option>
                                    <option ng-click="getPageSize('20')" value="20">20</option>
                                    <option ng-click="getPageSize('50')" value="50">50</option>
                                </select>
                            </div>
                            <a class="btn btn-primary me-2" ng-click="Add()" href="" data-bs-toggle="modal" data-bs-target="#Addcategory"> Thêm mới</a>
                        </div>
                        <table class="table table-striped table-hover table-bordered pt-4" >
                            <thead class="thead-dark" style="text-align:center">
                                <tr>
                                    <th class="text-white font-18">
                                        STT
                                    </th>
                                    <th class="text-white font-18">
                                        Tên dòng
                                    </th>
                                    <th class="text-white font-18">
                                        Thương hiệu
                                    </th>
                                    <th class="text-white font-18">
                                        Xuất xứ
                                    </th>
                                    <th class="text-white font-18">
                                        Tên loại
                                    </th>
                                    <th class="text-white font-18">
                                        Sửa/ Xoá
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="category-wrap" style="text-align:center">
                                <tr dir-paginate="c in cosmeticlines | itemsPerPage: pageSize" total-items="totalCount">
                                    <td>
                                        @{{$index+1}}
                                    </td>
                                    <td>
                                        @{{c.LineName}}
                                    </td>
                                    <td>
                                        @{{c.Brand}}
                                    </td>
                                    <td>
                                        @{{c.Origin}}
                                    </td>
                                    <td>
                                        @{{c.category.CatName}}
                                    </td>
                                    <td>
                                        <a class="btn-update" ng-click="Edit(c,$index)" data-bs-toggle="modal" data-bs-target="#Editcategory" href=""><i class="remixicon-edit-box-fill"></i></a> |
                                        <a href="" class="btn-delete btn-deleteHome" ng-click="Delete(c)"><i class="remixicon-delete-bin-line"></i></a>
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
        <div class="modal-dialog modal-fullscreen-sm-down" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">THÊM DÒNG MỸ PHẨM</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border: none"> <i class="remixicon-close-line" style="font-size:20px"></i></button>
                </div>
                <div class="modal-body">
                    <form name="createForm" novalidate>
                        <div class="form-horizontal">

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Tên dòng </label>
                                <div class="col-sm-8">
                                    <input type="text" name="LineName" class="form-control" ng-model="cosmeticline.LineName" required>
                                    <span ng-show="createForm.$submitted || createForm.LineName.$dirty">
                                        <span class="error" ng-show="createForm.LineName.$error.required">Tên dòng sản phẩm không được để trống</span>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Thương hiệu</label>
                                <div class="col-sm-8">
                                    <input type="text" name="Brand" class="form-control" ng-model="cosmeticline.Brand" required>
                                    <span ng-show="createForm.$submitted || createForm.Brand.$dirty">
                                        <span class="error" ng-show="createForm.Brand.$error.required">Thương hiệu không được để trống</span>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Xuất xứ</label>
                                <div class="col-sm-8">
                                    <input type="text" name="Origin" class="form-control" ng-model="cosmeticline.Origin" required>
                                    <span ng-show="createForm.$submitted || createForm.Origin.$dirty">
                                        <span class="error" ng-show="createForm.Origin.$error.required">Tên dòng sản phẩm không được để trống</span>
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" style="font-size: 17px">Tên loại</label>
                                <div class="col-sm-8">
                                <select class=" form-control" aria-label="Default select example" ng-model="cosmeticline.CatId">
                                        @foreach ($listCats as $item)
                                            <option value="{{ $item->CatId }}">{{ $item->CatName }}</option>
                                        @endforeach
                                    </select>
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
    <div class="modal fade" id="Editcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">SỬA DÒNG MỸ PHẨM</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border: none"> <i class="remixicon-close-line" style="font-size:20px"></i> </button>
                </div>
                <div class="modal-body">
                    <form name="editForm" novalidate>
                        <div class="form-horizontal">

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Tên dòng </label>
                                <div class="col-sm-8">
                                    <input type="text" name="LineName" class="form-control" ng-model="cosmeticline.LineName" required>
                                    <span ng-show="createForm.$submitted || createForm.LineName.$dirty">
                                        <span class="error" ng-show="createForm.LineName.$error.required">Tên dòng sản phẩm không được để trống</span>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Thương hiệu</label>
                                <div class="col-sm-8">
                                    <input type="text" name="Brand" class="form-control" ng-model="cosmeticline.Brand" required>
                                    <span ng-show="createForm.$submitted || createForm.Brand.$dirty">
                                        <span class="error" ng-show="createForm.Brand.$error.required">Thương hiệu không được để trống</span>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Xuất xứ</label>
                                <div class="col-sm-8">
                                    <input type="text" name="Origin" class="form-control" ng-model="cosmeticline.Origin" required>
                                    <span ng-show="createForm.$submitted || createForm.Origin.$dirty">
                                        <span class="error" ng-show="createForm.Origin.$error.required">Tên dòng sản phẩm không được để trống</span>
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" style="font-size: 17px">Tên loại</label>
                                <div class="col-sm-8">
                                <select class="form-control" aria-label="Default select example" ng-model="cosmeticline.CatId">
                                        @foreach ($listCats as $item)
                                            <option value="{{ $item->CatId}}">{{ $item->CatName }}</option>
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
    </div>
</main>
@endsection

