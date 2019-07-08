@extends('layouts.layout')
@section('title','請求書一覧')
    
@section('body')
    <div class="col s12 offset-l1 l8">
    <nav class="header">
        <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
    <h2 class="center-align">請求書一覧</h2>
    </nav>
    <div class="collection invoiceList">
        @foreach($invoiceList as $val)
        <a href="/invoice/{{ $val->client_id }}/invoice/{{ $val->id }}" class="collection-item">{{$val->invoice_title}}</a>
        @endforeach
    </div>
    </div>
    </div>
    </div>
@endsection