@include('layouts.header')
<div class="warpper">
    <div class="topbar">
        <div class="topbar-title">
            <i class="fa fa-diagram-project"></i>
            <span>مشاريعي</span>
        </div>
        <div class="topbar-actions">
            <div class="dropdown">
                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i>
                </button>
                <div class="dropdown-menu">
                    <p>{{ auth()->user()->email }}</p>
                    <img src="{{ asset('images/'.auth()->user()->image) }}" alt="male.png">
                    <p>{{ auth()->user()->name }}</p>
                    <div>
                        <a href="{{ route('users.edit') }}">
                            الملف الشخصي
                        </a>
                        <a href="#" onclick="document.getElementById('form-logout').submit()">
                            تسجيل الخروج
                        </a>
                        <form action="{{ route('logout') }}" method="post" class="d-none" id="form-logout">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">
                    <i class="fa @yield('icon') fa-fw"></i>
                    <span>@yield('title')</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        @yield('navbar-nav')
                    </ul>
                </div>
            </nav>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</div>
@include('layouts.footer')