@extends('layouts.common')
@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')

<div class="content__header">
    <div class="header">
        <h3>Admin</h3>
    </div>

    <!-- search -->
    <form action="/admin" method="get">
        <div class="search__content">
            <input type="text" name="name_email" placeholder="名前やメールアドレスを入力してください" class="search__content--input" value="{{request('name_email')?? ''}}">

            <select name="gender" id="" class="search__content--gender">
                <option value="" disabled selected>性別</option>
                <option value="0" {{request('gender')=== '0' ? 'selected' : ''}}>全て</option>
                <option value="1"{{request('gender')==='1' ? 'selected' : ''}}>男性</option>
                <option value="2" {{request('gender')=== '2' ? 'selected' : ''}}>女性</option>
                <option value="3" {{request('gender')=== '3' ? 'selected': ''}}>その他</option>
            </select>
            <select name="category_content" id="" class="search__content--category">
                <option value="" disabled selected class="">お問い合わせの種類</option>
                @foreach($categories as $category)
                <option value="{{$category->content}}" {{request('category_content')===$category->content ? 'selected' : ''}}>{{$category->content}}</option>
                @endforeach
            </select>
            <input type="date" class="search__content--date" name="date" value="{{request('date') ?? ''}}">

            <button type="submit" class="search__button">検索</button>
            <button type="button" class="search__reset" onclick="window.location.href='/admin'">リセット</button>
        </div>
    </form>

    <!-- function -->
     <div class="function__content">
    <form action="/csv/export" method="get" enctype="multipart/form-data">

            <button class="export__button">エクスポート</button>
    </form>
    <form action="/csv/import" method="post" enctype="multipart/form-data" class="csv-import">
        @csrf
        <input type="file" name="csvFile" id="csvFile" class="csvfile">
        <button type="submit" class="csv__import--button">インポート</button>
    </form>
    {{$contacts->appends(request()->all())->links('')}}
    </div>

    <table class="table">
        <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
        </tr>
        <!-- view -->
        @foreach($contacts as $contact)
        <tr>
            <td class="td-name">{{$contact->last_name}}<span class="name-gap"></span>{{$contact->first_name}}</td>
            <td class="td-gender">{{$contact['gender']==1 ? '男性':($contact['gender']==2 ? '女性' : 'その他')}}</td>
            <td class="td-email">{{$contact->email}}</td>
            <td class="td-category">{{$contact->category->content}}</td>
            <td class=""><button type="button" class="detail__button">詳細</button></td>

            <!-- hidden items -->
            <td style="display: none;">
                <input type="hidden" class="td-tel" name="tel" value="{{$contact->tel}}">
                <input type="hidden" class="td-address" value="{{$contact->address}}">
                <input type="hidden" class="td-detail" value="{{$contact->detail}}">


                <input type="hidden" class="td-id" value="{{$contact->id}}">

                @if(!empty($contact->building))
                <input type="hidden" class="td-building" value="{{$contact->building}}">
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

@include('modal_window')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    /* モーダルを開く */

    $(function () {

        $(".detail__button").on('click', function () {

            const row = $(this).closest('tr');

            const name = row.find('.td-name').text();
            const gender = row.find('.td-gender').text();
            const email = row.find('.td-email').text();
            const category = row.find('.td-category').text();
            const tel = row.find('.td-tel').val();
            const address = row.find('.td-address').val();
            const detail = row.find('.td-detail').val();
            const building = row.find('.td-building').val();

            const id = row.find('.td-id').val();


            // 取得した情報をモーダルへ渡す
            $(".modal__text--name").text(name);
            $(".modal__text--gender").text(gender);
            $('.modal__text--email').text(email);
            $(".modal__text--tel").text(tel);
            $(".modal__text--address").text(address);
            $(".modal__text--category").text(category);
            $(".modal__text--detail").text(detail);
            $(".modal__text--building").text(building);

            $(".delete_id").val(id);

            $("#modal__content").show();
        });

        /* モーダルを閉じる */

        $("#close__button").on('click', function () {
            $("#modal__content").hide();
        });

    });

</script>