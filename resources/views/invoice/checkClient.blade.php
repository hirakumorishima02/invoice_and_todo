@extends('layouts.layout')
@section('title','案件追加')

@section('body')
    <!--サイドメニューここから-->
    <div class="row">
      <div class="col s0 l2">
        <ul id="slide-out" class="sidenav sidenav-fixed ">
          <li><a href="{{ url('/user/2')}}">請求書一覧<i class="material-icons left">person</i></a></li>
          <li><a href="#">案件カレンダー<i class="material-icons left">date_range</i></a></li>
          <li><a href="{{ url('/editUser')}}">ユーザー情報管理<i class="material-icons left">person</i></a></li>
          <li><a href="{{ url('/checkClient')}}">請求書作成<i class="material-icons left">add</i></a></li>
        </ul>
      </div>
    <!--サイドメニューここまで-->
      <div class="col s12 offset-l1 l8">
      <nav class="header">
          <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
      <h2 class="center-align">請求書の追加</h2>
      </nav>
    <form method="POST" action="/toAddInvoice" id="clients_form">
      {{csrf_field()}}
      <div class="input-field col s12">
        <select id="client_id" class="select" name="client_id">
          <option value="" disabled selected>クライアントを選んでください。</option>
          @foreach($list as $val)
          <option value="{{$val->id}}">{{$val->client_name}}</option>
          @endforeach
        </select>
        <label for="client_id">クライアント</label>
      </div>
    </form>
      </div>
    </div>

@endsection
@push('scripts')
        <script type="text/javascript">
        $(function(){
          $("#client_id").change(function(){
            location.href = $("#clients_form").attr('action') + '/' + $(this).val();
          });
        });
    </script>
@endpush