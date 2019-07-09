@extends('layouts.layout')
@section('title','ユーザー画面')

@section('body')
    <nav class="header">
    <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
    <h2 class="center-align">Invoice&Todo</h2>
    </nav>
        <div class="container col s12 offset-l3 l9">
          <table class="clientList highlight centered">
            <thead>
              <tr>
                <th>クライアント</th>
                <th>タスク一覧</th>
                <th>請求書一覧</th>
                <th>クライアント情報管理</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list as $val)
              <tr>
                <td>{{$val->client_name}}</td>
                <td><a href="/items/{{ $val->id  }}"><i class="material-icons">business_center</i></a></td>
                <td><a href="/invoices/{{ $val->id }}" class="collection-item"><i class="material-icons">chrome_reader_mode</i></a></td>
                <td><a href="/editClient/{{ $val->id  }}"><i class="material-icons">mode_edit</i></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
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