@extends('layouts.app')

@section('title', trans('accounting.journal'))

@section('content')
<div class="pull-right">
    {{ link_to_route('journal.index', 'Input Akun Baru', ['action' => 'create'], ['class' => 'btn btn-success']) }}
</div>
<h3 class="page-header">
    {{ trans('accounting.journal') }}
</h3>

<div class="row">
    @foreach ($journal as $data)
        <pre>{{ $data }}</pre>
    @endforeach
</div>
@endsection
