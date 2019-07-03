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
    @foreach($invoiceList as $val)
  {{Form::open(['url' => route('makeInvoice',['clientId'=>$val->client_id, 'invoiceId' => $val->id]),'method'=>'POST', 'target'=>'_blank'])}}
    {{ csrf_field() }}
        <div class="row">
            <!--請求先-->
            <div class="col s5">
                <!--invoiceList-->

            <!--請求宛先名称-->
            {{Form::label('billing_name_clients','請求先')}}
            {{Form::text('billing_name_clients', $val->billing_name,['class' => 'validate', 'id' => 'billing_name_clients'])}}

            <!--自動割り当て-->
            {{Form::label('billing_day','請求日')}}
            {{Form::text('billing_day', $val->billing_day ,['class' => 'datepicker', 'id' => 'billing_day'])}}
            
            <!--請求番号 テーブルカラム無し-->
            {{Form::label('billing_number','請求番号')}}
            {{Form::text('billing_number', $val->billing_day.$val->id,['class' => 'validate', 'id' => 'billing_number'])}}

            <!--請求書のタイトル-->
            {{Form::label('invoice_title','件名')}}
            {{Form::text('invoice_title', $val->invoice_title ,['class' => 'validate', 'id' => 'invoice_title'])}}

            <!--支払期限-->
            {{Form::label('payment_day','お支払い期限日')}}
            {{Form::text('payment_day', $val->billing_day ,['class' => 'datepicker', 'id' => 'payment_day'])}}
            
            {{Form::hidden('invoice_id', $val->id)}}
            @endforeach
            <!--invoiceListここまで-->
            <br>
            </div>
            <!--請求元-->
            <div class="col s5">
            <!--user_infoList-->
            @foreach($user_infoList as $val)
            <!--請求者名-->
            {{Form::label('billing_name','請求者名')}}
            {{Form::text('billing_name', $val->billing_name,['class' => 'validate', 'id' => 'billing_name'])}}
            <!--郵便番号-->
            {{Form::label('postal_code','郵便番号')}}
            {{Form::text('postal_code', $val->postal_code,['class' => 'validate', 'id' => 'postal_code'])}}
            <!--住所-->
            {{Form::label('address','住所')}}
            {{Form::text('address', $val->address,['class' => 'validate', 'id' => 'address'])}}
            <!--TEL-->
            {{Form::label('tel_number','TEL')}}
            {{Form::text('tel_number', $val->tel_number,['class' => 'validate', 'id' => 'tel_number'])}}
            <!--FAX-->
            {{Form::label('fax_number','TEL')}}
            {{Form::text('fax_number', $val->tel_number,['class' => 'validate', 'id' => 'fax_number'])}}
            
            {{Form::hidden('userInfo_id',$val->id)}}
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
                <!--billList-->
                <?php $subtotal = 0 ?>
                @foreach($billList as $val)
            <tr>
                <td>{{$val->billing_item}}</td>
                <td>{{$val->quantity}}</td>
                <td>{{$val->unit}}</td>
                <td>{{$val->bill_unit_price}}円</td>
                <td>{{$val->quantity * $val->bill_unit_price}}</td>
                <td>
                  <a href="#" data-id="{{$val->id}}" class="waves-effect waves-light btn del">削除</a>
                </td>
            </tr>
                <?php $subtotal += $val->bill_unit_price; ?>
                @endforeach
                <!--billListここまで-->
            <tr>
                <!--invoiceList-->
                @foreach($clientList as $val)
                <td></td>
                <td></td>
                <td></td>
                <td>小計</td>
                <td>{{ $subtotal }}円</td>
                {{Form::hidden('subtotal',$subtotal)}}
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>消費税</td>
                @if($val->sales_tax_rate == 1.00)
                <td>{{$sales_subtotal = $subtotal * 0}}円</td>
                @elseif($val->sales_tax_rate == 2.00)
                <td>{{$sales_subtotal = $subtotal * 0.08}}円</td>
                @elseif($val->sales_tax_rate == 3.00)
                <td>{{$sales_subtotal = $subtotal * 0.05}}円</td>
                @endif
                {{Form::hidden('sales_subtotal',$sales_subtotal)}}
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>源泉徴収税</td>
                @if($val->withholding_tax_rate == 1.00)
                <td>{{$withholding_subtotal = $subtotal * 0}}円</td>
                @elseif($val->withholding_tax_rate == 2.00)
                <td>{{$withholding_subtotal = $subtotal * 0.1021}}円</td>
                @elseif($val->withholding_tax_rate == 3.00)
                <td>{{$withholding_subtotal = $subtotal * 0.2042}}円</td>
                @endif
                {{Form::hidden('withholding_subtotal',$withholding_subtotal)}}
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>合計</td>
                <td>{{$sum_price = $subtotal - $sales_subtotal - $withholding_subtotal}}円</td>
                {{Form::hidden('sum_price',$sum_price)}}
                @endforeach
                <!--invoiceListここまで-->
            </tr>
        </table>
        <br>
          <div class="row">
            <div class="input-field col s12">
              <!--user_infoList-->
              @foreach($user_infoList as $val)
              {{Form::label('billing_message','備考欄')}}
              {{Form::textarea('billing_message', $val->billing_message, ['id' => 'textarea1', 'class' => 'materialize-textarea'])}}
            </div>
          </div>
            <p>お振込み先:　{{$val->bank_account}}</p>
            @endforeach
            <!--user_infoListここまで-->
      {{Form::submit('請求書の作成', ['class' => 'waves-effect waves-light btn blue accent-1'])}}
  {{Form::close()}}

  <!--deleteFromBill用form-->
  @foreach($billList as $val)
            <form method="post" action="{{ url('/deleteFromBill', $val->id ) }}" id="form_{{$val->id}}">
              {{ csrf_field() }}
              {{ method_field('delete') }}
            </form>
  @endforeach
    </div>
    </div>
@endsection
@push('scripts')
 <!--deleteFromBill用JS--> 
    <script>
        var cmds = document.getElementsByClassName('del');
        var i;
        
        for (i=0; i < cmds.length; i++) {
            cmds[i].addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('請求書から削除しますか?')) {
                    document.getElementById('form_' + this.dataset.id).submit();
                }
            });
        }
    </script>
@endpush