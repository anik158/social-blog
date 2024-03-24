
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/app.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body>

<div class="container">
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link {{ Helper::isActiveRoute('post-list') ? 'active' : '' }}" href="{{ route('post-list') }}">Home</a>
        </li>
        @if(\Illuminate\Support\Facades\Auth::check())
        <li class="nav-item">
            <a class="nav-link {{ Helper::isActiveRoute('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profile</a>
        </li>
        @endif


        @if (\Illuminate\Support\Facades\Auth::check())
            <li class="nav-item">
                <a class="nav-link {{ Helper::isActiveRoute('settings') ? 'active' : '' }}" href="{{ route('settings') }}">Settings</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link {{ Helper::isActiveRoute('login-page') ? 'active' : '' }}" href="{{ route('login-page') }}">Login</a>
            </li>
        @endif



    </ul>

    @yield('posts')
</div>

</body>
</html>


