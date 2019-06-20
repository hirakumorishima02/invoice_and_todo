@extends('layouts.layout')
@section('title','クライアント追加')

@section('body')
    <!--サイドメニューここから-->
    <div class="row">
      <div class="col s0 l2">
        <ul id="slide-out" class="sidenav sidenav-fixed ">
          <li><a href="{{url('/user')}}">クライアント一覧<i class="material-icons left">person</i></a></li>
          <li><a href="#">案件カレンダー<i class="material-icons left">date_range</i></a></li>
          <li><a href="'/addClient'">クライアント追加<i class="material-icons left">add</i></a></li>
          <li><a href="{{url('addItem')}}">案件追加<i class="material-icons left">add</i></a></li>
        </ul>
      </div>
    <!--サイドメニューここまで-->
      <div class="col s12 offset-l1 l8">
    <nav class="header">
        <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
    <h2 class="center-align">クライアント追加</h2>
    </nav>
      <form action="addNewClient" method="POST">
        {{ csrf_field() }}
          <div class="input-field col s12">
            <input id="client_name" type="text" class="validate" name="client_name">
            <label for="client_name">クライアント名</label>
          </div>
          <div class="input-field col s12">
            <input id="personnel" type="text" class="validate" name="personnel">
            <label for="personnel">担当者名</label>
          </div>
          <div class="input-field col s12">
            <input id="client_tel_number" type="text" class="validate" name="client_tel_number">
            <label for="client_tel_number">連絡先</label>
          </div>
          <div class="input-field col s12">
            <input id="client_address" type="text" class="validate" name="client_address">
            <label for="client_address">住所</label>
          </div>
          <div class="input-field col s12">
            <select id="sales_tax_rate" class="select" name="sales_tax_rate">
              <option value="" disabled selected>消費税率を選んでください。</option>
              <option value="1">0%(税抜)</option>
              <option value="2">8%(税込)</option>
              <option value="3">10%(税込)</option>
              <option value="4">5%(税込)</option>
            </select>
            <label for="sales_tax_rate">消費税率</label>
          </div>
          <div class="input-field col s12">
            <select id="withholding_tax_rate" class="select" name="withholding_tax_rate">
              <option value="" disabled selected>源泉徴収税率を選んでください。</option>
              <option value="1">0%(無課税)</option>
              <option value="2">10.21%</option>
              <option value="3">20.42%</option>
            </select>
            <label for="withholding_tax_rate">源泉徴収税率</label>
          </div>
          <div class="input-field col s12">
            <select id="tax_category" class="select" name="tax_category">
              <option value="" disabled selected>税区分を選んでください。</option>
              <option value="1">税別</option>
              <option value="2">税込</option>
              <option value="3">免税</option>
            </select>
            <label for="tax_category">税区分</label>
          </div>
          <div class="input-field col s12">
            <select id="fraction" class="select" name="fraction">
              <option value="" disabled selected>端数処理を選んでください。</option>
              <option value="1">切り上げ</option>
              <option value="2">切り下げ</option>
              <option value="3">四捨五入</option>
            </select>
            <label for="fraction">税区分</label>
          </div>
          <input type="submit" value="クライアント情報追加" class="waves-effect waves-light btn blue accent-1">
      </form>
      </div>
    </div>
@endsection