<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('student')->controller(StudentController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/data', 'studentsData');
    Route::get('/create', 'create');
    Route::get('/{id}/profile/create', 'createProfile');
    Route::post('/store', 'store');
    Route::post('/{id}/profile', 'storeProfile');
    Route::get('/{id}', 'show');
    Route::get('/{id}/profile/edit', 'showProfile');
    Route::get('/{id}/edit', 'edit');
    Route::put('/{id}/profile', 'editProfile');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});


Route::prefix('mentor')->controller(MentorController::class)->group(function () {

    Route::get('/', 'index')->name('mentor.index');
    Route::get('/create', 'create')->name('mentor.create');
    Route::post('/store', 'store')->name('mentor.store');
    Route::get('/manage', 'mentorsData')->name('mentor.manage');
    Route::get('/{id}', 'show')->name('mentor.show');
    Route::get('/{id}/edit', 'edit')->name('mentor.edit');
    Route::put('/{id}', 'update')->name('mentor.update');
    Route::delete('/{id}', 'destroy')->name('mentor.destroy');
    Route::post('/{id}/assign', 'assignCourse')->name('mentor.assignCourse');
    Route::delete('/{mentor}/course/{course}', 'unassignCourse')->name('mentor.unassignCourse');
});

Route::prefix('course')->controller(CourseController::class)->group(function () {
    Route::get('/', 'index')->name('course.allCourses');
    Route::get('/create', 'create')->name('course.create');
    Route::post('/store', 'store')->name('course.store');
    Route::get('/{id}', 'show')->name('course.show');
    Route::get('/{id}/edit', 'edit')->name('course.edit');
    Route::put('/{id}', 'update')->name('course.update');
    Route::delete('/{id}', 'destroy')->name('course.destroy');
});
