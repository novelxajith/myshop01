<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; // Fix the uppercase "C"
use App\Http\Controllers\LoginRegisterController;

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


// Ecommerce route
Route::middleware(['user'])->group(function () {

Route::get('/product_details', [\App\Http\Controllers\Controller::class, 'product_details'])->name('product_details');
Route::get('/products', [\App\Http\Controllers\Controller::class, 'products'])->name('products');
Route::get('/checkout', [\App\Http\Controllers\Controller::class, 'checkout'])->name('checkout');
Route::get('/cart', [\App\Http\Controllers\Controller::class, 'cart'])->name('cart');
Route::get('/main', [\App\Http\Controllers\Controller::class, 'main'])->name('main');
Route::get('/product', [\App\Http\Controllers\Controller::class, 'product'])->name('product');
Route::middleware(['user.logout:u'])->get('/logout/user', 'Auth\LoginRegisterController@logout_user')->name('user.logout');
});
Route::get('/', [\App\Http\Controllers\Controller::class, 'index'])->name('index');
Route::get('/signin', [\App\Http\Controllers\Controller::class, 'signin'])->name('signin');
Route::get('/signup', [\App\Http\Controllers\Controller::class, 'signup'])->name('signup');
Route::post('/ecommerce_login', [\App\Http\Controllers\LoginRegisterController::class, 'ecommerce_login'])->name('ecommerce_login');


// admin route
Route::middleware(['admin','auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('indexx');
    Route::get('/add_product', [\App\Http\Controllers\AdminController::class, 'add_product'])->name('add_product');
    Route::get('/product_list', [\App\Http\Controllers\AdminController::class, 'product_list'])->name('product_list');
    Route::get('/orders', [\App\Http\Controllers\AdminController::class, 'orders'])->name('orders');
    Route::get('/order_details', [\App\Http\Controllers\AdminController::class, 'order_details'])->name('order_details');
    Route::get('/add_category', [\App\Http\Controllers\AdminController::class, 'add_category'])->name('add_category');

    
    //Route::middleware(['admin.logout:a'])->get('/logout/admin', 'Auth\LoginRegisterController@logout_admin')->name('admin.logout');
   Route::post('/logout', [\App\Http\Controllers\LoginRegisterController::class, 'admin_logout'])->name('admin_logout');

   Route::post('/main_post', [\App\Http\Controllers\AdminProductController::class, 'main_category_post'])->name('main_category_post');
   Route::post('/sub_post', [\App\Http\Controllers\AdminProductController::class, 'sub_category_post'])->name('sub_category_post');
   Route::post('/create_product', [\App\Http\Controllers\AdminProductController::class, 'create_product_post'])->name('create_product_post');
   Route::post('/gallery_upload', [\App\Http\Controllers\AdminProductController::class, 'gallery_upload_post'])->name('gallery_upload_post');

});
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'signin'])->name('adminSignin');
Route::post('/adminLogin', [\App\Http\Controllers\LoginRegisterController::class, 'admin_login'])->name('admin_login');












//user route
Route::get('vendor/', [\App\Http\Controllers\VendorController::class, 'index'])->name('vendorindex');
Route::get('vendor/dashboard', [\App\Http\Controllers\VendorController::class, 'dashboard'])->name('vendordashboard');

//login post
//Route::get('login_post', [\App\Http\Controllers\LoginRegisterController::class, 'login'])->name('login_post');
Route::post('/login_', [\App\Http\Controllers\LoginRegisterController::class, 'login'])->name('login_post');

Route::post('/logout', [\App\Http\Controllers\LoginRegisterController::class, 'logout'])->name('logout');
