<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\News;

class AuthorController extends Controller
{
    public function show($username)
    {
        $author = Author::where('username', $username)->first();

        $news = News::with(['newsCategory:id,title'])
                        ->latest()
                        ->limit(4)
                        ->get();

        return view('pages.author.show', compact('author', 'news'));
    }
}
