<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Google Maps JavaScript API and Geocode API</title> 
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
<link href='/css/app.css' rel="stylesheet">

</head>
<body>
    <div class="navbar-container">
        <nav class="navbar">
            <a class="@if( auth()->check() )hidden @endif" href="/login">Login</a>
            <a class="@if( auth()->check() )hidden @endif" href="/register">Register</a>
        </nav>
        <form class=" @if(! auth()->check() )hidden @endif" action="/logout" method="POST">
            @csrf
            <button class="logoutBtn">Logout</button>
        </form>
    </div>
    <div class="container-of-all">
        @yield('content')
    </div>
    <footer>
        <div class="footer-link-container">
            <a href="#"><img src="{{URL::asset('images/fb.svg')}}" alt="apexlogo"></a>
            <a href="#"><img src="{{URL::asset('images/li.svg')}}" alt="apexlogo"></a>
            <a href="#"><img src="{{URL::asset('images/ins.svg')}}" alt="apexlogo"></a>
            <a href="#"><img src="{{URL::asset('images/tw.svg')}}" alt="apexlogo"></a>
        </div>
    </footer>
</body>
</html>