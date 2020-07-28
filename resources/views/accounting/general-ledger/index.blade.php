@extends('layouts.app')

@section('title', trans('accounting.general-ledger'))

@section('content')
<div class="pull-right">
    {{ link_to_route('general-ledger.index', 'Input Akun Baru', ['action' => 'create'], ['class' => 'btn btn-success']) }}
</div>
<h3 class="page-header">
    {{ trans('accounting.general-ledger') }}
</h3>

<div class="row">
    @foreach ($general_ledger as $data)
        <pre>{{ $data }}</pre>
    @endforeach
</div>
@endsection
