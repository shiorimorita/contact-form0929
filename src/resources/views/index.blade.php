@extends('layouts.common')
@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')

<div class="header">
    <h2>Admin</h2>
</div>

<div class="search__content">
    <input type="text" name="">
    <select name="" id="">
        <option value=""></option>
    </select>
    <select name="" id="">
        <option value=""></option>
    </select>
    <input type="date">

    <button type="submit">検索</button>
    <button type="submit">リセット</button>
</div>

<div class="funtion__content">
    <button>エクスポート</button>
</div>

<table class="table">
    <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせの種類</th>
        <th></th>
    </tr>

    @foreach($contacts as $contact)
    <tr>
        <td>{{$contact->first_name}}</td>
        <td>{{$contact['gender']==1 ? '男性':($contact['gender']==2 ? '女性' : 'その他')}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->category->content}}</td>
        <td><button type="button">詳細</button></td>
    </tr>
    @endforeach
</table>






@endsection