<x-admin-layout>
    <x-slot name="title">
        Departments Management
    </x-slot>

    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white">
        <div class="container mx-auto px-6 py-8">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-3xl font-bold">Departments Management</h2>
                    <p class="mt-2 text-blue-100">Manage and monitor department information</p>
                </div>
                <a href="{{ route('admin.departmen.add') }}"
                   class="px-6 py-2 bg-white text-blue-600 rounded-lg hover:bg-blue-50
                          font-medium transition-colors inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add New Department
                </a>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div id="flash-message"
             class="mx-6 mt-6 bg-green-50 border-l-4 border-green-500 p-4
                    shadow-sm rounded-r-lg transform transition-transform duration-300">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div id="flash-message"
             class="mx-6 mt-6 bg-red-50 border-l-4 border-red-500 p-4
                    shadow-sm rounded-r-lg transform transition-transform duration-300">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Table Section -->
    <div class="container mx-auto px-6 py-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full min-w-max">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($departmens as $departmen)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-900">{{$departmen->id}}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                    <div class="max-w-xs truncate">{{$departmen->name}}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div x-data="{ expanded: false }" class="cursor-pointer">
                                        <div
                                            @click="expanded = !expanded"
                                            :class="{ 'line-clamp-2 max-w-[200px]': !expanded, 'max-w-[500px]': expanded }"
                                            class="break-words transition-all duration-200"
                                        >
                                            {{$departmen->desc}}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium">
                                    <div class="flex space-x-3">
                                        <a href="{{ route('admin.departmen.edit', $departmen->id) }}"
                                           class="text-blue-600 hover:text-blue-900 inline-flex items-center gap-1 transition-colors">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.departmen.destroy', $departmen->id) }}"
                                              method="POST"
                                              class="inline-block"
                                              onsubmit="return confirm('Are you sure you want to delete this department?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 hover:text-red-900 inline-flex items-center gap-1 transition-colors">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
