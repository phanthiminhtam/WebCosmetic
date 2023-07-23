var productApp = angular.module("productApp", ['angularUtils.directives.dirPagination','ngSanitize']);

productApp.controller("ProductController", ProductController);

function ProductController($scope, $http) {
    $scope.maxSize = 3;
    $scope.totalCount = 0;
    $scope.searchText = ''
    $scope.pageSize = "5"

    $scope.getPage = function (newPage) {
        $scope.pageNumber = newPage
        /** Lấy danh sách product*/
        $http.get(`/admin/product/getPageData`,{
            params: { searchText: $scope.searchText, pageNumber: $scope.pageNumber, pageSize: $scope.pageSize }
        }).then(function (res) {
            let pageData = res.data
            console.log(pageData)
            $scope.products = pageData.Data
            $scope.totalCount = pageData.TotalCount
        }, function (error) {
            alert("failed")
        })
    }

    $scope.getPage(1)

    /**Thêm danh mục */

    //khi người dùng nhấn thêm
    $scope.Add = function () {
        $scope.product = null
    }

    //khi người dung nhấn lưu thêm mới danh mục
    $scope.SaveAdd = function (closeOrNew) {
        if ($scope.createForm.$valid)
        {
            $scope.product.Description = CKEDITOR.instances['Content'].getData();
            $http.post('/admin/product/create', $scope.product).then(function (res) {
                if (res.data.message) {
                    $scope.products.unshift(res.data.cat) //hiển thị thêm đối tượng vừa thêm
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
        CKEDITOR.instances['ContentEdit'].setData(cos.Description);
        //nếu gán thẳng thì nó sẽ thay đổi luôn ở view trong khi chưa sửa
        $scope.product = { ProId: cos.ProId, ProName: cos.ProName, LineId: JSON.stringify(cos.LineId), Description: cos.Description }
        indexEdit = index
    }

    $scope.SaveEdit = function () {
        if ($scope.editForm.$valid) {
            $scope.product.Description = CKEDITOR.instances['ContentEdit'].getData();
            $http.post("/admin/product/update/"+$scope.product.ProId,$scope.product).then(function (res) {
                if (res.data.check) {
                    //Tìm phần tử vừa được sửa trong danh sách

                    var newCat = res.data.product
                    newCat.LineId = JSON.parse(newCat.LineId)
                    $scope.products.splice(indexEdit, 1, newCat)
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
        if (confirm(`Bạn có chắc chắn muốn xóa danh mục ${cos.ProName}`)) {
            $http.get('/admin/product/destroy/'+cos.ProId).then(function (res) {
                if (res.data.check) {
                    var c = $scope.products.indexOf(cos);
                    $scope.products.splice(c, 1);
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
