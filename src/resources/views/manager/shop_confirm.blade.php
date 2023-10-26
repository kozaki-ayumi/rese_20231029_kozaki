@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manager_shop_confirm.css') }}">
@endsection

@section('content')

<h1 class="title">【確認画面2】</h1>

<div class="shop__detail">
  <form action="/manager/shop/update" method="post">
    @csrf
        <div class="shop__title">
          <input type="hidden" name="id" value="{{ $shop_modify['id']}}">
          <div class="shop__name">{{ $shop_modify['name']}} </div>
          <input type="hidden" name="name" value="{{ $shop_modify['name']}}">
        </div>
        <div class="shop__img">
          @if(empty($shop_modify['new_image_url']))
          <input type="hidden" name="old_image_url" value="{{$shop_modify['old_image_url'] }}">
          <input type="hidden" name="image_url" value="{{$shop_modify['old_image_url'] }}">
          <img class="img" src="{{ $shop_modify['old_image_url'] }}">
          @else
          <input type="hidden" name="old_image_url" value="{{$shop_modify['old_image_url'] }}">
          <input type="hidden" name="image_url" value="{{ asset('storage/' . $imgtitlename) }}">
          <img class="img" src="{{ asset('storage/' . $imgtitlename) }}">
          @endif
        </div>
        <div class="area__genre">
          <span>#{{ $area['name'] }}</span>
          <span>#{{ $genre['category']}}</span>
          <input type="hidden" name="area_id" value="{{ $area['id']}}">
          <input type="hidden" name="genre_id" value="{{ $genre['id']}}">
        </div>
        <p class="shop__text">{{ $shop_modify['description'] }}</p>
        <input type="hidden" name="description" value="{{ $shop_modify['description'] }}">
        <div class="btn">
          <button class="btn__content" type="submit" name="action" id="modify_btn">登録する</button></br>
          <button class="back__btn" type="submit" name="action" id="modify_btn" value="back">修正する</button>
        <div>
  </form>
  <div class="close__btn">
        <button class="close__btn-content"  onClick="history.back()">×</button>
  </div>
</div>

@endsection