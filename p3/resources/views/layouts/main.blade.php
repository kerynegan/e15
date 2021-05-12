<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>
    @yield('head')
</head>
<body>

<header>
    <a href='/' alt='Return home'><img src='/images/logo.png' alt='Logo' class='logo'></a>
    <nav>
        <ul>
                <li><a href='/'>Home</a></li>
            @if(Auth::user()) 
                <li><a href='/proposals'>View My Proposals</a></li>
                <li><a href='/courses'>Previous Courses</a></li>   
                <li><a href='/proposals/create'>Propose New Course</a> 
            @endif               
                <li>
            @if(!Auth::user())
                    <a href='/login'>Login</a>
            @else
                    <form method='POST' id='logout' action='/logout'>
                        {{ csrf_field() }}
                        <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
                    </form>
            @endif
                </li>  
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
