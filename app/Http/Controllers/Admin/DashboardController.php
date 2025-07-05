<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $postCount = Post::count();
        $tagCount = Tag::count();

        return view('admin.dashboard', compact('projectCount', 'postCount', 'tagCount'));
    }
}
