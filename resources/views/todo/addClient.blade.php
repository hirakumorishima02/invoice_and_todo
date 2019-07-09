@extends('layouts.layout')
@section('title','クライアント追加')

@section('body')
    <div class="col s12 offset-l1 l8">
    <nav class="header">
    <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
    <h2 class="center-align">クライアント追加</h2>
    </nav>
      {{Form::open(['url' => 'addNewClient'])}}
        {{ csrf_field() }}
          <div class="input-field col s12">
            {{Form::text('client_name', '',['class' => 'validate', 'id' => 'client_name'])}}
            {{Form::label('client_name','クライアント名')}}
          </div>
          <div class="input-field col s12">
            {{Form::text('personnel', '',['class' => 'validate', 'id' => 'personnel'])}}
            {{Form::label('personnel', '担当者名')}}
          </div>
          <div class="input-field col s12">
	            <select id="sales_tax_rate" class="select" name="sales_tax_rate">
	              <option value="" disabled selected>消費税率を選んでください。</option>
	              <option value="1">0%(税抜)</option>
	              <option value="2">8%(税込)</option>
	              <option value="3">10%(税込)</option>
	              <option value="4">5%(税込)</option>
	            </select>
	            <label for="sales_tax_rate">消費税率</label>
	          </div>
          <div class="input-field col s12">
	            <select id="withholding_tax_rate" class="select" name="withholding_tax_rate">
	              <option value="" disabled selected>源泉徴収税率を選んでください。</option>
	              <option value="1">0%(無課税)</option>
	              <option value="2">10.21%</option>
	              <option value="3">20.42%</option>
	            </select>
	            <label for="withholding_tax_rate">源泉徴収税率</label>
	          </div>
	          <div class="input-field col s12">
	            <select id="tax_category" class="select" name="tax_category">
	              <option value="" disabled selected>税区分を選んでください。</option>
	              <option value="1">税別</option>
	              <option value="2">税込</option>
	              <option value="3">免税</option>
	            </select>
	            <label for="tax_category">消費税の表示設定</label>
	          </div>
	          <div class="input-field col s12">
	            <select id="fraction" class="select" name="fraction">
	              <option value="" disabled selected>端数処理を選んでください。</option>
	              <option value="1">切り上げ</option>
	              <option value="2">切り下げ</option>
	            </select>
	            <label for="fraction">消費税・源泉徴収税の端数処理</label>
	          </div>
          {{Form::submit('クライアント情報追加', ['class' => 'waves-effect waves-light btn blue accent-1'])}}
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
