@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manager_shop_modify.css') }}">
@endsection

@section('content')

 <div class="shop__detail"> 
    <form action="/manager/shop/confirm" method="post">
        @csrf
        <div class="shop__title">
          <input type="hidden" name="id" value="{{ $item->id }}" >
          <input class="shop__name" type="text" name="name" value="{{ $item->name }}" >
        </div>
        <input class="img"  type="url" name="image_url"  value="{{$item->image_url}}" >

        <select class="area" name="area_id">
            <option value="{{$item->area_id}}" selected >{{ $item->area->name }}</option>
            @foreach($areas as $area)
            <option value="{{ $area['id'] }}" >{{ $area['name'] }}</option>
            @endforeach
        </select>  
        <select class="genre" name="genre_id">
            <option value="{{$item->genre_id}}" selected >{{ $item->genre->category }}</option>
            @foreach($genres as $genre)
            <option value="{{ $genre['id'] }}" >{{ $genre['category'] }}</option>
            @endforeach
        </select>    
        
        <textarea class="shop__text" name="description" cols="50" rows="7">{{ $item->description}}</textarea>
        <button>確認</button>
    </form>    
</div>
      <button class="back__btn" onClick="history.back()">戻る</button>

   







@endsection