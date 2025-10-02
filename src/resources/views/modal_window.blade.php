<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/modal_window.css')}}">
    <title>modal_window</title>
</head>

<body>
    <div class="modal__content" id="modal__content" style="display: none;">

        <button type="button" id="close__button">×</button>

        <div class="text__content">

            <div class="text__item">
                <label for="">お名前</label>
                <p class="modal__text--name"></p>
            </div>


            <div class="text__item">
                <label for="">性別</label>
                <p class="modal__text--gender"></p>
            </div>

            <div class="text__item">
                <label for="">メールアドレス</label>
                <p class="modal__text--email"></p>
            </div>

            <div class="text__item">
                <label for="">電話番号</label>
                <p class="modal__text--tel"></p>
            </div>

            <div class="text__item">
                <label for="">住所</label>
                <p class="modal__text--address"></p>
            </div>

            <div class="text__item">
                <label for="">建物名</label>
                <p class="modal__text--building"></p>
            </div>

            <div class="text__item">
                <label for="">お問い合わせの種類</label>
                <p class="modal__text--category"></p>
            </div>

            <div class="text__item">
                <label for="">お問い合わせ内容</label>
                <p class="modal__text--detail"></p>
            </div>
            <form action="/admin" method="post">
                @csrf
                @method('delete')
                <input type="hidden" class="delete_id" value="" name="id">

                <div class="delete__button">
                    <button type="submit" class="delete__button--submit">削除</button>
                </div>

            </form>

        </div>

    </div>

</body>

</html>