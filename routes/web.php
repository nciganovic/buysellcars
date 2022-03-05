<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdAdminController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarAdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarModelAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SimpleTableAdminController;
use App\Http\Controllers\SocialMediaAdminController;
use App\Http\Controllers\UserAdminController;
use App\Http\Middleware\CheckIsAdmin;
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
Route::get('/carmodels/{id}', [HomeController::class, 'get_carmodels_json'])->name("get_carmodels_json");

Route::get('/ads/{id}', [AdController::class, 'get_ad_by_id'])->name("get_ad_by_id");
Route::post('/ads/favorites/add', [AdController::class, 'set_to_favorites'])->name("set_to_favorites");
Route::get('/ads/favorites/get', [AdController::class, 'get_favorites'])->name("get_favorites")->middleware("auth");

Route::get('/cars/get/{user_id}', [CarController::class, 'get_user_cars'])->name("get_user_cars")->middleware("auth");
Route::get('/cars/create', [CarController::class, 'get_create_user_car'])->name("get_create_user_car")->middleware("auth");
Route::post('/cars/create', [CarController::class, 'post_create_user_car'])->name("post_create_user_car")->middleware("auth");
Route::post('/cars/edit/{id}', [CarController::class, 'post_create_car'])->name("post_create_car")->middleware("auth");
Route::post('/cars/edit/{id}', [CarController::class, 'post_edit_car'])->name("post_edit_car")->middleware("auth");

Route::prefix('account')->group(function () {
    Route::get('/login', [AccountController::class, 'get_login'])->name("get_login");
    Route::post('/login', [AccountController::class, 'post_login'])->name("post_login");
    Route::get('/register', [AccountController::class, 'get_register'])->name("get_register");
    Route::post('/register', [AccountController::class, 'post_register'])->name("post_register");
    Route::get('/logout', [AccountController::class, 'logout'])->name("logout");
    Route::get('/profile/{id}', [AccountController::class, 'get_user_profile'])->name("get_user_profile")->middleware("auth");
});

Route::middleware([CheckIsAdmin::class])->group(function () {
    Route::get('/admin/index', [AdminController::class, 'get_index'])->name("get_admin_index");

    Route::get('/admin/social-media', [SocialMediaAdminController::class, 'get_social_media'])->name("get_admin_social_media");
    Route::get('/admin/social-media/create', [SocialMediaAdminController::class, 'get_create_social_media'])->name("get_create_admin_social_media");
    Route::post('/admin/social-media/create', [SocialMediaAdminController::class, 'post_create_social_media'])->name("post_create_admin_social_media");
    Route::get('/admin/social-media/edit/{id}', [SocialMediaAdminController::class, 'get_edit_social_media'])->name("get_edit_admin_social_media");
    Route::post('/admin/social-media/edit/{id}', [SocialMediaAdminController::class, 'post_edit_social_media'])->name("post_edit_admin_social_media");
    Route::delete('/admin/social-media/delete/{id}', [SocialMediaAdminController::class, 'delete_social_media'])->name("delete_admin_social_media");

    Route::get('/admin/car', [CarAdminController::class, 'get_car'])->name("get_admin_car");
    Route::get('/admin/car/create', [CarAdminController::class, 'get_create_car'])->name("get_create_admin_car");
    Route::post('/admin/car/create', [CarAdminController::class, 'post_create_car'])->name("post_create_admin_car");
    Route::get('/admin/car/edit/{id}', [CarAdminController::class, 'get_edit_car'])->name("get_edit_admin_car");
    Route::post('/admin/car/edit/{id}', [CarAdminController::class, 'post_edit_car'])->name("post_edit_admin_car");
    Route::delete('/admin/car/delete/{id}', [CarAdminController::class, 'delete_car'])->name("delete_admin_car");

    Route::get('/admin/user', [UserAdminController::class, 'get_user'])->name("get_admin_user");
    Route::get('/admin/user/create', [UserAdminController::class, 'get_create_user'])->name("get_create_admin_user");
    Route::post('/admin/user/create', [UserAdminController::class, 'post_create_user'])->name("post_create_admin_user");
    Route::get('/admin/user/edit/{id}', [UserAdminController::class, 'get_edit_user'])->name("get_edit_admin_user");
    Route::post('/admin/user/edit/{id}', [UserAdminController::class, 'post_edit_user'])->name("post_edit_admin_user");
    Route::delete('/admin/user/delete/{id}', [UserAdminController::class, 'delete_user'])->name("delete_admin_user");

    Route::get('/admin/car_model', [CarModelAdminController::class, 'get_car_model'])->name("get_admin_car_model");
    Route::get('/admin/car_model/create', [CarModelAdminController::class, 'get_create_car_model'])->name("get_create_admin_car_model");
    Route::post('/admin/car_model/create', [CarModelAdminController::class, 'post_create_car_model'])->name("post_create_admin_car_model");
    Route::get('/admin/car_model/edit/{id}', [CarModelAdminController::class, 'get_edit_car_model'])->name("get_edit_admin_car_model");
    Route::post('/admin/car_model/edit/{id}', [CarModelAdminController::class, 'post_edit_car_model'])->name("post_edit_admin_car_model");
    Route::delete('/admin/car_model/delete/{id}', [CarModelAdminController::class, 'delete_car_model'])->name("delete_admin_car_model");

    Route::get('/admin/ad', [AdAdminController::class, 'get_ad'])->name("get_admin_ad");
    Route::get('/admin/ad/create', [AdAdminController::class, 'get_create_ad'])->name("get_create_admin_ad");
    Route::post('/admin/ad/create', [AdAdminController::class, 'post_create_ad'])->name("post_create_admin_ad");
    Route::get('/admin/ad/edit/{id}', [AdAdminController::class, 'get_edit_ad'])->name("get_edit_admin_ad");
    Route::post('/admin/ad/edit/{id}', [AdAdminController::class, 'post_edit_ad'])->name("post_edit_admin_ad");
    Route::delete('/admin/ad/delete/{id}', [AdAdminController::class, 'delete_ad'])->name("delete_admin_ad");

    Route::get('/admin/{table}', [SimpleTableAdminController::class, 'get_simple_table'])->name("get_admin_simple_table");
    Route::get('/admin/{table}/create', [SimpleTableAdminController::class, 'get_create_simple_table'])->name("get_create_admin_simple_table");
    Route::post('/admin/{table}/create', [SimpleTableAdminController::class, 'post_create_simple_table'])->name("post_create_admin_simple_table");
    Route::get('/admin/{table}/edit/{id}', [SimpleTableAdminController::class, 'get_edit_simple_table'])->name("get_edit_admin_simple_table");
    Route::post('/admin/{table}/edit/{id}', [SimpleTableAdminController::class, 'post_edit_simple_table'])->name("post_edit_admin_simple_table");
    Route::delete('/admin/{table}/delete/{id}', [SimpleTableAdminController::class, 'delete_simple_table'])->name("delete_admin_simple_table");
});


