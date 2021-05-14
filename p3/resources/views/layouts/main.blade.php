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
                <li><a href='/proposals' dusk='my-proposals-link'>View My Proposals</a></li>
                <li><a href='/courses' dusk='my-courses-link'>Previous Courses</a></li>   
                <li><a href='/proposals/create' dusk='propose-new-link'>Propose New Course</a> 
            @endif               
                <li>
            @if(Auth::user() && Auth::user()->role == 'admin')
                <a href='/proposals/admin' dusk='admin-link'>ADMIN Proposals</a></li>
                <li>
            @endif 
            @if(!Auth::user())
                    <a href='/login' dusk='login-link'>Login</a></li>
                    <li><a href='/register' dusk='register-link'>Register</a></li>
                    <li>
            @else 
                    <form method='POST' id='logout' action='/logout' dusk='logout-link'>
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
    @if(session('flash-alert'))
        <div class='flash-alert' dusk='flash-alert'>
        {{ session('flash-alert') }}
    </div>
    @endif
    @yield('content')
</section>

<footer>
<strong>HESWEB University | Home of the Bucks!</strong> <br /><small>A fake university for CSCI E-15 in Spring 2021 by Keryn Egan</small>
</footer>

</body>
</html>
