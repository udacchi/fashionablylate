<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>お問い合わせ詳細 | FashionablyLate</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo">FashionablyLate</a>
      <nav class="header-nav">
        <ul class="header-nav__list">
          <li class="header-nav__item">
            <a class="header-nav__link" href="{{ route('logout') }}">logout</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="admin-show__heading">
      <h2>お問い合わせ詳細</h2>
    </div>
    <table class="admin-show__table">
      <tr>
        <th>お名前</th>
        <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
      </tr>
      <tr>
        <th>性別</th>
        <td>
          @switch($contact->gender)
            @case('male') 男性 @break
            @case('female') 女性 @break
            @case('others') その他 @break
            @default 不明
          @endswitch
        </td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>{{ $contact->email }}</td>
      </tr>
      <tr>
        <th>電話番号</th>
        <td>{{ $contact->phone1 }}-{{ $contact->phone2 }}-{{ $contact->phone3 }}</td>
      </tr>
      <tr>
        <th>住所</th>
        <td>{{ $contact->address }}</td>
      </tr>
      <tr>
        <th>建物名</th>
        <td>{{ $contact->building }}</td>
      </tr>
      <tr>
        <th>お問い合わせの種類</th>
        <td>{{ $contact->category->name ?? '未分類' }}</td>
      </tr>
      <tr>
        <th>お問い合わせ内容</th>
        <td>{!! nl2br(e($contact->detail)) !!}</td>
      </tr>
      <tr>
        <th>登録日時</th>
        <td>{{ $contact->created_at->format('Y年m月d日 H:i') }}</td>
      </tr>
    </table>
  
    <div class="admin-show__button">
      <form action="{{ route('admin.delete', ['id' => $contact->id]) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete">削除</button>
      </form>
    </div>
  </div>
  </main>
</body>
</html>