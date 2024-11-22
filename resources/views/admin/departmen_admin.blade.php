<x-admin-layout>
    <x-slot name="title">
        Departments Management
    </x-slot>
    <div class="bg-white rounded-lg shadow">
        <div class="p-4 border-b">
            <h2 class="text-xl font-semibold">Departments Management</h2>
        </div>
        <div class="p-4">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departmens as $departmen)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">{{$departmen->id}}</td>
                                <td class="px-6 py-4">{{$departmen->name}}</td>
                                <td class="px-6 py-4">{{$departmen->desc}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
