<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $pageTitle = trim($__env->yieldContent('title', 'Gian Andrea Sechi | Software, Projects & Notes'));
        $pageDescription = trim($__env->yieldContent('meta_description', 'Projects, writing and the story of Gian Andrea Sechi, a software engineer with interests in mathematics and the humanities.'));
        $canonicalUrl = rtrim(config('app.url'), '/').request()->getPathInfo();
    @endphp
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <meta property="og:type" content="{{ trim($__env->yieldContent('og_type', 'website')) }}">
    <meta property="og:site_name" content="Gian Andrea Sechi">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta name="twitter:card" content="summary">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="alternate icon" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- 🧛 Dracula theme: uncomment the line below to activate --}}
    {{-- @vite(['resources/css/dracula.css']) --}}
    <style>
        :root { color-scheme: dark; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #0c111b; color: #e2e8f0; }
        code, pre, .font-mono { font-family: 'Fira Code', monospace; }
        .bg-grid-pattern { background-image: linear-gradient(to right, rgba(148,163,184,.035) 1px, transparent 1px), linear-gradient(to bottom, rgba(148,163,184,.035) 1px, transparent 1px); background-size: 34px 34px; }
    </style>
</head>
<body class="min-h-screen antialiased bg-grid-pattern selection:bg-indigo-500 selection:text-white">
    <header class="border-b border-slate-800/80 bg-[#0c111b]/90 backdrop-blur-md">
        <div class="max-w-6xl mx-auto px-5 sm:px-8">
            <div class="h-20 flex items-center justify-between gap-6">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <span class="w-9 h-9 rounded-lg border border-indigo-400/50 text-indigo-200 font-mono text-xs flex items-center justify-center group-hover:bg-indigo-400/10 transition-colors tracking-tighter">&lt;/&gt;</span>
                    <span class="hidden sm:block text-sm font-semibold text-slate-200 group-hover:text-white transition-colors">Gian Andrea Sechi</span>
                </a>
                <nav class="hidden lg:flex items-center gap-6 text-sm text-slate-400">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-indigo-300' : 'hover:text-slate-100' }} transition-colors">Home</a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-indigo-300' : 'hover:text-slate-100' }} transition-colors">About</a>
                    <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects*') ? 'text-indigo-300' : 'hover:text-slate-100' }} transition-colors">Projects</a>
                    <a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'text-indigo-300' : 'hover:text-slate-100' }} transition-colors">Blog</a>
                    <a href="{{ route('resume') }}" class="{{ request()->routeIs('resume') ? 'text-indigo-300' : 'hover:text-slate-100' }} transition-colors">Experience & CV</a>
                </nav>
                <a href="{{ route('contact.show') }}" class="text-sm text-indigo-300 hover:text-white transition-colors">Contact <span aria-hidden="true">→</span></a>
            </div>
            <nav class="lg:hidden pb-4 flex gap-4 overflow-x-auto text-xs text-slate-400">
                <a href="{{ route('home') }}">Home</a><a href="{{ route('about') }}">About</a><a href="{{ route('projects') }}">Projects</a><a href="{{ route('blog.index') }}">Blog</a><a href="{{ route('resume') }}">CV</a>
            </nav>
        </div>
    </header>
    <main>@yield('content')</main>
    <footer class="mt-20 border-t border-slate-800/80">
        <div class="max-w-6xl mx-auto px-5 sm:px-8 py-8 flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between text-xs text-slate-500">
            <p>© {{ date('Y') }} Gian Andrea Sechi · Built with Laravel.</p>
            <div class="flex flex-wrap gap-x-5 gap-y-3"><a href="https://github.com/GianAndreaSechi" target="_blank" rel="noopener noreferrer" class="hover:text-indigo-300">GitHub</a><a href="https://linkedin.com/in/gian-andrea-sechi" target="_blank" rel="noopener noreferrer" class="hover:text-indigo-300">LinkedIn</a><a href="https://www.threads.com/@gianandrea_sechi" target="_blank" rel="noopener noreferrer" class="hover:text-indigo-300">Threads</a><a href="https://x.com/gasechi" target="_blank" rel="noopener noreferrer" class="hover:text-indigo-300">X</a><a href="mailto:me@gianandreasechi.com" class="hover:text-indigo-300">Email</a></div>
        </div>
    </footer>
</body>
</html>
