@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
@endsection

@section('content')

<h1 class="username">{{$user->name}}　さん</h1>

<div class="reservation__bookmark">
    <div class="reservation">
      <div class="reservation__position">
        <h2 class="reservation__position-title">予約状況</h2>
        @if(session('message'))
        <div class="reservation__message">
            {{session('message')}}
        </div>
        @endif
        @foreach($reservations as $key=>$reservation)
        <div class="reservation__confirm">
            <div class="reservation__title">
                <h3 class="reservation__title-name">予約{{$key+1}}</h3>
                <form action="/reservation/delete" method="post">
                    @csrf
                <div class="delete__btn">
                    <input type="hidden" name="reservation_id" value="{{$reservation['id']}}" >
                    <button class="delete__btn-content">×</button>
                </div>
                </form>
            </div>
            <table class="table">
            <form action = "/reservation/test" method="post">
                    @csrf
                        
                <input type="text" name="content">
                 
            <div class="change__btn">
                <button class="change__btn-content" type="submit">予約変更</button>
            </div>
            </form>
        </div>
        @endforeach
      </div>
      <div class="reservation__position">
        <h2 class="reservation__position-title">過去3ヶ月の予約</h2>
        @foreach($reservationPasts as $key=>$reservationPast)
        <div class="reservation__confirm">
          <div class="reservation__title">
              <h3 class="reservation__title-name">予約{{$key+1}}</h3>
          </div>
          <table class="table">
              <tr>
                <th align="left" width="80" height="30">Shop</th>
                <td align="left" width="80" height="30">{{$reservationPast['shop']['name']}}</td>
              </tr>
              <tr>
                <th align="left" width="80" height="30">Date</th>
                <td align="left" width="100" height="30">{{$reservationPast['date']}}</td>
              <tr>
                <th align="left" width="80" height="30">Time</th>
                <td align="left" width="80" height="30">{{substr($reservationPast['time'],0,5)}}</td>
              </tr>
              <tr>
                <th align="left" width="80" height="30">Number</th>
                <td align="left" width="80" height="30">{{$reservationPast['num_of_users']}}人</td>
              </tr>
          </table> 
          <div class="review">
              @if($reservationPast->review !=null)
              <h4 class="review__title">レビュー</h4>
              <div class="rate-form">
                  <p>
                      <span class="star5_rating" data-rate="{{$reservationPast->review->rate}}"></span>
                  </p>
                </div>
                <h5 class="comment__title">コメント</h5>
                <div class="comment__btn">
                  <p class="comment_text">{{$reservationPast->review->comment}}</p>
              </div>
              @else
              <form action="/review" method="post">
                    @csrf
              <input type="hidden" name="reservation_id" value="{{$reservationPast['id']}}">
              <h4 class="review__title">レビュー</h4>
              <div class="rate-form">
                  <input id="{{$reservationPast['id']}}__star5" type="radio" name="rate" value="5">
                  <label for="{{$reservationPast['id']}}__star5">★</label>
                  <input id="{{$reservationPast['id']}}__star4" type="radio" name="rate" value="4">
                  <label for="{{$reservationPast['id']}}__star4">★</label>
                  <input id="{{$reservationPast['id']}}__star3" type="radio" name="rate" value="3">
                  <label for="{{$reservationPast['id']}}__star3">★</label>
                  <input id="{{$reservationPast['id']}}__star2" type="radio" name="rate" value="2">
                  <label for="{{$reservationPast['id']}}__star2">★</label>
                  <input id="{{$reservationPast['id']}}__star1" type="radio" name="rate" value="1">
                  <label for="{{$reservationPast['id']}}__star1">★</label>
              </div>
              <h5 class="comment__title">コメント</h5>
              <div class="comment__btn">
                  <textarea class="comment_text" name="comment" cols="30" row="5"></textarea> 
                  <div class="review__btn">
                      <button class="review__btn-content">登録</button>
                  </div>
              </div>  
              </form>
              @endif
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <div class="bookmark">
      <h2 class="bookmark__title">お気に入り店舗</h2>
      <div class="shop__list">
          @foreach($shops as $shop)
          <div class="shop__card">
              <img class="img" src="{{ $shop['image_url'] }}" alt="img">
              <div class="shop__name">{{ $shop['name'] }}</div>
              <div class="area__genre">
                  <span>#{{$shop['area']['name']}}</span>
                  <span> #{{$shop['genre']['category']}}</span>
              </div>
              <div class="btn__heart">
                <form action="/shop/{{$shop['id']}}" method="get">
                  <button class="detail__btn">詳しくみる</button>
                </form>
                <div class="heart">
                  <form action="{{ route('bookmark.destroy', $shop) }}"  method="post">
                      @csrf
                      @method('delete')
                    <button class="bookmark__heart">
                      <i class="fa-solid fa-heart" style="color: #ff0000;"></i>
                    </button>
                  </form>
                </div>
              </div>
          </div>
          @endforeach
      </div>
    </div>
</div>

@endsection
