@extends('layouts.common')
@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('content')
<div class="login-content">
    <h2>Login</h2>

    <form action="/login" method="post" class="login-form__inner">
        <div class="login-form">
            @csrf
            <p class="form__text">メールアドレス</p>
            <input type="email" name="email" class="form__text--input" placeholder="例: test@example.com">

            <p class="form__text">パスワード</p>
            <input type="password" name="password" class="form__text--input" placeholder="例: coachtech1106">

            <div class="login-form__button">
                <button type="submit" class="login-form__button--submit">ログイン</button>
            </div>
        </div>
    </form>
</div>



@endsection