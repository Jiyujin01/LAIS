<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\App\Admin\UserController as AdminUser;
use App\Http\Controllers\App\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\App\Admin\StudentsController as StudentController;
use App\Http\Controllers\HomepageController as HomepageController;
use App\Http\Controllers\App\Admin\EventController as EventController;
use App\Http\Controllers\App\Admin\CourseController as CourseController;

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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about-us',[HomepageController::class, 'aboutus'])->name('homepage.aboutus');
Route::get('/contact-us',[HomepageController::class, 'contactus'])->name('homepage.contactus');

Auth::routes(['register' => false]);
Route::get('/app/admin', [AdminDashboard::class, 'index'])
    ->name('app.admin.dashbord.index');

Route::middleware(['auth', 'active'])->group(function () {
    Route::get('/app/admin/users', [AdminUser::class, 'index'])->name('app.admin.users.index')
    ->middleware('admin');
    Route::get('/app/admin/users/create', [AdminUser::class, 'create'])->name('app.admin.users.create')
    ->middleware('admin');
    Route::post('/app/admin/users', [AdminUser::class, 'store'])->name('app.admin.users.store')
    ->middleware('admin');
    Route::get('/app/admin/users/{user}', [AdminUser::class, 'modify'])->name('app.admin.users.modify')
    ->middleware('admin');
    Route::put('/app/admin/users/{user}', [AdminUser::class, 'update'])->name('app.admin.users.update')
    ->middleware('admin');
    Route::get('/app/admin/users/{user}/delete', [AdminUser::class, 'delete'])->name('app.admin.users.delete')
    ->middleware('admin');
    Route::delete('/app/admin/users/{user}', [AdminUser::class, 'destroy'])->name('app.admin.users.destroy')
    ->middleware('admin');
    Route::get('/app/admin/users/{user}/reset', [AdminUser::class, 'reset'])->name('app.admin.users.reset')
    ->middleware('admin');
    Route::patch('/app/admin/users/{user}', [AdminUser::class, 'resetOk'])->name('app.admin.users.resetOk')
    ->middleware('admin');

    Route::get('/admin/auth', [App\Http\Controllers\AdminAuthController::class, 'index'])->name('admin.auth.index');
    Route::put('/admin/auth', [App\Http\Controllers\AdminAuthController::class, 'changePassword'])->name('admin.auth.changePassword');

    Route::get('/app/admin/events', [EventController::class, 'index'])->name('app.admin.events.index');
    Route::get('/app/admin/events/create', [EventController::class, 'create'])->name('app.admin.events.create')
    ->middleware('admin');
    Route::post('/app/admin/events/create', [EventController::class, 'store'])->name('app.admin.events.store');
    Route::delete('/app/admin/events/{event}', [EventController::class, 'destroy'])->name('app.admin.events.destroy');
    Route::get('/app/admin/events/{event}', [EventController::class, 'modify'])->name('app.admin.events.modify');
    Route::put('/app/admin/events/{event}', [EventController::class, 'update'])->name('app.admin.events.update');

    Route::get('/app/admin/classes', [CourseController::class, 'index'])->name('app.admin.classes.index');
    Route::get('/app/admin/classes/{id}/students', [CourseController::class, 'show'])->name('app.admin.classes.show');
    Route::get('/app/admin/classes/students/view', [CourseController::class, 'view'])->name('app.admin.classes.view');
    Route::get('/app/admin/classes/create', [CourseController::class, 'create'])->name('app.admin.classes.create')
    ->middleware('admin');
    Route::post('/app/admin/classes/print', [CourseController::class, 'print'])->name('app.admin.classes.print');
    Route::post('/app/admin/classes/create', [CourseController::class, 'store'])->name('app.admin.classes.store');
    Route::delete('/app/admin/classes/{course}', [CourseController::class, 'destroy'])->name('app.admin.classes.destroy');
    Route::get('/app/admin/classes/{course}', [CourseController::class, 'modify'])->name('app.admin.classes.modify');
    Route::put('/app/admin/classes/{course}', [CourseController::class, 'update'])->name('app.admin.classes.update');

    Route::get('/app/admin/students', [StudentController::class, 'index'])->name('app.admin.students.index');
    Route::get('/app/admin/students/create', [StudentController::class, 'create'])->name('app.admin.students.create')
    ->middleware('admin');
    Route::post('/app/admin/students', [StudentController::class, 'store'])->name('app.admin.students.store');
});
