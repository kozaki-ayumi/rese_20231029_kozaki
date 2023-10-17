@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manager_reservation_list.css') }}">
@endsection

@section('content')




<form action="/manager/reservation/search" method="post">
<div class="search__bar">    
    @csrf
    <div class="shop">
        <label>店舗</label>
        <span>:</span>
        <select class="select__shop" name="shop_id">
              @foreach($managements as $management)
               <option value="{{ $management['shop_id']}}" >{{ $management->shop->name }}
              @endforeach   
        </select>
    </div>         
    <div class="date">
       <label>日付</label>
       <span>:</span>
       <input class="select__date" type="date" name="date"  value="{{$format_date}}" >
    </div>
    <div class="search__btn">
       <button class="search__btn-content">表示</button>
    </div>
</div>        
</form>           

<table class="reservation__table" cellpadding="15">
    <tr class="table__title">
      <th>番号</th>
      <th>名前</th>
      <th>時間</th>
      <th>人数</th>
      <th>予約更新時間</th>
      <th>メール</th>
    </tr>

    @foreach($reservations as $key=>$reservation)
    <tr>
      <td class="table__item-name">{{$key+1}}</td>
      <td class="table__item-startwork">{{$reservation->user->name}}</td>
      <td class="table__item-endwork">{{$reservation['time']}}</td>
      <td class="table__item-totalrest">{{$reservation['num_of_users']}}</td>
      <td class="table__item-totalwork">{{$reservation['updated_at']}}</td>
      <td class="table__item-totalwork">
        <form action="/manager/mail/draft" method="get">
           <button>メール作成</button>
        </form>
      </td>
    </tr>
   @endforeach
</table>







@endsection