@extends('layouts.common')
@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')

<div class="register-content">
    <h2>Register</h2>

    <form action="/register" method="post" class="register-form__inner" novalidate>
        <div class="register-form">
            @csrf
            <p class="form__text">お名前</p>
            <input type="text" name="name" class="form__text--input" placeholder="例: 山田  太郎" value="{{old('name')}}">
                <div class="danger__alert">
                @error('name')
                <p class="danger__alert--message"> {{$message}}</p>
                @enderror
                </div>

            <p class="form__text">メールアドレス</p>
            <input type="email" name="email" class="form__text--input" placeholder="例: test@example.com" value="{{old('email')}}">

            <div class="danger__alert">
            @error('email')
            <p class="danger__alert--message">{{$message}}</p>
            @enderror
            </div>

            <p class="form__text">パスワード</p>
            <input type="password" name="password" class="form__text--input" placeholder="例: coachtech1106">
            <div class="danger__alert">
            @error('password')
            <p class="danger__alert--message">{{$message}}</p>
            @enderror
            </div>
            <div class="register-form__button">
                <button type="submit" class="register-form__button--submit">登録</button>
            </div>
        </div>
    </form>
</div>



@endsection