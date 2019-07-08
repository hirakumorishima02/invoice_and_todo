@extends('layouts.layout')
@section('title','案件追加')

@section('body')
      <div class="col s12 offset-l1 l8">
      <nav class="header">
          <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
      <h2 class="center-align">請求書の追加</h2>
      </nav>
      {{Form::open(['url' => 'addNewInvoice'])}}
        {{ csrf_field() }}
          <div class="input-field col s12">
            {{Form::text('invoice_title', '',['class' => 'validate', 'id' => 'invoice_title'])}}
            {{Form::label('invoice_title','請求書のタイトル')}}
          </div>
          <div class="input-field col s12">
            {{Form::text('billing_name', $clientList->client_name,['class' => 'validate', 'id' => 'billing_name'])}}
            {{Form::label('billing_name','請求宛先名称')}}
          </div>
          <div class="input-field col s12">
            {{Form::text('billing_address', $clientList->client_address,['class' => 'validate', 'id' => 'billing_address'])}}
            {{Form::label('billing_address','請求先住所')}}
          </div>
          <div class="input-field col s12">
            {{Form::text('payment_day', '',['class' => 'datepicker', 'id' => 'payment_day'])}}
            {{Form::label('payment_day','支払い期限')}}
          </div>
          <div class="input-field col s12">
            {{Form::text('billing_day', '',['class' => 'datepicker', 'id' => 'billing_day'])}}
            {{Form::label('billing_day','請求日')}}
          </div>
          <div class="input-field col s12">
            @foreach($user_infoList as $user_info)
            {{Form::text('invoice_message', $user_info->billing_message,['class' => 'validate', 'id' => 'invoice_message'])}}
            @endforeach
            {{Form::label('invoice_message','請求書の備考欄')}}
          </div>
          {{Form::submit('請求書の追加', ['class' => 'waves-effect waves-light btn blue accent-1'])}}
          {{Form::hidden('subtotal', 0)}}
          {{Form::hidden('withholding_tax', 0)}}
          {{Form::hidden('tax_amount', 0)}}
          {{Form::hidden('sum_price', 0)}}
          {{Form::hidden('client_id', $id)}}
      {{Form::close()}}
      </div>
    </div>
    <div class="row">
    <div class="col s12 offset-l3 l8">
      @if ($errors->any())
          <div>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    </div>
    </div>
@endsection