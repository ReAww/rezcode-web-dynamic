@extends('layouts.app')

@section('title', $post->title . ' — Rezcode Blog')

@section('content')
<div class="min-h-screen pt-24 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back -->
        <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-white text-sm mb-8 transition-colors group">
            <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
            Back to Blog
        </a>

        <!-- Article Header -->
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-4">
                <span class="text-xs font-semibold uppercase tracking-wider text-cyan-400 bg-cyan-400/10 border border-cyan-400/20 px-3 py-1 rounded-full">
                    {{ ucfirst($post->category) }}
                </span>
                <span class="text-gray-500 text-sm">{{ $post->read_time }}</span>
                @if($post->published_at)
                    <span class="text-gray-500 text-sm">·</span>
                    <span class="text-gray-500 text-sm">{{ $post->published_at->format('M d, Y') }}</span>
                @endif
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight mb-6">
                {{ $post->title }}
            </h1>
            <p class="text-gray-400 text-lg leading-relaxed border-l-4 border-cyan-500/50 pl-5">
                {{ $post->excerpt }}
            </p>
        </div>

        <!-- Article Visual -->
        <div class="relative h-48 sm:h-64 rounded-2xl bg-gradient-to-br from-gray-800 to-gray-900 overflow-hidden mb-10">
            <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 via-transparent to-blue-600/10"></div>
            <div class="absolute inset-0 opacity-20"
                 style="background-image: linear-gradient(rgba(255,255,255,0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.05) 1px, transparent 1px); background-size: 30px 30px;"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-20 h-20 rounded-3xl bg-gray-700/60 backdrop-blur-sm flex items-center justify-center">
                    <svg class="w-10 h-10 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Article Content -->
        <div class="glass-card rounded-2xl p-6 sm:p-10 mb-10">
            <div class="prose prose-invert prose-cyan max-w-none
                        prose-headings:font-black prose-headings:text-white
                        prose-p:text-gray-400 prose-p:leading-relaxed
                        prose-a:text-cyan-400 prose-a:no-underline hover:prose-a:text-cyan-300
                        prose-strong:text-white
                        prose-h2:text-2xl prose-h2:mt-8 prose-h2:mb-4
                        prose-h3:text-xl prose-h3:mt-6 prose-h3:mb-3">
                {!! $post->content !!}
            </div>
        </div>

        <!-- CTA -->
        <div class="glass-card rounded-2xl p-6 sm:p-8 text-center border border-cyan-500/20">
            <h3 class="text-xl font-bold text-white mb-2">Ready to work with us?</h3>
            <p class="text-gray-400 text-sm mb-5">Let's discuss your project and build something great together.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="https://wa.me/6282121001438" target="_blank"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-green-500 hover:bg-green-400 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-200 text-sm">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Chat on WhatsApp
                </a>
                <a href="{{ route('home') }}#contact" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 btn-secondary px-6 py-3 text-sm">
                    Send a Message
                </a>
            </div>
        </div>

        <!-- Related Posts -->
        @if($related->count())
            <div class="mt-12">
                <h3 class="text-xl font-bold text-white mb-6">Related Articles</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    @foreach($related as $rel)
                        <x-blog-card :post="$rel" />
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
