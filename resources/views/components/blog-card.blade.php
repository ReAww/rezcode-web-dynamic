{{-- Blog Card Component --}}
@props(['post', 'featured' => false])

@php
    $categoryColors = [
        'tech'       => 'text-cyan-400 bg-cyan-400/10 border-cyan-400/20',
        'ai'         => 'text-pink-400 bg-pink-400/10 border-pink-400/20',
        'automation' => 'text-amber-400 bg-amber-400/10 border-amber-400/20',
        'business'   => 'text-green-400 bg-green-400/10 border-green-400/20',
        'design'     => 'text-purple-400 bg-purple-400/10 border-purple-400/20',
    ];
    $catColor = $categoryColors[$post->category] ?? 'text-gray-400 bg-gray-400/10 border-gray-400/20';
@endphp

<article class="glass-card rounded-2xl overflow-hidden group hover:border-cyan-500/30 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
    <!-- Visual Header -->
    <div class="relative {{ $featured ? 'h-52 sm:h-56' : 'h-40 sm:h-44' }} bg-gradient-to-br from-gray-800 to-gray-900 overflow-hidden flex-shrink-0">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/10 via-transparent to-cyan-500/10 group-hover:from-blue-600/20 group-hover:to-cyan-500/20 transition-all duration-500"></div>
        <div class="absolute inset-0 opacity-20"
             style="background-image: linear-gradient(rgba(255,255,255,0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.05) 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="absolute top-4 left-4">
            <span class="text-xs font-semibold uppercase tracking-wider px-3 py-1 rounded-full border {{ $catColor }}">
                {{ ucfirst($post->category) }}
            </span>
        </div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="w-14 h-14 rounded-2xl bg-gray-700/60 backdrop-blur-sm flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <svg class="w-7 h-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="p-5 sm:p-6 flex flex-col flex-1">
        <!-- Meta -->
        <div class="flex items-center gap-3 text-xs text-gray-500 mb-3">
            @if($post->published_at)
                <span>{{ $post->published_at->format('M d, Y') }}</span>
                <span>·</span>
            @endif
            <span>{{ $post->read_time }}</span>
        </div>

        <h3 class="{{ $featured ? 'text-xl' : 'text-base' }} font-bold text-white mb-2 group-hover:text-cyan-400 transition-colors leading-snug">
            {{ $post->title }}
        </h3>
        <p class="text-gray-400 text-sm leading-relaxed mb-5 flex-1">{{ Str::limit($post->excerpt, $featured ? 150 : 100) }}</p>

        <a href="{{ route('blog.show', $post->slug) }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-cyan-400 hover:text-cyan-300 transition-colors mt-auto group/link">
            Read Article
            <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>
</article>
