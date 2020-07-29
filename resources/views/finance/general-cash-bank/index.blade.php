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
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th class="text-center">{{ trans('app.table_no') }}</th>
                    <th>{{ trans('app.date') }}</th>
                    <th>{{ trans('app.user-name') }}</th>
                    <th>{{ trans('finance.vou-code') }}</th>
                    <th class="text-center">{{ __('app.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($general_cash_bank as $index => $data)
                <tr>
                    <td class="text-center">{{ ($index + 1) }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->vou }}</td>
                    <td class="text-center">
                        {!! link_to_route('general-cash-bank.index', trans('app.edit')) !!} |
                        {!! link_to_route('general-cash-bank.index', trans('app.delete')) !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
