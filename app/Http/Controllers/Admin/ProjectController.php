<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:200',
            'description' => 'required|string',
            'url'         => 'nullable|url|max:500',
            'github_url'  => 'nullable|url|max:500',
            'tech_stack'  => 'nullable|string',
            'category'    => 'required|in:web,mobile,ai,automation,other',
            'sort_order'  => 'integer|min:0',
        ]);

        // Convert comma-separated tech_stack to array
        if (!empty($validated['tech_stack'])) {
            $validated['tech_stack'] = array_map('trim', explode(',', $validated['tech_stack']));
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active']   = $request->boolean('is_active');

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:200',
            'description' => 'required|string',
            'url'         => 'nullable|url|max:500',
            'github_url'  => 'nullable|url|max:500',
            'tech_stack'  => 'nullable|string',
            'category'    => 'required|in:web,mobile,ai,automation,other',
            'sort_order'  => 'integer|min:0',
        ]);

        if (!empty($validated['tech_stack'])) {
            $validated['tech_stack'] = array_map('trim', explode(',', $validated['tech_stack']));
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active']   = $request->boolean('is_active');

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }
}
