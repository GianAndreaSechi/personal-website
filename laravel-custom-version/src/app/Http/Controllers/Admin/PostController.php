<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('category')->latest('updated_at');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->whereNotNull('published_at');
            } elseif ($request->status === 'draft') {
                $query->whereNull('published_at');
            }
        }

        $posts = $query->paginate(15)->withQueryString();
        $totalPosts = Post::count();
        $publishedCount = Post::whereNotNull('published_at')->count();
        $draftCount = Post::whereNull('published_at')->count();

        return view('admin.posts.index', compact('posts', 'totalPosts', 'publishedCount', 'draftCount'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'category_id' => 'nullable|exists:categories,id',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'cover_image' => 'nullable|string|max:1000',
            'reading_time' => 'nullable|integer|min:1',
            'tags' => 'nullable|string',
            'is_featured' => 'boolean',
            'status' => 'required|in:published,draft',
            'published_at' => 'nullable|date',
        ]);

        $slug = $validated['slug'] ? Str::slug($validated['slug']) : Str::slug($validated['title']);

        // Auto-calculate reading time if not provided (~200 words/min)
        $readingTime = $validated['reading_time'];
        if (!$readingTime) {
            $wordCount = str_word_count(strip_tags($validated['content']));
            $readingTime = max(1, (int) ceil($wordCount / 200));
        }

        // Process tags
        $tags = [];
        if (!empty($validated['tags'])) {
            $tags = array_values(array_filter(array_map('trim', explode(',', $validated['tags']))));
        }

        // Set published_at
        $publishedAt = null;
        if ($validated['status'] === 'published') {
            $publishedAt = $validated['published_at'] ? Carbon\Carbon::parse($validated['published_at']) : now();
        }

        $post = Post::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $validated['category_id'] ?: null,
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'cover_image' => $validated['cover_image'],
            'reading_time' => $readingTime,
            'tags' => $tags,
            'is_featured' => $request->boolean('is_featured'),
            'published_at' => $publishedAt,
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Article created successfully!');
    }

    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug,' . $post->id,
            'category_id' => 'nullable|exists:categories,id',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'cover_image' => 'nullable|string|max:1000',
            'reading_time' => 'nullable|integer|min:1',
            'tags' => 'nullable|string',
            'is_featured' => 'boolean',
            'status' => 'required|in:published,draft',
            'published_at' => 'nullable|date',
        ]);

        $slug = $validated['slug'] ? Str::slug($validated['slug']) : Str::slug($validated['title']);

        $readingTime = $validated['reading_time'];
        if (!$readingTime) {
            $wordCount = str_word_count(strip_tags($validated['content']));
            $readingTime = max(1, (int) ceil($wordCount / 200));
        }

        $tags = [];
        if (!empty($validated['tags'])) {
            $tags = array_values(array_filter(array_map('trim', explode(',', $validated['tags']))));
        }

        $publishedAt = null;
        if ($validated['status'] === 'published') {
            $publishedAt = $validated['published_at'] ? \Illuminate\Support\Carbon::parse($validated['published_at']) : ($post->published_at ?? now());
        }

        $post->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $validated['category_id'] ?: null,
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'cover_image' => $validated['cover_image'],
            'reading_time' => $readingTime,
            'tags' => $tags,
            'is_featured' => $request->boolean('is_featured'),
            'published_at' => $publishedAt,
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Article updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Article deleted successfully.');
    }
}
