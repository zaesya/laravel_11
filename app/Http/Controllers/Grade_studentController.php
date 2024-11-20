<?php

namespace App\Http\Controllers;
use App\Models\Grade_student;
use Illuminate\Http\Request;

class Grade_studentController extends Controller
{
    public function index()
    {
        $grade_students = Grade_student::with('students')->get();
        return view('grade_student', [
            'title' => "Grade",
            'grade_students' => $grade_students
        ]);
    }
}
