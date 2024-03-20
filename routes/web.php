<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\App\Admin\UserController as AdminUser;
use App\Http\Controllers\App\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\App\Admin\StudentsController as StudentController;
use App\Http\Controllers\HomepageController as HomepageController;
use App\Http\Controllers\App\Admin\EventController as EventController;
use App\Http\Controllers\App\Admin\StratumController as StratumController;


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

Route::get('/',[HomepageController::class, 'index'])->name('homepage.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-us',[HomepageController::class, 'aboutus'])->name('homepage.aboutus');
Route::get('/contact-us',[HomepageController::class, 'contactus'])->name('homepage.contactus');

Auth::routes();
Route::get('/app/admin', [AdminDashboard::class, 'index'])->name('app.admin.dashbord.index');

Route::get('/app/admin/users', [AdminUser::class, 'index'])->name('app.admin.users.index');
Route::get('/app/admin/users/create', [AdminUser::class, 'create'])->name('app.admin.users.create');
Route::post('/app/admin/users', [AdminUser::class, 'store'])->name('app.admin.users.store');
Route::get('/app/admin/users/{user}', [AdminUser::class, 'modify'])->name('app.admin.users.modify');
Route::put('/app/admin/users/{user}', [AdminUser::class, 'update'])->name('app.admin.users.update');
Route::get('/app/admin/users/{user}/delete', [AdminUser::class, 'delete'])->name('app.admin.users.delete');
Route::delete('/app/admin/users/{user}', [AdminUser::class, 'destroy'])->name('app.admin.users.destroy');
Route::get('/app/admin/users/{user}/reset', [AdminUser::class, 'reset'])->name('app.admin.users.reset');
Route::patch('/app/admin/users/{user}', [AdminUser::class, 'resetOk'])->name('app.admin.users.resetOk');

Route::get('/app/admin/events', [EventController::class, 'index'])->name('app.admin.events.index');
Route::get('/app/admin/events/create', [EventController::class, 'create'])->name('app.admin.events.create');
Route::post('/app/admin/events/create', [EventController::class, 'store'])->name('app.admin.events.store');
Route::delete('/app/admin/events/{event}', [EventController::class, 'destroy'])->name('app.admin.events.destroy');
Route::get('/app/admin/events/{event}', [EventController::class, 'modify'])->name('app.admin.events.modify');
Route::put('/app/admin/events/{event}', [EventController::class, 'update'])->name('app.admin.events.update');


Route::get('/app/admin/classes', [StratumController::class, 'index'])->name('app.admin.classes.index');
Route::get('/app/admin/classes/create', [StratumController::class, 'create'])->name('app.admin.classes.create');
Route::post('/app/admin/classes/create', [StratumController::class, 'store'])->name('app.admin.classes.store');
Route::delete('/app/admin/classes/{stratum}', [StratumController::class, 'destroy'])->name('app.admin.classes.destroy');
Route::get('/app/admin/classes/{stratum}', [StratumController::class, 'modify'])->name('app.admin.classes.modify');
Route::put('/app/admin/classes/{stratum}', [StratumController::class, 'update'])->name('app.admin.classes.update');

Route::get('/app/admin/students', [StudentController::class, 'index'])->name('app.admin.students.index');


Route::get('/app/admin/students/create', [StudentController::class, 'create'])->name('app.admin.students.create');
Route::post('/app/admin/students/create', [StudentController::class, 'store'])->name('app.admin.students.store');

Route::get('/admin/auth', [App\Http\Controllers\AdminAuthController::class, 'index'])->name('admin.auth.index');
Route::put('/admin/auth', [App\Http\Controllers\AdminAuthController::class, 'changePassword'])->name('admin.auth.changePassword');


