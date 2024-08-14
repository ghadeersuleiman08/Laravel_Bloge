<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\RequestsController;


Route::get('/greeting/{locale}', function (string $locale) {
    if (! in_array($locale, ['en', 'es', 'fr'])) {
        abort(400);
    }

    App::setLocale($locale);
});


Route::get('/', [SiteController::class, 'home'])->name('home');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_check'])->name('login_check');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/news/{id}', [SiteController::class, 'details'])->name('details');
Route::get('/news/categorypost/{id}', [SiteController::class, 'category_post'])->name('category.post');
Route::get('/requests', [RequestsController::class, 'index'])->name('dashboard.requests.index');


Route::group([
    'prefix' => '/dashboard',
    'middleware' => ['IsAdmin'],
    'as' => 'dashboard.'
], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // ===== Upload Image With FillPond ===== //
    Route::post('/upload', [UploadController::class, 'upload_image'])->name('upload'); // author للكاتب 
    Route::post('/upload/blogs', [UploadController::class, 'upload_image_blog'])->name('upload.blogs'); // blog للمدونة    
    Route::post('/upload/categories', [UploadController::class, 'upload_image_category'])->name('upload.categories'); // category للتصنيفات
    // ====================================== //

    Route::resource('blogs', BlogsController::class);
    Route::resource('authors', AuthorsController::class);
    Route::resource('categories', CategoriesController::class);
});
