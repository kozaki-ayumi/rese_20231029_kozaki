@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_page_create.css') }}">
@endsection

@section('content')

<body>

<h2 class="title">店舗新規登録画面</h2>

<div class="register">
<div class="register__form">
<form action="/storemanager/register/confirm" method="post">
    @csrf
    <div class="store__form">
        <div class="shop__name">店名</div>
        <span>　　　</span>
        <div>
          <input type="text" name="name" >
        </div>
    </div>   
    <div class="store__form">
        <div>画像</div>
        <span>　　　</span>
        <input type="text" name="image_url" />
    </div>    
    <div class="store__form">
        <div>地域</div>
        <span>　　　</span>
        <div>
            <select class="area" name="area_id"> 
            <option value="0"></option>
            @foreach($areas as $area)
                <option value="{{ $area['id'] }}">{{ $area['name'] }}</option>
            @endforeach
            </select>
             
        </div>
    </div>
    <div class="store__form">
        <div>ジャンル</div>
        <span>　</span>
        <div>
        <select class="genre" name="genre_id" >
            <option value="0"></option>
            @foreach($genres as $genre)
                <option value="{{ $genre['id'] }}">{{ $genre['category'] }}</option>
            @endforeach
        </select>
         
        </div>
    </div> 
    <div class="store__form"> 
          <div>店舗概要</div>
          <span>　</span>
          <textarea name="description" cols="40" row="15"></textarea>
    </div> 
    <div class="btn">
        <button class="confirm__btn" type="submit">確認</button>
    </div>         
        
</form>
</div>

<div class="area-genre__register">
    <h3>新規登録</h3>
<div class="area__register">
            <form action="storemanager/register/area" method="post">
                @csrf
                <span class="">地域</span>
                <input type="text" name="name" />
                <button class="" type="submit">新規登録</button>
            </form>
</div> 
<div class="genre__register">
            <form action="storemanager/register/genre" method="post">
                @csrf
                <span class="">ジャンル</span>
                <input type="text" name="category" />
                <button class="" type="submit">新規登録</button>
            </form>
</div>    
</div>
</div>
</body>     












@endsection