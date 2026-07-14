<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArticles = Article::where('user_id', Auth::id())->count();

        $totalCategories = Category::where('user_id', Auth::id())->count();

        $publishedArticles = Article::where('user_id', Auth::id())
            ->where('status', 'published')
            ->count();

        $latestArticles = Article::where('user_id', Auth::id())
            ->with('category')
            ->latest()
            ->take(5)
            ->get();

        $categories = Category::where('user_id', Auth::id())->get();

        return view('dashboard', compact(
            'totalArticles',
            'totalCategories',
            'publishedArticles',
            'latestArticles',
            'categories'
        ));
    }
}