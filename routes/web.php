<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/allvideos/{option}', [App\Http\Controllers\HomeController::class, 'searchVideo'])->name('search.videos');

Route::get('/allvideos', [App\Http\Controllers\HomeController::class, 'allVideos'])->name('all.videos');

Route::get('/video/{id}', [App\Http\Controllers\HomeController::class, 'video'])->name('video');

Route::get('/upload', [App\Http\Controllers\UploadController::class, 'upload'])->name('upload');

Route::post('/upload', [App\Http\Controllers\UploadController::class, 'uploadVideo'])->name('upload.video');

Route::post('/validatevideo', [App\Http\Controllers\UploadController::class, 'validateVideo'])->name('upload.validatevideo');

Route::post('/validateinfo', [App\Http\Controllers\UploadController::class, 'validateInfo'])->name('upload.validateinfo');

