@extends('layouts.default')
@section('container')
<p class="title">お問い合わせ</p>

<form method="post" action="confirm">
  @csrf
  <table class="inquiry_table">
    <tr>
      <th class="table_title">お名前<span>※</span></th>
      <td>
        <input class="name_box last_name" type="text" name="last_name" value="{{ old('last_name') }}"/>
        <input class="name_box first_name" type="text" name="first_name" value="{{ old('first_name') }}"/>
      </td>
    </tr>
    <ul>
      @if ($errors->has('last_name'))
      <li><p class="error-message">{{ $errors->first('last_name') }}</p></li>
      @endif
    </ul>
    <ul>
      @if ($errors->has('first_name'))
      <li><p class="error-message">{{ $errors->first('first_name') }}</p></li>
      @endif
    </ul>
    <tr>
      <th></th>
      <td>
        <p class="example_name">例) 山田</p>
        <p class="example_name">例) 太郎</p>
      </td>
    </tr>
    <tr>
      <th class="table_title">性別<span>※</span></th>
      <td>
        <input class="gender" type="radio" name="gender" value="1" @if( old('gender') == 1 ) checked @endif />
        <label>男性</label>
        <input class="gender" type="radio" name="gender" value="2" @if( old('gender') == 2 ) checked @endif />
        <label>女性</label>
      </td>
    </tr>
    <ul>
      @if ($errors->has('gender'))
      <li><p class="error-message">{{ $errors->first('gender') }}</p></li>
      @endif
    </ul>
    <tr>
      <th class="table_title">メールアドレス<span>※</span></th>
      <td><input class="box mail_box" type="email" name="email" value="{{ old('email') }}" /></td>
    </tr>
    <ul>
      @if ($errors->has('email'))
      <li><p class="error-message">{{ $errors->first('email') }}</p></li>
      @endif
    </ul>
    <tr>
      <th></th>
      <td><p class="example">例) test@example.com</p></td>
    </tr>
    <tr>
      <th class="table_title">郵便番号<span>※</span></th>
      <td>
        <p class="post_mark">〒</p>
        <input class="box postcode_box" type="text" name="postcode"  value="{{ old('postcode') }}"/>
      </td>
    </tr>
    <ul>
      @if ($errors->has('postcode'))
      <li><p class="error-message">{{ $errors->first('postcode') }}</p></li>
      @endif
    </ul>
    <tr>
      <th></th>
      <td><p class="example">例) 123-4567</p></td>
    </tr>
    <tr>
      <th class="table_title">住所<span>※</span></th>
      <td><input class="box address_box" type="text" name="address"  value="{{ old('address') }}"/></td>
    </tr>
    <ul>
      @if ($errors->has('address'))
      <li><p class="error-message">{{ $errors->first('address') }}</p></li>
      @endif
    </ul>
    <tr>
      <th></th>
      <td><p class="example">例) 東京都渋谷区千駄ヶ谷1-2-3</p></td>
    </tr>
    <tr>
      <th class="table_title">建物名</th>
      <td><input class="box building_name_box" type="text" name="building_name" value="{{ old('building_name') }}" /></td>
    </tr>
    <tr>
      <th></th>
      <td><p class="example">例) 千駄ヶ谷マンション101</p></td>
    </tr>
    <tr>
      <th class="table_title">ご意見<span>※</span></th>
      <td><textarea class="opinion_box" name="opinion" cols="40" rows="6">{{ old('opinion') }}</textarea></td>
    </tr>
    <ul>
      @if ($errors->has('opinion'))
      <li><p class="error-message">{{ $errors->first('opinion') }}</p></li>
      @endif
    </ul>
  </table>
      <button class="btn confirm_btn">確認</button>
</form>
@endsection