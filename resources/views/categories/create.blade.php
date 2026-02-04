<x-app-layout>
    <x-slot name="header">
        <h2>Create Category</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            <input type="text" name="name"
                   placeholder="Category name"
                   class="border p-2 w-full mb-4">

            <textarea name="description"
                      placeholder="Description"
                      class="border p-2 w-full mb-4"></textarea>

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
