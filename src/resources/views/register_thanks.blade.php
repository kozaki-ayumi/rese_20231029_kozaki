@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')

<div class="thanks">
     
      <div class="thanks__comment">会員登録ありがどうございます</div>
      <div class="btn">
        <form action="/" method="get">
         <button class="btn-content">ログインする</button>
        </form>
      <div>  
</div>


@endsection