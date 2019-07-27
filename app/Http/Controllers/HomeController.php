<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);

        return view('welcome', compact('news'));
    }

    public function show(Request $request, News $news)
    {
        return view('news', compact('news'));
    }
}
