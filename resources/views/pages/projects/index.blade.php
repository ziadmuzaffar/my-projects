@extends('layouts.template')

@section('icon')
    fa-diagram-project
@endsection

@section('title')
    المشاريع
@endsection

@section('navbar-nav')
    <li class="nav-item">
        <a class="btn btn-primary" href="{{ route('projects.create') }}">
            <i class="fa fa-add fa-fw"></i>
            <span>إنشاء</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="row">
        @forelse ($projects as $project)
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('projects.edit', $project->id) }}">
                            <i class="fa fa-edit fa-fw text-success"></i>
                        </a>
                        <a href="{{ route('projects.show', $project->id) }}">
                            <i class="fa fa-eye fa-fw text-primary"></i>
                        </a>
                        <a href="#delete" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fa fa-trash fa-fw text-danger"></i>
                        </a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="post" class="d-none">
                            @csrf @method('DELETE')
                        </form>
                    </div>
                    <div class="card-body">
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
                        <i class="fa @yield('icon') fa-fw"></i>
                        <h5 class="card-title">
                            {{ $project->title }}
                        </h5>
                        <p class="card-text">
                            {{ Str::limit($project->description, 50) }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <div>
                            <i class="fa fa-clock fa-fw"></i>
                            <span>{{ $project->created_at->diffForHumans() }}</span>
                        </div>
                        <div>
                            <i class="fa fa-list-check fa-fw"></i>
                            <span>0</span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        <div class="alert alert-warning text-center">
            لا يوجد مشاريع قم
            <a href="{{ route('projects.create') }}">
                بإنشاء مشروع جديد
            </a>
        </div>
        @endforelse
    </div>
@endsection