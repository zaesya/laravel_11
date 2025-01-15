<?php

namespace App\Http\Controllers;
use App\Models\Grade_student;
use App\Models\Departmen;
use Illuminate\Http\Request;

class Grade_studentController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Grade student",
            'grade_students' => Grade_student::with('students', 'departmen')->get()
        ];

        if(request()->is('admin/*')){
            return view('admin/grade_student_admin', $data);
        }
        return view('grade_student', $data);
    }

    public function addData()
    {
        return view('grade.add_data_grade', [
            'title' => 'Add New Grade',
            'departmens' => Departmen::all(),
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'departmen_id' => 'required|exists:departmens,id'
        ]);

        Grade_student::create($validated);

        return redirect()->route('admin.grade.index')
                        ->with('success', 'Grade created successfully');
    }

    public function edit($id)
    {
        $grade = Grade_student::findOrFail($id);

        return view('grade.edit_data_grade', [
            'title' => 'Edit Grade',
            'grade' => $grade,
            'departmens' => Departmen::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'departmen_id' => 'required|exists:departmens,id'
        ]);

        $grade = Grade_student::findOrFail($id);
        $grade->update($validated);

        return redirect()->route('admin.grade.index')
                        ->with('success', 'Grade updated successfully');
    }

    public function destroy($id)
    {
        $grade = Grade_student::findOrFail($id);

        if($grade->students()->count() > 0) {
            return redirect()->route('admin.grade.index')
                            ->with('error', 'Cannot delete grade with associated students');
        }

        $grade->delete();

        return redirect()->route('admin.grade.index')
                        ->with('success', 'Grade deleted successfully');
    }
}
