<?php

namespace App\Http\Controllers;

use App\Models\Departmen;
use App\Models\Grade_student;
use Illuminate\Http\Request;

class DepartmenController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Department Management",
            'departmens' => Departmen::with(['grade_students', 'students'])->get()
        ];

        if (request()->is('admin/*')) {
            return view('admin.departmen_admin', $data);
        }

        return view('departmen', $data);
    }

    public function addData()
    {
        return view('departmen.add_data_departmen', [
            'title' => 'Add New Department'
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string'
        ]);

        Departmen::create($validated);

        return redirect()->route('admin.departmen.index')
                        ->with('success', 'Department created successfully');
    }

    public function edit($id)
    {
        $departmen = Departmen::findOrFail($id);

        return view('departmen.edit_data_departmen', [
            'title' => 'Edit Department',
            'departmen' => $departmen
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string'
        ]);

        $departmen = Departmen::findOrFail($id);
        $departmen->update($validated);

        return redirect()->route('admin.departmen.index')
                        ->with('success', 'Department updated successfully');
    }

    public function destroy($id)
    {
        $departmen = Departmen::findOrFail($id);

        // Check if department has associated grades, you cannot delete a department who has relation with data grade
        // cause it's gonna lose department refrensi = Orphaned awokaok without parent (Data not valid)

        if($departmen->grade_students()->count() > 0) {
            return redirect()->route('admin.departmen.index')
                            ->with('error', 'Cannot delete department with associated grades');
        }

        $departmen->delete();

        return redirect()->route('admin.departmen.index')
                        ->with('success', 'Department deleted successfully');
    }
}
