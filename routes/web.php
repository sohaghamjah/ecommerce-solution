<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\FrontEnd\IndexController;
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

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

// ============= Admin All Route =================
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
// Admin Profile
Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
Route::post('/admin/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
Route::get('/admin/profile/password', [AdminProfileController::class, 'password'])->name('admin.profile.password');
Route::post('/admin/profile/password/update', [AdminProfileController::class, 'passwordUpdate'])->name('admin.profile.password.update');


// ================= User all routes ================
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


