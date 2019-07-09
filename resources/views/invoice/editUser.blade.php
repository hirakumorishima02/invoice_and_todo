@extends('layouts.layout')
@section('title','ユーザー情報管理')

@section('body')
      <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
      
     <div class="container col s12 offset-l3">
      <h2>ユーザー情報管理</h2>
      <form action="/updateUser" method="POST">
        {{ csrf_field() }}
          <div class="input-field col s12">
            <input id="billing_name" type="text" class="validate" name="billing_name" value="{{$list->billing_name}}">
            <label for="billing_name">請求者名</label>
          </div>
          <div class="input-field col s12">
            <input id="tel_number" type="text" class="validate" name="tel_number" value="{{$list->tel_number}}">
            <label for="tel_number">電話番号(任意)</label>
          </div>
          <div class="input-field col s12">
            <input id="fax_number" type="text" class="validate" name="fax_number" value="{{$list->fax_number}}">
            <label for="fax_number">FAX(任意)</label>
          </div>          
          <div class="input-field col s12">
            <input id="email" type="text" class="validate" name="email" value="{{$list->email}}">
            <label for="emailr">E-mail(任意)</label>
          </div>
          <div class="input-field col s12">
            <input id="postal_code" type="text" class="validate" name="postal_code" value="{{$list->postal_code}}">
            <label for="postal_code">郵便番号</label>
          </div>
          <div class="input-field col s12">
            <input id="address" type="text" class="validate" name="address" value="{{$list->address}}">
            <label for="address">住所</label>
          </div>
          <div class="input-field col s12">
            <input id="bank_account" type="text" class="validate" name="bank_account" value="{{$list->bank_account}}">
            <label for="bank_account">銀行口座</label>
          </div>
          <div class="input-field col s12">
            <input id="billing_message" type="text" class="validate" name="billing_message" value="{{$list->billing_message}}">
            <label for="billing_message">請求書の備考欄(任意)</label>
          </div>
           <input type="submit" value="ユーザー情報の登録・更新" class="waves-effect waves-light btn blue accent-1">
           <input type="hidden" name="id" value="{{$list->id}}">
           <input type="hidden" name="user_id" value="{{$list->user_id}}">
      </form>
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