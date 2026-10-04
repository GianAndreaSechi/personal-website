@extends('admin.layout')

@section('title', 'Manage Articles')

@section('content')
<div class="space-y-8">
    
    <!-- Top Action & Header -->
    <header class="pb-8 border-b border-slate-800 flex flex-col sm:flex-row sm:items-end justify-between gap-6">
        <div>
            <p class="font-mono text-xs text-indigo-300">01 / backoffice</p>
            <h1 class="mt-3 text-3xl sm:text-4xl font-extrabold tracking-tight text-white">Articles management.</h1>
            <p class="mt-3 text-sm text-slate-400">Create, edit, publish and maintain technical notes and articles.</p>
        </div>

        <div>
            <a href="{{ route('admin.posts.create') }}" class="px-5 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-xs transition-colors flex items-center gap-2">
                <i class="fa-solid fa-plus text-[10px]"></i>
                <span>Write new article</span>
            </a>
        </div>
    </header>

    <!-- Stats Row -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="border border-slate-800 bg-slate-950/40 p-5 rounded-lg flex items-center justify-between">
            <div>
                <span class="font-mono text-[11px] uppercase tracking-wider text-slate-500">Total Articles</span>
                <p class="text-2xl font-bold font-mono text-white mt-1">{{ $totalPosts }}</p>
            </div>
            <span class="font-mono text-xs text-slate-600">all</span>
        </div>

        <div class="border border-slate-800 bg-slate-950/40 p-5 rounded-lg flex items-center justify-between">
            <div>
                <span class="font-mono text-[11px] uppercase tracking-wider text-slate-500">Published</span>
                <p class="text-2xl font-bold font-mono text-emerald-400 mt-1">{{ $publishedCount }}</p>
            </div>
            <span class="w-2 h-2 rounded-full bg-emerald-400/80"></span>
        </div>

        <div class="border border-slate-800 bg-slate-950/40 p-5 rounded-lg flex items-center justify-between">
            <div>
                <span class="font-mono text-[11px] uppercase tracking-wider text-slate-500">Drafts</span>
                <p class="text-2xl font-bold font-mono text-amber-400 mt-1">{{ $draftCount }}</p>
            </div>
            <span class="w-2 h-2 rounded-full bg-amber-400/80"></span>
        </div>
    </div>

    <!-- Search & Filter Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pt-2">
        <form action="{{ route('admin.posts.index') }}" method="GET" class="w-full sm:max-w-md">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <div class="relative">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-slate-600 text-xs"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search articles or slug…" class="w-full pl-9 pr-4 py-2 rounded-lg bg-slate-950/60 border border-slate-800 text-xs text-white placeholder-slate-600 focus:outline-none focus:border-indigo-400 font-mono">
            </div>
        </form>

        <nav class="flex items-center gap-4 text-xs font-mono">
            <a href="{{ route('admin.posts.index', array_filter(['search' => request('search')])) }}" class="{{ !request('status') ? 'text-indigo-300 font-semibold' : 'text-slate-500 hover:text-slate-200' }}">all</a>
            <span class="text-slate-700">·</span>
            <a href="{{ route('admin.posts.index', array_filter(['status' => 'published', 'search' => request('search')])) }}" class="{{ request('status') === 'published' ? 'text-indigo-300 font-semibold' : 'text-slate-500 hover:text-slate-200' }}">published [{{ $publishedCount }}]</a>
            <span class="text-slate-700">·</span>
            <a href="{{ route('admin.posts.index', array_filter(['status' => 'draft', 'search' => request('search')])) }}" class="{{ request('status') === 'draft' ? 'text-indigo-300 font-semibold' : 'text-slate-500 hover:text-slate-200' }}">drafts [{{ $draftCount }}]</a>
        </nav>
    </div>

    <!-- Posts Table -->
    <div class="border border-slate-800 bg-slate-950/40 rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300">
                <thead class="border-b border-slate-800 bg-slate-950/70 text-slate-500 font-mono text-[10px] uppercase tracking-wider">
                    <tr>
                        <th class="py-3 px-4">Article</th>
                        <th class="py-3 px-4">Category</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Read Time</th>
                        <th class="py-3 px-4">Updated</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($posts as $post)
                    <tr class="hover:bg-slate-900/40 transition-colors">
                        <td class="py-3.5 px-4">
                            <div class="flex items-start gap-2.5">
                                @if($post->is_featured)
                                    <i class="fa-solid fa-star text-amber-400 mt-1 text-[11px]" title="Featured Article"></i>
                                @endif
                                <div>
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="font-bold text-slate-100 hover:text-indigo-300 text-sm block transition-colors">
                                        {{ $post->title }}
                                    </a>
                                    <span class="font-mono text-[11px] text-slate-500">/blog/{{ $post->slug }}</span>
                                </div>
                            </div>
                        </td>

                        <td class="py-3.5 px-4 font-mono text-[11px]">
                            @if($post->category)
                                <span class="text-slate-300">#{{ strtolower($post->category->name) }}</span>
                            @else
                                <span class="text-slate-600">—</span>
                            @endif
                        </td>

                        <td class="py-3.5 px-4">
                            @if($post->published_at)
                                <span class="inline-flex items-center gap-1.5 font-mono text-[11px] text-emerald-400">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                    <span>{{ $post->published_at->format('M j, Y') }}</span>
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 font-mono text-[11px] text-amber-400">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                    <span>draft</span>
                                </span>
                            @endif
                        </td>

                        <td class="py-3.5 px-4 font-mono text-[11px] text-slate-400">
                            {{ $post->reading_time }} min
                        </td>

                        <td class="py-3.5 px-4 font-mono text-[11px] text-slate-500">
                            {{ $post->updated_at->diffForHumans() }}
                        </td>

                        <td class="py-3.5 px-4 text-right">
                            <div class="inline-flex items-center gap-2">
                                @if($post->published_at)
                                    <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="p-1.5 text-slate-400 hover:text-indigo-300 transition-colors" title="View Public Post">
                                        <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                                    </a>
                                @endif

                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="p-1.5 text-slate-400 hover:text-indigo-300 transition-colors" title="Edit Article">
                                    <i class="fa-solid fa-pen text-xs"></i>
                                </a>

                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-slate-500 hover:text-rose-400 transition-colors" title="Delete">
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-12 text-center text-slate-500 font-mono text-xs">
                            No articles found. Write your first post to get started.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($posts->hasPages())
            <div class="p-4 border-t border-slate-800 font-mono text-xs">
                {{ $posts->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
