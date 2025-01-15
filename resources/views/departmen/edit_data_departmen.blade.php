<x-admin-layout>
    <x-slot name="title">
        Edit Department
    </x-slot>

    <div class="bg-white rounded-lg shadow">
        <div class="p-4 border-b flex justify-between items-center">
            <h2 class="text-xl font-semibold">Edit Department</h2>
        </div>

        <div class="p-4">
            <form action="{{ route('admin.departmen.update', $departmen->id) }}" method="POST" class="max-w-3xl mx-auto">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 text-xs uppercase font-medium mb-2" for="name">
                        Department Name
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name', $departmen->name) }}"
                           class="w-full px-6 py-3 border rounded bg-gray-50 text-sm text-gray-500 focus:outline-none focus:border-blue-500"
                           placeholder="Enter department name">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-xs uppercase font-medium mb-2" for="desc">
                        Description
                    </label>
                    <textarea id="desc"
                             name="desc"
                             rows="3"
                             class="w-full px-6 py-3 border rounded bg-gray-50 text-sm text-gray-500 focus:outline-none focus:border-blue-500"
                             placeholder="Enter department description">{{ old('desc', $departmen->desc) }}</textarea>
                    @error('desc')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-2 mt-6">
                    <a href="{{ url('admin/departmen') }}"
                       class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
