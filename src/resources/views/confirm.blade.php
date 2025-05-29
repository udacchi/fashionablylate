@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
  <div class="confirm__heading">
    <h2>Confirm</h2>
  </div>
  <form class="form" action="/contacts" method="post">
    @csrf
    <div class="confirm-table">
      <table class="confirm-table__inner">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td>
            {{ $inputs['last_name'] }} {{ $inputs['first_name'] }}
            <input type="hidden" name="last_name" value="{{ $inputs['last_name'] }}">
            <input type="hidden" name="first_name" value="{{ $inputs['first_name'] }}">
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td>
            {{ $inputs['gender_label'] }}
            <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td>
            {{ $inputs['email'] }}
            <input type="hidden" name="email" value="{{ $inputs['email'] }}">
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td>
            {{ $inputs['phone1'] }}-{{ $inputs['phone2'] }}-{{ $inputs['phone3'] }}
            <input type="hidden" name="phone1" value="{{ $inputs['phone1'] }}">
            <input type="hidden" name="phone2" value="{{ $inputs['phone2'] }}">
            <input type="hidden" name="phone3" value="{{ $inputs['phone3'] }}">
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td>
            {{ $inputs['address'] }}
            <input type="hidden" name="address" value="{{ $inputs['address'] }}">
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物の名</th>
          <td>
            {{ $inputs['building'] }}
            <input type="hidden" name="building" value="{{ $inputs['building'] }}">
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせの種類</th>
          <td>
            {{ $inputs['category_name'] ?? '未指定' }}
            <input type="hidden" name="category_id" value="{{ $inputs['category_id'] }}">
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td>
            {{ $inputs['detail'] }}
            <input type="hidden" name="detail" value="{{ $inputs['detail'] }}">
          </td>
        </tr>
      </table>
    </div>
    <div class="form__button-group">
      <form action="/contacts" method="post">
        @csrf
        @foreach ($inputs as $name => $value)
          <input type="hidden" name="{{ $name }}" value="{{ $value }}">
        @endforeach
        <button type="submit" class="form__button form__button--primary">送信</button>
      </form>
    
      <form action="/contacts/revise" method="post">
        @csrf
        @foreach ($inputs as $name => $value)
          <input type="hidden" name="{{ $name }}" value="{{ $value }}">
        @endforeach
        <button type="submit" class="form__link-button">修正</button>
      </form>
    </div>
  </form>
</div>
@endsection