<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskProjectRequest;
use App\Models\TaskProject;
use Illuminate\Http\Request;

class TaskProjectController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(TaskProjectRequest $request)
    {
        TaskProject::create($request->all());
        return back()->with('success', 'تمت العملية بنجاح');
    }

    public function show(TaskProject $taskProject) {}

    public function edit(TaskProject $taskProject) {}

    public function update(Request $request, TaskProject $tasksProject)
    {
        if (auth()->id() !== $tasksProject->project->user_id) abort(403);
        $tasksProject->update(['status' => $request->has('status')]);
        return back()->with('success', 'تمت العملية بنجاح');
    }

    public function destroy(TaskProject $tasksProject)
    {
        if (auth()->id() !== $tasksProject->project->user_id) abort(403);
        $tasksProject->delete();
        return back()->with('success', 'تمت العملية بنجاح');
    }
}
