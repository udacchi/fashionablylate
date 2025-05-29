@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="fashionablylate__content">
  <div class="fashionablylate__heading">
    <h2>Contact</h2>
  </div>
  <form class="form" action="/contacts/confirm" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content form__input--name-group">
        <div class="form__input--name">
          <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}">
          @error('last_name')
            <div class="form__error">{{ $message }}</div>
          @enderror
        </div>
        <div class="form__input--name">
          <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}">
          @error('first_name')
            <div class="form__error">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">性別</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-select">
        <div class="form__input--radio">
          <input type="radio" name="gender" value="male" {{ old('gender', 'male') === 'male' ? 'checked' : '' }}> 男性
          <input type="radio" name="gender" value="female" {{ old('gender') === 'female' ? 'checked' : '' }}> 女性
          <input type="radio" name="gender" value="others" {{ old('gender') === 'others' ? 'checked' : '' }}> その他
        </div>
        <div class="form__error">
          @error('gender'){{ $message }}@enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}">
        </div>
        <div class="form__error">
          @error('email'){{ $message }}@enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">電話番号</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--tel-group">
          <div class="form__input--tel"><input type="tel" name="phone1" placeholder="080" value="{{ old('phone1') }}"></div>
          <span> - </span>
          <div class="form__input--tel"><input type="tel" name="phone2" placeholder="1234" value="{{ old('phone2') }}"></div>
          <span> - </span>
          <div class="form__input--tel"><input type="tel" name="phone3" placeholder="5678" value="{{ old('phone3') }}"></div>
        </div>
        @if ($errors->has('phone_group'))
          <div class="form__error">{{ $errors->first('phone_group') }}</div>
        @endif
      </div>      
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
        </div>
        <div class="form__error">
          @error('address'){{ $message }}@enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building') }}">
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせの種類</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-input">
        <select name="category_id" class="form__group-select custom-select" required>
          <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>選択してください</option>
          @foreach($categories as $category)
            <option value="{{ $category['id'] }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
              {{ $category['name'] }}
            </option>
          @endforeach
        </select>
        <div class="form__error">
          @error('category_id'){{ $message }}@enderror
        </div>
      </div>
    </div>
    <div class="form__group form__group--textarea">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせ内容</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-detail">
        <div class="form__input--textarea">
          <textarea name="detail" placeholder="お問い合わせ内容をご記載下さい">{{ old('detail') }}</textarea>
        </div>
        <div class="form__error">
          @error('detail'){{ $message }}@enderror
        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面</button>
    </div>
  </form>
</div>
@endsection