@extends('layouts.app')

@section('title', $post->title . ' | Gian Andrea Sechi')
@section('meta_description', $post->excerpt)

@section('og_type', 'article')

@section('content')
<article class="max-w-4xl mx-auto px-5 sm:px-8 py-14 sm:py-20">
    <a href="{{ route('blog.index') }}" class="font-mono text-xs text-slate-500 hover:text-indigo-300">← All articles</a>
    <header class="mt-8 pb-9 border-b border-slate-800">
        <p class="font-mono text-xs text-indigo-300">{{ $post->published_at->format('M j, Y') }} · {{ $post->reading_time }} min read @if($post->category) · {{ strtolower($post->category->name) }} @endif</p>
        <h1 class="mt-4 text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight text-white">{{ $post->title }}</h1>
        @if($post->excerpt)
            <p class="mt-5 max-w-3xl text-base sm:text-lg leading-8 text-slate-400">{{ $post->excerpt }}</p>
        @endif
    </header>

    @if($post->cover_image)
        <figure class="mt-9 border-y border-slate-800 py-4"><img src="{{ $post->cover_image }}" alt="{{ $post->title }}" class="w-full max-h-[300px] object-cover opacity-90"></figure>
    @endif

    <div class="mt-10 prose max-w-none">
        {!! \Illuminate\Support\Str::markdown($post->content) !!}
    </div>

    @if(is_array($post->tags) && count($post->tags))
        <div class="mt-10 pt-5 border-t border-slate-800 font-mono text-xs text-slate-600">
            tags:
            @foreach($post->tags as $tag)
                <a href="{{ route('blog.index', ['tag' => $tag]) }}" class="ml-2 hover:text-indigo-300">#{{ $tag }}</a>
            @endforeach
        </div>
    @endif

    <aside class="mt-10 pt-6 border-t border-slate-800 flex gap-4 text-sm"><span class="font-mono text-indigo-300 tracking-tighter">&lt;/&gt;</span><div><p class="font-semibold text-slate-200"><a href="{{ route('about') }}" class="hover:text-indigo-300">Gian Andrea Sechi</a></p><p class="mt-1 text-xs leading-5 text-slate-500">Software engineer at Musixmatch. Sharing projects, experiments and things I’m learning.</p></div></aside>

    @if($relatedPosts->count())
        <section class="mt-12 pt-7 border-t border-slate-800">
            <h2 class="text-lg font-bold text-white">More articles</h2>
            <div class="mt-4 divide-y divide-slate-800 border-t border-slate-800">
                @foreach($relatedPosts as $rel)
                    <a href="{{ route('blog.show', $rel->slug) }}" class="group flex items-baseline justify-between gap-5 py-4"><span><span class="font-mono text-xs text-slate-600 mr-4">{{ $rel->published_at->format('M j, Y') }}</span><span class="text-sm text-slate-300 group-hover:text-indigo-300">{{ $rel->title }}</span></span><span class="text-slate-600 group-hover:text-indigo-300">→</span></a>
                @endforeach
            </div>
        </section>
    @endif
</article>
@endsection
