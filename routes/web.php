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
Route::get('/add-data', [StudentController::class, 'addData'])->name('add.data');
Route::get('/admin_dashboard', [AdminController::class,'index']);

//User
Route::get('/departmen', [DepartmenController::class, 'index']);
Route::get('/grade_student', [Grade_studentController::class,'index']);
Route::get('/student',[StudentController::class, 'index'])->name('students.index');

//Admin
Route::prefix('admin')->group(function () {
    Route::get('/departmen', [DepartmenController::class, 'index']);
    Route::get('/grade_student', [Grade_studentController::class,'index']);
    Route::get('/student',[StudentController::class, 'index'])->name('admin.student.index');
    Route::post('/create', [StudentController::class, 'create'])->name('admin.create');
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('admin.edit');
    Route::put('/update/{id}', [StudentController::class, 'update'])->name('admin.update');
    Route::delete('/delete/{id}', [StudentController::class, 'destroy'])->name('admin.delete');
});
