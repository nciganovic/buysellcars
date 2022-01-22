<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SimpleTableAdminController;
use App\Http\Controllers\SocialMediaAdminController;
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

Route::get('/admin/social-media', [SocialMediaAdminController::class, 'get_social_media'])->name("get_admin_social_media");
Route::get('/admin/social-media/create', [SocialMediaAdminController::class, 'get_create_social_media'])->name("get_create_admin_social_media");
Route::post('/admin/social-media/create', [SocialMediaAdminController::class, 'post_create_social_media'])->name("post_create_admin_social_media");
Route::get('/admin/social-media/edit/{id}', [SocialMediaAdminController::class, 'get_edit_social_media'])->name("get_edit_admin_social_media");
Route::post('/admin/social-media/edit/{id}', [SocialMediaAdminController::class, 'post_edit_social_media'])->name("post_edit_admin_social_media");
Route::delete('/admin/social-media/delete/{id}', [SocialMediaAdminController::class, 'delete_social_media'])->name("delete_admin_social_media");

Route::get('/admin/{table}', [SimpleTableAdminController::class, 'get_simple_table'])->name("get_admin_simple_table");
Route::get('/admin/{table}/create', [SimpleTableAdminController::class, 'get_create_simple_table'])->name("get_create_admin_simple_table");
Route::post('/admin/{table}/create', [SimpleTableAdminController::class, 'post_create_simple_table'])->name("post_create_admin_simple_table");
Route::get('/admin/{table}/edit/{id}', [SimpleTableAdminController::class, 'get_edit_simple_table'])->name("get_edit_admin_simple_table");
Route::post('/admin/{table}/edit/{id}', [SimpleTableAdminController::class, 'post_edit_simple_table'])->name("post_edit_admin_simple_table");
Route::delete('/admin/{table}/delete/{id}', [SimpleTableAdminController::class, 'delete_simple_table'])->name("delete_admin_simple_table");
