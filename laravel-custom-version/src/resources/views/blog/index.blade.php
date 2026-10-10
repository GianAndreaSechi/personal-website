@extends('layouts.app')

@section('title', 'Blog | Gian Andrea Sechi')
@section('meta_description', 'Notes by Gian Andrea Sechi on software, open-source projects, experiments and things worth learning.')

@section('content')
<section class="max-w-6xl mx-auto px-5 sm:px-8 py-16 sm:py-20">
    <header class="max-w-3xl pb-9 border-b border-slate-800">
        <div class="flex items-start justify-between gap-5"><div><p class="font-mono text-xs text-indigo-300">writing</p><h1 class="mt-3 text-3xl sm:text-5xl font-extrabold tracking-tight text-white">Notes & ideas.</h1></div><a href="{{ route('blog.rss') }}" target="_blank" class="font-mono text-xs text-slate-500 hover:text-indigo-300">RSS ↗</a></div>
        <p class="mt-4 text-sm sm:text-base leading-7 text-slate-400">A place to write about software, experiments and things I’m learning. Some articles follow a project; others begin with a question.</p>
    </header>

    <form action="{{ route('blog.index') }}" method="GET" class="mt-8 max-w-xl">
        @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if(request('tag'))
            <input type="hidden" name="tag" value="{{ request('tag') }}">
        @endif
        <label class="sr-only" for="search">Search articles</label>
        <input id="search" type="text" name="search" value="{{ request('search') }}" placeholder="Search articles…" class="w-full bg-slate-950/40 border-b border-slate-700 px-0 py-3 text-sm text-white placeholder-slate-600 focus:outline-none focus:border-indigo-400">
    </form>

    <nav class="mt-5 flex flex-wrap gap-x-5 gap-y-3 font-mono text-xs">
        <a href="{{ route('blog.index', array_filter(['search' => request('search')])) }}" class="{{ !request('category') ? 'text-indigo-300' : 'text-slate-500 hover:text-slate-200' }}">All <span class="text-slate-600">[{{ $totalPostsCount }}]</span></a>
        @foreach($categories as $category)
            <a href="{{ route('blog.index', array_filter(['category' => $category->slug, 'search' => request('search')])) }}" class="{{ request('category') === $category->slug ? 'text-indigo-300' : 'text-slate-500 hover:text-slate-200' }}">{{ strtolower($category->name) }} <span class="text-slate-600">[{{ $category->posts_count }}]</span></a>
        @endforeach
    </nav>

    <div class="mt-12 border-t border-slate-800">
        @forelse($posts as $post)
            <article class="group grid grid-cols-1 sm:grid-cols-[9rem_1fr_auto] gap-3 sm:gap-6 border-b border-slate-800 py-6">
                <div class="font-mono text-xs text-slate-600">
                    <p>{{ $post->published_at->format('M j, Y') }}</p>
                    <p class="mt-1">{{ $post->reading_time }} min read @if($post->category) · {{ strtolower($post->category->name) }} @endif</p>
                </div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-slate-100 group-hover:text-indigo-300 transition-colors"><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h2>
                    <p class="mt-2 max-w-3xl text-sm leading-6 text-slate-500">{{ $post->excerpt }}</p>
                    @if(is_array($post->tags) && count($post->tags))
                        <p class="mt-3 font-mono text-[11px] text-slate-600">
                            @foreach($post->tags as $tag)
                                #{{ $tag }}@if(!$loop->last) · @endif
                            @endforeach
                        </p>
                    @endif
                </div>
                <a href="{{ route('blog.show', $post->slug) }}" aria-label="Read {{ $post->title }}" class="self-start text-slate-600 group-hover:text-indigo-300 transition-colors">→</a>
            </article>
        @empty
            <div class="py-12 text-sm text-slate-400"><p>No articles match these filters.</p><a href="{{ route('blog.index') }}" class="mt-4 inline-block text-indigo-300 hover:text-white">Browse all articles →</a></div>
        @endforelse
    </div>
    @if($posts->hasPages())
        <div class="pt-8 font-mono text-xs">{{ $posts->links() }}</div>
    @endif
</section>
@endsection
