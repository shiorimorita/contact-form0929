@extends('layouts.common')
@section('css')
<link rel="stylesheet" href="{{asset('css/contactform.css')}}">
@endsection

@section('content')
<div class="contact__content">
    <h2 class="contact__content--header">Contact</h2>

    <form action="/confirm" method="post" class="contact-form">
        @csrf


        <div class="content__item">
            <label for="">お名前<span>※</span></label>
            <input type="text" name="last_name" class="contact-form__item--name" placeholder="例: 山田" value="{{old('last_name')}}">
            <input type="text" name="first_name" class="contact-form__item--name" placeholder="例: 太郎" value="{{old('first_name')}}">
        </div>

        <div class="row2">
            <label class="form-label">性別<span>※</span></label>
            <label for="">
                <input type="radio" name="gender" value="1" class="my-radio">男性
            </label>
            <label for="">
                <input type="radio" name="gender" value="2" class="my-radio">女性
            </label>
            <label for="">
                <input type="radio" name="gender" value="3" class="my-radio">その他
            </label>
        </div>

        <div class="content__item">
            <label for="" class="">メールアドレス<span>※</span></label>
            <input type="email" name="email" class="contact-form__email" placeholder="例: test@example.com">
        </div>


        <div class="content__item___tel">
            <label for="" class="tel__label">電話番号<span>※</span></label>
            <div class="tel__input">
                <input type="tel" name="tel[]" class="cotanct-form__item__tell" placeholder="080">
                <div class="tel__space">-</div>
                <input type="tel" name="tel[]" class="cotanct-form__item__tell" placeholder="1234">
                <div class="tel__space">-</div>
                <input type="tel" name="tel[]" class="cotanct-form__item__tell" placeholder="5678">
            </div>
        </div>

        <div class="content__item">
            <label for="" class="">住所<span>※</span></label>
            <input type="text" name="address" class="contact-form__address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
        </div>

        <div class="content__item">
            <label for="" class="">建物名</label>
            <input type="text" name="building" class="contact-form__building" placeholder="例: 千駄ヶ谷マンション101">
        </div>

        <div class="content__item">
            <label for="">お問い合わせの種類 <span>※</span></label>
            <select name="category_id" id="">
                <option value="" disabled selected>選択してください</option>
                @foreach($categories as $category)
                <option  value="{{$category->id}}">{{$category->content}}</option>
                @endforeach
            </select>
        </div>

        <div class="content__item">
            <label for="">お問い合わせ内容<span>※</span></label>
            <textarea name="detail" id="" class="contact-form__detail" placeholder="お問い合わせ内容をご記載ください"></textarea>
        </div>

        <div class="contact-form__button">
            <button type="submit" class="contact-form__button--submit">確認画面</button>
        </div>

    </form>





</div>

@endsection