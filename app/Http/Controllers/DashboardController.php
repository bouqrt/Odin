<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Link;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('user_id', auth()->id())->get();

        $links = Link::with('category', 'tags')
            ->where('user_id', auth()->id())
            ->when($request->search, function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%');
            })
            ->when($request->category, function ($q) use ($request) {
                $q->where('category_id', $request->category);
            })
            ->get();

        return view('dashboard', compact('categories', 'links'));
    }
}
