@extends('layouts.layout')
@section('title','案件追加')

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
      <h2 class="center-align">案件追加</h2>
      </nav>
      {{Form::open(['url' => 'addNewItem'])}}
        {{ csrf_field() }}
          <div class="input-field col s12">
            {{Form::text('item_name', '',['class' => 'validate', 'id' => 'item_name'])}}
            {{Form::label('item_name','案件名')}}
          </div>
          <div class="input-field col s12">
            {{Form::text('delivery_date', '',['class' => 'datepicker', 'id' => 'delivery_date'])}}
            {{Form::label('delivery_date','納期')}}
          </div>
          <div class="input-field col s12">
            {{Form::text('unit_price', '',['class' => 'validate', 'id' => 'unit_price'])}}
            {{Form::label('unit_price','単価')}}
          </div>
          <div class="input-field col s12">
            {{Form::select('states', ['未執筆','執筆済み','納品済み', '請求済み'] , null, ['class' => 'select', 'id' => 'states'])}}
            {{Form::label('states', 'ステータス')}}
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
            {{Form::textarea('memo', null, ['class' => 'validate', 'id' => 'memo'])}}
            {{Form::label('memo','備考欄')}}
          </div>
          {{Form::submit('案件追加', ['class' => 'waves-effect waves-light btn blue accent-1'])}}
      {{Form::close()}}
      </div>
    </div>
@endsection