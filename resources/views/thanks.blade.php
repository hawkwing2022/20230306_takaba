@extends('layouts.default')
@section('container')
<form action="inquiry" method="GET">
  @csrf
  <p class="thanks_word">ご意見いただきありがとうございました。</p>
  <button class="btn tpredirect_btn">トップページへ</button>
</form>
@endsection