<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Gian Andrea Sechi</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Tailwind CSS / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root { color-scheme: dark; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #0c111b; color: #e2e8f0; }
        code, pre, .font-mono { font-family: 'Fira Code', monospace; }
        .bg-grid-pattern { background-image: linear-gradient(to right, rgba(148,163,184,.035) 1px, transparent 1px), linear-gradient(to bottom, rgba(148,163,184,.035) 1px, transparent 1px); background-size: 34px 34px; }
    </style>
</head>
<body class="min-h-screen antialiased bg-grid-pattern selection:bg-indigo-500 selection:text-white flex items-center justify-center p-5 text-slate-100">

    <div class="w-full max-w-md space-y-6">
        
        <!-- Header -->
        <div class="text-center">
            <span class="w-11 h-11 rounded-lg border border-indigo-400/50 text-indigo-200 font-mono text-xs flex items-center justify-center mx-auto mb-4 tracking-tighter">&lt;/&gt;</span>
            <p class="font-mono text-xs text-indigo-300">// restricted access</p>
            <h1 class="mt-2 text-2xl sm:text-3xl font-extrabold tracking-tight text-white">Admin backoffice.</h1>
            <p class="mt-2 text-xs text-slate-400">Sign in to manage technical notes and categories</p>
        </div>

        <!-- Login Form -->
        <div class="p-7 sm:p-8 rounded-lg bg-slate-950/60 border border-slate-800 space-y-6">
            
            @if($errors->any())
                <div class="border border-rose-500/30 bg-rose-950/20 px-4 py-3 text-xs text-rose-200 font-mono">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-mono text-slate-400 mb-2">email address *</label>
                    <input type="email" id="email" name="email" value="{{ old('email', 'me@gianandreasechi.com') }}" required autofocus class="w-full px-4 py-2.5 rounded-lg bg-slate-950/60 border border-slate-800 text-white placeholder-slate-600 focus:outline-none focus:border-indigo-400 text-xs font-mono">
                </div>

                <div>
                    <label for="password" class="block text-xs font-mono text-slate-400 mb-2">password *</label>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-2.5 rounded-lg bg-slate-950/60 border border-slate-800 text-white placeholder-slate-600 focus:outline-none focus:border-indigo-400 text-xs font-mono">
                </div>

                <div class="flex items-center justify-between text-xs text-slate-400 font-mono">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded bg-slate-950 border-slate-800 text-indigo-600 focus:ring-0">
                        <span>Remember session</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-2.5 rounded-lg font-semibold text-white bg-indigo-600 hover:bg-indigo-500 transition-colors flex items-center justify-center gap-2 text-xs">
                    <i class="fa-solid fa-lock text-[10px]"></i>
                    <span>Sign In to Admin</span>
                </button>
            </form>

            <div class="pt-4 border-t border-slate-800 text-center">
                <a href="{{ route('home') }}" class="font-mono text-xs text-slate-500 hover:text-indigo-300 transition-colors">
                    ← return to public website
                </a>
            </div>
        </div>

    </div>

</body>
</html>
