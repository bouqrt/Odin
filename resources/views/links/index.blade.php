<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Links
        </h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('links.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            + Add Link
        </a>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-2 py-1">Title</th>
                    <th class="border px-2 py-1">URL</th>
                    <th class="border px-2 py-1">Category</th>
                    <th class="border px-2 py-1">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($links as $link)
                    <tr>
                        <td class="border px-2 py-1">{{ $link->title }}</td>

                        <td class="border px-2 py-1">
                            <a href="{{ $link->url }}" target="_blank" class="text-blue-500 underline">
                                {{ $link->url }}
                            </a>
                        </td>

                        <td class="border px-2 py-1">
                            {{ $link->category->name ?? 'No category' }}
                        </td>

                        <td class="border px-2 py-1">
                            <a href="{{ route('links.edit', $link) }}" class="text-blue-500">
                                Edit
                            </a>

                            <form action="{{ route('links.destroy', $link) }}"
                                  method="POST"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 ml-2"
                                        onclick="return confirm('Delete this link?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-4 text-gray-500">
                            No links found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
