@extends('layouts.layout')
@section('title','案件一覧')
    
@section('body')
    <div class="col s12 offset-l1 l8">
    <nav class="header">
        <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
    <h2 class="center-align">案件一覧</h2>
    </nav>

    <h3>{{$client->client_name}}</h3>

        <table class="highlight centered">
            <thead>
                <tr>
                    <th>案件名</th>
                    <th>納期</th>
                    <th>単価</th>
                    <th>ステータス</th>
                    <th>メモ</th>
                    <th>編集・削除</th>
                </tr>
            </thead>
            <tbody>
                <!--変数化して、formsのindex番号を割り振るための$index-->
                <?php $index = 0; ?>
                    @foreach($list as $val)
                <tr>
                    <th>{{$val->item_name}}</th>
                    <th>{{$val->delivery_date}}</th>
                    <th>{{$val->unit_price}}円</th>
                    <th>
                        <form method="POST" action="/updateItemStates/{{$val->id}}" id="states_form">
                          {{csrf_field()}}
                          <div class="input-field col s12">
                            <select id="states" class="select" name="states" onchange="modalOpen{{$val->id}}()">
                              <option value="1" {{$val->states == '1' ? 'selected' : ""}}>未執筆</option>
                              <option value="2" {{$val->states == '2' ? 'selected' : ""}}>請求書挿入</option>
                            </select>
                            <label for="states">ステータス</label>
                          </div>
                        </form>
                    <script>
                        function modalOpen{{$val->id}}() {
                            //alert(document.forms[{{$loop->index - 1}}].states.selectedIndex);
                          if(document.forms[{{$index}}].states.selectedIndex==1){
                            //document.getElementById('states').selectedIndex
                            document.modal_form.item_id.value = '{{$val->id}}';
                            $('#modal01').modal('open');
                          }
                        }
                    </script>
                    <?php $index ++; ?>
                    </th>
                    <th>{{$val->memo}}</th>
                    <th><a href="/editItem/{{$val->id}}">管理画面</a></th>
                </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    </div>
    
    <!--請求書選択モーダル-->
    <div class="modal" id="modal01">
        <div class="overLay modalClose"></div>
            <div class="inner">
                  {{Form::open(['url' => 'addInvoice', 'id' => 'modal_select', 'name' => 'modal_form' ])}}
                  {{ csrf_field() }}
                <select name="invoice_id" class="select" onchange="submit(this.form)">
                  @foreach($invoiceList as $val)
                  <option value="{{$val->id}}">{{$val->invoice_title}}</option>
                  @endforeach
                </select>
                <label for="client_id">登録先の請求書</label>
                <button type="submit" class="btn btn-primary">請求書へ挿入</button> 
                {{Form::hidden('item_id', '')}}
                {{Form::hidden('states', '2')}}
                {{Form::hidden('client_id', $client->id)}}
                @foreach($list as $val)
                @endforeach
                {{Form::close()}}
            <a href="" class="modalClose">Close</a>
            </div>
    </div>


@endsection