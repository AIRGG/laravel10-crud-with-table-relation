<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Login Page</h1>
        <div class="row">
            <div class="col-12">
                @if(Session::has('alert'))
                    <div class="alert alert-{{ explode('|', Session::get('alert'))[0] ?? 'info' }} alert-dismissible fade show">
                        {{ explode('|', Session::get('alert'))[1] }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (request()->get('msg'))
                    <div class="alert alert-info alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ request()->get('msg') }}
                    </div>
                @endif
            </div>
        </div>
        <form action="{{ route('landing.login.index.proses-login') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label for="">Username</label><br>
                    <input class="form-control" type="text" name="username" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label for="">Password</label><br>
                    <input class="form-control" type="password" name="password" required>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-6">
                    <input type="submit" class="btn btn-primary" type="text" required>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
