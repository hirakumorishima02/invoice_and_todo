@extends('layouts.layout')
@section('title','案件管理画面')

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
      <nav class="header">
          <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
      <h2 class="center-align">案件管理画面</h2>
      </nav>
      <form action="/updateItem/{{$list->id}}" method="POST">
        {{ csrf_field() }}
          <div class="input-field col s12">
            <input id="item_name" type="text" class="validate" name="item_name" value="{{$list->item_name}}">
            <label for="item_name">案件名</label>
          </div>
          <div class="input-field col s12">
            <input id="delivery_date" type="text" class="datepicker" name="delivery_date" value="{{$list->delivery_date}}">
            <label for="delivery_date">納期</label>
          </div>
          <div class="input-field col s12">
            <input id="unit_price" type="text" class="validate" name="unit_price" value="{{$list->unit_price}}">
            <label for="unit_price">単価</label>
          </div>
          <div class="input-field col s12">
            <input id="memo" type="text" class="validate" name="memo" value="{{$list->memo}}">
            <label for="memo">備考欄</label>
          </div>
          <input type="submit" value="案件編集" class="waves-effect waves-light btn blue accent-1">
          <input type="hidden" name="client_id" value="{{$list->client_id}}" >
          <input type="hidden" name="states" value="{{$list->states}}" >
      </form>
      <form method="POST" action="/deleteItem/{{$list->id}}" method="post">
          {{ method_field('delete') }}
          {{csrf_field()}}
          <input type="submit" value="案件情報削除" class="waves-effect waves-light btn red lighten-1">
      </form>
      </div>
    </div>
    <div class="row">
    <div class="col s12 offset-l3 l8">
      @if ($errors->any())
          <div>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    </div>
    </div>
@endsection