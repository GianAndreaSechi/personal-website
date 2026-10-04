@extends('layouts.app')

@section('title', 'Gian Andrea Sechi | Senior Software Engineer & Technical Blog')

@section('content')
<section class="max-w-6xl mx-auto px-5 sm:px-8 pt-16 pb-14 sm:pt-24 sm:pb-20">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
        <div class="lg:col-span-7">
            <p class="font-mono text-xs text-indigo-300 mb-5">// senior software engineer · italy</p>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-[1.1]">Hi, I’m<br>Gian Andrea Sechi.</h1>
            <p class="mt-7 max-w-2xl text-base sm:text-lg leading-8 text-slate-400">I design data-intensive systems on AWS and help turn legacy platforms into scalable, observable services—where reliability, cost and delivery need to work together.</p>
            <div class="mt-8 flex flex-wrap gap-x-6 gap-y-3 text-sm font-medium">
                <a href="{{ route('blog.index') }}" class="text-indigo-300 hover:text-white transition-colors">Read technical notes <span aria-hidden="true">→</span></a>
                <a href="{{ route('resume') }}" class="text-slate-400 hover:text-white transition-colors">View experience <span aria-hidden="true">→</span></a>
            </div>
            <div class="mt-10 pt-5 border-t border-slate-800 grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs text-slate-500">
                <span>Real-time data on AWS</span><span>Kubernetes & microservices</span><span>14+ years in engineering</span>
            </div>
        </div>

        <div class="lg:col-span-5">
            <div class="border border-slate-700/70 bg-slate-950/40 p-5 sm:p-6">
                <div class="flex items-center justify-between pb-4 mb-4 border-b border-slate-800">
                    <span class="font-mono text-xs text-slate-500">profile.json</span><span class="w-2 h-2 rounded-full bg-emerald-400/80"></span>
                </div>
                <pre class="text-[11px] sm:text-xs leading-6 whitespace-pre-wrap text-slate-400"><span class="text-slate-500">{</span>
  <span class="text-indigo-300">"role"</span>: <span class="text-emerald-300">"Senior Software Engineer L5"</span>,
  <span class="text-indigo-300">"company"</span>: <span class="text-emerald-300">"Musixmatch"</span>,
  <span class="text-indigo-300">"focus"</span>: [<span class="text-emerald-300">"backend"</span>, <span class="text-emerald-300">"data"</span>],
  <span class="text-indigo-300">"stack"</span>: [<span class="text-emerald-300">"AWS"</span>, <span class="text-emerald-300">"PHP"</span>, <span class="text-emerald-300">"Python"</span>],
  <span class="text-indigo-300">"impact"</span>: <span class="text-emerald-300">"reliable systems at scale"</span>
<span class="text-slate-500">}</span></pre>
            </div>
        </div>
    </div>
</section>

<section class="border-y border-slate-800/80 bg-slate-950/20">
    <div class="max-w-6xl mx-auto px-5 sm:px-8 py-14 sm:py-16">
        <div class="flex items-end justify-between gap-6 mb-9"><div><p class="font-mono text-xs text-indigo-300">01 / selected work</p><h2 class="mt-2 text-2xl sm:text-3xl font-bold text-white">Projects, without the noise.</h2></div><a href="{{ route('projects') }}" class="hidden sm:block text-sm text-slate-400 hover:text-indigo-300">All projects →</a></div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
            @forelse($featuredProjects as $project)
                <article class="group border-t border-slate-800 pt-5">
                    <div class="flex justify-between gap-4"><div><p class="font-mono text-[11px] uppercase tracking-wide text-indigo-300/80">{{ $project->category }}</p><h3 class="mt-2 text-lg font-bold text-slate-100 group-hover:text-indigo-300 transition-colors"><a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a></h3></div><a href="{{ route('projects.show', $project->slug) }}" class="text-slate-600 group-hover:text-indigo-300 transition-colors">→</a></div>
                    <p class="mt-3 max-w-xl text-sm leading-6 text-slate-500">{{ $project->description }}</p>
                    @if(is_array($project->tech_stack))<p class="mt-4 font-mono text-[11px] text-slate-600">{{ implode(' · ', array_slice($project->tech_stack, 0, 5)) }}</p>@endif
                </article>
            @empty
                <p class="text-slate-500">Projects coming soon.</p>
            @endforelse
        </div>
        <a href="{{ route('projects') }}" class="mt-8 inline-block sm:hidden text-sm text-indigo-300">All projects →</a>
    </div>
</section>

<section class="max-w-6xl mx-auto px-5 sm:px-8 py-14 sm:py-16 grid grid-cols-1 lg:grid-cols-12 gap-10">
    <div class="lg:col-span-4"><p class="font-mono text-xs text-indigo-300">02 / writing</p><h2 class="mt-2 text-2xl font-bold text-white">Notes from the field.</h2><p class="mt-3 text-sm leading-6 text-slate-500">Deep dives into distributed systems, platform work and the details that make production software last.</p><a href="{{ route('blog.index') }}" class="inline-block mt-5 text-sm text-indigo-300 hover:text-white">Browse the blog →</a></div>
    <div class="lg:col-span-8 divide-y divide-slate-800 border-t border-slate-800">
        @forelse($latestPosts as $post)
            <a href="{{ route('blog.show', $post->slug) }}" class="group block py-5 sm:flex sm:items-baseline gap-8"><p class="font-mono text-xs text-slate-600 shrink-0">{{ $post->published_at->format('M j, Y') }}</p><div><h3 class="text-sm font-semibold text-slate-200 group-hover:text-indigo-300 transition-colors">{{ $post->title }}</h3><p class="mt-1 text-xs leading-5 text-slate-500">{{ $post->excerpt }}</p></div></a>
        @empty
            <p class="py-5 text-sm text-slate-500">New notes coming soon.</p>
        @endforelse
    </div>
</section>
@endsection
