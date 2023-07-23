var staffApp = angular.module("staffApp", ['angularUtils.directives.dirPagination']);

staffApp.controller("StaffController", StaffController);

function StaffController($scope, $http) {
    $scope.maxSize = 3;
    $scope.totalCount = 0;
    $scope.searchText = ''
    $scope.pageSize = "5"

    $scope.getPage = function (newPage) {
        $scope.pageNumber = newPage
        /** Lấy danh sách cosmeticline*/
        $http.get(`/admin/staff/getPageData`,{
            params: { searchText: $scope.searchText, pageNumber: $scope.pageNumber, pageSize: $scope.pageSize }
        }).then(function (res) {
            let pageData = res.data
            console.log(pageData)
            $scope.staffs = pageData.Data
            $scope.totalCount = pageData.TotalCount
        }, function (error) {
            alert("failed")
        })
    }

    $scope.getPage(1)

    /**Thêm danh mục */

    //khi người dùng nhấn thêm
    $scope.Add = function () {
        $scope.staff = null
    }

    //khi người dung nhấn lưu thêm mới danh mục
    $scope.SaveAdd = function (closeOrNew) {
        if ($scope.createForm.$valid)
        {
            $http.post('/admin/staff/create', $scope.staff).then(function (res) {
                if (res.data.message) {

                    $scope.staffs.unshift(res.data.staff) //hiển thị thêm đối tượng vừa thêm
                    //nếu người dùng chỉ nhấn lưu
                    $(".btn-close").trigger('click') //đóng modal thêm

                    //hiển thị thông báo thành công
                    $("#successToast .text-toast").text("Thêm thành công")
                    $("#successToast").toast("show")
                }
                else {
                    $("#errorToast .text-toast").text("Thêm thất bại")
                    $("#errorToast").toast("show")
                }
            })
        }

    }

    /** Sửa danh mục*/

    let indexEdit = 1 //biến chứa vị trí vừa sửa

    $scope.Edit = function (cos, index) {
        //nếu gán thẳng thì nó sẽ thay đổi luôn ở view trong khi chưa sửa
        $scope.staff = { StaffId: cos.StaffId, StaffName: cos.StaffName,  Address: cos.Address,PhoneNumber: cos.PhoneNumber,
        Email: cos.Email, Post: cos.Post, BasicSalary: JSON.stringify(cos.BasicSalary), StartDate: new Date(cos.StartDate), TypeWork: cos.TypeWork, ContractWork:cos.ContractWork }
        indexEdit = index
    }

    $scope.SaveEdit = function () {
        if ($scope.editForm.$valid) {
            $http.post("/admin/staff/update/"+$scope.staff.StaffId,$scope.staff).then(function (res) {
                if (res.data) {
                    //Tìm phần tử vừa được sửa trong danh sách
                    var newCat = $scope.staff
                    $scope.staffs.splice(indexEdit, 1, newCat)
                    $("#successToast .text-toast").text("Sửa danh mục thành công")
                    $("#successToast").toast("show") //hiển thị thông báo thành công
                }
        else {
                    $("#errorToast .text-toast").text("Sửa thất bại")
                    $("#errorToast").toast("show") //hiển thị thông báo thành công
                }
                $(".btn-close").trigger('click') //đóng modal sửa
            })
        }

    }

    /**Xóa danh mục*/
    $scope.Delete = function (cos) {
        if (confirm(`Bạn có chắc chắn muốn xóa danh mục ${cos.StaffName}`)) {
            $http.get('/admin/staff/destroy/'+cos.StaffId).then(function (res) {
                if (res.data.check) {
                    var c = $scope.staffs.indexOf(cos);
                    $scope.staffs.splice(c, 1);
                    $("#successToast .text-toast").text(res.data.message)
                    $("#successToast").toast("show") //hiển thị thông báo thành công
                }
                else {
                    $("#errorToast .text-toast").text(res.data.message)
                    $("#errorToast").toast("show")
                }
            })
        }
    }



}
