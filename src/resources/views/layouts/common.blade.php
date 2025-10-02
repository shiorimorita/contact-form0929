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

    <head class="header">
        <div class="header__inner">
            <div class="header__text">
                <h2>FashionablyLate</h2>
            </div>
            <nav class="header__nav">
                <ul>
                    @if(Auth::check())
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="logout__button">logout</button>
                        </form>
                    </li>

                    @elseif(Request::is('register'))
                    <li><a href="/login">login</a></li>

                    @elseif(Request::is('login'))
                    <li><a href="/register">register</a></li>
                    @endif
                </ul>
            </nav>
        </div>
        <header>
            @yield('content')

</body>

</html>