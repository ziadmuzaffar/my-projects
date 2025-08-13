@extends('layouts.template')

@section('icon')
    fa-eye
@endsection

@section('title')
    الملف الشخصي
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
    <form action="{{ route('users.update') }}" method="post" enctype="multipart/form-data">
        @csrf @method('PUT')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <img src="{{ asset('images/'.$user->image) }}">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>الاسم الكامل</label>
                    <input type="text" name="name" class="form-control" required value="{{ $user->name }}">
                    @error('name')
                        <strong class="alert alert-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>الصورة</label>
                    <div class="input-image form-control">
                        <span>استعراض</span>
                        <input type="file" name="image" id="input-image-upload">
                        <span></span>
                    </div>
                    @error('image')
                        <strong class="alert alert-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>البريد الالكتروني</label>
                    <input type="email" name="email" class="form-control" required value="{{ $user->email }}">
                    @error('email')
                        <strong class="alert alert-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <strong class="alert alert-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>تأكيد كلمة المرور</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success">
                    <i class="fa @yield('icon') fa-fw"></i>
                    <span>تحديث</span>
                </button>
            </div>
        </div>
    </form>
@endsection