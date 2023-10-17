@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}">
@endsection

@section('content')

<div class="detail__reservation">

  <div class="shop__detail"> 
    <h1 class="shop__title">
      <button class="back__btn" onClick="history.back()"><</button>
      <div class="shop__name">{{ $item->name }}</div>
    </h1>
    <img class="img" src="{{$item->image_url}}" alt="img">
    <div class="area__genre">
          <span>#{{ $item->area->name}}</span>
          <span>#{{ $item->genre->category}}</span>
    </div>
    <p class="shop__text">{{ $item->description}}</p>
  </div>
        
  <div class="reservation">
    <form action="/reservation/completion" method="post">
          @csrf
    <div class="reservation__content"> 
      <h2 class="reservation__title">予約</h2>
      <input type="hidden" name="user_id" value="{{$id}}">
      <input type="hidden" name="shop_id" value="{{$item->id}}" >
      <input class="select__date" type="date" name="date" value="{{old('date')}}" min="{{$today}}" > </br>
      <div class="form__error">
                  @error('date')
                  {{ $message }} 
                  @enderror
      </div>
      <select class="select__time" name="time" value="{{old('time')}}" >
                <option value="" disabled selected style="display:none;">時間</option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="18:00">18:00</option>
                <option value="18:30">18:30</option>
                <option value="19:00">19:00</option>
                <option value="19:30">19:30</option>
                <option value="20:00">20:00</option>
                <option value="20:30">20:30</option>
                <option value="21:00">21:00</option>
                <option value="21:30">21:30</option>
                <option value="22:00">22:00</option>
                <option value="22:30">22:30</option>
      </select> </br>
      <div class="form__error">
                  @error('time')
                  {{ $message }} 
                  @enderror
      </div>
      <select class="select__people" name="num_of_users" value="{{old('num_of_users')}}" >
                <option value="" disabled selected style="display:none;">人数</option>
                <option value="1">1人</option>
                <option value="2">2人</option>
                <option value="3">3人</option>
                <option value="4">4人</option>
                <option value="5">5人</option>
                <option value="6">6人</option>
                <option value="7">7人</option>
                <option value="8">8人</option>
                <option value="9">9人</option>
                <option value="10">10人</option>
      </select>
      <div class="form__error">
                  @error('num_of_users')
                  {{ $message }} 
                  @enderror
      </div>
      
      <div class="form__error-user_id">
                  @error('user_id')
                  {{ $message }} 
                  @enderror
      </div>

    </div> 
    <div class="reservation__btn">
              <button class="reservation__btn-content">予約する</button>
    </div>
    </form> 
  </div>
</div>  

@endsection
