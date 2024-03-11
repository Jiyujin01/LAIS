<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\Admin\UserController as AdminUser;
use App\Http\Controllers\App\Admin\DashboardController as AdminDashboard;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/app/admin', [AdminDashboard::class, 'index'])->name('app.admin.index');
