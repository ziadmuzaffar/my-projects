<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('assets/css/normalize.css?v=8.0.1') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css?v=5.3.7') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/all.min.css?v=6.7.2') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css?v=0.0.1') }}">
        <title>
            @yield('title')
            |
            مشاريعي
        </title>
    </head>
    <body>
        @include('layouts.modals')