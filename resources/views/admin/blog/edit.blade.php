@extends('layouts.admin')

@section('title', 'Edit Blog Post')

@section('content')
<div class="flex items-center gap-4 mb-6">
    <a href="{{ route('admin.blog.index') }}" class="text-gray-400 hover:text-white transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
    </a>
    <h1 class="text-2xl font-black text-white">Edit Post</h1>
</div>

<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.blog.update', $blog) }}" class="glass-card rounded-2xl p-6 space-y-5">
        @csrf @method('PUT')
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title', $blog->title) }}" required
                   class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white rounded-xl px-4 py-3 text-sm outline-none transition-colors">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Excerpt</label>
            <textarea name="excerpt" rows="2" required
                      class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white rounded-xl px-4 py-3 text-sm outline-none transition-colors resize-none">{{ old('excerpt', $blog->excerpt) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Content <span class="text-gray-500 font-normal">(HTML supported)</span></label>
            <textarea name="content" rows="12" required
                      class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white rounded-xl px-4 py-3 text-sm outline-none transition-colors resize-y font-mono">{{ old('content', $blog->content) }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                <select name="category" class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white rounded-xl px-4 py-3 text-sm outline-none transition-colors">
                    @foreach(['tech' => 'Tech', 'ai' => 'AI', 'automation' => 'Automation', 'business' => 'Business', 'design' => 'Design'] as $val => $label)
                        <option value="{{ $val }}" {{ old('category', $blog->category) === $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Read Time</label>
                <input type="text" name="read_time" value="{{ old('read_time', $blog->read_time) }}"
                       class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white rounded-xl px-4 py-3 text-sm outline-none transition-colors">
            </div>
        </div>

        <div class="flex items-center gap-2 pt-2">
            <input type="checkbox" name="is_published" value="1" id="is_published" {{ old('is_published', $blog->is_published) ? 'checked' : '' }}
                   class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-cyan-500 focus:ring-cyan-500">
            <label for="is_published" class="text-sm text-gray-300 cursor-pointer">Published</label>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="btn-primary px-6 py-2.5 text-sm">Save Changes</button>
            <a href="{{ route('admin.blog.index') }}" class="btn-secondary px-6 py-2.5 text-sm">Cancel</a>
        </div>
    </form>
</div>
@endsection
