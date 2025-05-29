@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-nav')
<nav class="header-nav">
  <ul class="header-nav__list">
    <li class="header-nav__item">
      <a class="header-nav__link" href="{{ route('register') }}">register</a>
    </li>
  </ul>
</nav>
@endsection

@section('content')
<div class="login">
  <h2 class="login__title">Login</h2>
  <div class="login__content">
    <form class="form" action="{{ route('login') }}" method="post">
      @csrf
      <div class="form__group">
        <label class="form__label">メールアドレス</label>
        <div class="form__input--text">
          <input type="email" name="email" placeholder="例：test@example.com">
        </div>
        <div class="form__error">
          @error('email')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form__group">
        <label class="form__label">パスワード</label>
        <div class="form__input--text">
          <input type="password" name="password" placeholder="例：coachtech1106">
        </div>
        <div class="form__error">
          @error('email')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form__button">
        <button class="form__button-submit" type="submit">ログイン</button>
      </div>
    </form>
  </div>
</div>
@endsection