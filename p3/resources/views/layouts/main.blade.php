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
            <li><a href='/proposals'>View My Proposals</a></li>
            <li><a href='/courses'>Previous Courses</a></li>   
            <li><a href='/proposals/create'>Propose New Course</a></li>        
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
