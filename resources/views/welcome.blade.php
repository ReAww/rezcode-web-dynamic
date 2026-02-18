@extends('layouts.app')

@section('title', 'Rezcode — Digital Solutions Agency')

@section('content')
<!-- ============================================================
     HERO SECTION
============================================================ -->
<section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
    <!-- Background Effects -->
    <div class="hero-bg"></div>
    <div class="hero-glow-1"></div>
    <div class="hero-glow-2"></div>
    <div class="hero-glow-3"></div>
    <div class="hero-grid"></div>

    <!-- Particles -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        @for($i = 0; $i < 12; $i++)
            <div class="particle" style="left: {{ rand(5, 95) }}%; animation-delay: {{ $i * 0.7 }}s; animation-duration: {{ rand(8, 16) }}s; width: {{ rand(2, 4) }}px; height: {{ rand(2, 4) }}px;"></div>
        @endfor
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Badge -->
        <div class="reveal inline-flex items-center gap-2 bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 text-xs font-semibold uppercase tracking-widest px-5 py-2.5 rounded-full mb-8">
            <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
            Digital Solutions Agency
        </div>

        <!-- Headline -->
        <h1 class="reveal text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black text-white leading-tight mb-6">
            We Build
            <span class="bg-gradient-to-r from-cyan-400 via-blue-400 to-purple-500 bg-clip-text text-transparent">
                Digital Products
            </span>
            <br class="hidden sm:block">That Drive Growth
        </h1>

        <!-- Subheadline -->
        <p class="reveal text-gray-400 text-base sm:text-lg lg:text-xl max-w-2xl mx-auto mb-10 leading-relaxed">
            From custom web applications to AI integrations and automation systems — Rezcode delivers enterprise-grade solutions tailored to your business.
        </p>

        <!-- CTA Buttons -->
        <div class="reveal flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="https://wa.me/6282121001438" target="_blank"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-green-500 hover:bg-green-400 text-white font-bold px-8 py-4 rounded-2xl transition-all duration-300 hover:shadow-lg hover:shadow-green-500/25 hover:-translate-y-0.5 text-sm sm:text-base">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                Chat on WhatsApp
            </a>
            <a href="#project"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 btn-secondary px-8 py-4 text-sm sm:text-base">
                View Our Work
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <!-- Stats -->
        <div class="reveal mt-16 grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-8 max-w-2xl mx-auto">
            @foreach([['50+', 'Projects Done'], ['100%', 'Client Satisfaction'], ['3+', 'Years Experience'], ['24/7', 'Support']] as $stat)
                <div class="text-center">
                    <div class="text-2xl sm:text-3xl font-black text-white mb-1">{{ $stat[0] }}</div>
                    <div class="text-gray-500 text-xs sm:text-sm">{{ $stat[1] }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-gray-600">
        <span class="text-xs uppercase tracking-widest">Scroll</span>
        <div class="w-px h-10 bg-gradient-to-b from-gray-600 to-transparent animate-pulse"></div>
    </div>
</section>

<!-- ============================================================
     ABOUT SECTION
============================================================ -->
<section id="about" class="py-20 lg:py-28 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-gray-900/30 to-transparent pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Left: Content -->
            <div class="reveal">
                <span class="inline-flex items-center gap-2 bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 text-xs font-semibold uppercase tracking-widest px-4 py-2 rounded-full mb-6">
                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
                    About Rezcode
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white mb-6 leading-tight">
                    We Turn Ideas Into
                    <span class="gradient-text">Powerful Products</span>
                </h2>
                <p class="text-gray-400 leading-relaxed mb-6 text-sm sm:text-base">
                    Rezcode is a digital solutions agency focused on building high-performance web applications, AI-powered tools, and automation systems that solve real business problems.
                </p>
                <p class="text-gray-400 leading-relaxed mb-8 text-sm sm:text-base">
                    We combine technical excellence with strategic thinking to deliver solutions that don't just work — they drive measurable results for your business.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="https://wa.me/6282121001438" target="_blank"
                       class="inline-flex items-center justify-center gap-2 bg-green-500 hover:bg-green-400 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-200 text-sm">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Let's Talk
                    </a>
                    <a href="#project" class="inline-flex items-center justify-center gap-2 btn-secondary px-6 py-3 text-sm">
                        See Our Work
                    </a>
                </div>
            </div>

            <!-- Right: Cards -->
            <div class="reveal grid grid-cols-2 gap-4">
                @foreach([
                    ['🚀', 'Fast Delivery', 'We ship production-ready solutions on time, every time.'],
                    ['🔒', 'Secure & Scalable', 'Enterprise-grade security and architecture built to scale.'],
                    ['🤖', 'AI-Powered', 'Cutting-edge AI integrations that give you a competitive edge.'],
                    ['📱', 'Mobile-First', 'Responsive designs that work flawlessly on every device.'],
                ] as $item)
                    <div class="glass-card rounded-2xl p-5 hover:border-cyan-500/30 transition-all duration-300">
                        <div class="text-2xl mb-3">{{ $item[0] }}</div>
                        <h4 class="text-white font-bold text-sm mb-2">{{ $item[1] }}</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">{{ $item[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     SERVICES SECTION
============================================================ -->
<section id="services" class="py-20 lg:py-32 relative overflow-hidden">
    {{-- Background accents --}}
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-cyan-500/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-14">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-px bg-gradient-to-r from-cyan-500 to-transparent"></div>
                    <span class="text-cyan-400 text-xs font-bold uppercase tracking-[0.3em]">What We Do</span>
                </div>
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-[1.05]">
                    Our <span class="gradient-text">Services</span>
                </h2>
            </div>
            <p class="text-gray-500 text-sm leading-relaxed max-w-xs lg:text-right">
                End-to-end digital solutions designed to accelerate your business growth.
            </p>
        </div>

        {{-- Bento Grid --}}
        @php
            $palette = [
                ['accent' => 'cyan',    'from' => 'from-cyan-500',    'to' => 'to-blue-600',    'bg' => 'bg-cyan-500/10',    'border' => 'border-cyan-500/20',    'text' => 'text-cyan-400',    'hover' => 'hover:border-cyan-500/40',    'num' => 'text-cyan-900/40'],
                ['accent' => 'purple',  'from' => 'from-purple-500',  'to' => 'to-pink-600',    'bg' => 'bg-purple-500/10',  'border' => 'border-purple-500/20',  'text' => 'text-purple-400',  'hover' => 'hover:border-purple-500/40',  'num' => 'text-purple-900/40'],
                ['accent' => 'amber',   'from' => 'from-amber-500',   'to' => 'to-orange-600',  'bg' => 'bg-amber-500/10',   'border' => 'border-amber-500/20',   'text' => 'text-amber-400',   'hover' => 'hover:border-amber-500/40',   'num' => 'text-amber-900/40'],
                ['accent' => 'emerald', 'from' => 'from-emerald-500', 'to' => 'to-teal-600',    'bg' => 'bg-emerald-500/10', 'border' => 'border-emerald-500/20', 'text' => 'text-emerald-400', 'hover' => 'hover:border-emerald-500/40', 'num' => 'text-emerald-900/40'],
                ['accent' => 'blue',    'from' => 'from-blue-500',    'to' => 'to-indigo-600',  'bg' => 'bg-blue-500/10',    'border' => 'border-blue-500/20',    'text' => 'text-blue-400',    'hover' => 'hover:border-blue-500/40',    'num' => 'text-blue-900/40'],
                ['accent' => 'rose',    'from' => 'from-rose-500',    'to' => 'to-red-600',     'bg' => 'bg-rose-500/10',    'border' => 'border-rose-500/20',    'text' => 'text-rose-400',    'hover' => 'hover:border-rose-500/40',    'num' => 'text-rose-900/40'],
            ];
            $servicesList = $services->values();
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($servicesList as $index => $service)
            @php
                $p = $palette[$index % count($palette)];
                $num = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                // First card spans 2 rows on large screens
                $spanClass = ($index === 0) ? 'lg:row-span-2' : '';
                $padClass  = ($index === 0) ? 'p-8 lg:p-10' : 'p-6 lg:p-7';
            @endphp
                <div class="reveal glass-card rounded-2xl {{ $padClass }} {{ $spanClass }} {{ $p['hover'] }} border {{ $p['border'] }} group transition-all duration-300 hover:-translate-y-1 relative overflow-hidden flex flex-col">
                    {{-- Large background number --}}
                    <span class="absolute -bottom-2 -right-2 text-[7rem] font-black leading-none select-none pointer-events-none {{ $p['num'] }} transition-all duration-500 group-hover:scale-110 group-hover:-translate-y-1">
                        {{ $num }}
                    </span>

                    {{-- Icon badge --}}
                    <div class="w-11 h-11 rounded-xl {{ $p['bg'] }} border {{ $p['border'] }} flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 relative z-10">
                        <x-service-icon :icon="$service->icon" class="w-5 h-5 {{ $p['text'] }}" />
                    </div>

                    {{-- Title --}}
                    <h3 class="font-bold text-white mb-3 relative z-10 {{ $index === 0 ? 'text-2xl' : 'text-base' }} group-hover:{{ $p['text'] }} transition-colors duration-300">
                        {{ $service->title }}
                    </h3>

                    {{-- Description --}}
                    <p class="text-gray-500 leading-relaxed relative z-10 flex-1 {{ $index === 0 ? 'text-sm' : 'text-xs' }}">
                        {{ $service->description }}
                    </p>

                    @if($index === 0)
                        {{-- Extra detail for hero card --}}
                        <div class="mt-8 pt-6 border-t border-gray-800/60 relative z-10">
                            <div class="flex items-center gap-2 {{ $p['text'] }} text-xs font-semibold group-hover:gap-3 transition-all duration-200">
                                <span>Explore service</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        {{-- Bottom CTA --}}
        <div class="mt-12 flex flex-col sm:flex-row items-center justify-center gap-4">
            <p class="text-gray-600 text-sm">Need a custom solution?</p>
            <a href="https://wa.me/6282121001438" target="_blank"
               class="inline-flex items-center gap-2 text-sm font-semibold text-cyan-400 hover:text-white transition-colors duration-200 group">
                Let's talk
                <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>




<!-- ============================================================
     PORTFOLIO SECTION (Preview — featured only)
============================================================ -->
<section id="project" class="py-20 lg:py-28 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-4 mb-12">
            <x-section-header
                badge="Our Work"
                title='Featured <span class="gradient-text">Projects</span>'
                subtitle="A selection of our best work across web, AI, mobile, and automation."
                align="left"
            />
            <a href="{{ route('portfolio.index') }}" class="flex-shrink-0 inline-flex items-center gap-2 text-sm text-cyan-400 hover:text-cyan-300 font-semibold transition-colors mb-4">
                View All Projects
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
            @foreach($projects->where('is_featured', true)->take(3) as $project)
                <div class="reveal">
                    <x-project-card :project="$project" />
                </div>
            @endforeach
        </div>

        <!-- CTA -->
        <div class="text-center mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('portfolio.index') }}"
               class="inline-flex items-center gap-2 btn-secondary px-8 py-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                Browse All {{ $projects->count() }} Projects
            </a>
            <a href="https://wa.me/6282121001438" target="_blank"
               class="inline-flex items-center gap-2 btn-primary px-8 py-4">
                Start Your Project
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- ============================================================
     BLOG SECTION
============================================================ -->
@if($posts->count())
<section id="blog" class="py-20 lg:py-28 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-gray-900/20 to-transparent pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-4 mb-12">
            <x-section-header
                badge="Insights"
                title='From Our <span class="gradient-text">Blog</span>'
                subtitle="Thoughts on technology, development, and digital strategy."
                align="left"
            />
            <a href="{{ route('blog.index') }}" class="flex-shrink-0 inline-flex items-center gap-2 text-sm text-cyan-400 hover:text-cyan-300 font-semibold transition-colors mb-4">
                All Articles
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
            @foreach($posts as $index => $post)
                <div class="reveal">
                    <x-blog-card :post="$post" :featured="$index === 0" />
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ============================================================
     CONTACT SECTION
============================================================ -->
<section id="contact" class="py-20 lg:py-28 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-header
            badge="Get In Touch"
            title='Ready to Build <span class="gradient-text">Something Great?</span>'
            subtitle="Tell us about your project and we'll get back to you within 24 hours."
        />

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12 max-w-5xl mx-auto">
            <!-- Contact Info -->
            <div class="lg:col-span-2 space-y-5">
                <!-- WhatsApp -->
                <a href="https://wa.me/6282121001438" target="_blank"
                   class="flex items-start gap-4 glass-card rounded-2xl p-5 hover:border-green-500/30 transition-all duration-300 group">
                    <div class="w-11 h-11 rounded-xl bg-green-500/20 flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">WhatsApp Business</p>
                        <p class="text-white font-semibold text-sm">+62 821-2100-1438</p>
                        <p class="text-gray-500 text-xs mt-0.5">Fastest response</p>
                    </div>
                </a>

                <!-- Email -->
                <a href="mailto:rezcodeagency@gmail.com"
                   class="flex items-start gap-4 glass-card rounded-2xl p-5 hover:border-cyan-500/30 transition-all duration-300 group">
                    <div class="w-11 h-11 rounded-xl bg-cyan-500/20 flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Email</p>
                        <p class="text-white font-semibold text-sm">rezcodeagency@gmail.com</p>
                        <p class="text-gray-500 text-xs mt-0.5">Reply within 24h</p>
                    </div>
                </a>

                <!-- Social Links -->
                <div class="glass-card rounded-2xl p-5">
                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-4">Follow Us</p>
                    <div class="flex items-center gap-3 flex-wrap">
                        @foreach($socials as $social)
                            <a href="{{ $social->url }}" target="_blank" rel="noopener"
                               class="w-9 h-9 rounded-xl bg-gray-800 hover:bg-gray-700 border border-gray-700 flex items-center justify-center text-gray-400 hover:text-white transition-all duration-200"
                               title="{{ $social->platform }}">
                                @if($social->icon === 'instagram')
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                @elseif($social->icon === 'tiktok')
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.76a4.85 4.85 0 01-1.01-.07z"/></svg>
                                @elseif($social->icon === 'youtube')
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                @elseif($social->icon === 'github')
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                                @elseif($social->icon === 'facebook')
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                @elseif($social->icon === 'linkedin')
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                @else
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-3">
                <div class="glass-card rounded-2xl p-6 sm:p-8">
                    <h3 class="text-xl font-bold text-white mb-6">Send Us a Message</h3>
                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Your Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                       class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white placeholder-gray-500 rounded-xl px-4 py-3 text-sm outline-none transition-colors"
                                       placeholder="John Doe">
                                @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                       class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white placeholder-gray-500 rounded-xl px-4 py-3 text-sm outline-none transition-colors"
                                       placeholder="john@company.com">
                                @error('email')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Subject</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" required
                                   class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white placeholder-gray-500 rounded-xl px-4 py-3 text-sm outline-none transition-colors"
                                   placeholder="I need a web application...">
                            @error('subject')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Message</label>
                            <textarea name="message" rows="5" required
                                      class="w-full bg-gray-800/60 border border-gray-700 focus:border-cyan-500 text-white placeholder-gray-500 rounded-xl px-4 py-3 text-sm outline-none transition-colors resize-none"
                                      placeholder="Tell us about your project...">{{ old('message') }}</textarea>
                            @error('message')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="w-full btn-primary py-4 font-semibold">
                            Send Message
                            <svg class="w-4 h-4 ml-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
