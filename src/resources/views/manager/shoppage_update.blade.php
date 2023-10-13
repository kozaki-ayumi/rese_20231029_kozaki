@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shoppage_update.css') }}">
@endsection

@section('content')

<body>
    <div class="search__shop">
      <form action="/manager/search/shop" method="post">
        @csrf    
        <select class="shop" name="shop_id"> 
        @foreach($shops as $shop)
        <option value="{{ $shop['id'] }}" @if (isset($search_shop->id) && ($search_shop->id === $shop->id)) selected @endif>{{ $shop['name'] }}</option>
        @endforeach
      </select>
      </form>
    </div>  

    
        
      <div class="shop__detail"> 
         @foreach($shops as $shop)
        <div class="shop__title">
          <button class="back__btn" onClick="history.back()"><</button>
          
          <div class="shop__name">{{ $item->name }}</div>
        </div>
        <img class="img" src="{{$item->image_url}}" alt="img">
        <div class="area__genre">
          <span>#{{ $item->area->name}}</span>
          <span>#{{ $item->genre->category}}</span>
        </div>
        <p class="shop__text">{{ $item->description}}</p>
        @endforeach
      </div>
        
       
@endsection
