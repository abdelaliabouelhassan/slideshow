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

Route::get('/', function () {
   return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource("pages", App\Http\Controllers\PageController::class)->middleware("auth");
Route::get('/images/{page}', [App\Http\Controllers\ImageController::class, 'images'])->name('images')->middleware("auth");
Route::get('/images/{page}/create', [App\Http\Controllers\ImageController::class, 'create'])->name('images.create')->middleware("auth");
Route::post('/images/{page}/store', [App\Http\Controllers\ImageController::class, 'store'])->name('images.store')->middleware("auth");
Route::post('/images/delete', [App\Http\Controllers\ImageController::class, 'delete'])->name('images.delete')->middleware("auth");

Route::get('{slug}', [App\Http\Controllers\PageController::class, 'show'])->name('pages.show');