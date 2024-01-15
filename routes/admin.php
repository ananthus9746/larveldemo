<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ControlPanel\ProductController;
use App\Http\Controllers\ControlPanel\CategoryController;
use App\Http\Controllers\ControlPanel\SubCategoryController;
use App\Http\Controllers\ControlPanel\FinishController;
use App\Http\Controllers\ControlPanel\ColorController;
use App\Http\Controllers\ControlPanel\SizeController;
use App\Http\Controllers\ControlPanel\PageController;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:admin'])->group(function () {

    Route::get('/', function () {
        return view('control-panel.index');
    });

    Route::get('/forget-password', function () {
        return view('control-panel.forget-password');
    });

    Route::post('/forget-password', [AdminController::class, 'forget_password']);

    Route::get('/reset-password/{token}', [AdminController::class, 'reset_password']);

    Route::get('/logout', [AdminController::class, 'logout']);
    
    Route::get('/profile', [AdminController::class, 'show_profile_form']);
    Route::get('/change-password', [AdminController::class, 'show_change_password_form']);
    Route::post('/change-profile-image', [AdminController::class, 'change_profile_image']);
    Route::post('/update-profile', [AdminController::class, 'update_profile']);

    Route::post('/change-password', [AdminController::class, 'change_password']);

    Route::get('/get_category_records', [CategoryController::class, 'get_records']);
    Route::apiResources(['categories' => CategoryController::class]);

    Route::get('/get_sub_category_records', [SubCategoryController::class, 'get_records']);
    Route::get('/get_sub_category_options', [SubCategoryController::class, 'get_options']);
    Route::apiResources(['sub-categories' => SubCategoryController::class]);

    Route::get('/get_finish_records', [FinishController::class, 'get_records']);
    Route::apiResources(['finishes' => FinishController::class]);

    Route::get('/get_color_records', [ColorController::class, 'get_records']);
    Route::apiResources(['colors' => ColorController::class]);

    Route::get('/get_size_records', [SizeController::class, 'get_records']);
    Route::apiResources(['sizes' => SizeController::class]);

    Route::get('/get_page_records', [PageController::class, 'get_records']);
    Route::apiResources(['pages' => PageController::class]);

    Route::get('/get_product_records', [ProductController::class, 'get_records']);
    Route::post('/update-product', [ProductController::class, 'update']);
    Route::apiResources(['products' => ProductController::class]);

    Route::get('/comments', function () {
        return view('control-panel.comment');
    });
    
    Route::get('/profile', [AdminController::class, 'show_profile_form']);
    
});


Route::middleware(['guest:admin'])->group(function () {

    Route::get('/login', [AdminController::class, 'show_login_form'])->name('login');
    Route::post('login', [AdminController::class, 'login']);

    Route::get('/forgot-password', [AdminController::class, 'show_forgot_password_form']);
    Route::post('/forgot-password', [AdminController::class, 'forgot_password']);

    Route::get('/reset-password', [AdminController::class, 'show_reset_password_form']);
    Route::post('/reset-password', [AdminController::class, 'reset_password']);
});
