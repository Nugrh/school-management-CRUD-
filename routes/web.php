<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Admin
Route::prefix('student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student');
    Route::get('/edit/{id}/{student_id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::get('/delete/{id}/{student_id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/search', [StudentController::class, 'search'])->name('student.search');

    Route::post('/store', [StudentController::class, 'store'])->name('student.store');
    Route::post('/update', [StudentController::class, 'update'])->name('student.update');
});

Route::prefix('teacher')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teacher');
    Route::get('/edit/{id}/{teacher_id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::get('/delete/{id}/{teacher_id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    Route::get('/search', [TeacherController::class, 'search'])->name('teacher.search');

    Route::post('/store', [TeacherController::class, 'store'])->name('teacher.store');
    Route::post('/update', [TeacherController::class, 'update'])->name('teacher.update');
});

Auth::routes();
