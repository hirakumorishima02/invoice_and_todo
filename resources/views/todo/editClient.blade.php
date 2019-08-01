@extends('layouts.layout')
@section('title','クライアント一覧')

@section('body')
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
	            <select id="sales_tax_rate" class="select" name="sales_tax_rate" value="{{$list->sales_tax_rate}}">
                @if($list->sales_tax_rate == 1.00)
	              <option value="1" selected>0%(税抜)</option>
	              <option value="2">8%(税込)</option>
	              <option value="3">10%(税込)</option>
	              <option value="4">5%(税込)</option>
	              @elseif($list->sales_tax_rate == 2.00)
	              <option value="1">0%(税抜)</option>
	              <option value="2" selected>8%(税込)</option>
	              <option value="3">10%(税込)</option>
	              <option value="4">5%(税込)</option>
	              @elseif($list->sales_tax_rate == 3.00)
	              <option value="1">0%(税抜)</option>
	              <option value="2">8%(税込)</option>
	              <option value="3" selected>10%(税込)</option>
	              <option value="4">5%(税込)</option>
	              @else
	              <option value="1">0%(税抜)</option>
	              <option value="2">8%(税込)</option>
	              <option value="3">10%(税込)</option>
	              <option value="4" selected>5%(税込)</option>
	              @endif
	            </select>
	            <label for="sales_tax_rate">消費税率</label>
	          </div>
	          <div class="input-field col s12">
	              <select id="withholding_tax_rate" name="withholding_tax_rate" value="{{$list->withholding_tax_rate}}">
	              @if($list->withholding_tax_rate == 1.00)
	              <option value="1" selected>0%(無課税)</option>
	              <option value="2">10.21%</option>
	              <option value="3">20.42%</option>
	              <option value="4">5%</option>
	              @elseif($list->withholding_tax_rate == 2.00)
	              <option value="1">0%(無課税)</option>
	              <option value="2" selected>10.21%</option>
	              <option value="3">20.42%</option>
	              <option value="4">5%</option>
	              @elseif($list->withholding_tax_rate == 3.00)
	              <option value="1">0%(無課税)</option>
	              <option value="2">10.21%</option>
	              <option value="3" selected>20.42%</option>
	              <option value="4">5%</option>
	              @elseif($list->withholding_tax_rate == 4.00)
	              <option value="1">0%(無課税)</option>
	              <option value="2">10.21%</option>
	              <option value="3">20.42%</option>
	              <option value="4" selected>5%</option>
	              @endif
	            </select>
	            <label for="withholding_tax_rate">源泉徴収税率</label>
	          </div>
	          <div class="input-field col s12">
	            <select id="fraction" class="select" name="fraction">
	              @if($list->fraction == 1)
	              <option value="1" selected>切り上げ</option>
	              <option value="2">切り下げ</option>
	              @else
	              <option value="1">切り上げ</option>
	              <option value="2" selected>切り下げ</option>
	              @endif
	            </select>
	            <label for="fraction">消費税・源泉徴収税の端数処理</label>
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