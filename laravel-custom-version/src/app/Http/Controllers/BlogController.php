<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('category')->whereNotNull('published_at');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($request->filled('tag')) {
            $tag = $request->tag;
            $query->whereJsonContains('tags', $tag);
        }

        $totalPostsCount = Post::whereNotNull('published_at')->count();
        $posts = $query->orderBy('published_at', 'desc')->paginate(12)->withQueryString();
        $categories = Category::withCount(['posts' => fn ($query) => $query->whereNotNull('published_at')])
            ->whereHas('posts', fn ($query) => $query->whereNotNull('published_at'))
            ->orderBy('name')->get();

        $featuredPost = Post::with('category')
            ->where('is_featured', true)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->first();

        return view('blog.index', compact('posts', 'categories', 'featuredPost', 'totalPostsCount'));
    }

    public function rss()
    {
        $posts = Post::with('category')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(20)
            ->get();

        return response()->view('blog.rss', compact('posts'))
            ->header('Content-Type', 'text/xml');
    }

    public function show($slug)
    {
        $post = Post::with('category')
            ->where('slug', $slug)
            ->whereNotNull('published_at')
            ->firstOrFail();

        $relatedPosts = Post::with('category')
            ->where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->whereNotNull('published_at')
            ->take(3)
            ->get();

        if ($relatedPosts->isEmpty()) {
            $relatedPosts = Post::with('category')
                ->where('id', '!=', $post->id)
                ->whereNotNull('published_at')
                ->take(3)
                ->get();
        }

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
