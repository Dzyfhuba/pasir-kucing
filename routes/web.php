<?php

use App\Http\Controllers\AboutUsController as AdminAboutUsController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:admin'])->prefix('/admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin');

    Route::get('aboutus/{sub}', [AdminAboutUsController::class, 'index'])->name('admin.about-us');
    Route::post('aboutus/{sub}/store', [AdminAboutUsController::class, 'store'])->name('admin.about-us.store');
    Route::put('aboutus/{sub}/update', [AdminAboutUsController::class, 'update'])->name('admin.about-us.update');
    Route::delete('aboutus/cert/{sub}/delete', [AdminAboutUsController::class, 'destroy'])->name('admin.about-us.cert.delete');
});
