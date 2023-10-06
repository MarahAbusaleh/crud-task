<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
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

Route::get('/login', function () {
    return view('Admin.login');
})->name('login');

Route::post('/AdminLogin', [AdminController::class, 'AdminLogin'])->name('AdminLogin');

Route::group(['middleware' => 'adminMiddleware'], function () {

    Route::get('/AdminLogout', [AdminController::class, 'logout'])->name('AdminLogout');

    Route::get('/AdminDashboard', [AdminController::class, 'index'])->name("AdminDashboard");

    Route::resource('/Company', CompaniesController::class);

    Route::resource('/Employee', EmployeesController::class);
});
