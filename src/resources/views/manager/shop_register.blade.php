@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manager_shop_confirm.css') }}">
@endsection

@section('content')

<h1 class="list__title">確認画面</h1>

<div class="shop__detail">
  <form action="/manager/shop/register" method="post">
    @csrf
        <div class="shop__title">
          <div class="shop__name">{{ $shop_draft['name']}} </div>
          <input type="hidden" name="name" value="{{ $shop_draft['name']}}">
        </div>
        <img class="img" src="{{ $shop_draft['image_url'] }}" alt="img">
        <input type="hidden" name="image_url" value="{{ $shop_draft['image_url'] }}">
        <div class="area__genre">
          <span>#{{ $area['name'] }}</span>
          <span>#{{ $genre['category']}}</span>
          <input type="hidden" name="area_id" value="{{ $area['id']}}">
          <input type="hidden" name="genre_id" value="{{ $genre['id']}}">
        </div>
        <p class="shop__text">{{ $shop_draft['description'] }}</p>
        <input type="hidden" name="description" value="{{ $shop_draft['description'] }}">
        
        <div class="btn">
             
             <button class="btn__content" type="submit">登録する</button>
        <div>
   </form>  
</div>  




      <button type="submit" name="action" value="back">修正する</button>
        





   





@endsection