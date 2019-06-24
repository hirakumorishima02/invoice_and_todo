@extends('layouts.layout')
@section('title','ユーザー画面')

@section('body')
    <!-- タブのボタン部分 -->
  <nav class="nav-extended">
    <div class="nav-wrapper center-align">
      
      <h2 class="brand-logo">Invoice&ToDo</h2>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab right"><a class="tab_btn is-active-btn tab" href="#todo">案件</a></li>
        <li class="tab right"><a class="tab_btn tab" href="#invoice">請求書</a></li>
      </ul>
    </div>
  </nav>
    
    <!-- タブのコンテンツ部分 -->
    <div class="tab_item is-active-item row" id="todo">
      <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
      <!--案件のサイドメニュー-->
      <div class="col s0 l2">
        <ul id="slide-out" class="sidenav sidenav-fixed ">
          <li><a href="#">クライアント一覧<i class="material-icons left">person</i></a></li>
          <li><a href="#">案件カレンダー<i class="material-icons left">date_range</i></a></li>
          <li><a href="{{ url('/addClient')}}">クライアント追加<i class="material-icons left">add</i></a></li>
          <li><a href="{{ url('/addItem')}}">案件追加<i class="material-icons left">add</i></a></li>
        </ul>
      </div>
        <!--案件のコンテンツ-->
        <div class="container col s12 l10 card-panel light-blue accent-1">
          <h4 class="center-align">クライアント一覧</h4>
          <table class="clientList highlight centered">
            <thead>
              <tr>
                <th>クライアント名</th>
                <th>クライアント情報管理</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list as $val)
              <tr>
                <td><a href="/items/{{ $val->id  }}">{{$val->client_name}}</a></td>
                <td><a href="/editClient/{{ $val->id  }}"><button type="button"class="btn-floating waves-effect blue btn-small"><i class="material-icons">mode_edit</i></button></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
      
    <div class="tab_item row" id="invoice">
      <!--請求書のサイドメニュー-->
      <div class="col s0 l2">
        <a href="#" data-target="slide-out2" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
        <ul id="slide-out2" class="sidenav sidenav-fixed ">
          <li><a href="#">案件カレンダー<i class="material-icons left">date_range</i></a></li>
          <li><a href="{{ url('/editUser')}}">ユーザー情報管理<i class="material-icons left">person</i></a></li>
          <li><a href="{{ url('/addInvoice')}}">請求書作成<i class="material-icons left">add</i></a></li>
        </ul>
      </div>
        <!--請求書のコンテンツ-->
        <div class="container col s12 offset-l3">
          <h2>請求書一覧</h2>
          <div class="collection invoiceList">
            @foreach($list as $val)
            <a href="/invoice/{{ $val->id }}" class="collection-item">{{$val->client_name}}</a>
            @endforeach
          </div>
        </div>
    </div>
@endsection