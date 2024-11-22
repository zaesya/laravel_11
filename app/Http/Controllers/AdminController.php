<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Departmen;
use App\Models\Grade_student;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'students' => Student::all(),
            'departments' => Departmen::all(),
            'grades' => Grade_student::all(),
            'total_students' => Student::count(),
            'total_departments' => Departmen::count(),
            'total_grades' => Grade_student::count(),
        ];

        return view('components.admin-layout', $data);
    }
}
