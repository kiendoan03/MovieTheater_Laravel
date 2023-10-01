<?php

use Illuminate\Support\Facades\Route;

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
Route::prefix('Admin/Movie')->name('admin.')->group(function () {
    Route::get('/create', [\App\Http\Controllers\MovieController::class, 'create'])->name('movies.create');
    Route::post('/create', [\App\Http\Controllers\MovieController::class, 'store'])->name('movies.store');
});
 
Route::prefix('Login')->name('login.')->group(function(){
    Route::get('/' , [App\Http\Controllers\CustomerController::class, 'index'])->name('index');
    Route::get('/register', [App\Http\Controllers\CustomerController::class, 'create'])->name('create');
    Route::post('/register', [\App\Http\Controllers\CustomerController::class, 'store'])->name('store');

});