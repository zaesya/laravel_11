<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Grade_student;
use App\Models\Departmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\search;

class StudentController extends Controller
{
    public function index()
    {
        if(request()->is('admin/*')) {
            $search = request('search');

            $students = Student::with(['grade_student', 'departmen'])
                ->when($search, function($query) use ($search) {
                    $query->where(function($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%")
                          ->orWhereHas('grade_student', function($q) use ($search) {
                              $q->where('name', 'like', "%{$search}%");
                          })
                          ->orWhereHas('grade_student.departmen', function($q) use ($search) {
                              $q->where('name', 'like', "%{$search}%");
                          });
                    });
                })
                ->orderBy('created_at', 'desc')
                ->paginate(25);

            return view('admin.student_admin', [
                'title' => 'Student Management',
                'students' => $students
            ]);
        }

        return view('student', [
            'title' => 'Student',
            'students' => Student::with(['grade_student', 'departmen'])->paginate(25)
        ]);
    }

    public function addData()
{
    $grade_students = DB::table('grade_students')
        ->select(
            'grade_students.id',
            'grade_students.name',
            'departmens.name as departmen'
        )
        ->join('departmens', 'grade_students.departmen_id', '=', 'departmens.id')
        ->orderBy('grade_students.name', 'asc')
        ->get();

    return view('student.add_data', [
        'title' => 'Add New Data Student',
        'grade_students' => $grade_students,
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
    $grade_students = DB::table('grade_students')
        ->select(
            'grade_students.id',
            'grade_students.name',
            'departmens.name as departmen'
        )
        ->join('departmens', 'grade_students.departmen_id', '=', 'departmens.id')
        ->orderBy('grade_students.name', 'asc')
        ->get();

    return view('student.edit_data', [
        'title' => 'Edit Student',
        'student' => $student,
        'grade_students' => $grade_students,
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
