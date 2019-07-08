@extends('layouts.layout')
@section('title','案件納期カレンダー')

@section('body')

<div class="col s12 offset-l1 l8">
    <nav class="header">
    <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating"><i class="medium z-depth-1 material-icons">add</i></a>
    <h2 class="center-align">クライアント追加</h2>
    </nav>
{!! $cal_tag !!}
</div>
</div>
@endsection