<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::orderByDesc('created_at')->paginate(15);
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'     => 'required|string|max:300',
            'excerpt'   => 'required|string|max:500',
            'content'   => 'required|string',
            'category'  => 'required|string|max:50',
            'read_time' => 'required|string|max:30',
        ]);

        $validated['slug']         = Str::slug($validated['title']);
        $validated['is_published'] = $request->boolean('is_published');
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(BlogPost $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title'     => 'required|string|max:300',
            'excerpt'   => 'required|string|max:500',
            'content'   => 'required|string',
            'category'  => 'required|string|max:50',
            'read_time' => 'required|string|max:30',
        ]);

        $wasPublished = $blog->is_published;
        $validated['is_published'] = $request->boolean('is_published');

        if ($validated['is_published'] && !$wasPublished) {
            $validated['published_at'] = now();
        }

        $blog->update($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted.');
    }
}
