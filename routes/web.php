<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\ProfileController;

Route::get('/', function () {
    return view('backend.auth.login');
});


// Route::view('admin', 'backend.dashboard');


// for posts
Route::view('admin/post', 'backend.posts.index-post')->name('admin.allpost');
// Route::view('admin/edit-post', 'backend.posts.index-post')->name('admin.allpost');

// auth
Route::get('/admin-login',[AuthController::class,'getLogin'])->name('login');
Route::post('/admin-login',[AuthController::class,'postLogin'])->name('admin.login');

// logout
Route::get('/admin-logout',[AuthController::class,'getLogOut'])->name('logout');


//user profile
Route::get('/user/register',[ProfileController::class,'createUser'])->name('user.login');
Route::get('/user/show-users',[ProfileController::class,'allUser'])->name('user.all');
Route::post('/user/register',[ProfileController::class,'register'])->name('user.register');
Route::get('/dashboard',[ProfileController::class,'checkDashboard'])->name('user.dashboard');


// connecting custom routes
Route::group([],base_path('routes/admin.php'));
