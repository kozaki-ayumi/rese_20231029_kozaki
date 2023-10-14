@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')

<div class="thanks">
     
      <div class="thanks__comment">登録しました</div>
      <div class="btn">
      
        <button class="btn-content" onClick="history.back()">戻る</button>
      <div>  
</div>

@endsection