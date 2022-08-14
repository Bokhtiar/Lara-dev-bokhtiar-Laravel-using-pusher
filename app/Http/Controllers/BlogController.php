<?php

namespace App\Http\Controllers;

use App\Events\BlogUpdate;
use App\Models\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create() {
        return view('blogCreate');
    }

    public function store(Request $request) 
    {
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->save();

        event(new BlogUpdate($blog)); // broadcast `ScoreUpdated` event
        return back();
    }

    public function index () {
        return Blog::all(['id', 'title', 'body']);
    }

    
}
