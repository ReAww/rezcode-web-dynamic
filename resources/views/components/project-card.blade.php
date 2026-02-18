{{-- Project Card Component --}}
@props(['project'])

@php
    $categoryColors = [
        'web'        => 'text-cyan-400 bg-cyan-400/10 border-cyan-400/20',
        'mobile'     => 'text-purple-400 bg-purple-400/10 border-purple-400/20',
        'ai'         => 'text-pink-400 bg-pink-400/10 border-pink-400/20',
        'automation' => 'text-amber-400 bg-amber-400/10 border-amber-400/20',
        'other'      => 'text-gray-400 bg-gray-400/10 border-gray-400/20',
    ];
    $catColor = $categoryColors[$project->category] ?? $categoryColors['other'];
@endphp

<div class="glass-card rounded-2xl overflow-hidden group hover:border-cyan-500/30 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
    <!-- Card Header / Visual -->
    <div class="relative h-44 sm:h-48 bg-gradient-to-br from-gray-800 to-gray-900 overflow-hidden flex-shrink-0">
        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 via-transparent to-blue-600/10 group-hover:from-cyan-500/20 group-hover:to-blue-600/20 transition-all duration-500"></div>
        <!-- Category grid pattern -->
        <div class="absolute inset-0 opacity-20"
             style="background-image: linear-gradient(rgba(255,255,255,0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.05) 1px, transparent 1px); background-size: 30px 30px;"></div>
        <!-- Category badge -->
        <div class="absolute top-4 left-4">
            <span class="text-xs font-semibold uppercase tracking-wider px-3 py-1 rounded-full border {{ $catColor }}">
                {{ ucfirst($project->category) }}
            </span>
        </div>
        @if($project->is_featured)
            <div class="absolute top-4 right-4">
                <span class="text-xs font-semibold text-amber-400 bg-amber-400/10 border border-amber-400/20 px-3 py-1 rounded-full">⭐ Featured</span>
            </div>
        @endif
        <!-- Center icon -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="w-16 h-16 rounded-2xl bg-gray-700/60 backdrop-blur-sm flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <svg class="w-8 h-8 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Card Body -->
    <div class="p-5 sm:p-6 flex flex-col flex-1">
        <h3 class="text-lg font-bold text-white mb-2 group-hover:text-cyan-400 transition-colors">{{ $project->title }}</h3>
        <p class="text-gray-400 text-sm leading-relaxed mb-4 flex-1">{{ Str::limit($project->description, 120) }}</p>

        <!-- Tech Stack -->
        @if($project->tech_stack && count($project->tech_stack))
            <div class="flex flex-wrap gap-2 mb-5">
                @foreach(array_slice($project->tech_stack, 0, 4) as $tech)
                    <span class="text-xs text-gray-400 bg-gray-800 border border-gray-700 px-2.5 py-1 rounded-lg">{{ $tech }}</span>
                @endforeach
                @if(count($project->tech_stack) > 4)
                    <span class="text-xs text-gray-500 px-2.5 py-1">+{{ count($project->tech_stack) - 4 }} more</span>
                @endif
            </div>
        @endif

        <!-- Links -->
        <div class="flex items-center gap-3 mt-auto">
            @if($project->url)
                <a href="{{ $project->url }}" target="_blank"
                   class="flex items-center gap-1.5 text-sm text-cyan-400 hover:text-cyan-300 font-medium transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Live Demo
                </a>
            @endif
            @if($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank"
                   class="flex items-center gap-1.5 text-sm text-gray-400 hover:text-white font-medium transition-colors {{ $project->url ? 'ml-auto' : '' }}">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                    GitHub
                </a>
            @endif
        </div>
    </div>
</div>
