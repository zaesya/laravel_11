<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <h2 class="text-center font-bold mb-5 text-lg">DATA DEPARTMEN</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border-rounded border-gray-200 rounded-lg shadow-lg font-mono">
            <thead class="bg-gradient-to-r from-blue-300 to-purple-400 text-white rounded-t-lg">
                <tr>
                    <th class="py-3 px-5 text-left rounded-tl-lg">ID</th>
                    <th class="py-3 px-5 text-left">Name</th>
                    <th class="py-3 px-5 text-left rounded-tr-lg">Description</th>
                </tr>
            </thead>
            <tbody class="rounded-b-lg">
                @foreach ($departmens as $departmen)
                    <tr class="bg-gray-50 hover:bg-blue-100 transition-colors duration-200">
                        <td class="py-3 px-5 border-t">{{ $departmen->id }}</td>
                        <td class="py-3 px-5 border-t">{{ $departmen->name }}</td>
                        <td class="py-3 px-5 border-t">{{ $departmen->desc }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
