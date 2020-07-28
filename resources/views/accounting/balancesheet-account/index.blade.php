@extends('layouts.app')

@section('title', trans('accounting.balancesheet-account'))

@section('content')
<div class="pull-right">
    {{ link_to_route('balancesheet-account.index', 'Input Akun Baru', ['action' => 'create'], ['class' => 'btn btn-success']) }}
</div>
<h3 class="page-header">
    {{ trans('accounting.balancesheet-account') }}
</h3>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default table-responsive">
            <div class="panel-heading">Activa</div>
            <table class="table table-condensed">
                <tbody>
                    @foreach ($activa as $data)
                    <tr>
                        @if (!empty($data->parent))
                        <td style="padding-left: 25px;">
                            {{ $data->name }}
                            @if (!empty($data->coa_list))
                                @foreach (explode(',', $data->coa_list) as $coa)
                                    <div>{{ $coa }}</div>
                                @endforeach
                            @endif
                        </td>
                        @else
                        <td>
                            {{ $data->name }}
                            @if (!empty($data->coa_list))
                                @foreach (explode(',', $data->coa_list) as $coa)
                                    <div style="background-color: #f5f6fa; padding-left: 6px; font-size: 12px;">
                                        {!! link_to_route('balancesheet-account.index', explode('@', $coa)[1], ['action' => 'edit', 'id' =>  explode('@', $coa)[0]]) !!} {{ explode('@', $coa)[2] }}
                                    </div>
                                @endforeach
                            @endif
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default table-responsive">
            <div class="panel-heading">Passiva</div>
            <table class="table table-condensed">
                <tbody>
                    @foreach ($passiva as $data)
                    <tr>
                        @if (!empty($data->parent))
                        <td style="padding-left: 25px;">
                            {{ $data->name }}
                            @if (!empty($data->coa_list))
                                @foreach (explode(',', $data->coa_list) as $coa)
                                    <div>{{ $coa }}</div>
                                @endforeach
                            @endif
                        </td>
                        @else
                        <td>
                            {{ $data->name }}
                            @if (!empty($data->coa_list))
                                @foreach (explode(',', $data->coa_list) as $coa)
                                    <div style="background-color: #f5f6fa; padding-left: 6px; font-size: 12px;">
                                        {!! link_to_route('balancesheet-account.index', explode('@', $coa)[1], ['action' => 'edit', 'id' =>  explode('@', $coa)[0]]) !!} {{ explode('@', $coa)[2] }}
                                    </div>
                                @endforeach
                            @endif
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        @include('accounting.balancesheet-account.partials.forms')
    </div>
</div>
@endsection
