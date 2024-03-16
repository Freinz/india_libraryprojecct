<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [AdminController::class,'index']);


Route::get('/category_page', [AdminController::class,'category_page']);

Route::post('/cat_add', [AdminController::class,'cat_add']);

Route::get('/cat_delete/{id}', [AdminController::class,'cat_delete']);


Route::get('/cat_read/{id}', [AdminController::class,'cat_read']);

Route::post('/cat_update/{id}', [AdminController::class,'cat_update']);


Route::get('/add_book', [AdminController::class,'add_book']);

Route::post('/store_book', [AdminController::class,'store_book']);