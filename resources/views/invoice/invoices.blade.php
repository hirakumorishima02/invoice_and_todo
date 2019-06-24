@extends('layouts.layout')
@section('title','案件一覧')
    
@section('body')
    <!--サイドメニューここから-->
    <div class="row">
      <div class="col s0 l2">
        <ul id="slide-out" class="sidenav sidenav-fixed ">
          <li><a href="{{ url('/user#invoice')}}">クライアント一覧<i class="material-icons left">person</i></a></li>
          <li><a href="#">案件カレンダー<i class="material-icons left">date_range</i></a></li>
          <li><a href="{{ url('/editUser')}}">ユーザー情報管理<i class="material-icons left">person</i></a></li>
          <li><a href="{{ url('/addInvoice')}}">請求書作成<i class="material-icons left">add</i></a></li>
        </ul>
      </div>
    <!--サイドメニューここまで-->
    <div class="col s12 offset-l1 l8">
    <nav class="header">
        <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
    <h2 class="center-align">案件一覧</h2>
    </nav>
    @foreach($clientList as $val)
        <h3>{{$val->client_name}}</h3>
    @endforeach

    @foreach($invoiceList as $val)
        <a href="/invoice/{{ $val->id }}" class="collection-item">{{ $val->delivery_date }}</a>
    @endforeach
    </div>
    </div>
@endsection