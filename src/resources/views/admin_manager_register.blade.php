@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_manager_register.css') }}">
@endsection

@section('content')

<h1>店舗代表者登録</h1>
<div class="registration">
    <h2 class="registration__title">Manager Registration</h2>
    <form method="POST" action="/admin/manager/register/confirm">
            @csrf
      <div class="form__input">
         <div class="form__input-text">
            
               <i class="fa-solid fa-user"></i>
                <label for="email" :value="__('Email')" >
                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required />
         </div>   
      </div>

      <div class="form__input-shop">
        <div>登録店舗</div>
        <div>
             <select class="shop" name="shop_id"> 
                @foreach($shops as $shop)
                <option value="{{ $shop['id'] }}">{{ $shop['name'] }}</option>
                @endforeach
             </select>
       </div>
     <div>   

      <div class="registration__btn">
        <button class="registration__btn-content">登録</button>
      <div>  
    </form>
</div>






@endsection