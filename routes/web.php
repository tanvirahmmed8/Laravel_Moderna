<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\HeaderController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\backend\BackportfolioController;
use App\Http\Controllers\frontend\UserRegisterController;
use App\Http\Controllers\backend\PortfoliocategoryController;

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
Route::name('frontend.')->group(function(){

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/portfolio', [FrontendController::class, 'portfolioshow'])->name('portfolio');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog-single/{slug}', [FrontendController::class, 'blogSingleView'])->name('blog.single');
Route::get('/user/register' , [UserRegisterController::class , 'index'])->name('register');
Route::post('/user/register' , [UserRegisterController::class , 'store'])->name('registerstore');


});

Auth::routes();

Route::middleware('auth', 'CheckRole')->name('backend.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
    Route::resource('banner', BannerController::class); 
    Route::resource('portfolio-category', PortfoliocategoryController::class);
    Route::resource('portfoliopost', BackportfolioController::class); 
    Route::get('portfoliopost/{id}/status' , [BackportfolioController::class ,'status'])->name('status');
    Route::resource('category', CategoryController::class);
    Route::resource('post', PostController::class);
    Route::get('post/{id}/restore', [PostController::class, 'restore'])->name('post.restore');
    Route::get('post/{id}/permanentDelete', [PostController::class, 'permanentDelete'])->name('post.permanentDelete');
    Route::get('change-logo', [HeaderController::class, 'index'])->name('header.index');
    Route::post('change-logo/a', [HeaderController::class, 'store'])->name('header.store');
    Route::get('change-logo/{id}', [HeaderController::class, 'edit'])->name('header.edit');
    Route::post('change-logo/update/{id}', [HeaderController::class, 'update'])->name('header.update');

});
 
Route::get('user/dashboard', [DashboardController::class, 'userindex'])->name('user.dashboard');