<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\FrontEnd\IndexController;
use App\Http\Controllers\FrontEnd\LanguageController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function(){
    route::get('/login', [AdminController::class, 'loginForm']);
    route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware('auth:admin')->group(function(){

    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard')->middleware('auth:admin');

    // ============= Admin All Route =================
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    // Admin Profile
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/admin/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::get('/admin/profile/password', [AdminProfileController::class, 'password'])->name('admin.profile.password');
    Route::post('/admin/profile/password/update', [AdminProfileController::class, 'passwordUpdate'])->name('admin.profile.password.update');

});// End Admin middleware

// Brand route
Route::group(['prefix'=>'brand'], function(){
    Route::get('/manage-brand', [BrandController::class, 'index'])->name('brand');
    Route::post('/get-brand-data', [BrandController::class, 'getBrandData'])->name('brand.data.get');
    Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'update'])->name('brand.update');
    Route::post('/delete', [BrandController::class, 'delete'])->name('brand.delete');
});
// Category route
Route::group(['prefix'=>'category'], function(){
    Route::get('/manage-category', [CategoryController::class, 'index'])->name('category');
    Route::post('/get-category-data', [CategoryController::class, 'getCategoryData'])->name('category.data.get');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/delete', [CategoryController::class, 'delete'])->name('category.delete');
    // Sub category
    Route::get('/manage-sub-category', [SubCategoryController::class, 'index'])->name('sub.category');
    Route::post('/get-sub-category-data', [SubCategoryController::class, 'getSubCategoryData'])->name('sub.category.data.get');
    Route::post('/sub/store', [SubCategoryController::class, 'store'])->name('sub.category.store');
    Route::get('sub/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub.category.edit');
    Route::post('sub/update', [SubCategoryController::class, 'update'])->name('sub.category.update');
    Route::post('sub/delete', [SubCategoryController::class, 'delete'])->name('sub.category.delete');
    // Sub category
    Route::get('/manage-sub-sub-category', [SubSubCategoryController::class, 'index'])->name('sub.sub.category');
    Route::post('/get-sub-sub-category-data', [SubSubCategoryController::class, 'getSubSubCategoryData'])->name('sub.sub.category.data.get');
    Route::post('/sub/sub/store', [SubSubCategoryController::class, 'store'])->name('sub.sub.category.store');
    Route::get('sub/sub/edit/{id}', [SubSubCategoryController::class, 'edit'])->name('sub.sub.category.edit');
    Route::post('sub/sub/update', [SubSubCategoryController::class, 'update'])->name('sub.sub.category.update');
    Route::post('/sub-category/ajax', [SubSubCategoryController::class, 'addSubCategoryAjax'])->name('add.subcategory.ajax');
    Route::post('sub/sub/delete', [SubSubCategoryController::class, 'delete'])->name('sub.sub.category.delete');
});
// product route
Route::group(['prefix'=>'product'], function(){
    Route::get('/manage-product', [ProductController::class, 'index'])->name('product');
    Route::post('/get-product-data', [ProductController::class, 'getProductData'])->name('product.data.get');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update', [ProductController::class, 'update'])->name('product.update');
    Route::post('/multi-image-add', [ProductController::class, 'multImageAdd'])->name('product.multi.image.add');
    Route::post('/multi-image-update', [ProductController::class, 'multImageUpdate'])->name('product.multi.image.update');
    Route::post('/multi-image-delete', [ProductController::class, 'multImageDelete'])->name('product.multi.image.delete');
    Route::post('/thumbnail-update', [ProductController::class, 'thumbnailUpdate'])->name('product.thumbnail.update');
    Route::get('/inactive/{id}', [ProductController::class, 'inactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'active'])->name('product.active');
    Route::post('/get-subsubcategory/ajax', [ProductController::class, 'getSubSubCategoryAjax'])->name('get.subsubcategory.ajax');
    Route::post('/delete', [ProductController::class, 'delete'])->name('product.delete');
});
// Brand route
Route::group(['prefix'=>'slider'], function(){
    Route::get('/manage-slider', [SliderController::class, 'index'])->name('slider');
    Route::post('/get-slider-data', [SliderController::class, 'getSliderData'])->name('slider.data.get');
    Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/update', [SliderController::class, 'update'])->name('slider.update');
    Route::post('/delete', [SliderController::class, 'delete'])->name('slider.delete');
    Route::get('/inactive/{id}', [SliderController::class, 'inactive'])->name('slider.inactive');
    Route::get('/active/{id}', [SliderController::class, 'active'])->name('slider.active');
});

// ================= Frontend all routes ================
// User routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', [IndexController::class, 'userDashboard'])->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/user/logout', [IndexController::class, 'userLogout'])->name('user.logout');
// User profile update
Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'userProfileStore'])->name('user.profile.store');
// User password update
Route::get('/user/password', [IndexController::class, 'userPassword'])->name('user.password');
Route::post('/user/password/update', [IndexController::class, 'userPasswordUpdate'])->name('user.password.update');

// Language routes
Route::get('/language/bangla', [LanguageController::class, 'bangla'])->name('bangla.language');
Route::get('/language/english', [LanguageController::class, 'english'])->name('english.language');

// Product single page routes
Route::get('/product/single/{id}/{slug}', [IndexController::class, 'productSinglePage']);
Route::get('/product/tag/{tag}', [IndexController::class, 'tagWiseProductShow']);

