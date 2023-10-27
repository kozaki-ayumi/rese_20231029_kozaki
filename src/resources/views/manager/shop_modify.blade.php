@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manager_shop_modify.css') }}">
@endsection

@section('content')

<div class="shop__detail">
    <form action="/manager/shop/confirm" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="hidden" name="id" value="{{ $item['id'] }}" >
            <label class="label" for="name">店名</label>
            <span>　　　</span>
            <input class="form__input" type="text" name="name" id="name" value="{{ $item['name'] }}" >
        </div>
        <div class="form__error">
            @error('name')
            {{ $message }}
            @enderror
        </div>
        <div>
            <label class="label" for="image_url">画像</label>
            <span>　　　</span>
            <input type="hidden" name="image_url" value="{{$item['image_url']}}">
            <p class="old__img">"{{$item['image_url']}}"</p> 
            <input class="form__input-img"  type="file" name="new_image_url" id="image_url" >
        </div>
        <div>
            <label class="label" for="area">地域</label>
            <span>　　　</span>
            <select class="form__input" name="area_id" id="area">

                @foreach($areas as $area)
                <option value="{{$area['id']}}" @if(isset($item['area_id'])&&($item['area_id'] == $area->id)) selected @endif >{{$area['name']}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="label" for="genre">ジャンル</label>
            <span>　</span>
            <select class="form__input" name="genre_id" id="genre">
                @foreach($genres as $genre)
                <option value="{{ $genre['id'] }}" @if(isset($item['genre_id'])&&($item['genre_id'] == $genre->id)) selected @endif >{{$genre['category']}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="label" for="description">概要</label>
            <span>　　　</span>
            <textarea class="form__input-textarea" name="description" id="description" cols="50" rows="7">{{ $item['description']}}</textarea>
        </div>
        <div class="btn">
            <button class="button__content">確認</button>
        </div>
    </form>
</div>
<div>
    <form action="/manager/shop/list" method="get">
    <button class="back__button" type="submit">戻る</button>
    </form>
</div>

@endsection