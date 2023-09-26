@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<h3 class="page-header">Transaksi Keuangan</h3>
<div class="row">
    <div class="col-md-12">
        <p class="text-muted">{{ config('app.name', 'Laravel') }} adalah sistem pengolahan data keuangan dan merekam kejadian transaksi, pilih untuk melakukan transaksi baru :</p>
        <button type="button" class="btn btn-default navbar-btn" onclick="window.open('{{ route('general-cash-bank.index') }}', '_self')">{{ trans('finance.general-cash-bank') }}</button>
        <button type="button" class="btn btn-default navbar-btn" onclick="window.open('{{ route('inter-cash-bank.index') }}', '_self')">{{ trans('finance.inter-cash-bank') }}</button>
    </div>
</div>
@endsection