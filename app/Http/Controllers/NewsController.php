<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
    	return NewsResource::collection(
			News::latest()->paginate(10)
		);
    }

    public function show(Request $request, News $news)
    {
    	return new NewsResource($news);
    }
}
