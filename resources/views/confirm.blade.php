@extends('layouts.default')
<style>

</style>
@section('container')
<p class="title">内容確認</p>
<form method="POST" action="{{ route('submit') }}" name="cfm_form">
  @csrf
  <table>
    <tr>
      <th class="table_title">お名前</th>
      <td>
        {{ $inputs['last_name'].' '.$inputs['first_name'] }}
        <input name="fullname" value="{{ $inputs['last_name'].' '.$inputs['first_name'] }}" type="hidden" />
      </td>
    </tr>
    <tr>
      <th class="table_title">性別</th>
      <td>
        @if($inputs['gender'] = 1)
        <p>男性</p>
        <input name="gender" value="1" type="hidden" />
        @else
        <p>女性</p>
        <input name="gender" value="2" type="hidden" />
        @endif
      </td>
    </tr>
    <tr>
      <th class="table_title">メールアドレス</th>
      <td>
        {{ $inputs['email'] }}
        <input name="email" value="{{ $inputs['email'] }}" type="hidden" />
      </td>
    </tr>
    <tr>
      <th class="table_title">郵便番号</th>
      <td>
        {{ $inputs['postcode'] }}
        <input name="postcode" value="{{ $inputs['postcode'] }}" type="hidden" />
      </td>
    </tr>
    <tr>
      <th class="table_title">住所</th>
      <td>
        {{ $inputs['address'] }}
        <input name="address" value="{{ $inputs['address'] }}" type="hidden" />
      </td>
    </tr>
    <tr>
      <th class="table_title">建物名</th>
      <td>
        {{ $inputs['building_name'] }}
        <input name="building_name" value="{{ $inputs['building_name'] }}" type="hidden" />
      </td>
    </tr>
    <tr>
      <th class="table_title">ご意見</th>
      <td>
        {{ $inputs['opinion'] }}
        <input name="opinion" value="{{ $inputs['opinion'] }}" type="hidden" />
      </td>
    </tr>
  </table>
  <button class="btn send_btn" name="action" type="submit">送信</button>
  <a class="back_link" href="#" onclick="history.back(); return false;" >修正する</a>
</form>
@endsection