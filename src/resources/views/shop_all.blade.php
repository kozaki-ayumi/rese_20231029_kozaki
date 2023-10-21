

@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
@endsection

@section('content')

<div class="search__bar">
    <form action="/shop/search" method="post">
      @csrf
      <select class="area" name="area_id"> 
        <option value="0">All area</option>
        @foreach($areas as $area)
        <option value="{{ $area['id'] }}" @if (isset($search_area->id) && ($search_area->id === $area->id)) selected @endif>{{ $area['name'] }}</option>
        @endforeach
      </select>
      <select class="genre" name="genre_id" >
        <option value="0">All genre</option>
        @foreach($genres as $genre)
        <option value="{{ $genre['id'] }}" @if (isset($search_genre->id) && ($search_genre->id === $genre->id)) selected @endif>{{ $genre['category'] }}</option>
        @endforeach
      </select> 
      <input class="search__keyword" type="text" name="keyword" value="@if (isset($search_keyword)) {{ $search_keyword }} @endif" placeholder="Search...">
     
      <button class="search__btn">
         <i class="fa-solid fa-magnifying-glass" style="color: #b3b4b7;"></i>
      </button>
</form>
</div>
    
<div class="shop">
<div class="shop__list">
  @foreach($shops as $shop)
  <div class="shop__card">
    <img class="img" src="{{ $shop['image_url'] }}" alt="img">
    <div class="shop__name">{{ $shop['name']}}</div>
    <div class="area__genre">
      <span>#{{ $shop->area->name}}</span>
      <span> #{{ $shop->genre->category}}</span>
    </div>
    <div class="btn__heart">
      <form action="/shop/{{$shop['id']}}" method="get">
        <button class="detail__btn" type="submit">詳しくみる</button>
      </form>  

      <div class="heart">
        @if(Auth::check())
          @if(!Auth::user()->is_bookmark($shop->id))
           <form action="{{ route('bookmark.store', $shop) }}" method="post">
             @csrf
           <button class="bookmark__heart">
            <i class="fa-solid fa-heart" style="color: #dbdbdb;"></i>
           </button>
           </form>
           @else
           <form action="{{ route('bookmark.destroy', $shop) }}"  method="post">
             @csrf
             @method('delete')
           <button class="bookmark__heart">
            <i class="fa-solid fa-heart" style="color: #ff0000;"></i>
           </button>
           </form>  
          @endif
        @else
        <button class="bookmark__heart" disabled>
            <i class="fa-solid fa-heart" style="color: #dbdbdb;"></i>
        </button>
       @endif
      </div>



    </div>
  </div>   
  @endforeach
</div>
<div>   
@endsection