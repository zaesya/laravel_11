<?php

namespace App\Http\Controllers;

use App\Models\Departmen;
use App\Models\Grade_student;
use Illuminate\Http\Request;

class DepartmenController extends Controller
{
    public function index()
    {
        return view('departmen', [
            'title' => "Departmen",
            'departmens' => Departmen::with(['grade_students', 'students'])->get()
        ]);
    }
}
