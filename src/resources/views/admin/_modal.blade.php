
<table class="modal-detail__table">
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
    <th>問い合わせの種類</th>
    <td>{{ $contact->category->name ?? '未分類' }}</td>
  </tr>
  <tr>
    <th>お問い合わせ内容</th>
    <td>{!! nl2br(e($contact->detail)) !!}</td>
  </tr>
  <tr>
    <td colspan="2">
      <form action="{{ route('admin.delete', ['id' => $contact->id]) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete">削除</button>
      </form>
    </td>
  </tr>
</table>
