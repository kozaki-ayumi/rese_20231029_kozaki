<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <title>Rese</title>
</head>
<body>
    <header>
        <div class="close__btn">
            <button class="close__btn-content" onClick="history.back()">×</button>
        </div>
    </header>

    <main>
        <div class="menu">
            <div>
                <form action="/" method="get">
                    <button class="menu__tag">Home</button>
                </form>
            </div>
            <div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="menu__tag">Logout</button>
                </form>
            </div>
            <div>
                <form action="/mypage" method="get"> 
                    @csrf
                    <button class="menu__tag">Mypage</button>
                </form>
            </div>
            @can('adminAccess')
                <div>
                    <form action="/manager/register" method="get"> 
                        <button class="menu__tag-admin">店舗管理者登録</button>
                    </form>
                </div>
                <div>
                    <form action="/mail" method="get"> 
                        <button class="menu__tag-admin">お知らせメール作成</button>
                    </form>
                </div>
            @endcan
            @can('managerAccess')
                <div>
                    <form action="/manager/reservationlist" method="get"> 
                        @csrf
                        <button class="menu__tag-admin">予約情報確認</button>
                    </form>
                </div>
                <div>
                    <form action="/manager/shoppage" method="get"> 
                        @csrf
                        <button class="menu__tag-admin">店舗情報更新/登録</button>
                    </form>
                </div>
                <div>
                    <form action="/payment/screen" method="get"> 
                        @csrf
                        <button class="menu__tag-admin">お支払い</button>
                    </form>
                </div>
            @endcan

        </div>
    </main>
</body>
</html>