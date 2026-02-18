@extends('layouts.app')

@section('title', 'Portfolio — Rezcode Digital Solutions')

@section('content')
{{-- Page Hero --}}
<section class="relative pt-32 pb-16 overflow-hidden">
    <div class="hero-bg"></div>
    <div class="hero-glow-1" style="top: -10%; left: 20%;"></div>
    <div class="hero-glow-2" style="top: 10%; right: 10%;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto">
            <div class="inline-flex items-center gap-2 bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 text-xs font-semibold uppercase tracking-widest px-5 py-2.5 rounded-full mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
                Our Work
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-tight mb-6">
                Projects We've
                <span class="gradient-text">Built & Shipped</span>
            </h1>
            <p class="text-gray-400 text-lg leading-relaxed">
                A curated selection of real-world solutions we've engineered for clients across industries — from web platforms and mobile apps to AI systems and automation pipelines.
            </p>
        </div>

        {{-- Stats Bar --}}
        <div class="mt-12 grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-2xl mx-auto">
            @foreach([['50+', 'Projects Delivered'], ['6+', 'Industries'], ['100%', 'Client Satisfaction'], ['3+', 'Years Experience']] as $stat)
                <div class="glass-card rounded-2xl p-4 text-center">
                    <div class="text-2xl font-black text-white mb-1">{{ $stat[0] }}</div>
                    <div class="text-gray-500 text-xs">{{ $stat[1] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Projects Grid with Filter --}}
<section class="py-12 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Filter Tabs --}}
        <div x-data="{ active: 'all' }" class="space-y-10">
            <div class="flex flex-wrap justify-center gap-2">
                @foreach(['all' => 'All Projects', 'web' => 'Web', 'ai' => 'AI', 'mobile' => 'Mobile', 'automation' => 'Automation'] as $key => $label)
                    <button @click="active = '{{ $key }}'"
                            :class="active === '{{ $key }}'
                                ? 'bg-cyan-500/20 border-cyan-500/40 text-cyan-400 shadow-lg shadow-cyan-500/10'
                                : 'border-gray-700 text-gray-400 hover:border-gray-600 hover:text-gray-300'"
                            class="px-5 py-2.5 rounded-xl border text-sm font-semibold transition-all duration-200">
                        {{ $label }}
                        @if($key !== 'all')
                            <span class="ml-1.5 text-xs opacity-60">({{ $projects->where('category', $key)->count() }})</span>
                        @else
                            <span class="ml-1.5 text-xs opacity-60">({{ $projects->count() }})</span>
                        @endif
                    </button>
                @endforeach
            </div>

            {{-- Projects Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($projects as $project)
                    <div x-show="active === 'all' || active === '{{ $project->category }}'"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="reveal">
                        <x-project-card :project="$project" />
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20">
                        <div class="text-gray-600 text-6xl mb-4">🚀</div>
                        <p class="text-gray-500">No projects yet. Check back soon!</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- CTA Section --}}
        <div class="mt-20 text-center">
            <div class="glass-card rounded-3xl p-10 sm:p-14 max-w-3xl mx-auto relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 via-transparent to-blue-600/5 pointer-events-none"></div>
                <div class="relative z-10">
                    <div class="text-4xl mb-4">💡</div>
                    <h2 class="text-2xl sm:text-3xl font-black text-white mb-4">
                        Have a Project in Mind?
                    </h2>
                    <p class="text-gray-400 mb-8 max-w-xl mx-auto">
                        Let's build something great together. Tell us about your idea and we'll turn it into reality.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="https://wa.me/6282121001438" target="_blank"
                           class="inline-flex items-center justify-center gap-3 bg-green-500 hover:bg-green-400 text-white font-bold px-8 py-4 rounded-2xl transition-all duration-300 hover:shadow-lg hover:shadow-green-500/25 hover:-translate-y-0.5">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Start on WhatsApp
                        </a>
                        <a href="{{ route('home') }}#contact"
                           class="inline-flex items-center justify-center gap-2 btn-secondary px-8 py-4">
                            Send a Message
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
