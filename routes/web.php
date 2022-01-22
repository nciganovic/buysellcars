<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'get_index'])->name("get_home_index");
Route::get('/admin/index', [AdminController::class, 'get_index'])->name("get_admin_index");
Route::get('/admin/social-media', [AdminController::class, 'get_social_media'])->name("get_admin_social_media");
Route::get('/admin/social-media/create', [AdminController::class, 'get_create_social_media'])->name("get_create_admin_social_media");
Route::post('/admin/social-media/create', [AdminController::class, 'post_create_social_media'])->name("post_create_admin_social_media");
Route::get('/admin/social-media/edit/{id}', [AdminController::class, 'get_edit_social_media'])->name("get_edit_admin_social_media");
Route::post('/admin/social-media/edit/{id}', [AdminController::class, 'post_edit_social_media'])->name("post_edit_admin_social_media");
Route::delete('/admin/social-media/delete/{id}', [AdminController::class, 'delete_social_media'])->name("delete_admin_social_media");