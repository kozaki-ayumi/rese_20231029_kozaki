<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/manager_menu.css') }}">

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
          <div class="manager__menu">
            <div>
               <form action="manager/reservation/management" method="get"> 
                @csrf
               <button class="menu__tag-manager">予約情報確認</button>
               </form>
            </div>
            <div>
               <form action="/manager/shoppage/update" method="get"> 
                @csrf
               <button class="menu__tag-manager">店舗情報更新</button>
               </form>
            </div>
            <div>
               <form action="/manager/shoppage/create" method="get"> 
                @csrf
               <button class="menu__tag-manager">店舗情報新規登録</button>
               </form>
            </div>
          </div>
        </div>    
    </menu>     
</body>
</html>