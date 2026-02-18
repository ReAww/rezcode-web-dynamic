<!-- Sticky Navbar with Glassmorphism -->
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
     x-data="{ open: false, scrolled: false }"
     @scroll.window="scrolled = window.scrollY > 20">

    <div :class="scrolled ? 'bg-gray-950/90 backdrop-blur-xl border-b border-gray-800/60 shadow-lg shadow-black/20' : 'bg-transparent'"
         class="transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">

                <!-- Logo — full wordmark SVG -->
                <a href="{{ route('home') }}" class="flex-shrink-0 group">
                    <img src="{{ asset('images/logo.svg') }}" alt="Rezcode" class="h-10 w-auto transition-transform duration-300 group-hover:scale-105">
                </a>

                <!-- Desktop Nav Links -->
                <div class="hidden lg:flex items-center gap-1">
                    <a href="{{ route('home') }}#home"
                       class="nav-link text-sm px-4 py-2 rounded-xl {{ request()->routeIs('home') && !request()->is('portfolio*') && !request()->is('blog*') ? 'text-white' : '' }}">Home</a>
                    <a href="{{ route('home') }}#about"    class="nav-link text-sm px-4 py-2 rounded-xl">About</a>
                    <a href="{{ route('home') }}#services" class="nav-link text-sm px-4 py-2 rounded-xl">Services</a>
                    <a href="{{ route('portfolio.index') }}"
                       class="nav-link text-sm px-4 py-2 rounded-xl {{ request()->routeIs('portfolio.*') ? 'text-cyan-400' : '' }}">Portfolio</a>
                    <a href="{{ route('blog.index') }}"
                       class="nav-link text-sm px-4 py-2 rounded-xl {{ request()->routeIs('blog.*') ? 'text-cyan-400' : '' }}">Blog</a>
                    <a href="{{ route('home') }}#contact"  class="nav-link text-sm px-4 py-2 rounded-xl">Contact</a>
                </div>

                <!-- Auth Buttons / User Dropdown -->
                <div class="hidden lg:flex items-center gap-3">
                    @auth
                        <div class="relative" x-data="{ userMenu: false }">
                            <button @click="userMenu = !userMenu"
                                    class="flex items-center gap-2 bg-gray-800/60 hover:bg-gray-700/60 border border-gray-700 rounded-xl px-4 py-2 text-sm font-medium transition-all duration-200">
                                <div class="w-6 h-6 rounded-full bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center text-xs font-bold">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <span class="max-w-24 truncate">{{ auth()->user()->name }}</span>
                                <svg class="w-4 h-4 text-gray-400 transition-transform duration-200 flex-shrink-0" :class="userMenu ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-show="userMenu" x-cloak @click.outside="userMenu = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 translate-y-1"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 class="absolute right-0 mt-2 w-48 bg-gray-900 border border-gray-700 rounded-2xl shadow-xl shadow-black/40 overflow-hidden">
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-4 py-3 text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                                        <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                        Admin Dashboard
                                    </a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-2 w-full px-4 py-3 text-sm text-red-400 hover:bg-red-900/20 hover:text-red-300 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-300 hover:text-white transition-colors px-4 py-2">Login</a>
                        <a href="https://wa.me/6282121001438" target="_blank" class="btn-primary text-sm">Get Started</a>
                    @endauth
                </div>

                <!-- Mobile Menu Toggle -->
                <button @click="open = !open" class="lg:hidden p-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="lg:hidden bg-gray-950/98 backdrop-blur-xl border-t border-gray-800 px-4 py-4 space-y-1">
            <a href="{{ route('home') }}#home"          @click="open=false" class="block px-4 py-3 text-gray-300 hover:text-white hover:bg-gray-800/60 rounded-xl transition-colors text-sm font-medium">Home</a>
            <a href="{{ route('home') }}#about"         @click="open=false" class="block px-4 py-3 text-gray-300 hover:text-white hover:bg-gray-800/60 rounded-xl transition-colors text-sm font-medium">About</a>
            <a href="{{ route('home') }}#services"      @click="open=false" class="block px-4 py-3 text-gray-300 hover:text-white hover:bg-gray-800/60 rounded-xl transition-colors text-sm font-medium">Services</a>
            <a href="{{ route('portfolio.index') }}"    @click="open=false" class="block px-4 py-3 {{ request()->routeIs('portfolio.*') ? 'text-cyan-400' : 'text-gray-300' }} hover:text-white hover:bg-gray-800/60 rounded-xl transition-colors text-sm font-medium">Portfolio</a>
            <a href="{{ route('blog.index') }}"         @click="open=false" class="block px-4 py-3 {{ request()->routeIs('blog.*') ? 'text-cyan-400' : 'text-gray-300' }} hover:text-white hover:bg-gray-800/60 rounded-xl transition-colors text-sm font-medium">Blog</a>
            <a href="{{ route('home') }}#contact"       @click="open=false" class="block px-4 py-3 text-gray-300 hover:text-white hover:bg-gray-800/60 rounded-xl transition-colors text-sm font-medium">Contact</a>
            <div class="pt-3 border-t border-gray-800 flex flex-col gap-2">
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 text-cyan-400 hover:bg-gray-800/60 rounded-xl transition-colors text-sm font-medium">Admin Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-3 text-red-400 hover:bg-red-900/20 rounded-xl transition-colors text-sm font-medium">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}"    class="block px-4 py-3 text-gray-300 hover:text-white hover:bg-gray-800/60 rounded-xl transition-colors text-sm font-medium">Login</a>
                    <a href="https://wa.me/6282121001438" target="_blank" class="btn-primary text-sm text-center">Get Started</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
