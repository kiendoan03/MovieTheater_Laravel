<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\QrCodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/Admin/Dashboard',[App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');

Route::prefix('Admin/Movie')->name('admin.')->middleware('auth:staff')->group(function () {

    Route::get('/', [\App\Http\Controllers\MovieController::class, 'index'])->name('movies.index');
    Route::get('/create', [\App\Http\Controllers\MovieController::class, 'create'])->name('movies.create');
    Route::post('/create', [\App\Http\Controllers\MovieController::class, 'store'])->name('movies.store');
    Route::get('/{movie}/edit', [\App\Http\Controllers\MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/{movie}/edit', [\App\Http\Controllers\MovieController::class, 'update'])->name('movies.update');
    Route::delete('/{movie}/delete', [\App\Http\Controllers\MovieController::class, 'destroy'])->name('movies.destroy');
});
Route::prefix('Admin/Category')->name('admin.')->middleware('auth:staff')->group(function () {
    Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    Route::post('/create', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{category}/delete', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::prefix('Admin/Actor')->name('admin.')->middleware('auth:staff')->group(function () {
    Route::get('/', [\App\Http\Controllers\ActorController::class, 'index'])->name('actors.index');
    Route::get('/create', [\App\Http\Controllers\ActorController::class, 'create'])->name('actors.create');
    Route::post('/create', [\App\Http\Controllers\ActorController::class, 'store'])->name('actors.store');
    Route::get('/{actor}/edit', [\App\Http\Controllers\ActorController::class, 'edit'])->name('actors.edit');
    Route::put('/{actor}/edit', [\App\Http\Controllers\ActorController::class, 'update'])->name('actors.update');
    Route::delete('/{actor}/delete', [\App\Http\Controllers\ActorController::class, 'destroy'])->name('actors.destroy');
});

Route::prefix('Admin/Director')->name('admin.')->middleware('auth:staff')->group(function () {
    Route::get('/', [\App\Http\Controllers\DirectorController::class, 'index'])->name('directors.index');
    Route::get('/create', [\App\Http\Controllers\DirectorController::class, 'create'])->name('directors.create');
    Route::post('/create', [\App\Http\Controllers\DirectorController::class, 'store'])->name('directors.store');
    Route::get('/{director}/edit', [\App\Http\Controllers\DirectorController::class, 'edit'])->name('directors.edit');
    Route::put('/{director}/edit', [\App\Http\Controllers\DirectorController::class, 'update'])->name('directors.update');
    Route::delete('/{director}/delete', [\App\Http\Controllers\DirectorController::class, 'destroy'])->name('directors.destroy');
});
 
Route::prefix('Login')->name('login.')->group(function(){
    Route::get('/', [\App\Http\Controllers\CustomerController::class, 'showLoginForm'])->name('login');
    Route::post('/check_login', [\App\Http\Controllers\CustomerController::class, 'login'])->name('login.check_login');
    Route::get('/register', [\App\Http\Controllers\CustomerController::class, 'create'])->name('register');
    Route::post('/register', [\App\Http\Controllers\CustomerController::class, 'register'])->name('store');
    Route::get('/logout', [\App\Http\Controllers\CustomerController::class, 'logout'])->name('logout');

});

Route::prefix('Admin/Customer')->name('admin.')->middleware('auth:staff')->group(function(){

    Route::get('/' , [App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
    Route::delete('/{customer}/delete' , [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::get('/{customer}/information' , [App\Http\Controllers\CustomerController::class, 'showAdminSite'])->name('customers.show');
    Route::post('/{customer}/information' , [App\Http\Controllers\CustomerController::class, 'resetPassword'])->name('customers.resetPassword');
});

Route::prefix('Admin/Staff')->name('admin.')->middleware('auth:staff')->group(function(){
    Route::get('/', [App\Http\Controllers\StaffController::class, 'index'])->name('staffs.index');
    Route::get('/create', [App\Http\Controllers\StaffController::class, 'create'])->name('staffs.create');
    Route::post('/create', [App\Http\Controllers\StaffController::class, 'register'])->name('staffs.store');
    Route::get('/{staff}/edit', [\App\Http\Controllers\StaffController::class, 'edit'])->name('staffs.edit');
    Route::put('/{staff}/edit', [\App\Http\Controllers\StaffController::class, 'update'])->name('staffs.update');
    Route::delete('/{staff}/delete', [\App\Http\Controllers\StaffController::class, 'destroy'])->name('staffs.destroy');
    Route::get('/login', [\App\Http\Controllers\StaffController::class, 'showLoginForm'])->name('staffs.login');
    Route::post('/login', [\App\Http\Controllers\StaffController::class, 'login'])->name('staffs.login.check_login');
    Route::get('/logout', [\App\Http\Controllers\StaffController::class, 'logout'])->name('staffs.logout');
});

Route::prefix('Admin/Room')->name('admin.')->group(function(){
    Route::get('/', [App\Http\Controllers\RoomController::class, 'index'])->name('rooms.index');
    Route::get('/create', [App\Http\Controllers\RoomController::class, 'create'])->name('rooms.create');
    Route::post('/create', [App\Http\Controllers\RoomController::class, 'store'])->name('rooms.store');
    Route::get('/{room}/edit', [\App\Http\Controllers\RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/{seat_id}/{room_id}/edit', [\App\Http\Controllers\RoomController::class, 'update'])->name('rooms.update');
    Route::delete('/{room}/delete', [\App\Http\Controllers\RoomController::class, 'destroy'])->name('rooms.destroy');
});

Route::prefix('Admin/Schedule') -> name('admin.') -> group(function(){
    Route::get('/', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedules.index');
    Route::get('/create', [App\Http\Controllers\ScheduleController::class, 'create'])->name('schedules.create');
    Route::post('/create', [App\Http\Controllers\ScheduleController::class, 'store'])->name('schedules.store');
    Route::get('/{schedule}/edit', [\App\Http\Controllers\ScheduleController::class, 'edit'])->name('schedules.edit');
    Route::put('/{schedule}/edit', [\App\Http\Controllers\ScheduleController::class, 'update'])->name('schedules.update');
    Route::get('/{schedule}/seat', [\App\Http\Controllers\ScheduleController::class, 'show'])->name('schedules.seat');
    Route::delete('/{schedule}/delete', [\App\Http\Controllers\ScheduleController::class, 'destroy'])->name('schedules.destroy');
});

Route::prefix('/')->group(function(){
    Route::get('/', [App\Http\Controllers\MovieController::class, 'show'])->name('index');
    Route::get('/{movie}/detail', [App\Http\Controllers\MovieController::class, 'detail'])->name('detail');
    Route::get('/{movie_actor}/actor', [App\Http\Controllers\ActorController::class, 'show'])->name('actor');
    Route::get('/{movie_director}/director', [App\Http\Controllers\DirectorController::class, 'show'])->name('director');
    Route::get('/{user}/user', [App\Http\Controllers\CustomerController::class, 'show'])->name('user')->middleware('auth:customers');
    Route::put('/{user}/user', [\App\Http\Controllers\CustomerController::class, 'update'])->name('user.update')->middleware('auth:customers');
    Route::post('/{user}/user', [\App\Http\Controllers\CustomerController::class, 'changeAvt'])->name('user.changeAvt')->middleware('auth:customers');
    Route::get('/{schedule}/order', [App\Http\Controllers\ScheduleController::class, 'showSchedule'])->name('order')->middleware('auth:customers');
    Route::put('/{seat_id}/{schedule_id}/order', [\App\Http\Controllers\ScheduleController::class, 'orderTicket'])->name('orderTicket')->middleware('auth:customers');
    Route::put('/{schedule_id}/book', [\App\Http\Controllers\ScheduleController::class, 'bookTicket'])->name('bookTicket')->middleware('auth:customers');
    Route::post('/{schedule_id}/book', [App\Http\Controllers\ScheduleController::class, 'undonScheduleBook'])->name('undon')->middleware('auth:customers');
});

Route::get('/{schedule}/{user}/generate-qrcode', [QrCodeController::class, 'index'])->name('qrcode')->middleware('auth:customers');
