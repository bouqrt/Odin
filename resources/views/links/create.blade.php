<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Add Link
        </h2>
    </x-slot>

    <div class="p-6 max-w-xl">
        <form action="{{ route('links.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-medium mb-1">Title</label>
                <input type="text" name="title"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">URL</label>
                <input type="url" name="url"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Category</label>
                <select name="category_id"
                        class="w-full border rounded px-3 py-2"
                        required>
                    <option value="">-- Select Category --</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label class="block">Tags</label>
                <select name="tags[]" multiple class="w-full border p-2">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Save
            </button>
            
        </form>
    </div>
</x-app-layout>
