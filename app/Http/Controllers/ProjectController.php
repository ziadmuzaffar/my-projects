<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    private string $root = 'pages.projects.';

    public function index()
    {
        return view($this->root.__FUNCTION__, [
            'projects' => auth()->user()->projects
        ]);
    }

    public function create()
    {
        return view($this->root.__FUNCTION__);
    }

    public function store(ProjectRequest $request)
    {
        Project::create($request->all());
        return back()->with('success', 'تمت العملية بنجاح');
    }

    public function show(Project $project)
    {
        if (auth()->id() !== $project->user_id) abort(403);
        return view($this->root.__FUNCTION__, compact('project'));
    }

    public function edit(Project $project)
    {
        if (auth()->id() !== $project->user_id) abort(403);
        return view($this->root.__FUNCTION__, compact('project'));
    }

    public function update(ProjectRequest $request, Project $project)
    {
        if (auth()->id() !== $project->user_id) abort(403);
        if (isset($request->status)) {
            $project->update([
                'status' => $request->status
            ]);
        } elseif ($request->title && $request->description) {
            $project->update($request->all());
        }
        return back()->with('success', 'تمت العملية بنجاح');
    }

    public function destroy(Project $project)
    {
        if (auth()->id() !== $project->user_id) abort(403);
        $project->delete();
        return back()->with('success', 'تمت العملية بنجاح');
    }
}
