@extends('layouts.admin')

@section('title', 'Blog Posts')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-black text-white">Blog Posts</h1>
        <p class="text-gray-400 text-sm mt-1">Manage your blog content</p>
    </div>
    <a href="{{ route('admin.blog.create') }}" class="btn-primary text-sm px-5 py-2.5">+ New Post</a>
</div>

<div class="glass-card rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-800">
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Post</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4 hidden sm:table-cell">Category</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4 hidden md:table-cell">Status</th>
                    <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4 hidden lg:table-cell">Date</th>
                    <th class="text-right text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800/60">
                @forelse($posts as $post)
                    <tr class="hover:bg-gray-800/30 transition-colors">
                        <td class="px-6 py-4">
                            <p class="text-white font-medium text-sm">{{ Str::limit($post->title, 60) }}</p>
                            <p class="text-gray-500 text-xs mt-0.5">{{ $post->read_time }}</p>
                        </td>
                        <td class="px-6 py-4 hidden sm:table-cell">
                            <span class="text-xs text-gray-400 bg-gray-800 px-2.5 py-1 rounded-lg capitalize">{{ $post->category }}</span>
                        </td>
                        <td class="px-6 py-4 hidden md:table-cell">
                            <span class="inline-flex items-center gap-1.5 text-xs font-medium px-2.5 py-1 rounded-full {{ $post->is_published ? 'text-green-400 bg-green-400/10' : 'text-amber-400 bg-amber-400/10' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $post->is_published ? 'bg-green-400' : 'bg-amber-400' }}"></span>
                                {{ $post->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 hidden lg:table-cell text-gray-500 text-sm">
                            {{ $post->published_at?->format('M d, Y') ?? '—' }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                @if($post->is_published)
                                    <a href="{{ route('blog.show', $post->slug) }}" target="_blank"
                                       class="text-xs text-gray-400 hover:text-white bg-gray-800 hover:bg-gray-700 px-3 py-1.5 rounded-lg transition-colors">View</a>
                                @endif
                                <a href="{{ route('admin.blog.edit', $post) }}"
                                   class="text-xs text-cyan-400 hover:text-cyan-300 bg-cyan-400/10 hover:bg-cyan-400/20 px-3 py-1.5 rounded-lg transition-colors">Edit</a>
                                <form method="POST" action="{{ route('admin.blog.destroy', $post) }}" onsubmit="return confirm('Delete this post?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-xs text-red-400 hover:text-red-300 bg-red-400/10 hover:bg-red-400/20 px-3 py-1.5 rounded-lg transition-colors">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">No posts yet. <a href="{{ route('admin.blog.create') }}" class="text-cyan-400 hover:underline">Create one</a>.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($posts->hasPages())
        <div class="px-6 py-4 border-t border-gray-800">{{ $posts->links() }}</div>
    @endif
</div>
@endsection
