<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WhatsNewController;
use App\Http\Controllers\ControlPanel\SubCategoryController;

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

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/get_products', [ProductController::class, "get_products"]);
Route::get('/get_sub_category_options', [SubCategoryController::class, 'get_options']);

Route::get('/products/{category_id?}/{sub_category_id?}/{color_id?}', [ProductController::class, "index"]);

Route::get('/product/{slug}', [ProductController::class, "single_product"]);

Route::get('/whats-new/', [WhatsNewController::class, "index"]);

Route::post('/like-post/', [WhatsNewController::class, "like_post"]);

Route::post('/dislike-post/', [WhatsNewController::class, "dislike_post"]);

Route::get('/whats-new/{slug}', [WhatsNewController::class, "single_post"]);


Route::get('/why-us', function () {
    return view('frontend.why-us');
});

Route::get('/about-us', function () {
    return view('frontend.about-us');
});

Route::get('/contact-us', function () {
    return view('frontend.contact-us');
});

Route::get('/whats-new-single', function () {
    return view('frontend.whats-new-single');
});
