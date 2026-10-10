@extends('layouts.app')

@section('title', 'Contact | Gian Andrea Sechi')
@section('meta_description', 'Get in touch about a project, an idea or a collaboration. Email and contact details for Gian Andrea Sechi.')

@section('content')
<section class="max-w-5xl mx-auto px-5 sm:px-8 py-16 sm:py-20">
    <header class="max-w-2xl pb-9 border-b border-slate-800">
        <p class="font-mono text-xs text-indigo-300">contact</p>
        <h1 class="mt-3 text-3xl sm:text-5xl font-extrabold tracking-tight text-white">Say hello.</h1>
        <p class="mt-4 text-sm sm:text-base leading-7 text-slate-400">Have a question about a project, an idea to share or a collaboration in mind? I’m happy to hear from you.</p>
    </header>
    <div class="mt-10 grid md:grid-cols-2 gap-10">
        <section class="space-y-5">
            <h2 class="text-xl font-bold text-white">Email me</h2>
            <p class="text-sm leading-7 text-slate-400">Email is the best way to get in touch. If you’re writing about a project, a little context or a link will help me understand what you have in mind.</p>
            <a href="mailto:{{ config('profile.email') }}" class="inline-block text-base sm:text-lg text-indigo-300 hover:text-white break-all">{{ config('profile.email') }} ↗</a>
        </section>
        <section class="border-t border-slate-800 pt-5 md:border-t-0 md:pt-0 space-y-5">
            <h2 class="text-xl font-bold text-white">Find me elsewhere</h2>
            <div class="space-y-4 text-sm">
                <p><a href="{{ config('profile.github') }}" target="_blank" rel="noopener noreferrer" class="text-indigo-300 hover:text-white">GitHub ↗</a><span class="block mt-1 text-slate-500">Source code and open-source projects.</span></p>
                <p><a href="{{ config('profile.linkedin') }}" target="_blank" rel="noopener noreferrer" class="text-indigo-300 hover:text-white">LinkedIn ↗</a><span class="block mt-1 text-slate-500">Professional experience and connections.</span></p>
            </div>
            <p class="pt-4 text-xs leading-6 text-slate-500">Based in {{ config('profile.location') }} · {{ config('profile.role') }} at {{ config('profile.company') }}</p>
        </section>
    </div>
</section>
@endsection
