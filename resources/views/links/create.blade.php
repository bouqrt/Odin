@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Add Link</h1>

    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-2 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('links.store') }}" method="POST">
        @csrf
        <div class="mb-2">
            <label>Title</label>
            <input type="text" name="title" class="border px-2 py-1 w-full" value="{{ old('title') }}">
        </div>
        <div class="mb-2">
            <label>URL</label>
            <input type="url" name="url" class="border px-2 py-1 w-full" value="{{ old('url') }}">
        </div>
        <div class="mb-2">
            <label>Category</label>
            <select name="category_id" class="border px-2 py-1 w-full">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>Description</label>
            <textarea name="description" class="border px-2 py-1 w-full">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
