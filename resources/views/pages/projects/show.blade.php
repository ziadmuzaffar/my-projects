@extends('layouts.template')

@section('icon')
    fa-eye
@endsection

@section('title')
    تفاصيل المشروع
@endsection

@section('navbar-nav')
    <li class="nav-item">
        <a class="btn btn-success" href="{{ route('projects.create') }}">
            <i class="fa fa-edit fa-fw"></i>
            <span>تعديل</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="btn btn-danger" href="#delete" data-bs-toggle="modal" data-bs-target="#deleteModal">
            <i class="fa fa-trash fa-fw"></i>
            <span>حذف</span>
        </a>
    </li>
    <form action="{{ route('projects.destroy', $project->id) }}" method="post" class="d-none">
        @csrf @method('DELETE')
    </form>
    <li class="nav-item">
        <a class="btn btn-warning" href="{{ route('projects.index') }}">
            <i class="fa fa-chevron-right fa-fw"></i>
            <span>رجوع</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="details-card">
                @switch($project->status)
                    @case(1)
                        <span class="text-primary">مكتمل</span>
                        @break
                    @case(2)
                        <span class="text-danger">ملغي</span>
                        @break
                    @default
                        <span class="text-warning">قيد الإنجاز</span>
                @endswitch
                <h2>{{ $project->title }}</h2>
                <p>{{ $project->description }}</p>
                <div>
                    <span>
                        <i class="fa fa-clock fa-fw"></i>
                        {{ $project->created_at->diffForHumans() }}
                    </span>
                    <span>
                        <i class="fa fa-list-check fa-fw"></i>
                        0
                    </span>
                </div>
            </div>
            <form action="{{ route('projects.update', $project->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="form-group" style="margin: 5px;">
                    <label>تغير حالة المشروع</label>
                    <select name="status" class="form-control" onchange="this.form.submit()">
                        <option value="0" {{ $project->status == 0 ? 'selected' : '' }}>
                            قيد الإنجاز
                        </option>
                        <option value="1" {{ $project->status == 1 ? 'selected' : '' }}>
                            مكتمل
                        </option>
                        <option value="2" {{ $project->status == 2 ? 'selected' : '' }}>
                            ملغي
                        </option>
                    </select>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            @foreach ($project->tasks as $task)
                <div class="tasks-project">
                    <label>
                        @if ($task->status)
                            <del style="color: grey;">
                                {{ $task->name }}
                            </del>
                        @else
                            {{ $task->name }}
                        @endif
                    </label>
                    <div class="d-flex">
                        <form action="{{ route('tasks-project.update', $task->id) }}" method="post" class="p-0">
                            @csrf @method('PUT')
                            <input type="checkbox" name="status" onchange="this.form.submit()"  {{ $task->status == '1' ? 'checked' : '' }}>
                        </form>
                        <a href="#delete" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fa fa-trash fa-fw text-danger"></i>
                        </a>
                        <form action="{{ route('tasks-project.destroy', $task->id) }}" method="post" class="d-none">
                            @csrf @method('DELETE')
                        </form>
                    </div>
                </div>
            @endforeach
            <div class="task-project-form">
                <form action="{{ route('tasks-project.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="form-group">
                        <input type="text" name="name" autocomplete="off" class="form-control" placeholder="أضف مهمة جديدة">
                        @error('name')
                            <strong class="alert alert-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        إنشاء
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection