<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mail_draft.css') }}">
    <title>mail</title>
</head>
<body>
    <div class="title">
        <button class="back__btn" onClick="history.back()"><</button>
        <h1 class="title__content">お知らせメール作成</h1>
    </div>
    <div class="mail">
    <form action="/mail/send" method="post">
        @csrf
        <div class="mail__form">
            <label for="title">タイトル</label>
            <input class="title__input" type="text" name="title"  id="title">
        </div>
        <div class="mail__form">
            <label for="content">本文</label>
            <span>　　</span>
            <textarea  class="textarea__input" name="content"   id="content"></textarea>
        </div>
        <div>
            <button class="btn__content">送信</button>
        </div>
    </form>
    </div>
</body>
</html>