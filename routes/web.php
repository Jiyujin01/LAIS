<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\App\Admin\UserController as AdminUser;
use App\Http\Controllers\App\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\App\Admin\ClassManagementController as UpcomingClassController;


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

Route::get('/',[HomepageController::class, 'index'])->name('homepage.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-us',[HomepageController::class, 'aboutus'])->name('homepage.aboutus');
Route::get('/contact-us',[HomepageController::class, 'contactus'])->name('homepage.contactus');

Auth::routes();

Route::get('/app/admin/users', [AdminUser::class, 'index'])->name('app.admin.users.index');
Route::get('/app/admin', [AdminDashboard::class, 'index'])->name('app.admin.index');


Route::get('/adminlte/dashboard', [UpcomingClassController::class, 'index'])->name('app.admin.classes.index');
Route::get('/app/admin/classes/create', [UpcomingClassController::class, 'create'])->name('app.admin.classes.create');
Route::post('/app/admin/classes/create', [UpcomingClassController::class, 'store'])->name('app.admin.classes.store');
Route::delete('/app/admin/classes/{classes}', [UpcomingClassController::class, 'destroy'])->name('app.admin.classes.destroy');
Route::get('/app/admin/classes/{classes}', [UpcomingClassController::class, 'modify'])->name('app.admin.classes.modify');
Route::put('/app/admin/classes/{classes}', [UpcomingClassController::class, 'update'])->name('app.admin.classes.update');
