<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

{{QrCode::size(100)->generate('https://home.gattscom.com')}}
<!--? echo QrCode::size(100)--->generate('https://home.gattscom.com');?>
    シンプルにQRコードの生成を行うコード<br>
    {!! QrCode::generate(url('top')) !!}
    <br>
    背景色を変えてQRコードを生成<br>
    {!! QrCode::backgroundColor(90,90,0)->generate(url('top')) !!}
    <br>
    サイズを変えてQRコードを生成（デフォルトは100）<br>
    {!! QrCode::size(200)->generate(url('top')) !!}
    <br>
    おまけ：URLにGETをつけてQRコードを生成<br>
    {!! QrCode::generate(url('top?id='.$id)) !!}
</body>
</html>