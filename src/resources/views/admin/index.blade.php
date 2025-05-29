@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-nav')
<nav class="header-nav">
  <ul class="header-nav__list">
    <li class="header-nav__item">
      <a class="header-nav__link" href="{{ route('logout') }}">logout</a>
    </li>
  </ul>
</nav>
@endsection

@section('content')
<div class="admin__main">
  <h2 class="admin__title">Admin</h2>

  <form class="search-form" action="{{ route('admin.index') }}" method="get">
    <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
    <select name="gender">
      @foreach ($genders as $value => $label)
        <option value="{{ $value }}" {{ request('gender') === $value ? 'selected' : '' }}>
          {{ $label }}
        </option>
      @endforeach
    </select>
    <select name="type">
      <option value="">お問い合わせの種類</option>
      @foreach ($contactTypes as $type)
        <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ $type }}</option>
      @endforeach
    </select>
    <input type="date" name="date" value="{{ request('date') }}">
    <div class="search-buttons">
      <button type="submit" class="btn-search">検索</button>
      <a href="{{ route('admin.index') }}" class="btn-reset">リセット</a>
    </div>
  </form>
  @if (session('message'))
    <div class="alert-success">
      {{ session('message') }}
    </div>
  @endif
  <div class="table-top-bar">
    <form action="{{ route('admin.export') }}" method="get">
      <button type="submit" class="btn-export">エクスポート</button>
    </form>
    <div class="pagenation">
      {{ $contacts->appends(request()->query())->links() }}
    </div>
  </div>

  <table class="admin__table">
    <thead>
      <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせの種類</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($contacts as $contact)
      <tr>
        <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
        <td>
          @switch($contact->gender)
            @case('male') 男性 @break
            @case('female') 女性 @break
            @case('others') その他 @break
            @default 不明
          @endswitch
        </td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->category->name ?? '未分類' }}</td>
        <td>
          <a href="#" class="btn-detail" data-id="{{ $contact->id }}">詳細</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>

<div id="detailModal" class="modal" style="display: none;">
  <div class="modal__content">
    <span class="modal__close">&times;</span>
    <div id="modal-body">読み込み中...</div>
  </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $(document).on('click', '.btn-detail', function (e) {
      e.preventDefault();
      const id = $(this).data('id');
      $.get(`/admin/${id}`, function (data) {
        $('#modal-body').html(data);
        $('#detailModal').fadeIn();
      });
    });
    $(document).on('click', '.modal__close', function () {
      $('#detailModal').fadeOut();
    });
  });
</script>
@endsection
