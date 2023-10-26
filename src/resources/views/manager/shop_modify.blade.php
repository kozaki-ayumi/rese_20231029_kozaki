@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manager_shop_modify.css') }}">
@endsection

@section('content')

<div class="shop__detail">
    <form action="/manager/shop/confirm" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="hidden" name="id" value="{{ $item->id }}" >
            <label class="label" for="name">店名</label>
            <span>　　　</span>
            <input class="form__input" type="text" name="name" id="name" value="{{ $item->name }}" >
        </div>
        <div>
            <label class="label" for="image_url">画像</label>
            <span>　　　</span>
            @if(isset($shop_modify['old_image_url']))
            <p class="old__img">"{{$shop_modify['old_image_url']}}"</p> 
            @endif
            <input type="hidden" name="old_image_url" value="{{$item->image_url}}">
            <p class="old__img">"{{$item->image_url}}"</p> 
            <input class="form__input-img"  type="file" name="new_image_url" id="image_url" >
        </div>
        <div>
            <label class="label" for="area">地域</label>
            <span>　　　</span>
            <select class="form__input" name="area_id" id="area">
                <option value="{{$item->area_id}}" selected >{{ $item->area->name }}</option>
                @foreach($areas as $area)
                <option value="{{ $area['id'] }}" >{{ $area['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="label" for="genre">ジャンル</label>
            <span>　</span>
            <select class="form__input" name="genre_id" id="genre">
                <option value="{{$item->genre_id}}" selected >{{ $item->genre->category }}</option>
                @foreach($genres as $genre)
                <option value="{{ $genre['id'] }}" >{{ $genre['category'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="label" for="description">概要</label>
            <span>　　　</span>
            <textarea class="form__input-textarea" name="description" id="description" cols="50" rows="7">{{ $item->description}}</textarea>
        </div>
        <div class="btn">
        <button class="button__content">確認</button>
        </div>
    </form>
</div>

<button class="back__button" onClick="history.back()">戻る</button>


@endsection