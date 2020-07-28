@extends('layouts.app')

@section('title', trans('accounting.trial-balance'))

@section('content')
<div class="pull-right">
    {{ link_to_route('trial-balance.index', 'Input Akun Baru', ['action' => 'create'], ['class' => 'btn btn-success']) }}
</div>
<h3 class="page-header">
    {{ trans('accounting.trial-balance') }}
</h3>

<div class="row">
    @foreach ($trial_balance as $data)
        <pre>{{ $data }}</pre>
    @endforeach
</div>
@endsection
