<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;

class NewsController extends Controller
{
    public function show($slug)
    {
        $news = News::with(['author:id,avatar,bio,name,username'])
                    ->where('slug', $slug)
                    ->firstOrFail();

        $latestNews = News::with(['newsCategory:id,title'])
                        ->latest()
                        ->limit(4)
                        ->get();

        return view('pages.news.show', compact('news', 'latestNews'));
    }

    public function category($slug)
    {
        $categories = NewsCategory::where('slug', $slug)
                        ->firstOrFail();
        
        return view('pages.news.category', compact('categories'));
    }
}
