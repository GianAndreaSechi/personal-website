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
            ->get();

        $latestPosts = Post::with('category')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $iridesProject = Project::where('slug', 'irides')->first();

        return view('pages.home', compact('featuredProjects', 'latestPosts', 'iridesProject'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function resume()
    {
        return view('pages.resume');
    }

    public function projects(Request $request)
    {
        $query = Project::orderBy('sort_order', 'asc');

        if ($request->has('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $projects = $query->get();
        $categories = Project::select('category')->distinct()->pluck('category');

        $irides = Project::where('slug', 'irides')->first();

        return view('pages.projects', compact('projects', 'categories', 'irides'));
    }

    public function projectShow($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        $otherProjects = Project::where('id', '!=', $project->id)
            ->orderBy('sort_order', 'asc')
            ->take(3)
            ->get();

        if ($project->slug === 'irides') {
            return view('pages.projects.irides', compact('project', 'otherProjects'));
        }

        return view('pages.projects.show', compact('project', 'otherProjects'));
    }
}
