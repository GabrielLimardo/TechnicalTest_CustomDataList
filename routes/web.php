<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomDataUploadController;
use App\Http\Controllers\SearchController;

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
    return view('welcome');
});

Route::post('/upload-excel', [CustomDataUploadController::class, 'uploadExcel'])->name('upload.excel');
Route::post('/search', [SearchController::class, 'search'])->name('search');
