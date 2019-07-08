@extends('layouts.layout')
@section('title','ユーザー画面')

@section('body')
    <!-- タブのボタン部分 -->
  <nav class="nav-extended">
    <div class="nav-wrapper center-align">
      
      <h2 class="brand-logo">Invoice&ToDo</h2>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab right"><a class="tab_btn tab" href="#todo">案件</a></li>
        <li class="tab right"><a class="tab_btn tab" href="#invoice">請求書</a></li>
      </ul>
    </div>
  </nav>
    
    <!-- タブのコンテンツ部分 -->
    <div class="tab_item {{$active1}} row" id="todo">
      <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
        <!--案件のコンテンツ-->
        <div class="container col s12 offset-l2">
          <h4 class="center-align">クライアント一覧</h4>
          <table class="clientList highlight centered">
            <thead>
              <tr>
                <th>クライアント名</th>
                <th>クライアント情報管理</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list as $val)
              <tr>
                <td><a href="/items/{{ $val->id  }}">{{$val->client_name}}</a></td>
                <td><a href="/editClient/{{ $val->id  }}"><button type="button"class="btn-floating waves-effect blue btn-small"><i class="material-icons">mode_edit</i></button></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
      
    <div class="tab_item {{$active2}} row" id="invoice">
      <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
        <!--請求書のコンテンツ-->
        <div class="container col s12 offset-l3">
          <h2>請求書一覧</h2>
          <div class="collection invoiceList">
            @foreach($list as $val)
            <a href="/invoices/{{ $val->id }}" class="collection-item">{{$val->client_name}}</a>
            @endforeach
          </div>
        </div>
    </div>
<script>
  $(function() {
    //location.hashで#以下を取得 変数hashに格納
    var hash = location.hash; 
    //hashの中に#tab～が存在するか調べる。
    hash = (hash.match(/^#invoice\d+$/) || [])[0];
    //hashに要素が存在する場合、hashで取得した文字列（#tab2,#tab3等）から#より後を取得(tab2,tab3) 
    if($(hash).length){
     var tabname = hash.slice(1) ;
    } else{
 　　　　// 要素が存在しなければtabnameにtab1を代入する
 　　　　var tabname = "";
    }
    //コンテンツを一度すべて非表示にし、
      $('.tab_item').css('display','none');
    //一度タブについているクラスselectを消し、
      $('.tabs li').removeClass('is-active-item');
      var tabno = $('ul.tab_area li#' + tabname).index();
    //クリックされたタブと同じ順番のコンテンツを表示します。
      $('.tab_item').eq(tabno).fadeIn();
    //クリックされたタブのみにクラスselectをつけます。
      $('ul.tabs li').eq(tabno).addClass('is-active-item')
    });
</script>
@endsection