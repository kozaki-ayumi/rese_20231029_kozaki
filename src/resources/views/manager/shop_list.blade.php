@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manager_shop_list.css') }}">
@endsection

@section('content')

<h1 class="list__title">登録店舗</h1>

<div class="shop__detail">
@foreach($shops as $shop) 
  <div class="shop__card">
        <div class="shop__title">
          <div class="shop__name">{{ $shop['name']}} </div>
        </div>
        <img class="img" src="{{ $shop['image_url'] }}" alt="img">
        <div class="area__genre">
          <span>#{{ $shop->area->name}}</span>
          <span>#{{ $shop->genre->category}}</span>
        </div>
        <p class="shop__text">{{ $shop['description'] }}</p>
        
        <div class="btn">
          <form action="/manager/shop/{{$shop['id']}}" method="get">
             <button class="btn__content" type="submit">修正する</button>
          </form>  
        <div>
  </div>  
@endforeach 
</div>       

<button class="back__button" onClick="history.back()">戻る</button>


@endsection