@extends('layouts.template')

@section('icon')
    fa-edit
@endsection

@section('title')
    تعديل المشروع
@endsection

@section('navbar-nav')
    <li class="nav-item">
        <a class="btn btn-warning" href="{{ route('projects.index') }}">
            <i class="fa fa-chevron-right fa-fw"></i>
            <span>رجوع</span>
        </a>
    </li>
@endsection

@section('content')
    <form action="{{ route('projects.update', $project->id) }}" method="post">
        @csrf @method('PUT')
        <div class="form-group">
            <label for="title">عنوان المشروع</label>
            <input type="text" name="title" id="title" class="form-control" required value="{{ $project->title }}">
            @error('title')
                <strong class="alert alert-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">وصف المشروع</label>
            <textarea type="text" name="description" id="description" class="form-control" rows="5">{{ $project->description }}</textarea>
            @error('description')
                <strong class="alert alert-danger">{{ $message }}</strong></span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">
            <i class="fa @yield('icon') fa-fw"></i>
            <span>تحديث</span>
        </button>
    </form>
@endsection