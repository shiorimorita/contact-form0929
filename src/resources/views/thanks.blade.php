@extends('layouts.common')
@section('css')
<link rel="stylesheet" href="{{asset('css/thanks.css')}}">
@endsection


@section('content')

<div class="thanks__content">
    <p>お問い合わせありがとうございました</p>
    <span class="thanks__overlay">Thank you</span>
</div>

<div class="home__button">
    <a href="/">HOME</a>
</div>

@endsection