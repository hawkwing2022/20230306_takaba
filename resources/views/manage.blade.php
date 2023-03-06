@extends('layouts.default')
@section('container')
<p class="title">管理システム</p>
<div class="search_contents">
  <form action="search" method="POST">
    @csrf
    <table class="search_table">
      <tr>
        <th class="mng_table_title">お名前</th>
        <td><input class="search_box" type="text" name="name" /></td>
        <th class="mng_gd_table_title">性別</th>
        <td><input type="radio" name="gender" checked value="0" /><label>全て</label></td>
        <td class="gender_label"><input type="radio" name="gender" value="1" /><label>男性</label></td>
        <td class="gender_label"><input type="radio" name="gender" value="2" /><label>女性</label></td>
      </tr>
      <tr>
        <th class="mng_table_title">登録日</th>
        <td colspan="6"><input class="search_box" type="date" name="from_cfmdate" />
        <p class="tilda">〜</p>
        <input class="search_box" type="date" name="to_cfmdate" /></td>
      </tr>
      <tr>
        <th class="mng_table_title">メールアドレス</th>
        <td><input class="search_box" type="email" name="email"></td>
      </tr>
    </table>
    <button class="btn search_btn">検索</button>
    <a class="form_reset" href="manage">リセット</a>
  </form>
</div>
<div class="srch_rslt">
  <table>
    <tr>
      <th>ID</th>
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>ご意見</th>
    </tr>
    @if(isSet($contents))
    @foreach($contents as $content)
    <tr>
      <td>{{$content->id}}</td>
      <td>{{$content->name}}</td>
      <td>
        {{ $content->gender }}
      </td>
      <td>{{$content->email}}</td>
      <td>{{$content->opinion}}</td>
      <td>
        <form action="{{ route('delete', ['id' => $content->id]) }}" method="POST">
          @csrf
          <button class="btn delete_btn">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
    @endif
  </table>
</div>
@endsection