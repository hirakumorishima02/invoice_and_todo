@extends('layouts.layout')
@section('title','請求書一覧')
    
@section('body')
    <!--サイドメニューここから-->
    <div class="row">
      <div class="col s0 l2">
        <ul id="slide-out" class="sidenav sidenav-fixed ">
          <li><a href="{{ url('/user/2')}}">請求書一覧<i class="material-icons left">person</i></a></li>
          <li><a href="/calendar">案件カレンダー<i class="material-icons left">date_range</i></a></li>
          <li><a href="{{ url('/editUser')}}">ユーザー情報管理<i class="material-icons left">person</i></a></li>
          <li><a href="{{ url('/checkClient')}}">請求書作成<i class="material-icons left">add</i></a></li>
        </ul>
      </div>
    <!--サイドメニューここまで-->
    <div class="col s12 offset-l1 l8">
    <nav class="header">
        <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
    <h2 class="center-align">請求書一覧</h2>
    </nav>
    <div class="collection invoiceList">
        @foreach($invoiceList as $val)
        <a href="/invoice/{{ $val->client_id }}/invoice/{{ $val->id }}" class="collection-item">{{$val->invoice_title}}</a>
        @endforeach
    </div>
    </div>
    </div>
    </div>
@endsection