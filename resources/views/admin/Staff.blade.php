@extends('admin.Layout.app');
@section('scripts')
    <script src="\Assets\Front\Admins\assets\framework\dirPagination.js"></script>
    <script src="\Assets\Front\Admins\assets\js\staff.js"></script>
@endsection
@section('content')
<main id="main" class="main" ng-app="staffApp" ng-controller="StaffController">
    <h4 class="fw-bold">QUẢN LÝ NHÂN VIÊN</h4>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body pt-4">
                        <div class="text-end mb-3 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <input type="text" class="form-control" ng-model="searchText" ng-change="getPage(1)" style="width:300px; box-sizing: border-box"
                            placeholder="Tìm kiếm theo tên hoặc đối tượng"/>
                                <select ng-model="pageSize" class="limitShow form-control col-sm-3">
                                    <option ng-click="getPageSize('5')" value="5">5</option>
                                    <option ng-click="getPageSize('10')" value="10">10</option>
                                    <option ng-click="getPageSize('15')" value="15">15</option>
                                    <option ng-click="getPageSize('20')" value="20">20</option>
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
                                        Tên nhân viên
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
                                        Ngày làm việc
                                    </th>
                                    <th class="text-white font-18">
                                        Sửa/ Xoá
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="category-wrap" style="text-align:center">
                                <tr dir-paginate="s in staffs | itemsPerPage: pageSize" total-items="totalCount">
                                    <td>
                                        @{{$index+1}}
                                    </td>
                                    <td>
                                        @{{s.StaffName}}
                                    </td>
                                    <td>
                                        @{{s.Address}}
                                    </td>
                                    <td>
                                        @{{s.PhoneNumber}}
                                    </td>
                                    <td>
                                        @{{s.Email}}
                                    </td>
                                    <td >
                                         @{{s.StartDate }}
                                    </td>
                                    <td>
                                        <a class="btn-update" ng-click="Edit(s,$index)" data-bs-toggle="modal" data-bs-target="#Editcategory" href=""><i class="remixicon-edit-box-fill" style="font-size: 20px"></i></a>||
                                        <a href="" class="btn-delete btn-deleteHome" ng-click="Delete(s)"><i class="remixicon-delete-bin-line" style="font-size: 20px"></i></a>
                                        {{-- <a href=""><i class="remixicon-eye-line" style="font-size: 20px"></i></a> --}}
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
                    <h4 class="modal-title" id="exampleModalLabel">Thêm nhân viên</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border: none"> <i class="remixicon-close-line" style="font-size:20px"></i></button>
                </div>
                <div class="modal-body">
                    <form name="createForm" novalidate>
                        <div class="form-horizontal">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-6 col-form-label" style="font-size: 17px">Tên nhân viên</label>
                                    <div class="col-md-12">
                                        <input type="text" name="StaffName" class="form-control" ng-model="staff.StaffName" required>
                                        <span ng-show="createForm.$submitted || createForm.StaffName.$dirty">
                                            <span class="error" ng-show="createForm.StaffName.$error.required">Tên nhân viên không được để trống</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Địa điểm</label>
                                    <div class="col-md-12">
                                        <input type="text" name="Address" class="form-control" ng-model="staff.Address" required>
                                        <span ng-show="createForm.$submitted || createForm.Address.$dirty">
                                            <span class="error" ng-show="createForm.Address.$error.required">Địa điểm không được để trống</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Số điện thoại</label>
                                    <div class="col-md-12">
                                        <input type="text" name="PhoneNumber" class="form-control" ng-model="staff.PhoneNumber" required>
                                        <span ng-show="createForm.$submitted || createForm.PhoneNumber.$dirty">
                                            <span class="error" ng-show="createForm.PhoneNumber.$error.required">Số điện thoại không được để trống</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" name="Email" class="form-control" id="example-email" ng-model="staff.Email" required placeholder="Email...">
                                        <span ng-show="createForm.$submitted || createForm.Email.$dirty">
                                            <span class="error" ng-show="createForm.Email.$error.required">Email không đúng định dạng!</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="col-sm-4 col-form-label" style="font-size: 17px">Bậc lương</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" required name="BasicSalary" ng-model="staff.BasicSalary">
                                            <option>Lương cơ bản....</option>
                                            <option>5600000</option>
                                            <option>6500000</option>
                                            <option>7900000</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-sm-4 col-form-label" style="font-size: 17px">Chức vụ</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" required name="Post" ng-model="staff.Post">
                                            <option>Chức vụ....</option>
                                            <option>Nhân viên</option>
                                            <option>Quản lý</option>
                                            <option>Giám đốc</option>
                                            <option>Tổ trưởng</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="col-sm-6 col-form-label" for="example-date" style="font-size: 17px">Ngày làm việc</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="date" name="StartDate" ng-model="staff.StartDate" id="example-date" required placeholder="Ngày bắt đầu làm việc...">
                                        <span ng-show="createForm.$submitted || createForm.StartDate.$dirty">
                                            <span class="error" ng-show="createForm.StartDate.$error.required">Số điện thoại không được để trống</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-sm-6 col-form-label" style="font-size: 17px">Loại công việc</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" required name="TypeWork" ng-model="staff.TypeWork">
                                            <option>Công việc....</option>
                                            <option>Partime</option>
                                            <option>Nhân viên chính</option>
                                            <option>Thời vụ</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="col-sm-6 col-form-label" style="font-size: 17px">Hợp đồng làm việc</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" required name="ContractWork" ng-model="staff.ContractWork">
                                            <option>Loại hợp đồng....</option>
                                            <option>6 tháng</option>
                                            <option>1 năm</option>
                                            <option>3 năm</option>
                                            <option>Vô thời hạn</option>
                                        </select>

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


     <!-- Modal sửa danh mục-->
     <div class="modal fade" id="Editcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">SỬA NHÂN VIÊN</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border: none"> <i class="remixicon-close-line" style="font-size:20px"></i></button>
                </div>
                <div class="modal-body">
                    <form name="editForm" novalidate>
                        <div class="form-horizontal">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-6 col-form-label" style="font-size: 17px">Tên nhân viên</label>
                                    <div class="col-md-12">
                                        <input type="text" name="StaffName" class="form-control" ng-model="staff.StaffName" required>
                                        <span ng-show="createForm.$submitted || createForm.StaffName.$dirty">
                                            <span class="error" ng-show="createForm.StaffName.$error.required">Tên nhân viên không được để trống</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Địa điểm</label>
                                    <div class="col-md-12">
                                        <input type="text" name="Address" class="form-control" ng-model="staff.Address" required>
                                        <span ng-show="createForm.$submitted || createForm.Address.$dirty">
                                            <span class="error" ng-show="createForm.Address.$error.required">Địa điểm không được để trống</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Số điện thoại</label>
                                    <div class="col-md-12">
                                        <input type="text" name="PhoneNumber" class="form-control" ng-model="staff.PhoneNumber" required>
                                        <span ng-show="createForm.$submitted || createForm.PhoneNumber.$dirty">
                                            <span class="error" ng-show="createForm.PhoneNumber.$error.required">Số điện thoại không được để trống</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputText" class="col-sm-4 col-form-label" style="font-size: 17px">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" name="Email" class="form-control" id="example-email" ng-model="staff.Email" required placeholder="Email...">
                                        <span ng-show="createForm.$submitted || createForm.Email.$dirty">
                                            <span class="error" ng-show="createForm.Email.$error.required">Email không đúng định dạng!</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="col-sm-4 col-form-label" style="font-size: 17px">Bậc lương</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" required name="BasicSalary" ng-model="staff.BasicSalary">
                                            <option>Lương cơ bản....</option>
                                            <option>5600000</option>
                                            <option>6500000</option>
                                            <option>7900000</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-sm-4 col-form-label" style="font-size: 17px">Chức vụ</label>
                                    <div class="col-sm-12">
                                        <span class="menu-arrow"></span>
                                        <select class="form-control" required name="Post" ng-model="staff.Post">
                                            <option>Chức vụ....</option>
                                            <option>Nhân viên</option>
                                            <option>Quản lý</option>
                                            <option>Giám đốc</option>
                                            <option>Tổ trưởng</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="col-sm-6 col-form-label" for="example-date">Ngày làm việc</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="date" name="StartDate" ng-model="staff.StartDate" id="example-date" required placeholder="Ngày bắt đầu làm việc...">
                                        <span ng-show="createForm.$submitted || createForm.StartDate.$dirty">
                                            <span class="error" ng-show="createForm.StartDate.$error.required">Số điện thoại không được để trống</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-sm-6 col-form-label">Loại công việc</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" required name="TypeWork" ng-model="staff.TypeWork">
                                            <option>Công việc....</option>
                                            <option>Partime</option>
                                            <option>Nhân viên chính</option>
                                            <option>Thời vụ</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="col-sm-6 col-form-label">Hợp đồng làm việc</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" required name="ContractWork" ng-model="staff.ContractWork">
                                            <option>Loại hợp đồng....</option>
                                            <option>6 tháng</option>
                                            <option>1 năm</option>
                                            <option>3 năm</option>
                                            <option>Vô thời hạn</option>
                                        </select>

                                    </div>
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

