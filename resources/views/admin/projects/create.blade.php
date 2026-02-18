@extends('layouts.admin')

@section('title', 'Add Project')

@section('content')
<div class="flex items-center gap-4 mb-6">
    <a href="{{ route('admin.projects.index') }}" class="text-gray-400 hover:text-white transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
    </a>
    <div>
        <h1 class="text-2xl font-black text-white">Add Project</h1>
        <p class="text-gray-400 text-sm mt-0.5">Create a new portfolio project</p>
    </div>
</div>

<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.projects.store') }}" class="glass-card rounded-2xl p-6 space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Title <span class="text-red-400">*</span></label>
            <input type="text" name="title" value="{{ old('title') }}" required
                   class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white placeholder-gray-500 rounded-xl px-4 py-3 text-sm outline-none transition-colors"
                   placeholder="E-Commerce Platform">
            @error('title')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Description <span class="text-red-400">*</span></label>
            <textarea name="description" rows="4" required
                      class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white placeholder-gray-500 rounded-xl px-4 py-3 text-sm outline-none transition-colors resize-none"
                      placeholder="Describe the project...">{{ old('description') }}</textarea>
            @error('description')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Category <span class="text-red-400">*</span></label>
                <select name="category" class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white rounded-xl px-4 py-3 text-sm outline-none transition-colors">
                    @foreach(['web' => 'Web', 'mobile' => 'Mobile', 'ai' => 'AI', 'automation' => 'Automation', 'other' => 'Other'] as $val => $label)
                        <option value="{{ $val }}" {{ old('category') === $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                       class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white rounded-xl px-4 py-3 text-sm outline-none transition-colors">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Tech Stack <span class="text-gray-500 font-normal">(comma-separated)</span></label>
            <input type="text" name="tech_stack" value="{{ old('tech_stack') }}"
                   class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white placeholder-gray-500 rounded-xl px-4 py-3 text-sm outline-none transition-colors"
                   placeholder="Laravel, Vue.js, MySQL, Redis">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Live URL</label>
                <input type="url" name="url" value="{{ old('url') }}"
                       class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white placeholder-gray-500 rounded-xl px-4 py-3 text-sm outline-none transition-colors"
                       placeholder="https://example.com">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">GitHub URL</label>
                <input type="url" name="github_url" value="{{ old('github_url') }}"
                       class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white placeholder-gray-500 rounded-xl px-4 py-3 text-sm outline-none transition-colors"
                       placeholder="https://github.com/...">
            </div>
        </div>

        <div class="flex items-center gap-6 pt-2">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                       class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-cyan-500 focus:ring-cyan-500">
                <span class="text-sm text-gray-300">Featured Project</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                       class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-cyan-500 focus:ring-cyan-500">
                <span class="text-sm text-gray-300">Active (visible)</span>
            </label>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="btn-primary px-6 py-2.5 text-sm">Create Project</button>
            <a href="{{ route('admin.projects.index') }}" class="btn-secondary px-6 py-2.5 text-sm">Cancel</a>
        </div>
    </form>
</div>
@endsection
