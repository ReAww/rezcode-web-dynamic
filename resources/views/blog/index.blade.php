@extends('layouts.app')

@section('title', 'Blog — Rezcode Agency')

@section('content')
<div class="min-h-screen pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12 lg:mb-16">
            <span class="inline-flex items-center gap-2 bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 text-xs font-semibold uppercase tracking-widest px-4 py-2 rounded-full mb-4">
                <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
                Rezcode Blog
            </span>
            <h1 class="text-4xl sm:text-5xl font-black text-white mb-4">
                Insights & <span class="gradient-text">Articles</span>
            </h1>
            <p class="text-gray-400 max-w-xl mx-auto text-sm sm:text-base">
                Thoughts on technology, development, AI, and digital strategy from the Rezcode team.
            </p>
        </div>

        @if($posts->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
                @foreach($posts as $index => $post)
                    <x-blog-card :post="$post" :featured="$index === 0" />
                @endforeach
            </div>

            <!-- Pagination -->
            @if($posts->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $posts->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-20">
                <div class="w-16 h-16 rounded-2xl bg-gray-800 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <p class="text-gray-500">No articles published yet. Check back soon!</p>
            </div>
        @endif
    </div>
</div>
@endsection
