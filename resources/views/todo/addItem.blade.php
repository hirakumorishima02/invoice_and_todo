@extends('layouts.layout')
@section('title','案件追加')

@section('body')
    <!--サイドメニューここから-->
    <div class="row">
      <div class="col s0 l2">
        <ul id="slide-out" class="sidenav sidenav-fixed ">
          <li><a href="{{url('/user')}}">クライアント一覧<i class="material-icons left">person</i></a></li>
          <li><a href="#">案件カレンダー<i class="material-icons left">date_range</i></a></li>
          <li><a href="{{url('/addClient')}}">クライアント追加<i class="material-icons left">add</i></a></li>
          <li><a href="{{url('addItem')}}">案件追加<i class="material-icons left">add</i></a></li>
        </ul>
      </div>
    <!--サイドメニューここまで-->
      <div class="col s12 offset-l1 l8">
      <nav class="header">
          <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
      <h2 class="center-align">案件追加</h2>
      </nav>
      <form action="/addNewItem" method="POST">
        {{ csrf_field() }}
          <div class="input-field col s12">
            <input id="item_name" type="text" class="validate" name="item_name">
            <label for="item_name">案件名</label>
          </div>
          <div class="input-field col s12">
            <input id="delivery_date" type="text" class="datepicker" name="delivery_date">
            <label for="delivery_date">納期</label>
          </div>
          <div class="input-field col s12">
            <input id="unit_price" type="text" class="validate" name="unit_price">
            <label for="unit_price">単価</label>
          </div>
          <div class="input-field col s12">
            <select id="states" class="select" name="states">
              <option value="1" selected>未執筆</option>
              <option value="2">執筆済み</option>
              <option value="3">納品済み</option>
              <option value="4">請求済み</option>
            </select>
            <label for="states">ステータス</label>
          </div>
          <div class="input-field col s12">
            <select id="client_id" class="select" name="client_id">
              <option value="" disabled selected>クライアントを選んでください。</option>
              @foreach($list as $val)
              <option value="{{$val->id}}">{{$val->client_name}}</option>
              @endforeach
            </select>
            <label for="client_id">クライアント</label>
          </div>
          <div class="input-field col s12">
            <input id="memo" type="text" class="validate" name="memo">
            <label for="memo">備考</label>
          </div>
          <input type="submit" value="案件追加" class="waves-effect waves-light btn blue accent-1">
      </form>
      </div>
    </div>
@endsection