@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manager_shop_modify.css') }}">
@endsection

@section('content')

<div class="shop__detail">
    <form action="/manager/shop/register/confirm" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="label" for="name">店名</label>
            <span>　　　</span>
            <input class="form__input" type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div class="form__error">
            @error('name')
            {{ $message }}
            @enderror
        </div>
        <div>
            <label class="label" for="image_url">画像</label>
            <span>　　　</span>
            <input class="form__input"  type="file" name="image_url" id="image_url" value="{{ old('image_url') }}">
        </div>
        <div class="form__error">
            @error('image_url')
            {{ $message }}
            @enderror
        </div>
        <div>
            <label class="label" for="area">地域</label>
            <span>　　　</span>
            <select class="form__input" name="area_id" id="area">
                @foreach($areas as $area)
                <option value="{{ $area['id'] }}"  @if(old('area_id') == $area->id) selected @endif>{{ $area['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="label" for="genre">ジャンル</label>
            <span>　</span>
            <select class="form__input" name="genre_id" id="genre">
                @foreach($genres as $genre)
                <option value="{{ $genre['id'] }}"  @if(old('genre_id') == $genre->id) selected @endif>{{ $genre['category'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="label" for="description">概要</label>
            <span>　　　</span>
            <textarea class="form__input-textarea" name="description" id="description" cols="50" rows="7" >{{ old('description') }}</textarea>
        </div>
        <div class="btn">
            <button class="button__content">確認</button>
        </div>
    </form>
</div>

@endsection