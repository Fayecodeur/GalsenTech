<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'author') {
            $author_articles = Article::where('author_id', $user->id)->count();
        }
        $articles = Article::count();
        $recent_articles = Article::where('isActive',1)->orderBy('created_at', 'desc')->limit(5)->get();
        $categories = Category::count();
        return view('back.dashboard',
            [
                'author_articles'=> $user->role === "author" ? $author_articles : null,
                'recent_articles' => $recent_articles,
            'categories' => $categories,
            'articles' => $articles
            ]
        );
    }
}
