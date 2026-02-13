<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Category;
use App\Models\Tag;

class linkcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Link::with('category')->get();
        return view('links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('links.create', [
        'categories' => Category::where('user_id', auth()->id())->get(),
        'tags' => Tag::where('user_id', auth()->id())->get(),
    ]);
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'url' => 'required|url',
        'category_id' => 'required|exists:categories,id',
        'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id',
    ]);

    $link = Link::create([
        'title' => $request->title,
        'url' => $request->url,
        'category_id' => $request->category_id,
        'user_id' => auth()->id(),
    ]);

    if ($request->has('tags')) {
        $link->tags()->attach($request->tags);
    }

    return redirect()->route('links.index')
        ->with('success', 'Link created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        return view('links.edit', compact('link', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'category_id' => 'required|exists:categories,id',
        ]);

        $link->update($request->all());
        return redirect()->route('links.index')->with('success', 'Link updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $link->delete();
        return redirect()->route('links.index')->with('success', 'Link deleted successfully.');
    }
}
