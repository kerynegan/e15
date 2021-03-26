<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
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

<section id="main">
    @yield('content')
</section>

<footer>

</footer>

</body>
</html>
