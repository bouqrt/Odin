<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Add Category</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            <div>
                <label class="block">Name</label>
                <input type="text" name="name"
                       class="border p-2 w-full"
                       required>
            </div>

            <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
