@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manager_shop_menu.css') }}">
@endsection

@section('content')

<div class="menu">
  
  <div>
    <form action="/manager/shop/list" method="get">
    <button class="menu__tag" type="submit">店舗情報更新</button>
    </form>
  </div>

  <div>
    <form action="/manager/shop/draft" method="get">
    <button class="menu__tag" type="submit">店舗新規登録</button>
    </form>
  </div>    
</div>







@endsection