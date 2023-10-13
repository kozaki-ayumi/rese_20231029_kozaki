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


    <menu>
        <div class="menu">
            <div>
               <form action="/" method="get">
               <button class="menu__tag" type="">店舗情報新規登録</button>
               </form>
             </div>

             <div>
               <form action="/" method="get">
               <button class="menu__tag" type="">店舗情報更新</button>
               </form>
             </div>
             <div>
                <form action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <button class="menu__tag">Logout</button>
                </form>
            </div>

        </div>    
    </menu>     
</body>
</html>