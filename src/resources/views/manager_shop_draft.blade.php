@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manager_shop_modify.css') }}">
@endsection

@section('content')

 <div class="shop__detail"> 
    <form action="/manager/shop/register/confirm" method="post">
        @csrf
        <div class="shop__title">
          <input class="shop__name" type="text" name="name"  >
        </div>
        <input class="img"  type="url" name="image_url"  >

        <select class="area" name="area_id">
            @foreach($areas as $area)
            <option value="{{ $area['id'] }}" >{{ $area['name'] }}</option>
            @endforeach
        </select>  
        <select class="genre" name="genre_id">
            @foreach($genres as $genre)
            <option value="{{ $genre['id'] }}" >{{ $genre['category'] }}</option>
            @endforeach
        </select>    
        
        <textarea class="shop__text" name="description" cols="50" rows="7"></textarea>
        <button>確認</button>
    </form>    
</div>


   







@endsection