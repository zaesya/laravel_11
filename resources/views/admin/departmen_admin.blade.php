<x-admin-layout>
    <x-slot name="title">
        Departments Management
    </x-slot>
    <div class="bg-white rounded-lg shadow">
        <div class="p-4 border-b flex justify-between items-center">
            <h2 class="text-xl font-semibold">Departments Management</h2>
            <a href="{{ route('admin.departmen.add') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors">
                + Add New Data
            </a>
        </div>

        @if(session('success'))
    <div id="flash-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative m-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('flash-message').remove();
        }, 5000);
    </script>
@endif

        @if(session('error'))
            <div id="flash-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>

            <script>
                setTimeout(function() {
                    document.getElementById('flash-message').remove();
                }, 5000);
            </script>
        @endif

        <div class="p-4">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Description</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departmens as $departmen)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">{{$departmen->id}}</td>
                                <td class="px-6 py-4">{{$departmen->name}}</td>
                                <td class="px-6 py-4">{{$departmen->desc}}</td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <a href="{{ route('admin.departmen.edit', $departmen->id) }}"
                                       class="text-blue-500 hover:text-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="h-5 w-5"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <form action="{{ route('admin.departmen.destroy', $departmen->id) }}"
                                          method="POST"
                                          class="inline-block"
                                          onsubmit="return confirm('Are you sure you want to delete this department?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-500 hover:text-red-700">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="h-5 w-5"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
