<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 — Page Not Found | Rezcode</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-950 text-white font-sans antialiased min-h-screen flex items-center justify-center">
    <div class="fixed inset-0 bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950"></div>
    <div class="fixed top-1/3 left-1/2 -translate-x-1/2 w-96 h-96 bg-cyan-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 text-center px-4">
        <p class="text-8xl font-black bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent mb-4">404</p>
        <h1 class="text-3xl font-black text-white mb-3">Page Not Found</h1>
        <p class="text-gray-400 max-w-sm mx-auto mb-8">The page you're looking for doesn't exist or has been moved.</p>
        <a href="{{ route('home') }}" class="btn-primary px-6 py-3">Back to Home</a>
    </div>
</body>
</html>
