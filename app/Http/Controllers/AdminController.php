<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
    	return view('home');
    }

    public function profile(Request $request)
    {
    	return new UserResource($request->user());
    }
}
