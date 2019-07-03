@extends('layouts.layout')
@section('title','請求書')

@section('body')
<div class="pdf-body">
    @foreach($invoiceList as $val)
    <div class="row">
        <div class="col3 right-align">
            <p>{{$val->billing_day}}</p>
            <p>請求番号:{{$val->billing_day.'-'.$val->id}}</p>
        </div>
        <h3 class="center-align">請求書</h3>
    </div>
        <div class="row">
            <!--請求先-->
            <div class="col s5">
            <!--invoiceList-->
            <!--請求宛先名称-->
            <h5><u>{{$val->billing_name}}</u></h5>

            <!--請求書のタイトル-->
            <p>件名:{{$val->invoice_title}}</p>
            <p>下記のとおりご請求申し上げます。</p>

            <h5><u>ご請求金額 ¥{{$val->sum_price}}-</u></h5>
            <!--支払期限-->
            <p>お支払い期限:{{$val->billing_day}}</p>

            @endforeach
            
            <!--invoiceListここまで-->
            <br>
            </div>
            <!--請求元-->
            <div class="col s5 offset-s2">
            <!--user_infoList-->
            @foreach($user_infoList as $val)
            <!--請求者名-->
            <h6>{{$val->billing_name}}</h6>
            <!--郵便番号-->
           <p>{{$val->postal_code}}</p>
            <!--住所-->
            <p>{{$val->address}}</p>
            <!--TEL-->
            <p>{{$val->tel_number}}</p>
            <!--FAX-->
            <p>{{$val->tel_number}}</p>
            
            @endforeach
            <!--user_infoListここまで-->
                <br>
            </div>
        </div>
        <!--請求表-->
        <table border="1" class="striped">
            <tr>
                <th class="td-height">品番・品名</th>
                <th class="td-height">数量</th>
                <th class="td-height">単価</th>
                <th class="td-height">金額</th>
            </tr>
                <!--billList-->
                <?php $subtotal = 0 ?>
                @foreach($billList as $val)
            <tr>
                <td class="td-height">{{$val->billing_item}}</td>
                <td class="td-height">{{$val->quantity}}</td>
                <td class="td-height">{{$val->bill_unit_price}}円</td>
                <td class="td-height">{{$val->quantity * $val->bill_unit_price}}</td>
            </tr>
                <?php $subtotal += $val->bill_unit_price; ?>
                @endforeach
                <!--billListここまで-->
            <tr>
                <!--invoiceList-->
                @foreach($clientList as $val)
                <td class="td-height"></td>
                <td class="td-height"></td>
                <td class="td-height">小計</td>
                <td class="td-height">{{ $subtotal }}円</td>
            </tr>
            <tr>
                <td class="td-height"></td>
                <td class="td-height"></td>
                <td class="td-height">消費税</td>
                @if($val->sales_tax_rate == 1.00)
                <td class="td-height">{{$sales_subtotal = $subtotal * 0}}円</td>
                @elseif($val->sales_tax_rate == 2.00)
                <td class="td-height">{{$sales_subtotal = $subtotal * 0.08}}円</td>
                @elseif($val->sales_tax_rate == 3.00)
                <td class="td-height">{{$sales_subtotal = $subtotal * 0.05}}円</td>
                @endif
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="td-height">源泉徴収税</td>
                @if($val->withholding_tax_rate == 1.00)
                <td class="td-height">{{$withholding_subtotal = $subtotal * 0}}円</td>
                @elseif($val->withholding_tax_rate == 2.00)
                <td class="td-height">{{$withholding_subtotal = $subtotal * 0.1021}}円</td>
                @elseif($val->withholding_tax_rate == 3.00)
                <td class="td-height">{{$withholding_subtotal = $subtotal * 0.2042}}円</td>
                @endif
            </tr>
            <tr>
                <td class="td-height"></td>
                <td class="td-height"></td>
                <td class="td-height">合計</td>
                <td class="td-height">{{$subtotal - $sales_subtotal - $withholding_subtotal}}円</td>
                @endforeach
                <!--invoiceListここまで-->
            </tr>
        </table>
            <!--user_infoList-->
            @foreach($user_infoList as $val)
            <p>{{$val->billing_message}}</p>
            <p>お振込み先:　{{$val->bank_account}}</p>
            @endforeach
            <!--user_infoListここまで-->
</div>
  <!--deleteFromBill用form-->
  @foreach($billList as $val)
            <form method="post" action="{{ url('/deleteFromBill', $val->id ) }}" id="form_{{$val->id}}">
              {{ csrf_field() }}
              {{ method_field('delete') }}
            </form>
  @endforeach
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