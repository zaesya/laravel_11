<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="overflow-x-auto">
        <h2 class="text-xl font-bold text-center mb-5">DATA STUDENT</h2>
        <table class="min-w-full bg-white border-rounded border-gray-200 rounded-lg shadow-lg font-mono">
            <thead class="bg-gradient-to-r from-blue-300 to-purple-400 text-white rounded-t-lg">
                <tr>
                    <th class="py-3 px-5 text-left rounded-tl-lg">ID</th>
                    <th class="py-3 px-5 text-left">Name</th>
                    <th class="py-3 px-5 text-left">Grade</th>
                    <th class="py-3 px-5 text-left">Departmen</th>
                    <th class="py-3 px-5 text-left">Email</th>
                    <th class="py-3 px-5 text-left rounded-tr-lg">Address</th>
                </tr>
            </thead>
            <tbody class="rounded-b-lg">
                @foreach ($students as $student)
                    <tr class="bg-gray-50 hover:bg-blue-100 transition-colors duration-200">
                        <td class="py-3 px-5 border-t">{{$student->id}}</td>
                        <td class="py-3 px-5 border-t">{{$student->name}}</td>
                        <td class="py-3 px-5 border-t">{{$student->grade_student->name}}</td>
                        <td class="py-3 px-5 border-t">{{$student->grade_student->departmen->name}}</td>
                        <td class="py-3 px-5 border-t">{{$student->email}}</td>
                        <td class="py-3 px-5 border-t">{{$student->address}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-gray-100">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-600">
                Showing {{ $students->firstItem() ?? 0 }} to {{ $students->lastItem() ?? 0 }} of {{ $students->total() }} entries 
            </div>
            <div>
                {{ $students->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</x-layout>
