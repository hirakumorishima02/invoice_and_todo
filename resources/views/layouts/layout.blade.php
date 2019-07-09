<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!--MaterializeCSS-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Google Web Font-->
    <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru&display=swap" rel="stylesheet">
    <!--CSS-->
    <link href="{{ secure_asset('css/styles.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
  </head>

  <body>
    <div class="row">
    <!--サイドメニュー-->
      <div class="col s0 l2">
        <ul id="slide-out" class="sidenav sidenav-fixed">
          <li><a href="{{url('/user')}}">サイトトップ<i class="material-icons left">home</i></a></li>
          <li><a href="/calendar">案件カレンダー<i class="material-icons left">date_range</i></a></li>
              <li>
                <a class="collapsible-header" data-target="dropdown1">請求書管理<i class="material-icons">arrow_drop_down</i></a>
                    <ul id='dropdown1' class='dropdown-content'>
                      <li><a href="{{ url('/editUser')}}">ユーザー情報管理<i class="material-icons left">person</i></a></li>
                      <li><a href="{{ url('/checkClient')}}">請求書作成<i class="material-icons left">add</i></a></li>
                    </ul>
              </li>
              <li>
                <a class="collapsible-header" data-target="dropdown2">タスク管理<i class="material-icons">arrow_drop_down</i></a>
                    <ul id="dropdown2" class='dropdown-content'>
                      <li><a href="{{url('/addClient')}}">クライアント追加<i class="material-icons left">add</i></a></li>
                      <li><a href="{{url('addItem')}}">案件追加<i class="material-icons left">add</i></a></li>
                    </ul>
              </li>
            <li><a href="{{ url('/logout') }}">ログアウト<i class="material-icons left">exit_to_app</i></a></li>
        </ul>
      </div>
      <!--サイドメニューここまで-->
      
@yield('body')

<script src="{{ secure_asset('js/main.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!--Materialize JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<!-- タブボタンのJS -->
      
      <script>
        $(function() {
          /*クリックイベント*/
          $('.tab_btn').on('click', function() {
            $('.tab_item').removeClass("is-active-item");
            $($(this).attr("href")).addClass("is-active-item");
            $('.tab_btn').removeClass('is-active-btn');
            $(this).addClass('is-active-btn');
          });
        });

      //サイドバーの初期化用JS
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.sidenav');
          var instances = M.Sidenav.init(elems, {});
         var drop = document.querySelectorAll('.dropdown-trigger');
        var drop_instances = M.Dropdown.init(drop, {});
         var drop_in_nav = document.querySelectorAll('.collapsible-header');
        var drop_instances = M.Dropdown.init(drop_in_nav, {});
        });

      // datepickerの初期化用JS
        const Calendar = document.querySelector('.datepicker');
        M.Datepicker.init(Calendar,{});

      // datepickerのフォーマットを変える
        $( function() {
          $( ".datepicker" ).datepicker({format: 'yyyy-mm-dd'});
        } );

      // モーダルウィンドウの開閉処理
        $(function(){
            $('select').formSelect();
            $('.modal').modal();
            $('#states').on('change',function(){
              //alert();
            });
        });
        </script>
      @stack('scripts')
  </body>
</html>