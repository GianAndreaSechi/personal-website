@extends('layouts.app')

@section('title', $project->title . ' | Projects | Gian Andrea Sechi')
@section('meta_description', $project->description)

@section('content')
<article class="max-w-4xl mx-auto px-5 sm:px-8 py-14 sm:py-20">
    <a href="{{ route('projects') }}" class="font-mono text-xs text-slate-500 hover:text-indigo-300 transition-colors">← all projects</a>

    <!-- Project Header -->
    <header class="mt-8 pb-9 border-b border-slate-800 space-y-4">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <span class="font-mono text-xs text-indigo-300">
                {{ $project->category }}
            </span>
            <div class="flex items-center gap-4 text-xs font-mono">
                @if($project->project_url)
                    <a href="{{ $project->project_url }}" target="_blank" class="text-slate-400 hover:text-indigo-300 transition-colors">live demo ↗</a>
                @endif
                @if($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank" class="text-slate-400 hover:text-indigo-300 transition-colors">github ↗</a>
                @endif
            </div>
        </div>

        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight text-white">
            {{ $project->title }}
        </h1>

        @if($project->subtitle)
            <p class="text-base sm:text-lg text-indigo-300 font-mono">
                {{ $project->subtitle }}
            </p>
        @endif

        <p class="text-base sm:text-lg text-slate-400 font-normal leading-relaxed">
            {{ $project->description }}
        </p>

        @if(is_array($project->tech_stack))
            <div class="pt-2 flex flex-wrap items-center gap-1.5 font-mono text-xs">
                @foreach($project->tech_stack as $tech)
                    <span class="tech-badge">{{ $tech }}</span>
                @endforeach
            </div>
        @endif
    </header>

    <!-- Cover Image -->
    @if($project->image_url)
        <figure class="mt-9 border-y border-slate-800 py-4">
            <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="w-full max-h-[300px] object-cover opacity-90">
        </figure>
    @endif

    <!-- Main Content -->
    <div class="mt-10 prose max-w-none">
        {!! \Illuminate\Support\Str::markdown($project->content) !!}
    </div>

    <!-- Other Projects Section -->
    @if($otherProjects->count() > 0)
        <section class="mt-14 pt-7 border-t border-slate-800">
            <h2 class="text-lg font-bold text-white">More projects</h2>
            <div class="mt-4 divide-y divide-slate-800 border-t border-slate-800">
                @foreach($otherProjects as $other)
                    <a href="{{ route('projects.show', $other->slug) }}" class="group flex items-baseline justify-between gap-5 py-4">
                        <span>
                            <span class="font-mono text-xs text-indigo-300 mr-4">{{ $other->category }}</span>
                            <span class="text-sm text-slate-300 group-hover:text-indigo-300 transition-colors">{{ $other->title }}</span>
                        </span>
                        <span class="text-slate-600 group-hover:text-indigo-300 transition-colors">→</span>
                    </a>
                @endforeach
            </div>
        </section>
    @endif
</article>
@endsection
