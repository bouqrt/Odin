<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Categories</h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('categories.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + New Category
        </a>

        @if(session('success'))
            <div class="mt-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <table class="mt-6 w-full border">
            <tr class="bg-gray-200">
                <th class="p-2">Name</th>
                <th class="p-2">Actions</th>
            </tr>

            @foreach($categories as $category)
            <tr>
                <td class="p-2">{{ $category->name }}</td>
                <td class="p-2">
                    <a href="{{ route('categories.edit', $category) }}"
                       class="text-blue-500">Edit</a>

                    <form action="{{ route('categories.destroy', $category) }}"
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 ml-2"
                                onclick="return confirm('Delete?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
