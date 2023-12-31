@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')


<div class="registration">
   <h1 class="registration__title">Login</h1>

   <x-auth-validation-errors class="mb-4" :errors="$errors" />

   <form method="POST" action="{{ route('login') }}">
            @csrf

      <div class="form__input">
         <div class="form__input-text">
            <i class="fa-solid fa-envelope"></i>
               <label for="email" :value="__('Email')" />
               <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required />
         </div>
      </div>

      <div class="form__input">
         <div class="form__input-text">
            <i class="fa-solid fa-lock"></i>
            <label for="password" :value="__('Password')" />
            <input id="password" class="block mt-1 w-full"
                                 type="password"
                                 name="password"
                                 placeholder="Password"
                                 required autocomplete="new-password" />
         </div>
      </div>

      <div class="registration__btn">
         <button class="registration__btn-content">ログイン</button>
      <div>
   <form>
</div>

@endsection






