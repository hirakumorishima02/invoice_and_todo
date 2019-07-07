@extends('layouts.layout')
@section('title','案件納期カレンダー')

@section('body')
<!--サイドメニューここから-->
<div class="row">
  <div class="col s0 l2">
    <ul id="slide-out" class="sidenav sidenav-fixed ">
      <li><a href="{{url('/user/1')}}">クライアント一覧<i class="material-icons left">person</i></a></li>
      <li><a href="/calendar">案件カレンダー<i class="material-icons left">date_range</i></a></li>
      <li><a href="{{url('/addClient')}}">クライアント追加<i class="material-icons left">add</i></a></li>
      <li><a href="{{url('addItem')}}">案件追加<i class="material-icons left">add</i></a></li>
    </ul>
  </div>
<!--サイドメニューここまで-->
<div class="col s12 offset-l1 l8">
{!! $cal_tag !!}
</div>
</div>
@endsection