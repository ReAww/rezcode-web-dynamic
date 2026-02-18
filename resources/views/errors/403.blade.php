<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>403 — Access Denied | Rezcode</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-950 text-white font-sans antialiased min-h-screen flex items-center justify-center">
    <div class="fixed inset-0 bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950"></div>
    <div class="fixed top-1/3 left-1/2 -translate-x-1/2 w-96 h-96 bg-red-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 text-center px-4">
        <p class="text-8xl font-black text-red-500/30 mb-4">403</p>
        <h1 class="text-3xl font-black text-white mb-3">Access Denied</h1>
        <p class="text-gray-400 max-w-sm mx-auto mb-8">You don't have permission to access this page. Admin privileges are required.</p>
        <div class="flex items-center justify-center gap-4">
            <a href="{{ route('home') }}" class="btn-primary px-6 py-3">Go Home</a>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-secondary px-6 py-3">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</body>
</html>
