<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KMeansController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', [KMeansController::class, 'showUploadForm']);
Route::post('/upload', [KMeansController::class, 'upload']);
