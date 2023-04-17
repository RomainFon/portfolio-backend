<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::get(['id as value', 'name as text']);
        return view('project.create', [
            'technologies' => $technologies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $attributes = $request->validated();

        $attributes['image'] = Storage::disk('public')->putFile('projects', $request->file('image'));

        $project = Project::create($attributes);
        foreach ($attributes['technologies'] as $technologyId) {
            $technology = Technology::find($technologyId);
            $project->technologies()->attach($technology);
        }

        return redirect('/projects/'.$project->getKey());
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('project.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $technologies = Technology::get(['id as value', 'name as text']);
        return view('project.edit', [
            'project' => $project,
            'projectTechnologies' => $project->technologies()->get(['id as value', 'name as text']),
            'technologies' => $technologies
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $attributes = $request->validated();

        if ($request->file('image')) {
            Storage::disk('public')->delete($project->image);
            $attributes['image'] = Storage::disk('public')->putFile('projects', $request->file('image'));
        }

        $project->update($attributes);
        $project->technologies()->detach();
        foreach ($attributes['technologies'] as $technologyId) {
            $technology = Technology::find($technologyId);
            $project->technologies()->attach($technology);
        }

        return redirect('/projects/'.$project->getKey());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        Storage::disk('public')->delete($project->image);
        $project->delete();
        return redirect('/projects')->with('success', 'Project deleted.');
    }
}
