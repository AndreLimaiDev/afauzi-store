<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Banner;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $banners = Banner::with(['news'])->get();

        $featured = News::with(['newsCategory:id,title'])
                        ->where('is_featured', true)
                        ->get();

        $news = News::with(['newsCategory:id,title'])
                        ->latest()
                        ->limit(4)
                        ->get();
        $authors = Author::query()->get();

        return view('pages.landing', compact('banners', 'featured', 'news', 'authors'));
    }
}
