<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('student')->controller(StudentController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::get('/{id}/profile/create', 'createProfile');
    Route::post('/store', 'store');
    Route::post('/{id}/profile', 'storeProfile');
    Route::get('/{id}', 'show');
    Route::get('/{id}/edit', 'edit');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});
