<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Http\Request;
// We no longer need to import Profile here because the Service Provider handles it.

class PageController extends Controller
{
   public function home()
{
    $profile = Profile::firstOrNew([]); // Add this line
    $projects = Project::latest()->take(3)->get();
    return view('pages.home', compact('profile', 'projects')); // Add 'profile' here
}

    public function about()
    {
        $about = About::firstOrNew([]);
        $profile = Profile::firstOrNew([]); // Add this line back
        return view('pages.about', compact('about', 'profile')); // Add 'profile' back here
    }

    public function projects(Request $request)
    {
        $query = Project::query()->latest();

        if ($request->has('tag')) {
            $tagSlug = $request->tag;
            $query->whereHas('tags', function ($q) use ($tagSlug) {
                $q->where('slug', $tagSlug);
            });
        }

        $projects = $query->get();
        $tags = Tag::all();

        return view('pages.projects', compact('projects', 'tags'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function blogIndex()
    {
        $posts = Post::where('is_published', true)->latest('published_at')->paginate(5);
        return view('pages.blog.index', compact('posts'));
    }

    public function blogShow(Post $post)
    {
        if (!$post->is_published) {
            abort(404);
        }
        return view('pages.blog.show', compact('post'));
    }
}
