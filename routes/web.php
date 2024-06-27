<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::view('admin', 'backend.dashboard');

// for posts
Route::view('admin/post', 'backend.posts.index-post')->name('admin.allpost');
// Route::view('admin/edit-post', 'backend.posts.index-post')->name('admin.allpost');

// connecting custom routes
Route::group([],base_path('routes/admin.php'));
