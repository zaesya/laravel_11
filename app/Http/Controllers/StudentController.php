<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Grade_student;
use App\Models\Departmen;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        if(request()->is('admin/*')) {
            return view('admin.student_admin', [
                'title' => 'Student Management',
                'students' => Student::with(['grade_student', 'departmen'])->get()
            ]);
        }

        return view('student', [
            'title' => 'Student',
            'students' => Student::with(['grade_student', 'departmen'])->get()
        ]);
    }

    public function addData()
    {
        return view('student.add_data', [
            'title' => 'Add New Data Student',
            'grade_students' => Grade_student::all(),
            'departmens' => Departmen::all(),
        ]);
    }

    public function create(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'grade_student_id' => 'required|exists:grade_students,id',
        'email' => 'required|email|unique:students,email',
        'address' => 'required|string'
    ]);

    Student::create([
        'name' => $validated['name'],
        'grade_student_id' => $validated['grade_student_id'],
        'departmen_id' => Grade_student::find($validated['grade_student_id'])->departmen_id,
        'email' => $validated['email'],
        'address' => $validated['address']
    ]);

    return redirect()->route('admin.student.index')
                    ->with('success', 'Student created successfully');
}

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $student_grade = Grade_student::all();

        return view('student.edit_data', [
            'title' => 'Edit Student',
            'student' => $student,
            'grade_students' => $student_grade,
        ]);
    }

    // Update method to handle the edit from form cuy
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade_student_id' => 'required|exists:grade_students,id',
            'email' => 'required|email|unique:students,email,'.$id,
            'address' => 'required|string'
        ]);

        $student = Student::findOrFail($id);

        $student->update([
            'name' => $validated['name'],
            'grade_student_id' => $validated['grade_student_id'],
            'email' => $validated['email'],
            'address' => $validated['address']
        ]);

        return redirect()->route('admin.student.index')
                        ->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.student.index')
                        ->with('success', 'Student deleted successfully');
    }
}
