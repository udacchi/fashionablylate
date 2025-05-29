@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header-nav')
<nav class="header-nav">
  <ul class="header-nav__list">
    <li class="header-nav__item">
      <a class="header-nav__link" href="{{ route('login') }}">login</a>
    </li>
  </ul>
</nav>
@endsection

@section('content')
<div class="register">
  <h2 class="register__title">Register</h2>
  <div class="register__content">
    <form class="form" action="{{ route('register') }}" method="post">
      @csrf
      <div class="form__group">
        <label class="form__label">お名前</label>
        <div class="form__input--text">
          <input type="name" name="name" placeholder="例：山田　太郎">
        </div>
        <div class="form__error">
          @error('name')
            {{ $message }}
          @enderror
        </div>
      </div>
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
          @error('password')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form__button">
        <button class="form__button-submit" type="submit">登録</button>
      </div>
    </form>
  </div>
</div>
@endsection