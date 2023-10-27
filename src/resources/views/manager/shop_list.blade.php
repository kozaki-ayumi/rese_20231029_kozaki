@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manager_shop_list.css') }}">
@endsection

@section('content')

<h1 class="list__title">【登録店舗】</h1>

<div class="shop">
    <div class="shop__list">
        @foreach($shops as $shop)
        <div class="shop__card">
            <div class="shop__name">{{ $shop['name']}}</div>
            <div class="img">
              <img class="img" src="{{ $shop['image_url'] }}" alt="img">
            </div>
            <div class="area__genre">
                <span >#{{ $shop->area->name}}</span>
                <span> #{{ $shop->genre->category}}</span>
            </div>
            <div class="description">
              <p class="shop__text">{{ $shop['description'] }}</p>
            </div>
            <div class="btn">
              <form action="/manager/shop/{{$shop['id']}}" method="get">
             <button class="btn__content" type="submit">修正する</button>
          </form> 
            </div>
        </div>
        @endforeach
    </div>
<div>

@endsection