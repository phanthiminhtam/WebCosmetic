<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CosmeticLineController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\SpecificproductController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InfoCustomerController;
use App\Http\Controllers\LoginClientController;
use App\Http\Controllers\ReviewController;
use App\Models\CosmeticLine;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\RoleController;

Route::middleware(['auth'])->group(function () {

   

    Route::get('/admin/index',[HomeController::class,'ThongKe'])->name("home2.index");
    Route::get('/',[HomeController::class,'ThongKe'])->name("home2.index");
    // Route::get('/', function () {
    //     return view('admin.index');
    // })->name("home2.index");



    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    //Product
    Route::get("Admin",[ProductController::class],'Product');
    Route::get('/admin/product', [ProductController::class,'index']) ->name('admin.Product');
    Route::get('/admin/product/getPageData', [ProductController::class,'getPageData']);
    Route::get('/admin/product/getById/{id}',[ProductController::class,'getById']);
    Route::post('/admin/product/create', [ProductController::class,'create']);
    Route::post('/admin/product/update/{id}', [ProductController::class,'update']);
    Route::get('/admin/product/destroy/{id}', [ProductController::class,'destroy']);
    Route::get('/admin/productdetail/{id}', [ProductController::class,'chitietSP'])->name('home2.productDetail');

    //category
    Route::get('/admin/Category/index', [CategoryController::class,'index'] )->name("home2.Category.index");
    Route::get('/admin/Category/{id}/del', [CategoryController::class,'destroy'] )->name("home2.Category.del");
    Route::get('/admin/Category/{id}/edit', [CategoryController::class,'edit'] )->name("home2.Category.edit");
    Route::post('/admin/Category/{id}/save', [CategoryController::class,'save'] )->name("home2.Category.save");
    Route::get("admin/Category/create",[CategoryController::class,'create'])->name("home2.Category.create");
    Route::post("admin/Category/save",[CategoryController::class,'store'])->name("home2.Category.save2");
});



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
//User

Route::get('/index', function () {
    return view('index');
})->name("home.index");

Route::get('/shop', function () {
    return view('shop');
})->name("home.shop");

Route::get('/productdetail', function () {
    return view('productdetail');
})->name("home.productdetail");

Route::get('/aboutus', function () {
    return view('aboutus');
})->name("home.aboutus");

Route::get('/contactus', function () {
    return view('contactus');
})->name("home.contactus");

Route::get('/csdoitra', function () {
    return view('csdoitra');
})->name("home.csdoitra");

Route::get('/cart', function () {
    return view('cart');
})->name("home.cart");

Route::get('/wishlist', function () {
    return view('wishlist');
})->name("home.wishlist");

Route::get('/checkout', [OrderController::class,'checkoutview'])->name("home.checkout");

Route::get('/myaccount', function () {
    return view('myaccount');
})->name("home.myaccount");



Route::get('/index/registration', function () {
    return view('registration');
})->name("home.registration");

// Route::get('/loaimypham', function () {
//     return view('loaimypham');
// })->name("home.loaimypham");


Route::get('/index', [SpecificproductController::class,'spList'] )->name("home.index");
Route::get('/productdetail/{id}', [SpecificproductController::class,'chitietSP'])->name("home.productdetail");
Route::get('/loaimypham/{id}', [SpecificproductController::class,'loaiSP'])->name("home.loaimypham");



Route::get('/add_to_cart/{id}', [SpecificproductController::class,'addToCart'])->name("add_to_cart");
Route::delete('remove-from-cart', [SpecificproductController::class,'remove'])->name("remove_from_cart");
Route::post('update-cart', [SpecificproductController::class,'updateCart'])->name("update_cart");

Route::get('/add_to_wishlist/{id}', [SpecificproductController::class,'addToWishList'])->name("add_to_wishlist");
Route::delete('remove-wishlist', [SpecificproductController::class,'removeWL'])->name("remove_wishlist");



//checkout
Route::post("/checkout/save",[OrderController::class,'checkout'])->name("home.checkout.save");
Route::get("/successfull/{id}",[OrderController::class,'showSucessfull'])->name("home.successfull");


Route::get("/chitietdonhang/{id}",[OrderController::class,'successfull'])->name("home.chitietdonhang");
Route::get("/getInfo/{id}",[InfoCustomerController::class,'getInfo'])->name("home.getInfo");
Route::get("/search/{id}",[HomeController::class,'search']);


Route::post("/timkiem",[ProductController::class,'ListName'])->name("home.timkiem");
// Route::get('/', [SpecificproductController::class,'spkmList'] )->name("home.index");
// Route::get('/', [CategoryController::class,'cosmeticlineList'] )->name("home.index");

//Admin



//Đăng nhập customer


// Route::get('/index/login2', function () {
//     return view('login2');
// })->name("home.login2");

// Route::get('/login', [CustomerController::class,'index'] );

Route::get('/thongke-donhang',[HomeController::class,'thongKeDonHang'])->name('thongke.donhang');
Route::post('/check', [CustomerController::class,'check'] )->name("check_customer");

// Route::get('/registration', [CustomerController::class,'create'] )->name("home.Registration");
// Route::post('/register/save', [CustomerController::class,'store'] )->name("register");
Route::get('/register/registerView', [LoginClientController::class,'registerView'] )->name("client.registerView");
Route::get('/register/loginView', [LoginClientController::class,'loginView'] )->name("client.loginView");
Route::get('/register/logout', [LoginClientController::class,'logout'] )->name("client.logout");

Route::post('/register/register', [LoginClientController::class,'register'] )->name("client.register");
Route::post('/register/login', [LoginClientController::class,'login'] )->name("client.login");
Route::middleware('auth')->group(function(){
    Route::get('/index2',function(){
        return view('admin.index')->name("admin.index2");
    });
});


Route::get('/admin/Category/index', [CategoryController::class,'index'] )->name("home2.Category.index");
Route::get('/admin/Category/{id}/del', [CategoryController::class,'destroy'] )->name("home2.Category.del");
Route::get('/admin/Category/{id}/edit', [CategoryController::class,'edit'] )->name("home2.Category.edit");
Route::post('/admin/Category/{id}/save', [CategoryController::class,'save'] )->name("home2.Category.save");
Route::get("admin/Category/create",[CategoryController::class,'create'])->name("home2.Category.create");
Route::post("admin/Category/save",[CategoryController::class,'store'])->name("home2.Category.save2");


/**CosmeticLine */
Route::get("Admin",[CosmeticLineController::class],'CosmeticLine');
Route::get('/admin/cosmeticline', [CosmeticLineController::class,'index']) ->name('admin.CosmeticLine');
Route::get('/admin/cosmeticline/getPageData', [CosmeticLineController::class,'getPageData']);
Route::get('/admin/cosmeticline/getById/{id}',[CosmeticLineController::class,'getById']);
Route::post('/admin/cosmeticline/create', [CosmeticLineController::class,'create']);
Route::post('/admin/cosmeticline/update/{id}', [CosmeticLineController::class,'update']);
Route::get('/admin/cosmeticline/destroy/{id}', [CosmeticLineController::class,'destroy']);
//Route::get('/admin/cosmeticline/changeStatus/{id}', [CosmeticLineController::class,'changeStatus']);





//SpecificProduct
Route::get("Admin",[SpecificproductController::class],'Specificproduct');
Route::get('/admin/specificproduct', [SpecificproductController::class,'index']) ->name('admin.Specificproduct');
Route::get('/admin/specificproduct/getPageData', [SpecificproductController::class,'getPageData']);
Route::get('/admin/specificproduct/getById/{id}',[SpecificproductController::class,'getById']);
Route::post('/admin/specificproduct/create', [SpecificproductController::class,'create']);
Route::post('/admin/specificproduct/update/{id}', [SpecificproductController::class,'update']);
Route::get('/admin/specificproduct/destroy/{id}', [SpecificproductController::class,'destroy']);


//New
Route::get('/News/index', [NewsController::class,'NewList'])->name("home.News");
Route::get('/News/{id}/detail', [NewsController::class,'detail'] )->name("home.News.detail");
Route::get('/admin/News/index', [NewsController::class,'newsList'] )->name("home2.News.index");
Route::get('/admin/News/{id}/del', [NewsController::class,'destroy'] )->name("home2.News.del");
Route::get('/admin/News/{id}/edit', [NewsController::class,'edit'] )->name("home2.News.edit");
Route::post('/admin/News/{id}/save', [NewsController::class,'save'] )->name("home2.News.save");
Route::get("admin/News/create",[NewsController::class,'create'])->name("home2.News.create");
Route::post("admin/News/save",[NewsController::class,'store'])->name("home2.News.save2");

//Staff
Route::get("Admin",[StaffController::class],'Staff');
Route::get('/admin/staff', [StaffController::class,'index']) ->name('admin.Staff');
Route::get('/admin/staff/getPageData', [StaffController::class,'getPageData']);
Route::get('/admin/staff/getById/{id}',[StaffController::class,'getById']);
Route::post('/admin/staff/create', [StaffController::class,'create']);
Route::post('/admin/staff/update/{id}', [StaffController::class,'update']);
Route::get('/admin/staff/destroy/{id}', [StaffController::class,'destroy']);

//Provider
Route::get("Admin",[ProviderController::class],'Provider');
Route::get('/admin/Provider/index', [ProviderController::class,'providerList'] )->name("home2.Provider.index");
Route::get('/admin/Provider/{id}/del', [ProviderController::class,'destroy'] )->name("home2.Provider.del");
Route::get('/admin/Provider/{id}/edit', [ProviderController::class,'edit'] )->name("home2.Provider.edit");
Route::post('/admin/Provider/{id}/save', [ProviderController::class,'save'] )->name("home2.Provider.save");
Route::get("admin/Provider/create",[ProviderController::class,'create'])->name("home2.Provider.create");
Route::post("admin/Provider/save",[ProviderController::class,'store'])->name("home2.Provider.save2");

//Contact

Route::get('/admin/Contact/index', [ContactController::class,'Index'] )->name("home2.Contact.index");
Route::get('/admin/Contact/{id}/detail', [ContactController::class,'ctContact'] )->name("home2.Contact.detail");

//Review
Route::post('/Review/storeRV', [ReviewController::class,'storeRV'])->name("home.sendRV");
Route::get('/admin/Review/index', [ReviewController::class,'Index'] )->name("home2.review.index");
//order

Route::get('/admin/order/index', [OrderController::class,'index'] )->name("home2.Order.index");

Route::get('/admin/order/index1', [OrderController::class,'index1'] )->name("home2.Order.index1");

Route::get('/admin/order/index2', [OrderController::class,'index2'] )->name("home2.Order.index2");

Route::get('/admin/order/{id}/detail', [OrderController::class,'detail'] )->name("home2.Order.detail");

Route::get('/admin/News/{id}/edit', [NewsController::class,'edit'] )->name("home2.News.edit");
Route::post('/admin/News/{id}/save', [NewsController::class,'save'] )->name("home2.News.save");
Route::get("admin/News/create",[NewsController::class,'create'])->name("home2.News.create");
Route::post("admin/News/save",[NewsController::class,'store'])->name("home2.News.save2");


//customer
Route::get('/admin/Customer/index', [CustomerController::class,'indexAdmin'] )->name("home2.Customer.index");
Route::get('/admin/Customer/{id}/del', [CustomerController::class,'destroy'] )->name("home2.Customer.del");


