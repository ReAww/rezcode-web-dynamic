<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — Rezcode Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-950 text-white font-sans antialiased">

<div class="flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">

    <!-- Mobile Overlay -->
    <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false"
         class="fixed inset-0 bg-black/60 z-20 lg:hidden"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
           class="fixed lg:relative z-30 w-64 h-full bg-gray-900 border-r border-gray-800 flex flex-col flex-shrink-0 transition-transform duration-300 ease-in-out">

        <!-- Logo -->
        <div class="flex items-center gap-3 px-6 py-5 border-b border-gray-800">
            <img src="{{ asset('images/logo.svg') }}" alt="Rezcode" class="h-8 w-8">
            <div>
                <span class="text-white font-bold text-lg tracking-wide">Rezcode</span>
                <p class="text-xs text-cyan-400 font-medium">Admin Panel</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-5 space-y-0.5 overflow-y-auto">

            <!-- Main -->
            <p class="text-xs font-semibold text-gray-600 uppercase tracking-wider px-3 mb-2">Main</p>
            <a href="{{ route('admin.dashboard') }}"
               class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                Dashboard
            </a>

            <!-- Content -->
            <p class="text-xs font-semibold text-gray-600 uppercase tracking-wider px-3 pt-4 pb-2">Content</p>
            <a href="{{ route('admin.services.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Services
            </a>
            <a href="{{ route('admin.projects.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                Projects
            </a>
            <a href="{{ route('admin.blog.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Blog Posts
            </a>
            <a href="{{ route('admin.social-links.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.social-links.*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                Social Links
            </a>

            <!-- Management -->
            <p class="text-xs font-semibold text-gray-600 uppercase tracking-wider px-3 pt-4 pb-2">Management</p>
            <a href="{{ route('admin.users.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Users
            </a>
            <a href="{{ route('admin.contacts.index') }}"
               class="admin-nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Contacts
            </a>

            <!-- Footer Links -->
            <div class="pt-4 border-t border-gray-800 mt-4 space-y-0.5">
                <a href="{{ route('home') }}" target="_blank" class="admin-nav-link">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    View Site
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="admin-nav-link w-full text-left text-red-400 hover:text-red-300 hover:bg-red-900/20">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- Admin Info -->
        <div class="px-4 py-4 border-t border-gray-800">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center text-sm font-bold flex-shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-cyan-400">Administrator</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col overflow-hidden min-w-0">

        <!-- Top Bar -->
        <header class="bg-gray-900/80 backdrop-blur-sm border-b border-gray-800 px-4 sm:px-6 py-4 flex items-center justify-between flex-shrink-0">
            <div class="flex items-center gap-3">
                <!-- Mobile sidebar toggle -->
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-1.5 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div>
                    <h1 class="text-base sm:text-lg font-semibold text-white">@yield('title', 'Dashboard')</h1>
                    <p class="text-xs text-gray-400 hidden sm:block">Rezcode Admin Panel</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-xs text-gray-500 hidden sm:block">{{ now()->format('D, M j Y') }}</span>
                <div class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-y-auto p-4 sm:p-6">
            @include('components.toast')
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
