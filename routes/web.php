<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AuthController;

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

// connecting custom routes
Route::group([],base_path('routes/admin.php'));
