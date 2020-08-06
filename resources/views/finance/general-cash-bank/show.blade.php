@extends('layouts.app')

@section('title', trans('accounting.journal'))

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title" style="padding:6px 0">
            {{ trans('finance.general-cash-bank') }}
        </h3>
    </div>
    <div class="panel-body">
        {{ $general_cash_bank }}
    </div>
</div>
@endsection
