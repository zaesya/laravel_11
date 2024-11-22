<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmenController;
use App\Http\Controllers\Grade_studentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/contact',[ContactController::class, 'index']);
Route::get('/student',[StudentController::class, 'index'])->name('students.index');
Route::get('/add-data', [StudentController::class, 'addData'])->name('add.data');
Route::get('/grade_student', [Grade_studentController::class,'index']);
Route::get('/admin_dashboard', [AdminController::class,'index']);

// Route untuk user
Route::get('/departmen', [DepartmenController::class, 'index']);

// Route untuk admin
Route::get('/admin/departmen', [DepartmenController::class, 'index']);
