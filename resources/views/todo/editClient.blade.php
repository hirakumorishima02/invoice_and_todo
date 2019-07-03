@extends('layouts.layout')
@section('title','クライアント一覧')

@section('body')
    <!--サイドメニューここから-->
    <div class="row">
      <div class="col s0 l2">
        <ul id="slide-out" class="sidenav sidenav-fixed ">
          <li><a href="{{url('/user')}}">クライアント一覧<i class="material-icons left">person</i></a></li>
          <li><a href="#">案件カレンダー<i class="material-icons left">date_range</i></a></li>
          <li><a href="{{url('/addClient')}}">クライアント追加<i class="material-icons left">add</i></a></li>
          <li><a href="{{url('addItem')}}">案件追加<i class="material-icons left">add</i></a></li>
        </ul>
      </div>
    <!--サイドメニューここまで-->
      <div class="col s12 offset-l1 l8">
      <nav class="header">
          <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
      <h2 class="center-align">クライアント情報管理</h2>
      </nav>
      <h3>{{$list->client_name}}</h3>
      {{Form::open(['url' => route('updateClient',['id'=>$list->id]),'method'=>'POST'])}}
        {{ csrf_field() }}
          <div class="input-field col s12">
            {{Form::text('client_name', $list->client_name,['class' => 'validate', 'id' => 'client_name'])}}
            {{Form::label('client_name','クライアント名')}}
          </div>
          <div class="input-field col s12">
            {{Form::text('personnel', $list->personnel,['class' => 'validate', 'id' => 'personnel'])}}
            {{Form::label('personnel', '担当者名')}}
          </div>
          <div class="input-field col s12">
            {{Form::text('client_tel_number', $list->client_tel_number ,['class' => 'validate', 'id' => 'client_tel_number'])}}
            {{Form::label('client_tel_number', '連絡先')}}
          </div>
          <div class="input-field col s12">
            {{Form::text('client_address', $list->client_address,['class' => 'validate', 'id' => 'client_address'])}}
            {{Form::label('client_address', '住所')}}
          </div>
          <div class="input-field col s12">
            {{Form::select('sales_tax_rate', ['0.00' => '消費税率を選んでください','1.00'=>'0%(税抜)','2.00'=>'8%(税込)','3.00'=>'5%(税込)'] , $list->sales_tax_rate , ['class' => 'select', 'id' => 'sales_tax_rate'])}}
            {{Form::label('sales_tax_rate', '消費税率')}}
          </div>
          <div class="input-field col s12">
            {{Form::select('withholding_tax_rate', ['0.00' => '源泉徴収税率を選んでください','1.00'=>'0%(無課税)','2.00'=>'10.21%', '3.00'=>'20.42%'] , $list->withholding_tax_rate, ['class' => 'select', 'id' => 'withholding_tax_rate'])}}
            {{Form::label('withholding_tax_rate', '源泉徴収税率')}}
          </div>
          <div class="input-field col s12">
            {{Form::select('tax_category', ['税区分を選んでください。','税別','税込', '免税'] , $list->tax_category, ['class' => 'select', 'id' => 'tax_category'])}}
            {{Form::label('tax_category', '税区分')}}
          </div>
          <div class="input-field col s12">
            {{Form::select('fraction', ['端数処理を選んでください。','切り上げ','切り下げ', '四捨五入'] , $list->fraction, ['class' => 'select', 'id' => 'fraction'])}}
            {{Form::label('fraction', '税区分')}}
          </div>
          {{Form::submit('クライアント情報追加', ['class' => 'waves-effect waves-light btn blue accent-1'])}}
      {{Form::close()}}
      {{Form::open(['url' => route('deleteClient',['id'=>$list->id]),'method'=>'POST'])}}
          {{ method_field('delete') }}
          {{csrf_field()}}
          {{Form::submit('クライアント情報削除', ['class' => 'waves-effect waves-light btn red lighten-1'])}}
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