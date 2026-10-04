@extends('layouts.app')

@section('title', 'Contact Me | Gian Andrea Sechi')

@section('content')
<section class="max-w-5xl mx-auto px-5 sm:px-8 py-16 sm:py-20">
    <header class="max-w-2xl pb-9 border-b border-slate-800">
        <p class="font-mono text-xs text-indigo-300">03 / contact</p>
        <h1 class="mt-3 text-3xl sm:text-5xl font-extrabold tracking-tight text-white">Let’s connect.</h1>
        <p class="mt-4 text-sm sm:text-base leading-7 text-slate-400">For a technical challenge, a collaboration or simply to compare notes, write to me here.</p>
    </header>

    @if(session('success'))
        <div class="mt-8 border border-indigo-400/30 bg-indigo-950/20 px-5 py-4 text-sm text-indigo-200">{{ session('success') }}</div>
    @endif

    <div class="mt-10 grid grid-cols-1 md:grid-cols-12 gap-10">
        <aside class="md:col-span-4 text-sm">
            <p class="font-mono text-xs text-slate-600">direct coordinates</p>
            <dl class="mt-5 space-y-5 text-slate-400">
                <div><dt class="text-xs text-slate-600">Email</dt><dd class="mt-1"><a href="mailto:me@gianandreasechi.com" class="text-slate-200 hover:text-indigo-300">me@gianandreasechi.com</a></dd></div>
                <div><dt class="text-xs text-slate-600">Role</dt><dd class="mt-1">Senior Backend Engineer L5 @ Musixmatch</dd></div>
                <div><dt class="text-xs text-slate-600">Location</dt><dd class="mt-1">Spilamberto (MO), Italy</dd></div>
                <div><dt class="text-xs text-slate-600">LinkedIn</dt><dd class="mt-1"><a href="https://linkedin.com/in/gian-andrea-sechi" target="_blank" class="text-slate-200 hover:text-indigo-300">@gian-andrea-sechi ↗</a></dd></div>
            </dl>
        </aside>
        <form action="{{ route('contact.send') }}" method="POST" class="md:col-span-8 border-t border-slate-800 pt-6 space-y-5">
            @csrf
            <div><label for="name" class="block text-xs font-mono text-slate-500 mb-2">full name *</label><input type="text" id="name" name="name" required value="{{ old('name') }}" class="w-full bg-slate-950/40 border border-slate-700 px-4 py-3 text-sm text-white placeholder-slate-600 focus:outline-none focus:border-indigo-400" placeholder="e.g. John Doe">@error('name')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror</div>
            <div><label for="email" class="block text-xs font-mono text-slate-500 mb-2">email address *</label><input type="email" id="email" name="email" required value="{{ old('email') }}" class="w-full bg-slate-950/40 border border-slate-700 px-4 py-3 text-sm text-white placeholder-slate-600 focus:outline-none focus:border-indigo-400" placeholder="john@example.com">@error('email')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror</div>
            <div><label for="subject" class="block text-xs font-mono text-slate-500 mb-2">subject *</label><input type="text" id="subject" name="subject" required value="{{ old('subject') }}" class="w-full bg-slate-950/40 border border-slate-700 px-4 py-3 text-sm text-white placeholder-slate-600 focus:outline-none focus:border-indigo-400" placeholder="Just saying hello">@error('subject')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror</div>
            <div><label for="message" class="block text-xs font-mono text-slate-500 mb-2">message *</label><textarea id="message" name="message" rows="6" required class="w-full bg-slate-950/40 border border-slate-700 px-4 py-3 text-sm text-white placeholder-slate-600 focus:outline-none focus:border-indigo-400" placeholder="Write your message here...">{{ old('message') }}</textarea>@error('message')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror</div>
            <button type="submit" class="px-5 py-3 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-500 transition-colors">Send message →</button>
        </form>
    </div>
</section>
@endsection
