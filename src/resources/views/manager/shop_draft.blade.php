@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manager_shop_modify.css') }}">
@endsection

@section('content')

  
 <div class="shop__detail"> 
    <form action="/manager/shop/register/confirm" method="post" enctype="multipart/form-data">
        @csrf
        <div>
          <label for="name">店名</label>
          <input class="form__input" type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        <label for="image_url">画像</label>
        <input class="form__input"  type="file" name="image_url" id="image_url" value="{{ old('image_url') }}"> </br>

        <label for="area">地域</label>
        
        <select class="form__input" name="area_id" id="area">
            @foreach($areas as $area)
           
            <option value="{{ $area['id'] }}" >{{ $area['name'] }}</option>
            @endforeach
        </select> </br>
        
        <label for="genre">ジャンル</label>
        <select class="form__input" name="genre_id" id="genre">
            @foreach($genres as $genre)
            <option value="{{ $genre['id'] }}" >{{ $genre['category'] }}</option>
            @endforeach
        </select>    </br>
        
        <label class="description__title" for="description">概要</label>
        <textarea class="form__input" name="description" id="description" cols="50" rows="7" >{{ old('description') }}</textarea>
        
        <div class="btn">
        <button class="button__content">確認</button>
        </div>

    </form>    
</div>

<button class="back__button" onClick="history.back()">戻る</button>

   







@endsection