<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style>
        .td-height {
            text-align: center;
        }
        .invoice-title {
            text-align: center;
        }
        th{
            background-color: #C0C0C0;
        }
        span{
            padding-right:100px;
        }
    </style>
  </head>
  <body>
@foreach($invoiceList as $val)

<table>
    <tr><td></td><td></td><td></td><td><p>{{$val->billing_day}}</p></td></tr>
    <tr><td></td><td></td><td></td><td><p>請求番号:{{$val->billing_day.'-'.$val->id}}</p></td></tr>
</table>

<h2 class="invoice-title">請求書</h2>

<table>
    <tr>
        <td>
            <!--請求先の情報-->
            <!--請求宛先名称-->
            <h3><u>{{$val->billing_name}}</u></h3>
            <!--請求書のタイトル-->
            <p>件名:{{$val->invoice_title}}</p>
            <p>下記のとおりご請求申し上げます。</p>
            <h2><u>ご請求金額<span>¥{{ceil($val->sum_price)}}-</span></u></h2>
            <!--支払期限-->
            <p>お支払い期限:{{$val->billing_day}}</p>
            @endforeach
        </td>
        <td>
            <!--請求元の情報-->
            @foreach($user_infoList as $val)
            
            <!--請求者名-->
            <h3>{{$val->billing_name}}</h3>
            <!--郵便番号-->
            <p>{{$val->postal_code}}</p>
            <!--住所-->
            <p>{{$val->address}}</p>
            <!--TEL-->
            <p>{{$val->tel_number}}</p>
            <!--FAX-->
            <p>{{$val->tel_number}}</p>
            
            @endforeach
            
            <br>
        </td>
    </tr>
</table>

<!--請求表-->
<table border="1" class="bill-table">
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
    <td class="td-height" border="0"></td>
    <td class="td-height"></td>
    <td class="td-height">小計</td>
    <td class="td-height">{{ $subtotal }}円</td>
</tr>
<tr>
    <td class="td-height"></td>
    <td class="td-height"></td>
    <td class="td-height">消費税</td>
    @if($val->sales_tax_rate == 1.00)
        @if($val->fraction == 1)
        <td class="td-height">{{ceil($sales_subtotal = $subtotal * 0)}}円</td>
        @else
        <td class="td-height">{{floor($sales_subtotal = $subtotal * 0)}}円</td>
        @endif
    @elseif($val->sales_tax_rate == 2.00)
        @if($val->fraction == 1)
        <td class="td-height">{{ceil($sales_subtotal = $subtotal * 0.08)}}円</td>
        @else
        <td class="td-height">{{floor($sales_subtotal = $subtotal * 0.08)}}円</td>
        @endif
    @elseif($val->sales_tax_rate == 3.00)
        @if($val->fraction == 1)
        <td class="td-height">{{ceil($sales_subtotal = $subtotal * 0.1)}}円</td>
        @else
        <td class="td-height">{{floor($sales_subtotal = $subtotal * 0.1)}}円</td>
        @endif
    @else
        @if($val->fraction == 1)
        <td class="td-height">{{ceil($sales_subtotal = $subtotal * 0.05)}}円</td>
        @else
        <td class="td-height">{{floor($sales_subtotal = $subtotal * 0.05)}}円</td>
        @endif
    @endif
</tr>
<tr>
    <td></td>
    <td></td>
    <td class="td-height">源泉徴収税</td>
    @if($val->withholding_tax_rate == 1.00)
        @if($val->fraction == 1)
        <td class="td-height">{{ceil($withholding_subtotal = $subtotal * 0)}}円</td>
        @else
        <td class="td-height">{{floor($withholding_subtotal = $subtotal * 0)}}円</td>
        @endif
    @elseif($val->withholding_tax_rate == 2.00)
        @if($val->fraction == 1)
        <td class="td-height">{{ceil($withholding_subtotal = $subtotal * 0.1021)}}円</td>
        @else
        <td class="td-height">{{floor($withholding_subtotal = $subtotal * 0.1021)}}円</td>
        @endif
    @elseif($val->withholding_tax_rate == 3.00)
        @if($val->fraction == 1)
        <td class="td-height">{{ceil($withholding_subtotal = $subtotal * 0.2042)}}円</td>
        @else
        <td class="td-height">{{floor($withholding_subtotal = $subtotal * 0.2042)}}円</td>
        @endif
    @endif
</tr>
<tr>
    <td class="td-height"></td>
    <td class="td-height"></td>
    <td class="td-height">合計</td>
        @if($val->fraction == 1)
        <td class="td-height">{{$sum_price = floor($subtotal - $sales_subtotal - $withholding_subtotal)}}円</td>
        @else
        <td class="td-height">{{$sum_price = ceil($subtotal - $sales_subtotal - $withholding_subtotal)}}円</td>
        @endif
    @endforeach
    <!--invoiceListここまで-->
</tr>
</table>

<!--user_infoList-->
@foreach($user_infoList as $val)
<p>{{$val->billing_message}}</p>
<p>お振込先:<br>{{$val->bank_account}}</p>
@endforeach
<!--user_infoListここまで-->
</div>

</div>
</body>
</html>