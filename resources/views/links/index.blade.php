@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Links</h1>

    <a href="{{ route('links.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Link</a>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead>
            <tr>
                <th class="border px-2 py-1">Title</th>
                <th class="border px-2 py-1">URL</th>
                <th class="border px-2 py-1">Category</th>
                <th class="border px-2 py-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($links as $link)
            <tr>
                <td class="border px-2 py-1">{{ $link->title }}</td>
                <td class="border px-2 py-1"><a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a></td>
                <td class="border px-2 py-1">{{ $link->category->name }}</td>
                <td class="border px-2 py-1">
                    <a href="{{ route('links.edit', $link->id) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('links.destroy', $link->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 ml-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
