@extends('layouts.layout')
@section('title','請求書編集画面')

@section('body')
    <div class="row">
    <!--サイドメニュー-->
      <div class="col s0 l2">
        <ul id="slide-out" class="sidenav sidenav-fixed ">
          <li><a href="{{ url('/user#invoice')}}">クライアント一覧<i class="material-icons left">person</i></a></li>
          <li><a href="#">案件カレンダー<i class="material-icons left">date_range</i></a></li>
          <li><a href="{{ url('/editUser')}}">ユーザー情報管理<i class="material-icons left">person</i></a></li>
          <li><a href="{{ url('/addInvoice')}}">請求書作成<i class="material-icons left">add</i></a></li>
        </ul>
      </div>
      
      <div class="col s12 offset-l1 l8">
    <nav class="header">
        <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
    <h2 class="center-align">請求書画面</h2>
    </nav>
    <form action="" method="POST">
        <div class="row">
        <!--請求先-->
            <div class="col s5">
                <!--invoiceList-->
                @foreach($invoiceList as $val)
                <p>請求先</p>　<!--請求宛先名称-->
                <input type="text" name="billing_name" value="{{$val->billing_name}}">
                <p>請求日</p> 
                <input type="text" class="datepicker" name="billing_day" value="{{$val->billing_day}}">
                <p>請求番号</p> <!--自動割り当て-->
                <input type="text" name="" value="2019060801">
                <p>件名</p> <!--請求書のタイトル-->
                <input type="text" name="invoice_title" value="{{$val->invoice_title}}">
                <p>お支払い期限</p>
                <input type="text" class="datepicker" name="payment_day" value="{{$val->payment_day}}">
                @endforeach
                <!--invoiceListここまで-->
                <br>
            </div>
            <!--請求元-->
            <div class="col s5">
                <!--user_infoList-->
                @foreach($user_infoList as $val)
                <p>請求者名</p>
                <input type="text" name="billing_name" value="{{$val->billing_name}}">
                <p>郵便番号</p>
                <input type="text" name="postal_code" value="{{$val->postal_code}}">
                <p>住所</p>
                <input type="text" name="address" value="{{$val->address}}">
                <p>TEL</p>
                <input type="text" name="tel_number" value="{{$val->tel_number}}">
                <p>FAX</p>
                <input type="text" name="fax_number" value="{{$val->fax_number}}">
                @endforeach
                <!--user_infoListここまで-->
                <br>
            </div>
        </div>
        <!--請求表-->
        <table border="1">
            <tr>
                <th>品番・品名</th>
                <th>数量</th>
                <th>単位</th>
                <th>単価</th>
                <th>金額</th>
            </tr>
            <tr>
                <!--billList-->
                @foreach($billList as $val)
                <td>{{$val->billing_item}}</td>
                <td>{{$val->quantity}}</td>
                <td>{{$val->unit}}</td>
                <td>{{$val->bill_unit_price}}円</td>
                <td>{{$val->quantity * $val->bill_unit_price}}</td>
                @endforeach
                <!--billListここまで-->
            </tr>
            <tr>
                <!--invoiceList-->
                @foreach($invoiceList as $val)
                <td></td>
                <td></td>
                <td></td>
                <td>小計</td>
                <td>{{$val->subtotal}}円</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>消費税（8%）</td>
                <td>{{$val->tax_amount}}円</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>源泉徴収税</td>
                <td>{{$val->withholding_tax_rate}}円</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>合計</td>
                <td>{{$val->sum_price}}円</td>
                @endforeach
                <!--invoiceListここまで-->
            </tr>
        </table>
        <br>
          <div class="row">
            <div class="input-field col s12">
              <!--user_infoList-->
              @foreach($user_infoList as $val)
              <textarea id="textarea1" class="materialize-textarea">{{$val->billing_message}}</textarea>
              <label for="textarea1">備考欄</label>
            </div>
          </div>
            <p>お振込み先:{{$val->bank_accont}}</p>
            @endforeach
            <!--user_infoListここまで-->
            <input type="submit" value="請求書の作成">
    </form>
    </div>
    </div>
@endsection