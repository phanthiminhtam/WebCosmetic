var cosmeticlineApp = angular.module("cosmeticlineApp", ['angularUtils.directives.dirPagination']);

cosmeticlineApp.controller("CosmeticLineController", CosmeticLineController);

function CosmeticLineController($scope, $http) {
    $scope.maxSize = 3;
    $scope.totalCount = 0;
    $scope.searchText = ''
    $scope.pageSize = "5"

    $scope.getPage = function (newPage) {
        $scope.pageNumber = newPage
        /** Lấy danh sách cosmeticline*/
        $http.get(`/admin/cosmeticline/getPageData`,{
            params: { searchText: $scope.searchText, pageNumber: $scope.pageNumber, pageSize: $scope.pageSize }
        }).then(function (res) {
            let pageData = res.data
            // console.log(pageData)
            $scope.cosmeticlines = pageData.Data
            $scope.totalCount = pageData.TotalCount
        }, function (error) {
            alert("failed")
        })
    }

    $scope.getPage(1)

    /**Thêm danh mục */

    //khi người dùng nhấn thêm
    $scope.Add = function () {
        $scope.cosmeticline = null
    }

    //khi người dung nhấn lưu thêm mới danh mục
    $scope.SaveAdd = function (closeOrNew) {
        if ($scope.createForm.$valid)
        {
            $http.post('/admin/cosmeticline/create', $scope.cosmeticline).then(function (res) {
                if (res.data.message) {

                    $scope.cosmeticlines.unshift(res.data.cat) //hiển thị thêm đối tượng vừa thêm
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
        $scope.cosmeticline = { LineId: cos.LineId, LineName: cos.LineName, CatId: JSON.stringify(cos.CatId), Brand: cos.Brand,Origin: cos.Origin }
        indexEdit = index
    }

    $scope.SaveEdit = function () {
        if ($scope.editForm.$valid) {
            $http.post("/admin/cosmeticline/update/"+$scope.cosmeticline.LineId,$scope.cosmeticline).then(function (res) {
                if (res.data.check) {
                    //Tìm phần tử vừa được sửa trong danh sách
                    var newCat = res.data.cosmeticline

                    newCat.CatId = JSON.parse(newCat.CatId)
                    $scope.cosmeticlines.splice(indexEdit, 1, newCat)
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
        if (confirm(`Bạn có chắc chắn muốn xóa ${cos.LineName}`)) {
            $http.get('/admin/cosmeticline/destroy/'+cos.LineId).then(function (res) {
                if (res.data.check) {
                    var c = $scope.cosmeticlines.indexOf(cos);
                    $scope.cosmeticlines.splice(c, 1);
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

    /** Change status*/
    $scope.ChangeStatuscosmeticline = function (idCat) {
        $http.get('/admin/cosmeticline/changeStatus/'+idCat).then(function (res) {
                $("#successToast .text-toast").text("Đã lưu thay đổi")
                $("#successToast").toast("show") //hiển thị thông báo thành công
        })
    }

}
