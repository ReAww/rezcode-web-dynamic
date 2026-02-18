<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register — Rezcode</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-950 text-white font-sans antialiased min-h-screen flex items-center justify-center py-12">

    <!-- Background -->
    <div class="fixed inset-0 bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950"></div>
    <div class="fixed top-1/4 right-1/4 w-96 h-96 bg-cyan-500/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="fixed bottom-1/4 left-1/4 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 w-full max-w-md px-4">

        <!-- Logo -->
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3 group">
                <img src="{{ asset('images/logo.svg') }}" alt="Rezcode" class="h-12 w-12 transition-transform duration-300 group-hover:scale-110">
                <span class="text-2xl font-bold text-white">Rezcode</span>
            </a>
            <p class="text-gray-400 text-sm mt-2">Create your account</p>
        </div>

        <!-- Card -->
        <div class="bg-gray-900/80 backdrop-blur-xl border border-gray-800 rounded-3xl p-8 shadow-2xl shadow-black/40">
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                           class="form-input" placeholder="John Doe">
                    @error('name')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                           class="form-input" placeholder="john@company.com">
                    @error('email')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                    <input id="password" type="password" name="password" required
                           class="form-input" placeholder="Min. 8 characters">
                    @error('password')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                           class="form-input" placeholder="Repeat password">
                    @error('password_confirmation')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <button type="submit" class="btn-primary w-full py-3 text-base">
                    Create Account
                </button>
            </form>

            <!-- Login Link -->
            <p class="text-center text-sm text-gray-500 mt-6">
                Already have an account?
                <a href="{{ route('login') }}" class="text-cyan-400 hover:text-cyan-300 font-medium transition-colors">Sign in</a>
            </p>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-sm text-gray-600 hover:text-gray-400 transition-colors inline-flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Home
            </a>
        </div>
    </div>
</body>
</html>
