<x-admin-layout>
    <x-slot name="title">
        Students Management
    </x-slot>

    <div class="bg-white rounded-lg shadow">
        <div class="p-4 border-b flex justify-between items-center">
            <h2 class="text-xl font-semibold">Students Management</h2>
            <a href="{{ route('add.data') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors">
                + Add New Data
            </a>
        </div>
        <div class="p-4">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Grade</th>
                            <th class="px-6 py-3">Departmen ID</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">{{$student->id}}</td>
                                <td class="px-6 py-4">{{$student->name}}</td>
                                <td class="px-6 py-4">{{$student->grade_student->name}}</td>
                                <td class="px-6 py-4">{{$student->grade_student->departmen->name}}</td>
                                <td class="px-6 py-4">{{$student->email}}</td>
                                <td class="px-6 py-4">{{$student->address}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
