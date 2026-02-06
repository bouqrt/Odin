<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">LaraBookmarks</h2>
    </x-slot>

    <div class="p-6 grid grid-cols-3 gap-6">

        <!-- Categories -->
        <div>
            <div class="flex justify-between mb-2">
                <h3 class="font-bold">Categories</h3>
                <a href="{{ route('categories.create') }}" class="text-blue-500">+ Add</a>
            </div>

            <ul>
                @foreach($categories as $category)
                    <li class="border-b py-1">{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Links -->
        <div class="col-span-2">
            <div class="flex justify-between mb-2">
                <h3 class="font-bold">Links</h3>
                <a href="{{ route('links.create') }}" class="text-blue-500">+ Add</a>
            </div>

            <table class="w-full border">
                <tr class="bg-gray-200">
                    <th class="p-2">Title</th>
                    <th class="p-2">Category</th>
                </tr>

                @foreach($links as $link)
                <tr>
                    <td class="p-2">{{ $link->title }}</td>
                    <td class="p-2">{{ $link->category->name }}</td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>
</x-app-layout>
