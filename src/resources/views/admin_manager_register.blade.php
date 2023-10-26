@extends('layouts.title')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_manager_register.css') }}">
@endsection

@section('content')

<div class="registration">
    <h2 class="registration__title">Manager Registration</h2>
    <form method="POST" action="/manager/register/confirm">
            @csrf
      <div class="form__input">
        <div class="form__input-text">
              <i class="fa-solid fa-user"></i>
                <input id="email"  type="email" name="email" :value="old('email')" placeholder="Email" required />
        </div>
      </div>
      <div class="registration__btn">
        <button class="registration__btn-content">登録</button>
      <div>
    </form>
</div>

@endsection