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
    Route::get('/', [\App\Http\Controllers\MovieController::class, 'index'])->name('movies.index');
    Route::get('/create', [\App\Http\Controllers\MovieController::class, 'create'])->name('movies.create');
    Route::post('/create', [\App\Http\Controllers\MovieController::class, 'store'])->name('movies.store');
});

Route::prefix('Admin/Category')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    Route::post('/create', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
});

Route::prefix('Admin/Actor')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\ActorController::class, 'index'])->name('actors.index');
    Route::get('/create', [\App\Http\Controllers\ActorController::class, 'create'])->name('actors.create');
    Route::post('/create', [\App\Http\Controllers\ActorController::class, 'store'])->name('actors.store');
});

Route::prefix('Admin/Director')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\DirectorController::class, 'index'])->name('directors.index');
    Route::get('/create', [\App\Http\Controllers\DirectorController::class, 'create'])->name('directors.create');
    Route::post('/create', [\App\Http\Controllers\DirectorController::class, 'store'])->name('directors.store');
});
