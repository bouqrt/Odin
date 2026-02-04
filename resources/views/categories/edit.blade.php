<x-app-layout>
    <x-slot name="header">
        <h2>Edit Category</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('categories.update', $category) }}">
            @csrf
            @method('PUT')

            <input type="text" name="name"
                   value="{{ $category->name }}"
                   class="border p-2 w-full mb-4">

            <textarea name="description"
                      class="border p-2 w-full mb-4">{{ $category->description }}</textarea>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
