<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Backoffice') | Gian Andrea Sechi</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Marked JS for Live Markdown Preview -->
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

    <!-- Tailwind CSS / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root { color-scheme: dark; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #0c111b; color: #e2e8f0; }
        code, pre, .font-mono { font-family: 'Fira Code', monospace; }
        .bg-grid-pattern { background-image: linear-gradient(to right, rgba(148,163,184,.035) 1px, transparent 1px), linear-gradient(to bottom, rgba(148,163,184,.035) 1px, transparent 1px); background-size: 34px 34px; }
    </style>
</head>
<body class="min-h-screen antialiased bg-grid-pattern selection:bg-indigo-500 selection:text-white flex flex-col">

    <!-- Top Navigation Bar -->
    <header class="border-b border-slate-800/80 bg-[#0c111b]/90 backdrop-blur-md sticky top-0 z-40">
        <div class="max-w-6xl mx-auto px-5 sm:px-8">
            <div class="h-20 flex items-center justify-between gap-6">
                
                <!-- Left: Brand & Links -->
                <div class="flex items-center gap-8">
                    <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-3 group">
                        <span class="w-9 h-9 rounded-lg border border-indigo-400/50 text-indigo-200 font-mono text-xs flex items-center justify-center group-hover:bg-indigo-400/10 transition-colors tracking-tighter">&lt;/&gt;</span>
                        <div class="flex items-baseline gap-2">
                            <span class="text-sm font-semibold text-slate-200 group-hover:text-white transition-colors">Gian Andrea Sechi</span>
                            <span class="font-mono text-xs text-indigo-300">/ admin</span>
                        </div>
                    </a>

                    <nav class="hidden sm:flex items-center gap-6 text-sm text-slate-400">
                        <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.*') ? 'text-indigo-300' : 'hover:text-slate-100' }} transition-colors">Articles</a>
                        <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'text-indigo-300' : 'hover:text-slate-100' }} transition-colors">Categories</a>
                    </nav>
                </div>

                <!-- Right: External View Site & User / Logout -->
                <div class="flex items-center gap-5 text-xs font-mono">
                    <a href="{{ route('blog.index') }}" target="_blank" class="text-slate-400 hover:text-indigo-300 transition-colors">public blog ↗</a>
                    <span class="text-slate-700">|</span>
                    <span class="text-slate-400 hidden md:inline">{{ auth()->user()->name ?? 'Admin' }}</span>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-slate-500 hover:text-rose-400 transition-colors">logout</button>
                    </form>
                </div>

            </div>
            <nav class="sm:hidden pb-3 flex gap-5 text-xs font-mono text-slate-400">
                <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.*') ? 'text-indigo-300' : 'hover:text-white' }}">articles</a>
                <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'text-indigo-300' : 'hover:text-white' }}">categories</a>
            </nav>
        </div>
    </header>

    <!-- Flash Messages -->
    <div class="max-w-6xl mx-auto px-5 sm:px-8 pt-6 w-full">
        @if(session('success'))
            <div class="border border-indigo-400/30 bg-indigo-950/20 px-5 py-4 text-sm text-indigo-200 flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="text-indigo-300 hover:text-white ml-4 text-xs font-mono">✕</button>
            </div>
        @endif

        @if(session('error'))
            <div class="border border-rose-500/30 bg-rose-950/20 px-5 py-4 text-sm text-rose-200 flex items-center justify-between">
                <span>{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()" class="text-rose-300 hover:text-white ml-4 text-xs font-mono">✕</button>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main class="flex-grow max-w-6xl mx-auto px-5 sm:px-8 py-10 sm:py-14 w-full">
        @yield('content')
    </main>

    <footer class="mt-auto border-t border-slate-800/80">
        <div class="max-w-6xl mx-auto px-5 sm:px-8 py-6 flex items-center justify-between text-xs text-slate-500 font-mono">
            <p>Admin Backoffice · {{ date('Y') }}</p>
            <a href="{{ route('home') }}" class="hover:text-indigo-300 transition-colors">← return to public site</a>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
