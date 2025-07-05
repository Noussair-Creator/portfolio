<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectStoreRequest;
use App\Http\Requests\Admin\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('tags')->latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        // Create a new empty Project model instance
        $project = new Project();

        // Pass the new project instance to the view
        return view('admin.projects.create', compact('tags', 'project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request)
    {
        $validated = $request->validated();

        // Handle image upload
        $path = $request->file('image')->store('project-images', 'public');
        $validated['image_path'] = $path;

        // Unset the 'image' key as it's not a column in the projects table
        unset($validated['image']);

        $project = Project::create($validated);

        // Attach tags if they exist
        if (isset($validated['tags'])) {
            $project->tags()->attach($validated['tags']);
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $tags = Tag::all();
        return view('admin.projects.edit', compact('project', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($project->image_path);
            // Store new image
            $path = $request->file('image')->store('project-images', 'public');
            $validated['image_path'] = $path;
        }

        unset($validated['image']);

        $project->update($validated);

        // Sync tags
        $project->tags()->sync($request->tags ?? []);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete the project image from storage
        Storage::disk('public')->delete($project->image_path);

        // Delete the project record from the database
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
