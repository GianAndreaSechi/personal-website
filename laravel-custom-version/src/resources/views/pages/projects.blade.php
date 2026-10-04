@extends('layouts.app')

@section('title', 'Projects & Open Source Portfolio | Gian Andrea Sechi')

@section('content')
<section class="max-w-6xl mx-auto px-5 sm:px-8 py-16 sm:py-20">
    <header class="max-w-3xl border-b border-slate-800 pb-9">
        <p class="font-mono text-xs text-indigo-300">01 / selected work</p>
        <h1 class="mt-3 text-3xl sm:text-5xl font-extrabold tracking-tight text-white">Engineering projects.</h1>
        <p class="mt-4 text-sm sm:text-base leading-7 text-slate-400">Architecture case studies, personal initiatives and open-source utilities. The details matter more than the thumbnails.</p>
    </header>

    <nav class="mt-7 flex flex-wrap gap-x-5 gap-y-3 text-xs font-mono">
        <a href="{{ route('projects') }}" class="{{ !request('category') || request('category') === 'all' ? 'text-indigo-300' : 'text-slate-500 hover:text-slate-200' }}">All <span class="text-slate-600">[{{ \App\Models\Project::count() }}]</span></a>
        @foreach($categories as $cat)
            <a href="{{ route('projects', ['category' => $cat]) }}" class="{{ request('category') === $cat ? 'text-indigo-300' : 'text-slate-500 hover:text-slate-200' }}">{{ $cat }}</a>
        @endforeach
    </nav>

    <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10">
        @forelse($projects as $project)
            <article class="group border-t border-slate-800 pt-5">
                <div class="flex items-start justify-between gap-5">
                    <div>
                        <p class="font-mono text-[11px] uppercase tracking-wide text-indigo-300/80">{{ $project->category }}</p>
                        <h2 class="mt-2 text-xl font-bold text-slate-100 group-hover:text-indigo-300 transition-colors"><a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a></h2>
                        @if($project->subtitle)<p class="mt-1 font-mono text-xs text-slate-500">{{ $project->subtitle }}</p>@endif
                    </div>
                    <a href="{{ route('projects.show', $project->slug) }}" aria-label="View {{ $project->title }}" class="text-slate-600 group-hover:text-indigo-300 transition-colors">→</a>
                </div>
                <p class="mt-4 text-sm leading-6 text-slate-400">{{ $project->description }}</p>
                @if(is_array($project->tech_stack))<p class="mt-4 font-mono text-[11px] leading-5 text-slate-600">{{ implode(' · ', array_slice($project->tech_stack, 0, 6)) }}</p>@endif
                <div class="mt-5 flex gap-4 text-xs">
                    @if($project->project_url)<a href="{{ $project->project_url }}" target="_blank" class="text-slate-500 hover:text-indigo-300">live app ↗</a>@endif
                    @if($project->github_url)<a href="{{ $project->github_url }}" target="_blank" class="text-slate-500 hover:text-indigo-300">github ↗</a>@endif
                </div>
            </article>
        @empty
            <p class="py-12 text-slate-500">No projects found for the selected category.</p>
        @endforelse
    </div>
</section>
@endsection
