<?php

use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\OptionsController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\PostCategoryController;


//  /admin/<URL>


// for posts
Route::prefix('admin')->middleware(ValidUser::class)->group(function(){

    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');

    // options
    Route::get('options',[OptionsController::class,'index'])->name('admin.options.index');
    Route::post('options',[OptionsController::class,'store'])->name('admin.options.store');

    // posts
    Route::get('post',[PostController::class,'index'])->name('admin.post.index');
    Route::get('post/create',[PostController::class,'create'])->name('admin.post.create');
    Route::post('post/create',[PostController::class,'store'])->name('admin.post.store');
    Route::get('post/{id}/edit',[PostController::class,'edit'])->name('admin.post.edit');
    Route::post('post/{id}/edit',[PostController::class,'update'])->name('admin.post.update');
    Route::get('post/{id}/delete',[PostController::class,'destroy'])->name('admin.post.destroy');


    // post category
    Route::get('post-category',[PostCategoryController::class,'index'])->name('admin.post.category.index');
    Route::get('post-category/create',[PostCategoryController::class,'create'])->name('admin.post.category.create');
    Route::post('post-category/create',[PostCategoryController::class,'store'])->name('admin.post.category.store');
    Route::get('post-category/{id}/edit',[PostCategoryController::class,'edit'])->name('admin.post.category.edit');
    Route::post('post-category/{id}/edit',[PostCategoryController::class,'update'])->name('admin.post.category.update');
    Route::get('post-category/{id}/delete',[PostCategoryController::class,'destroy'])->name('admin.category.post.destroy');

     // Pages
    Route::get('page',[PageController::class,'index'])->name('admin.page.index');
    Route::get('page/create',[PageController::class,'create'])->name('admin.page.create');
    Route::post('page/create',[PageController::class,'store'])->name('admin.page.store');
    Route::get('page/{id}/edit',[PageController::class,'edit'])->name('admin.page.edit');
    Route::post('page/{id}/edit',[PageController::class,'update'])->name('admin.page.update');
    Route::get('page/{id}/delete',[PageController::class,'destroy'])->name('admin.page.destroy');

});
