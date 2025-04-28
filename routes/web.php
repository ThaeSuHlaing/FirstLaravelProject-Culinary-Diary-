<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminBlogController;

Route::get('/', [BlogController::class,'index']);

Route::get('/blogs/{blog:slug}',[BlogController::class,'show']);

Route::get('/register', [AuthController::class,'create'])->middleware('guest');

Route::post('/register', [AuthController::class,'store'])->middleware('guest');

Route::post('/logout', [AuthController::class,'logout'])->middleware('auth');

Route::get('/login', [AuthController::class,'login'])->middleware('guest');

Route::post('/login',[AuthController::class,'post_login'])->middleware('guest');

Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store']);

Route::post('/blogs/{blog:slug}/subscription',[BlogController::class,'subscriptionHandler']);

Route::middleware('can:admin')->group(function ()
{
    Route::get('/admin/blogs',[AdminBlogController::class,'index']);

    Route::get('/admin/blogs/create',[AdminBlogController::class,'create']);

    Route::post('/admin/blogs/store',[AdminBlogController::class,'store']);

    Route::delete('/admin/blogs/{blog:slug}/delete',[AdminBlogController::class,'destroy']);

    Route::get('/admin/blogs/{blog:slug}/edit',[AdminBlogController::class,'edit']);

    Route::patch('/admin/blogs/{blog:slug}/update',[AdminBlogController::class,'update']);
});