@extends('layouts.layout')
@section('title','請求書編集画面')

@section('body')
    <div class="row">
    <!--サイドメニュー-->
      <div class="col s0 l2">
        <ul id="slide-out" class="sidenav sidenav-fixed ">
          <li><a href="{{ url('/user')}}">クライアント一覧<i class="material-icons left">person</i></a></li>
          <li><a href="#">ユーザー情報管理<i class="material-icons left">person</i></a></li>
          <li><a href="{{ url('/editUser')}}">請求済みの請求書<i class="material-icons left">date_range</i></a></li>
        </ul>
      </div>
      
      <div class="col s12 offset-l1 l8">
    <nav class="header">
        <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
    <h2 class="center-align">請求書編集画面</h2>
    </nav>
    <form action="" method="POST">
        <div class="row">
        <!--請求先-->
            <div class="col s5">
                <p>請求先</p>
                <input type="text" name="" value="AAAA社">
                <p>請求日</p>
                <input type="text" class="datepicker">
                <p>請求番号</p>
                <input type="text" name="" value="2019060801">
                <p>件名</p>
                <input type="text" name="">
                <p>お支払い期限</p>
                <input type="text" class="datepicker">
                <br>
            </div>
            <!--請求元-->
            <div class="col s5">
                <p>請求者名</p>
                <input type="text" name="" value="ユーザー名">
                <p>郵便番号</p>
                <input type="text" name="" value="000-0000">
                <p>住所</p>
                <input type="text" name="" value="京都府">
                <input type="text" name="" value="京都市">
                <input type="text" name="" value="〇〇〇〇">
                <input type="text" name="" value="〇〇アパート 2-A">
                <p>TEL</p>
                <input type="text" name="" value="000-0000-0000">
                <p>FAX</p>
                <input type="text" name="" value="111-1111-1111">
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
                <td>〇〇に関するライティング</td>
                <td>1</td>
                <td>本</td>
                <td>3,000円</td>
                <td>3,000円</td>
            </tr>
            <tr>
                <td>〇〇に関するライティング</td>
                <td>２</td>
                <td>本</td>
                <td>1,000円</td>
                <td>2,000円</td>
            </tr>
            <tr>
                <td>〇〇に関するライティング</td>
                <td>４</td>
                <td>本</td>
                <td>2,000円</td>
                <td>8,000円</td>
            </tr>
            <tr>
                <td>〇〇に関するライティング</td>
                <td>６</td>
                <td>本</td>
                <td>1,000円</td>
                <td>6,000円</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>小計</td>
                <td>〇〇円</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>消費税（8%）</td>
                <td>〇〇円</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>源泉徴収税（10.21%）</td>
                <td>〇〇円</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>合計</td>
                <td>〇〇〇〇〇〇円</td>
            </tr>
        </table>
        <br>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="textarea1" class="materialize-textarea"></textarea>
              <label for="textarea1">備考欄</label>
            </div>
          </div>
        <p>お振込み先:〇〇銀行〇〇支店　00000000</p>
        <input type="submit" value="請求書の作成">
    </form>
    </div>
    </div>
@endsection