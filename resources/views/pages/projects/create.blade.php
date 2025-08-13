@extends('layouts.template')

@section('icon')
    fa-add
@endsection

@section('title')
    إنشاء مشروع
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
    <form action="{{ route('projects.store') }}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <div class="form-group">
            <label for="title">عنوان المشروع</label>
            <input type="text" name="title" id="title" class="form-control" required>
            @error('title')
                <strong class="alert alert-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">وصف المشروع</label>
            <textarea type="text" name="description" id="description" class="form-control" rows="5"></textarea>
            @error('description')
                <strong class="alert alert-danger">{{ $message }}</strong></span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fa @yield('icon') fa-fw"></i>
            <span>إنشاء</span>
        </button>
    </form>
@endsection