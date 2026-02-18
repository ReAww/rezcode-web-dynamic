@extends('layouts.admin')

@section('title', 'Social Links')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-black text-white">Social Links</h1>
        <p class="text-gray-400 text-sm mt-1">Manage social media links shown on the website</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Add New -->
    <div class="lg:col-span-1">
        <div class="glass-card rounded-2xl p-6">
            <h3 class="text-white font-bold mb-4">Add Social Link</h3>
            <form method="POST" action="{{ route('admin.social-links.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-medium text-gray-400 mb-1.5">Platform</label>
                    <input type="text" name="platform" value="{{ old('platform') }}" required
                           class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white placeholder-gray-500 rounded-xl px-3 py-2.5 text-sm outline-none transition-colors"
                           placeholder="Instagram">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-400 mb-1.5">URL</label>
                    <input type="url" name="url" value="{{ old('url') }}" required
                           class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white placeholder-gray-500 rounded-xl px-3 py-2.5 text-sm outline-none transition-colors"
                           placeholder="https://instagram.com/...">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-400 mb-1.5">Icon <span class="text-gray-600">(instagram/tiktok/youtube/github/facebook/linkedin)</span></label>
                    <input type="text" name="icon" value="{{ old('icon') }}" required
                           class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white placeholder-gray-500 rounded-xl px-3 py-2.5 text-sm outline-none transition-colors"
                           placeholder="instagram">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-400 mb-1.5">Brand Color</label>
                    <input type="text" name="color" value="{{ old('color', '#06b6d4') }}" required
                           class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white rounded-xl px-3 py-2.5 text-sm outline-none transition-colors"
                           placeholder="#E1306C">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-medium text-gray-400 mb-1.5">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                               class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white rounded-xl px-3 py-2.5 text-sm outline-none transition-colors">
                    </div>
                    <div class="flex items-end pb-2.5">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" checked
                                   class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-cyan-500">
                            <span class="text-sm text-gray-300">Active</span>
                        </label>
                    </div>
                </div>
                <button type="submit" class="w-full btn-primary py-2.5 text-sm">Add Link</button>
            </form>
        </div>
    </div>

    <!-- Existing Links -->
    <div class="lg:col-span-2">
        <div class="glass-card rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-800">
                <h3 class="text-white font-bold">Current Links ({{ $links->count() }})</h3>
            </div>
            <div class="divide-y divide-gray-800/60">
                @forelse($links as $link)
                    <div class="px-6 py-4 flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                                 style="background-color: {{ $link->color }}20; border: 1px solid {{ $link->color }}40;">
                                <span class="text-xs font-bold" style="color: {{ $link->color }}">{{ strtoupper(substr($link->platform, 0, 2)) }}</span>
                            </div>
                            <div class="min-w-0">
                                <p class="text-white font-medium text-sm">{{ $link->platform }}</p>
                                <p class="text-gray-500 text-xs truncate">{{ $link->url }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 flex-shrink-0">
                            <span class="text-xs {{ $link->is_active ? 'text-green-400' : 'text-gray-600' }}">
                                {{ $link->is_active ? 'Active' : 'Hidden' }}
                            </span>
                            <form method="POST" action="{{ route('admin.social-links.destroy', $link) }}" onsubmit="return confirm('Delete this link?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-xs text-red-400 hover:text-red-300 bg-red-400/10 hover:bg-red-400/20 px-3 py-1.5 rounded-lg transition-colors">Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-10 text-center text-gray-500 text-sm">No social links yet.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
