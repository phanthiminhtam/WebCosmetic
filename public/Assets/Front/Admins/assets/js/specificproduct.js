var specificproductApp = angular.module("specificproductApp", ['angularUtils.directives.dirPagination']);

specificproductApp.controller("SpecificproductController", SpecificproductController);







function SpecificproductController($scope, $http) {
    $scope.maxSize = 3;
    $scope.totalCount = 0;
    $scope.searchText = ''
    $scope.pageSize = "5"

    $scope.getPage = function (newPage) {
        $scope.pageNumber = newPage
        /** Lấy danh sách cosmeticline*/
        $http.get(`/admin/specificproduct/getPageData`,{
            params: { searchText: $scope.searchText, pageNumber: $scope.pageNumber, pageSize: $scope.pageSize }
        }).then(function (res) {
            let pageData = res.data
            // console.log(pageData)
            $scope.specificproducts = pageData.Data
            $scope.totalCount = pageData.TotalCount
        }, function (error) {
            alert("failed")
        })
    }

    $scope.getPage(1)

    /**Thêm danh mục */

    //khi người dùng nhấn thêm
    $scope.Add = function () {
        $scope.specificproduct = null
    }

    $scope.setFile = function(element) {
        $scope.$apply(function() {
            $scope.myFile = element.files[0];
        });
    };

    $scope.setFile1 = function(element) {
        $scope.$apply(function() {
            $scope.myFile1 = element.files[0];
        });
    };

    $scope.setFile2 = function(element) {
        $scope.$apply(function() {
            $scope.myFile2 = element.files[0];
        });
    };

    //khi người dung nhấn lưu thêm mới danh mục
    $scope.SaveAdd = function (closeOrNew) {
        if ($scope.createForm.$valid)
        {
            var formData = new FormData();
            if($scope.myFile!=undefined){
                formData.append('file', $scope.myFile);
            }
            if($scope.myFile1!=undefined){
                formData.append('file1', $scope.myFile1);
            }
            if($scope.myFile2!=undefined){
                formData.append('file2', $scope.myFile2);
            }
            formData.append('sp', JSON.stringify($scope.specificproduct));

            console.log($scope.specificproduct);
            $http.post('/admin/specificproduct/create', formData,{
                transformRequest: angular.identity,
                headers: { 'Content-Type': undefined }
            }).then(function (res) {
                if (res.data.message) {

                    $scope.specificproducts.unshift(res.data.cat) //hiển thị thêm đối tượng vừa thêm
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
        `ProId`, `SpId`, `Image`, `Measure`, `Type`, `Price`, `StartedDate`, `StopDate`, `Offer`, `Image1`, `Image2`
        $scope.specificproduct = { ProId: JSON.stringify(cos.ProId), SpId: cos.SpId,Image: cos.Image,
          Measure: cos.Measure, Type: cos.Type, Price: cos.Price,StartedDate: cos.StartedDate, StopDate: cos.StopDate, Offer: cos.Offer,
        Image1: cos.Image1, Image2: cos.Image2}
        indexEdit = index
    }

    $scope.SaveEdit = function () {
        if ($scope.editForm.$valid) {
            $http.post("/admin/specificproduct/update/"+$scope.specificproduct.ProId,$scope.specificproduct).then(function (res) {
                if (res.data) {
                    //Tìm phần tử vừa được sửa trong danh sách
                    var newCat = $scope.specificproduct
                    $scope.specificproducts.splice(indexEdit, 1, newCat)
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
        if (confirm(`Bạn có chắc chắn muốn xóa ${cos.product.ProName}`)) {
            $http.get('/admin/specificproduct/destroy/'+cos.SpId).then(function (res) {
                if (res.data.check) {
                    var c = $scope.specificproducts.indexOf(cos);
                    $scope.specificproducts.splice(c, 1);
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
        $http.get('/admin/specificproduct/changeStatus/'+idCat).then(function (res) {
                $("#successToast .text-toast").text("Đã lưu thay đổi")
                $("#successToast").toast("show") //hiển thị thông báo thành công
        })
    }





}

