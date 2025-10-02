@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{asset('css/confirmation.css')}}">
@endsection
@section('content')

<div class="confirm__content">
    <h2>Confirm</h2>
    <form action="/thanks" method="post" class="confirm-form">
        @csrf
        <table class="confirm__table">
            <tr>
                <th class="confirm__header">お名前</th>
                <td><input type="text" name="first_name" value="{{$confirm['last_name'] . '  ' . $confirm['first_name']}}" readonly>
                <input type="hidden" name="first_name" value="{{$confirm['first_name']}}">
                <input type="hidden" name="last_name" value="{{$confirm['last_name']}}"></td>
            </tr>
            <tr>
                <th class="confirm__header">性別</th>
                <td><input type="text" value="{{ $confirm['gender'] == 1 ? '男性' : ($confirm['gender'] == 2 ? '女性' : 'その他') }}" readonly>
                <input type="hidden" name="gender" value="{{$confirm['gender']}}">
                </td>
            </tr>
            <tr>
                <th class="confirm__header">メールアドレス</th>
                <td><input type="email" name="email" value="{{$confirm['email']}}" readonly></td>
            </tr>

            <tr>
                <th class="confirm__header"></th>
                <td><input type="text" name="tel" value="{{$confirm['tel']}} " readonly></td>
            </tr>

            <tr>
                <th class="confirm__header"></th>
                <td><input type="text" name="address" value="{{$confirm['address']}} " readonly></td>
            </tr>

            <tr>
                <th class="confirm__header"></th>
                @if(! empty($confirm['building']))
                <td><input type="text" name="building" value="{{$confirm['building']}} " readonly></td>
                @endif
            </tr>
            <tr>
                <th class="confirm__header"></th>
                <td>
                    <input type="text" name="" value="{{$category->content}}" readonly>
                    <input type="hidden" name="category_id" value="{{$category->id}}">
                </td>
            </tr>
            <tr>
                <th class="confirm__header"></th>
                <td> <textarea id="" name="detail" readonly cols="60" rows="5">{{$confirm['detail']}}</textarea></td>
            </tr>
        </table>
        
        <div class="submit__button">
            <button>送信</button>
            <a href="/" class="back__link">修正</a>
        </div>
    </form>



</div>

@endsection