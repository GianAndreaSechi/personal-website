@extends('layouts.app')

@section('title', '404 Not Found | Gian Andrea Sechi')
@section('meta_description', 'This page could not be found. Head back home to explore projects, writing and more.')

@section('content')
<section class="max-w-6xl mx-auto px-5 sm:px-8 py-24 sm:py-32 min-h-[60vh] flex flex-col justify-center items-start">
    <p class="font-mono text-xs text-indigo-300 mb-6">page not found</p>
    <h1 class="error-terminal font-mono text-2xl sm:text-4xl lg:text-5xl font-medium tracking-normal text-slate-100" aria-label=">_404 not found">
        <span class="error-terminal-text" aria-hidden="true">&gt;_404 not found</span>
    </h1>
    <p class="mt-7 max-w-lg text-sm sm:text-base leading-7 text-slate-400">This page doesn’t exist or has moved. Let’s get you back on track.</p>
    <a href="{{ route('home') }}" class="mt-8 text-sm font-medium text-indigo-300 hover:text-white transition-colors">Back to home <span aria-hidden="true">→</span></a>
</section>
@endsection
