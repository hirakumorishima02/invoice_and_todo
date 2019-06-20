@extends('layouts.index_layout')
@section('title','invoice&todo')

@section('body')
    <nav class="navbar">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo right"><i class="material-icons">check_circle</i>Invoice&ToDo</a>
        <ul id="nav-mobile" class="left">
          <li><a href="{{ url('/register') }}">無料会員登録</a></li>
          <li><a href="{{ url('/login') }}">ログイン</a></li>
          <li><a href="">お問い合わせ</a></li>
        </ul>
      </div>
    </nav>
    
    <div class="slider fullscreen">
      <ul class="slides">
        <li>
          <img src="img/top1.png">
          <div class="caption center-align">
            <h3 class="red-text text-accent-1">案件管理</h3>
            <h5 class="red-text text-accent-1">クライアントごとに案件が管理できます</h5>
          </div>
        </li>
        <li>
          <img src="img/top2.png">
          <div class="caption left-align">
            <h3 class="red-text text-accent-1">請求書作成</h3>
            <h5 class="red-text text-accent-1">完了した案件はそのまま請求書に自動記載</h5>
          </div>
        </li>
        <li>
          <img src="img/top3.jpg">
          <div class="caption right-align">
            <h3 class="blue-text text-accent-4">カレンダーで案件管理</h3>
            <h5 class="blue-text text-accent-4">カレンダーで案件スケジュールを一括閲覧</h5>
          </div>
        </li>
        <li>
          <img src="img/top4.jpg">
          <div class="caption center-align">
            <h3 class="green-text text-darken-1">無料で利用可能</h3>
            <h5 class="green-text text-darken-1">全てのサービスが無料で利用できます</h5>
          </div>
        </li>
      </ul>
    </div>
    
    <a href="index.html" class="btn-large waves-effect waves-red startBtn">Sign Up</a>
    
    <!--Parallaxここから-->
    <div class="parallaxes">
      <div class="section white">
        <div class="row container">
          <h2 class="header">Todo</h2>
          <p class="grey-text text-darken-3 lighten-3">ライティングの案件をクライアントごとに管理できます。ライティングの案件をクライアントごとに管理できます。ライティングの案件をクライアントごとに管理できます。ライティングの案件をクライアントごとに管理できます。</p>
        </div>
      </div>
      <div class="parallax-container">
        <div class="parallax"><img src="img/writing.jpg">
        <a href="#!" class="btn-large waves-effect waves-red startBtn">Sign Up</a>
        </div>
      </div>
      
      <div class="section white">
        <div class="row container">
          <h2 class="header">Invoice</h2>
          <p class="grey-text text-darken-3 lighten-3">完了した案件はそのまま請求書に自動記載できます。自ら請求書に書き込む手間が省けます。完了した案件はそのまま請求書に自動記載できます。自ら請求書に書き込む手間が省けます。完了した案件はそのまま請求書に自動記載できます。</p>
        </div>
      </div>
      <div class="parallax-container">
        <div class="parallax"><img src="img/invoice.jpg"></div>
      </div>
    </div>
    <!--Parallaxここまで-->
    
    <!--利用者の声-->
  <div class="row">
    <div class="row container">
      <h2 class="header">Customer Voice</h2>
      <p class="grey-text text-darken-3 lighten-3">多くの利用者の方にご利用いただいています。多くの利用者の方にご利用いただいています。多くの利用者の方にご利用いただいています。多くの利用者の方にご利用いただいています。多くの利用者の方にご利用いただいています。</p>
    </div>
    <div class="col s4 m4">
      <div class="card">
        <div class="card-image">
          <img src="img/person3.jpg">
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>
    <div class="col s4 m4">
      <div class="card">
        <div class="card-image">
          <img src="img/person2.jpg">
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>
    <div class="col s4 m4">
      <div class="card">
        <div class="card-image">
          <img src="img/person1.jpg">
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>
  </div>
@endsection