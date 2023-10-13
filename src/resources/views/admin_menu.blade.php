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
    <div class="close__btn">
        <button class="close__btn-content" onClick="history.back()">×</button>
    </div>    

    <menu>
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
            <div>
               <form action="/admin/manager" method="get"> 
                @csrf
               <button class="menu__tag">店舗代表者登録</button>
               </form>
            </div>
        </div>    
    </menu>     
</body>
</html>