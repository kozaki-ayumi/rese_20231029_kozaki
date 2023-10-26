<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">

</head>
<body>
    <header>
        <div class="close__btn">
            <button class="close__btn-content"  onClick="history.back()">×</button>
        </div>
    </header>

    <menu>
        <div class="menu">
            <div>
                <form action="/" method="get">
                  <button class="menu__tag" type="">Home</button>
                </form>
            </div>
            <div>
                <form action="/register" method="get">
                  <button class="menu__tag" type="submit">Registration</button>
                </form>
            </div>
            <div>
                <form action="/login" method="get">
                  <button class="menu__tag" type="submit">Login</button>
                </form>
            </div>
        </div>
    </menu>
</body>
</html>