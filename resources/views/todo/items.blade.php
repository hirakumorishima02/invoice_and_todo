@extends('layouts.layout')
@section('title','案件一覧')
    
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
    <h2 class="center-align">案件一覧</h2>
    </nav>
    @foreach($clientList as $val)
    @if($id == $val->id)
    <h3>{{$val->client_name}}</h3>
    @endif
    @endforeach
        <table class="highlight centered">
            <thead>
                <tr>
                    <th>案件名</th>
                    <th>納期</th>
                    <th>単価</th>
                    <th>ステータス</th>
                    <th>メモ</th>
                    <th>編集・削除</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($list as $val)
                    @if($id == $val->client_id)
                <tr>
                    <th>{{$val->item_name}}</th>
                    <th>{{$val->delivery_date}}</th>
                    <th>{{$val->unit_price}}円</th>
                    <th>
                        <form method="POST" action="/updateItemStates/{{$val->id}}" id="states_form">
                          {{csrf_field()}}
                          <div class="input-field col s12">
                            <select id="states" class="select" name="states">
                              <option value="1" {{$val->states == '1' ? 'selected' : ""}}>未執筆</option>
                              <option value="2" {{$val->states == '2' ? 'selected' : ""}}>請求書挿入</option>
                            </select>
                            <label for="states">ステータス</label>
                          </div>
                        </form>
                    </th>
                    <th>{{$val->memo}}</th>
                    <th><a href="/editItem/{{$val->id}}">管理画面</a></th>
                </tr>
                    @endif
                    @endforeach
            </tbody>
        </table>
    </div>
    </div>
    
    <!--請求書選択モーダル-->
    <div class="modal" id="modal01">
        <div class="overLay modalClose"></div>
            <div class="inner">
                  {{Form::open(['url' => 'insertInvoice', 'id' => 'modal_select' ])}}
                  {{ csrf_field() }}
                <select  class="select" onchange="submit(this.form)">
                  @foreach($invoiceList as $val)
                  <option value="{{$val->id}}">{{$val->invoice_title}}</option>
                  @endforeach
                </select>
                <label for="client_id">登録先の請求書</label>
                <button type="submit" class="btn btn-primary">請求書へ挿入</button> 
                {{Form::close()}}
            <a href="" class="modalClose">Close</a>
            </div>
    </div>


@endsection