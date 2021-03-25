<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>

    <link href='/css/style.css' rel='stylesheet'>

    @yield('head')
</head>
<body>

<header>
    <a href='/' alt='Return home'><img src='/images/logo.png' alt='Logo'></a>
    <nav>
        <ul>
            <li><a href='/'>Home</a></li>
            <li><a href='/columnar'>Columnar Ciphers</a></li>
            <li><a href='/contact'>Contact</a></li>
        </ul>
    </nav>
    @yield('header')
</header>

<section>
    @yield('content')
</section>

<footer>

</footer>

</body>
</html>
