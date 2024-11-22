<x-admin-layout>
    <x-slot name="title">
        Student Management
    </x-slot>

    <div class="bg-white rounded-lg shadow">
        <div class="p-4 border-b">
            <h2 class="text-xl font-semibold">Grade Students Management</h2>
        </div>
        <div class="p-4">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Name GRADE</th>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Departmen ID</th>
                        </tr>
                    </thead>
                    <tbody>@foreach ( $grade_students as $grade_student)
                        <tr>
                            <td class="px-6 py-4">{{$grade_student->id}}</td>
                            <td class="px-6 py-4">{{$grade_student->name}}</td>
                            <td class="px-6 py-4">@foreach ($grade_student->students as $student)
                                <ul>
                                    <li>{{ $student->name }}</li>
                                </ul>
                            @endforeach</td>
                            <td class="px-6 py-4">{{$grade_student->departmen->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
