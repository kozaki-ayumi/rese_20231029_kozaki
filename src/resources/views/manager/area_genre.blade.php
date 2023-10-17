@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manager_shop_modify.css') }}">
@endsection

@section('content')

<h1>地域/ジャンル 新規登録・更新</h1>

<div class="register">
    <h2 class="title">新規登録</h2>
    <div class="register"> 
        <form class="register__form" action="/manager/area/register" method="post">
            @csrf
            <label for="area_register">地域</label>
            <input type="text" name="name" value="" id="area_register">
            <button>登録</button>
        </form>    
    </div>  
    <div class="register" >  
        <form  class="register__form" action="/manager/genre/register" method="post">
            @csrf
            <label for="genre_register">ジャンル</label>
            <input type="text" name="category" value="" id="genre_register">
            <button>登録</button>
        </form>
    </div>
</div>

<div class="delete">
    <h2 class="title">削除</h2>
    <div>
        <form  class="" action="/manager/area/delete" method="post">
            @method('DELETE')
            @csrf
        <h3 class="ist__title">地域選択</h3>
        <select class="area" name="area_id">
            @foreach($areas as $area)
            <option value="{{ $area['id'] }}" >{{ $area['name'] }}</option>
            @endforeach
        </select> 
        <button type="submit">削除</button>
       </form>
    </div>
    <div>
        <form  class="" action="/manager/genre/delete" method="post">
            @method('DELETE')
            @csrf
        <h3 class="list__title">ジャンル一覧</h3>
        <select class="genre" name="genre_id">
            @foreach($genres as $genre)
            <option value="{{ $genre['id'] }}" >{{ $genre['category'] }}</option>
            @endforeach
        </select>
        <button type="submit">削除</button>
        </form>
    </div>
</div>

<button class="back__button" onClick="history.back()">戻る</button>



@endsection