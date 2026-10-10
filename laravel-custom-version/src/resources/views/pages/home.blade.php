@extends('layouts.app')

@section('title', 'Gian Andrea Sechi | Software, Projects & Notes')

@section('meta_description', 'I’m Gian Andrea Sechi, a software engineer at Musixmatch. Explore my projects, open-source experiments, writing and the story behind them.')

@section('content')
<section class="max-w-6xl mx-auto px-5 sm:px-8 pt-16 pb-14 sm:pt-24 sm:pb-20">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
        <div class="lg:col-span-7">
            <p class="font-mono text-xs text-indigo-300 mb-5">{{ strtolower(config('profile.role')) }} · italy</p>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-[1.1]">Hi, I’m<br>Gian Andrea Sechi.</h1>
            <p class="mt-7 max-w-2xl text-base sm:text-lg leading-8 text-slate-400">I’m a software engineer at Musixmatch, working on backend systems and data. I’ve been building software since 2011, from business applications to personal experiments like irides.
            </p><p class="mt-4 max-w-2xl text-base sm:text-lg leading-8 text-slate-400">Here I share what I build, what I’m learning and the projects that have stayed with me over the years.</p>
            <div class="mt-8 flex flex-wrap gap-x-6 gap-y-3 text-sm font-medium">
                <a href="{{ route('about') }}" class="text-indigo-300 hover:text-white transition-colors">More about me <span aria-hidden="true">→</span></a>
                <a href="{{ route('resume') }}" class="text-slate-400 hover:text-white transition-colors">Experience & CV <span aria-hidden="true">→</span></a>
            </div>
            <div class="mt-10 pt-5 border-t border-slate-800 grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs text-slate-500">
                <span>Software since 2011</span><span>Open-source experiments</span><span>Mathematics & humanities</span>
            </div>
        </div>

        <div class="lg:col-span-5">
            <div class="border border-slate-700/70 bg-slate-950/40 p-5 sm:p-6">
                <p class="font-mono text-xs text-indigo-300">currently building</p>
                <h2 class="mt-4 text-2xl font-bold text-white">irides</h2>
                <p class="mt-3 text-sm leading-7 text-slate-400">A way to explore database structures and make their metadata available to applications and AI tools. It’s an open-source project in active Alpha.</p>
                <a href="{{ route('projects.show', 'irides') }}" class="mt-6 inline-block text-sm text-indigo-300 hover:text-white">Read about the project →</a>
                <p class="mt-6 pt-4 border-t border-slate-800 text-xs leading-6 text-slate-500">Elsewhere on the site: a community directory, pandemic data and a school project on the Lorenz system.</p>
            </div>
        </div>
    </div>
</section>

<section class="border-y border-slate-800/80 bg-slate-950/20">
    <div class="max-w-6xl mx-auto px-5 sm:px-8 py-14 sm:py-16">
        <div class="flex items-end justify-between gap-6 mb-9"><div><p class="font-mono text-xs text-indigo-300">selected projects</p><h2 class="mt-2 text-2xl sm:text-3xl font-bold text-white">Things I’ve built.</h2></div><a href="{{ route('projects') }}" class="hidden sm:block text-sm text-slate-400 hover:text-indigo-300">All projects →</a></div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
            @forelse($featuredProjects as $project)
                <article class="group border-t border-slate-800 pt-5">
                    <div class="flex justify-between gap-4"><div><p class="font-mono text-[11px] uppercase tracking-wide text-indigo-300/80">{{ $project->category }}@if($project->status) · {{ $project->status }}@endif</p><h3 class="mt-2 text-lg font-bold text-slate-100 group-hover:text-indigo-300 transition-colors"><a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a></h3></div><a href="{{ route('projects.show', $project->slug) }}" class="text-slate-600 group-hover:text-indigo-300 transition-colors">→</a></div>
                    <p class="mt-3 max-w-xl text-sm leading-6 text-slate-500">{{ $project->description }}</p>
                    @if(is_array($project->tech_stack))<p class="mt-4 font-mono text-[11px] text-slate-600">{{ implode(' · ', array_slice($project->tech_stack, 0, 5)) }}</p>@endif
                </article>
            @empty
                <p class="text-slate-500">Project stories are on their way.</p>
            @endforelse
        </div>
        <a href="{{ route('projects') }}" class="mt-8 inline-block sm:hidden text-sm text-indigo-300">All projects →</a>
    </div>
</section>

<section class="max-w-6xl mx-auto px-5 sm:px-8 py-14 sm:py-16 grid grid-cols-1 lg:grid-cols-12 gap-10">
    <div class="lg:col-span-4"><p class="font-mono text-xs text-indigo-300">writing</p><h2 class="mt-2 text-2xl font-bold text-white">From the notebook.</h2><p class="mt-3 text-sm leading-6 text-slate-500">Occasional notes on software, personal projects and things I’m learning. Some are technical; others are still taking shape.</p><a href="{{ route('blog.index') }}" class="inline-block mt-5 text-sm text-indigo-300 hover:text-white">Browse the blog →</a></div>
    <div class="lg:col-span-8 divide-y divide-slate-800 border-t border-slate-800">
        @forelse($latestPosts as $post)
            <a href="{{ route('blog.show', $post->slug) }}" class="group block py-5 sm:flex sm:items-baseline gap-8"><p class="font-mono text-xs text-slate-600 shrink-0">{{ $post->published_at->format('M j, Y') }}</p><div><h3 class="text-sm font-semibold text-slate-200 group-hover:text-indigo-300 transition-colors">{{ $post->title }}</h3><p class="mt-1 text-xs leading-5 text-slate-500">{{ $post->excerpt }}</p></div></a>
        @empty
            <p class="py-5 text-sm text-slate-500">I’ll share new notes here when I have something to write about.</p>
        @endforelse
    </div>
</section>
@endsection
