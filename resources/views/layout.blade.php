<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Laravel 10 Multi Table Relation</title>

    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">

    @yield('css-custom')
</head>
<body>
    <div class="container">
        <h1>@yield('header')</h1>
        <a href="{{ route('landing.index') }}" class="btn btn-secondary btn-sm">Home</a>
        <a href="{{ route('role.index') }}" class="btn btn-primary btn-sm">Role</a>
        <a href="{{ route('profile.index') }}" class="btn btn-primary btn-sm">Profile</a>
        <a href="{{ route('post.index') }}" class="btn btn-primary btn-sm">Post</a>
        {{-- <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">Posts</a>
        <a href="{{ route('posts-tipe.index') }}" class="btn btn-primary btn-sm">Tipe Posts</a> --}}
        <div class="row mt-3">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <div class="alert alert-{{ $msg }} border-0 bg-{{ $msg }} alert-dismissible fade show">
              <div class="text-white">{{ Session::get('alert-' . $msg) }}</div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
          @endforeach
        </div>
        <hr>
        @yield('content')
    </div>
    @yield('js-custom')
</body>
</html>
