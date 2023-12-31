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
            <form action="/reservation/update" method="post">
                    @csrf
            <table class="table">
                <input type="hidden" name="reservation_id" value="{{$reservation['id']}}" >
                <tr>
                    <th align="left" width="80" height="30">Shop</th>
                    <td align="left" width="80" height="30">{{$reservation['shop']['name']}}</td>
                </tr>
                <tr>
                    <th align="left" width="80" height="30">Date</th>
                    <td align="left" width="80" height="30">
                        <input class="select__date" type="date" name="date" value="{{$reservation['date']}}" min="{{$today}}">
                    </td>
                <tr>
                    <th align="left" width="80" height="30">Time</th>
                    <td align="left" width="80" height="30">
                        <select class="select__time" name="time" value="{{$reservation['time']}}" >
                            <option value="{{$reservation['time']}}" selected >{{substr($reservation['time'],0,5)}}</option>
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
                        </select>
                    </td>
                </tr>
                <tr>
                    <th align="left" width="80" height="30">Number</th>
                    <td align="left" width="80" height="30">
                        <select class="select__people" name="num_of_users" value="{{$reservation['num_of_users']}}人" >
                            <option value="{{$reservation['num_of_users']}}" selected>{{$reservation['num_of_users']}}人</option>
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
                    </td>
                </tr>
            </table>
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
              <div class="form__error">
                  @error('rate')
                  {{ $message }} 
                  @enderror
              </div>
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
                  <textarea class="comment_text" name="comment" cols="30" row="5">{{ old('comment') }}</textarea> 
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
