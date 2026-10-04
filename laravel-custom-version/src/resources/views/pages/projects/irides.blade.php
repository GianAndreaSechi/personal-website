@extends('layouts.app')

@section('title', 'IRIDES | Unified Multi-Database Introspection for LLMs & AI Agents')
@section('meta_description', 'IRIDES (v0.4.0-alpha): A unified, asynchronous database introspection layer designed to help LLMs extract, summarize, and understand schemas across heterogeneous data stores without hallucinating.')

@section('content')
<article class="max-w-4xl mx-auto px-5 sm:px-8 py-14 sm:py-20">
    <a href="{{ route('projects') }}" class="font-mono text-xs text-slate-500 hover:text-indigo-300 transition-colors">← all projects</a>

    <!-- Header -->
    <header class="mt-8 pb-9 border-b border-slate-800 space-y-4">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-3 font-mono text-xs">
                <span class="text-indigo-300">AI / LLM Infrastructure</span>
                <span class="text-slate-600">·</span>
                <span class="text-slate-500">v0.4.0-alpha</span>
                <span class="text-slate-600">·</span>
                <span class="text-emerald-400">flagship</span>
            </div>
            <a href="https://github.com/GianAndreaSechi/irides" target="_blank" class="text-xs font-mono text-slate-400 hover:text-indigo-300 transition-colors">
                github repository ↗
            </a>
        </div>

        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight text-white">
            IRIDES
        </h1>

        <p class="text-base sm:text-lg text-indigo-300 font-mono">
            Unified Multi-Database Introspection Layer for LLMs & AI Agents
        </p>

        <p class="text-base sm:text-lg text-slate-400 font-normal leading-relaxed">
            An asynchronous schema describer and context provider engineered to help Large Language Models and AI applications extract, summarize, and understand database schemas across heterogeneous data stores with zero hallucination.
        </p>

        <div class="pt-2 flex flex-wrap items-center gap-1.5 font-mono text-xs">
            @foreach(['Python 3.11', 'FastAPI', 'FastMCP', 'Redis Streams', 'Pydantic', 'LiteLLM', 'Docker', 'PostgreSQL', 'MySQL', 'Athena', 'DynamoDB'] as $tech)
                <span class="tech-badge">{{ $tech }}</span>
            @endforeach
        </div>
    </header>

    <!-- PyPI Packages -->
    <div class="mt-8 border border-slate-800 bg-slate-950/40 rounded-lg divide-y divide-slate-800">
        <div class="px-5 py-3 flex items-center gap-2">
            <span class="font-mono text-[11px] uppercase tracking-wider text-indigo-300">PyPI</span>
            <span class="text-slate-600 text-xs">·</span>
            <span class="font-mono text-xs text-slate-500">v0.1.3</span>
        </div>

        <!-- irides-core -->
        <div class="px-5 py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div class="space-y-1">
                <div class="flex items-center gap-2">
                    <span class="font-mono text-sm font-semibold text-white">irides-core</span>
                    <a href="https://pypi.org/project/irides-core/" target="_blank" rel="noopener noreferrer"
                       class="font-mono text-[11px] text-indigo-300 hover:text-indigo-200 transition-colors">
                        pypi.org ↗
                    </a>
                </div>
                <p class="text-xs text-slate-400">Core library — schema introspection engine, adapters & MCP tools.</p>
            </div>
            <code class="shrink-0 font-mono text-xs bg-slate-900 border border-slate-700 text-emerald-400 px-3 py-1.5 rounded-md whitespace-nowrap">
                pip install irides-core
            </code>
        </div>

        <!-- irides-cli -->
        <div class="px-5 py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div class="space-y-1">
                <div class="flex items-center gap-2">
                    <span class="font-mono text-sm font-semibold text-white">irides-cli</span>
                    <a href="https://pypi.org/project/irides-cli/" target="_blank" rel="noopener noreferrer"
                       class="font-mono text-[11px] text-indigo-300 hover:text-indigo-200 transition-colors">
                        pypi.org ↗
                    </a>
                </div>
                <p class="text-xs text-slate-400">Command-line interface — inspect & export schemas from the terminal.</p>
            </div>
            <code class="shrink-0 font-mono text-xs bg-slate-900 border border-slate-700 text-emerald-400 px-3 py-1.5 rounded-md whitespace-nowrap">
                pip install irides-cli
            </code>
        </div>
    </div>

    <!-- Architecture Highlights -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-8 pb-4">
        <div class="border border-slate-800 bg-slate-950/40 p-5 rounded-lg space-y-2">
            <p class="font-mono text-[11px] uppercase tracking-wider text-indigo-300">Zero Hallucinations</p>
            <h3 class="text-sm font-bold text-white">Grounded Schema Context</h3>
            <p class="text-xs text-slate-400 leading-relaxed">
                Provides normalized schema context so LLMs never hallucinate column names, relationships or invalid SQL/NoSQL dialect syntax.
            </p>
        </div>

        <div class="border border-slate-800 bg-slate-950/40 p-5 rounded-lg space-y-2">
            <p class="font-mono text-[11px] uppercase tracking-wider text-indigo-300">FastMCP & REST</p>
            <h3 class="text-sm font-bold text-white">Native Agent Interfaces</h3>
            <p class="text-xs text-slate-400 leading-relaxed">
                Exposes FastMCP tools directly to AI assistants (Claude, Cursor, IDE agents) alongside a versioned FastAPI REST interface.
            </p>
        </div>

        <div class="border border-slate-800 bg-slate-950/40 p-5 rounded-lg space-y-2">
            <p class="font-mono text-[11px] uppercase tracking-wider text-indigo-300">Async Pipeline</p>
            <h3 class="text-sm font-bold text-white">Redis Streams & AI Docs</h3>
            <p class="text-xs text-slate-400 leading-relaxed">
                Non-blocking schema scanning via Redis Streams with optional automated semantic table documentation generation.
            </p>
        </div>
    </div>

    <!-- Technical Documentation -->
    <div class="mt-8 prose max-w-none">
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
