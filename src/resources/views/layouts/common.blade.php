<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactForm</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
</head>
@yield('css')
<body>
    <div class="header__inner">
        <header class="header">
            <h2>FashionablyLate</h2>
        </header>
        <nav class="header__nav">
            <ul>
                <li><a href="/register">register</a></li>
                <li><a href="/login">test</a></li>
            </ul>
        </nav>
    </div>
@yield('content')
    
</body>
</html>