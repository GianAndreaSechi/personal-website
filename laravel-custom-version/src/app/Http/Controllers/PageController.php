<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $featuredProjects = Project::where('is_featured', true)
            ->orderBy('sort_order', 'asc')
            ->limit(4)
            ->get();

        $latestPosts = Post::with('category')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('pages.home', compact('featuredProjects', 'latestPosts'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function resume()
    {
        $projects = Project::whereIn('slug', ['irides', 'near-me', 'near-me-data'])
            ->orderBy('sort_order')->get();

        return view('pages.resume', compact('projects'));
    }

    public function downloadResume()
    {
        return response()->download(resource_path('documents/gian-andrea-sechi-cv.pdf'), 'Gian-Andrea-Sechi-CV.pdf');
    }

    public function projects(Request $request)
    {
        $query = Project::orderBy('sort_order', 'asc');

        if ($request->has('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $projects = $query->get();
        $categories = Project::select('category')->distinct()->orderBy('category')->pluck('category');

        return view('pages.projects', compact('projects', 'categories'));
    }

    public function projectShow($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        $otherProjects = Project::where('id', '!=', $project->id)
            ->orderBy('sort_order', 'asc')
            ->take(3)
            ->get();

        return view('pages.projects.show', compact('project', 'otherProjects'));
    }
}
