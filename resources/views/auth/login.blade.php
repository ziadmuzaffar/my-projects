@extends('layouts.app')

@section('auth')
    <form method="POST" action="{{ route('login') }}" class="login">
        @csrf
        <h2 class="text-center">
            تسجيل الدخول
        </h2>
        <div class="form-group">
            <label>البريد الالكتروني</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>كلمة المرور</label>
            <input type="password" class="form-control" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            دخول
        </button>
    </form>
@endsection
