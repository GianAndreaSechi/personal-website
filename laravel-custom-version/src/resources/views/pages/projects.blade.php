@extends('layouts.app')

@section('title', 'Projects | Gian Andrea Sechi')
@section('meta_description', 'Personal projects, open-source tools and earlier experiments: irides, NearMe, Formula 1 data, numerical methods and more.')

@section('content')
<section class="max-w-6xl mx-auto px-5 sm:px-8 py-16 sm:py-20">
    <header class="max-w-3xl border-b border-slate-800 pb-9">
        <p class="font-mono text-xs text-indigo-300">projects</p>
        <h1 class="mt-3 text-3xl sm:text-5xl font-extrabold tracking-tight text-white">Things I’ve built along the way.</h1>
        <p class="mt-4 text-sm sm:text-base leading-7 text-slate-400">Open-source tools, community projects and experiments from different parts of my life. Each has its own context: something I needed, something I wanted to understand, or a reason to try an idea.</p>
    </header>
    <nav aria-label="Filter projects" class="mt-7 flex flex-wrap gap-x-5 gap-y-3 text-xs font-mono">
        <a href="{{ route('projects') }}" class="{{ !request('category') || request('category') === 'all' ? 'text-indigo-300' : 'text-slate-400 hover:text-white' }}">All projects</a>
        @foreach($categories as $category)
            <a href="{{ route('projects', ['category' => $category]) }}" class="{{ request('category') === $category ? 'text-indigo-300' : 'text-slate-400 hover:text-white' }}">{{ $category }}</a>
        @endforeach
    </nav>
    @forelse($projects->groupBy('category') as $category => $group)
        <section class="mt-12">
            <h2 class="text-xl font-bold text-white">{{ $category }}</h2>
            <div class="mt-5 grid md:grid-cols-2 gap-x-12 gap-y-8">
                @foreach($group as $project)
                    <article class="border-t border-slate-800 pt-5">
                        <p class="font-mono text-xs leading-6 text-slate-500">{{ $project->status }}@if($project->period) · {{ $project->period }}@endif</p>
                        <h3 class="mt-2 text-lg font-bold text-white"><a href="{{ route('projects.show', $project->slug) }}" class="hover:text-indigo-300">{{ $project->title }}</a></h3>
                        <p class="mt-3 text-sm leading-7 text-slate-400">{{ $project->description }}</p>
                        @if(is_array($project->tech_stack))<p class="mt-4 font-mono text-xs leading-6 text-slate-500">{{ implode(' · ', array_slice($project->tech_stack, 0, 5)) }}</p>@endif
                        <a href="{{ route('projects.show', $project->slug) }}" class="mt-4 inline-block text-sm text-indigo-300 hover:text-white">Read the story →</a>
                    </article>
                @endforeach
            </div>
        </section>
    @empty
        <div class="mt-12 border-t border-slate-800 py-8"><p class="text-slate-400">There are no projects in this category.</p><a href="{{ route('projects') }}" class="mt-4 inline-block text-sm text-indigo-300">See all projects →</a></div>
    @endforelse
</section>
@endsection
