<?php

use App\Http\Controllers\Admin\AboutUsController as AdminAboutUsController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ClientCateController as AdminClientCateController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use App\Http\Controllers\Admin\PortfolioCateController as AdminPortfolioCateController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('offer', [HomeController::class, 'offer'])->name('offer');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('service', [HomeController::class, 'service'])->name('service');
Route::get('service/{id}', [HomeController::class, 'serviceDetail'])->name('service.show');
Route::get('product', [HomeController::class, 'product'])->name('product');
Route::get('portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('client', [HomeController::class, 'client'])->name('client');

Route::middleware(['auth', 'role:admin'])->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('index');

    Route::get('aboutus/{sub}', [AdminAboutUsController::class, 'index'])->name('about-us');
    Route::post('aboutus/{sub}/store', [AdminAboutUsController::class, 'store'])->name('about-us.store');
    Route::put('aboutus/{sub}/update', [AdminAboutUsController::class, 'update'])->name('about-us.update');
    Route::delete('aboutus/cert/{sub}/delete', [AdminAboutUsController::class, 'destroy'])->name('about-us.cert.delete');

    Route::resource('contact', AdminContactController::class);
    Route::resource('service', AdminServiceController::class);
    Route::resource('product', AdminProductController::class);
    Route::resource('clientcate', AdminClientCateController::class);
    Route::resource('client', AdminClientController::class);
    Route::resource('portfoliocate', AdminPortfolioCateController::class);
    Route::resource('portfolio', AdminPortfolioController::class);
});
