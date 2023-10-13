<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <script src="https://kit.fontawesome.com/1f3107f7ed.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/title.css') }}">
     @yield('css')
  
</head>
<body>
    <header class="title">
      @if( Auth::check() )
      <form action="/member/menu" method="get">
        <button class="menu__btn" >
          <hr class="menu__btn-bar--1" width="30%" align="left">
          <hr class="menu__btn-bar--2" width="70%" align="left" >
          <hr class="menu__btn-bar--3" width="30%" align="left">
        </button>
      </form>
      @else
      <form action="/guest/menu" method="get">
        <button class="menu__btn" >
          <hr class="menu__btn-bar--1" width="30%" align="left">
          <hr class="menu__btn-bar--2" width="70%" align="left" >
          <hr class="menu__btn-bar--3" width="30%" align="left">
        </button>
      </form>
      @endif    
        <div class="rese">Rese</div>
    </header>

  <main>
    @yield('content')
  </main>
</body>
</html>