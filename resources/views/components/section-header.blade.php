{{-- Section Header Component --}}
{{-- Props: badge (optional), title, subtitle (optional), align (left|center, default center) --}}

@props([
    'badge'    => null,
    'title'    => '',
    'subtitle' => null,
    'align'    => 'center',
])

<div class="{{ $align === 'left' ? 'text-left' : 'text-center' }} mb-12 lg:mb-16">
    @if($badge)
        <span class="inline-flex items-center gap-2 bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 text-xs font-semibold uppercase tracking-widest px-4 py-2 rounded-full mb-4">
            <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
            {{ $badge }}
        </span>
    @endif
    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white mb-4 leading-tight">
        {!! $title !!}
    </h2>
    @if($subtitle)
        <p class="text-gray-400 text-base sm:text-lg max-w-2xl {{ $align === 'center' ? 'mx-auto' : '' }} leading-relaxed">
            {{ $subtitle }}
        </p>
    @endif
</div>
