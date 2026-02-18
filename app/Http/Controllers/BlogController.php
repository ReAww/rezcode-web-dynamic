<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::published()->paginate(9);
        return view('blog.index', compact('posts'));
    }

    public function show(BlogPost $post)
    {
        if (!$post->is_published) {
            abort(404);
        }
        $related = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->limit(3)
            ->get();

        return view('blog.show', compact('post', 'related'));
    }
}
