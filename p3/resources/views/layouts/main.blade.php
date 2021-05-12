<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>
    @yield('head')

    <link href='/css/style.css' rel='stylesheet'>
</head>
<body>

<header>
    <a href='/' alt='Return home'><img src='/logo.png' alt='Logo' class='logo'></a>
    <nav>
        <ul>
                <li><a href='/'>Home</a></li>
            @if(Auth::user()) 
                <li><a href='/proposals'>View My Proposals</a></li>
                <li><a href='/courses'>Previous Courses</a></li>   
                <li><a href='/proposals/create'>Propose New Course</a> 
            @endif               
                
            @if(!Auth::user())
                    <li><a href='/login' dusk='login-link'>Login</a></li>
                    <li><a href='/register' dusk='register-link'>Register</a></li>
            @else
                    <form method='POST' id='logout' action='/logout' dusk='logout-link'>
                        {{ csrf_field() }}
                        <li><a href='#' onClick='document.getElementById("logout").submit();'>Logout</a></li>
                    </form>
            @endif  
        </ul>
    </nav>
    @yield('header')
</header>

<section id="main">
    @yield('content')
</section>

<footer>

</footer>

</body>
</html>
