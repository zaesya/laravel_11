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
Route::get('/grade_student', [Grade_studentController::class,'index'])->name('grade.index');
Route::get('/student',[StudentController::class, 'index'])->name('students.index');

//Admin
Route::prefix('admin')->group(function () {
    Route::get('/departmen', [DepartmenController::class, 'index']);
    // Grade routes
    Route::get('/grade_student', [Grade_studentController::class,'index'])->name('admin.grade.index');
    Route::get('/grade_student/add', [Grade_studentController::class, 'addData'])->name('admin.grade.add');
    Route::post('/grade_student/create', [Grade_studentController::class, 'create'])->name('admin.grade.create');
    Route::get('/grade_student/edit/{id}', [Grade_studentController::class, 'edit'])->name(name: 'admin.grade.edit');
    Route::put('/grade_student/update/{id}', [Grade_studentController::class, 'update'])->name('admin.grade.update');
    Route::delete('/grade_student/delete/{id}', [Grade_studentController::class, 'destroy'])->name('admin.grade.destroy');

    //Student
    Route::get('/student',[StudentController::class, 'index'])->name('admin.student.index');
    Route::post('/create', [StudentController::class, 'create'])->name('admin.create');
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('admin.edit');
    Route::put('/update/{id}', [StudentController::class, 'update'])->name('admin.update');
    Route::delete('/delete/{id}', [StudentController::class, 'destroy'])->name('admin.delete');

    //Departmen
    Route::get('/departmen', [DepartmenController::class, 'index'])->name('admin.departmen.index');
    Route::get('/departmen/add', [DepartmenController::class, 'addData'])->name('admin.departmen.add');
    Route::post('/departmen/create', [DepartmenController::class, 'create'])->name('admin.departmen.create');
    Route::get('/departmen/edit/{id}', [DepartmenController::class, 'edit'])->name('admin.departmen.edit');
    Route::put('/departmen/update/{id}', [DepartmenController::class, 'update'])->name('admin.departmen.update');
    Route::delete('/departmen/delete/{id}', [DepartmenController::class, 'destroy'])->name('admin.departmen.destroy');
});
