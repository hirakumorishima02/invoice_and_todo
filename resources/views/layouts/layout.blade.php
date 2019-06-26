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
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <title>@yield('title')</title>
  </head>

  <body>
@yield('body')
<script src="{{ secure_asset('js/main.js') }}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
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
      </script>
      <!--　サイドバーの初期化用JS　-->
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.sidenav');
          var instances = M.Sidenav.init(elems, {});
        });
      </script>
      <!--　select optionの初期化用JS　-->
      <script>
        const Selector = document.querySelectorAll('.select');
          M.FormSelect.init(Selector,{});
      </script>
      <!--datepickerの初期化用JS-->
      <script>
        const Calendar = document.querySelector('.datepicker');
        M.Datepicker.init(Calendar,{});
      </script>
      <!--datepickerのフォーマットを変える-->
      <script>
        $( function() {
          $( ".datepicker" ).datepicker({format: 'yyyy-mm-dd'});
        } );
      </script>
      @stack('scripts')
  </body>
</html>