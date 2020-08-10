@extends('layouts.app')

@section('title', trans('finance.inter-cash-bank'))

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        {{ Form::open(['method' => 'get','class' => 'form-inline pull-right']) }}
        {!! FormField::text('q', ['value' => request('q'), 'label' => trans('finance.vou-code'), 'class' => 'input-sm']) !!}
        {{ Form::submit(__('app.search'), ['class' => 'btn btn-sm']) }}
        {{ link_to_route('inter-cash-bank.index', trans('app.add')) }}
        {{ Form::close() }}
        <h3 class="panel-title" style="padding:6px 0">
            {{ trans('finance.inter-cash-bank') }}
        </h3>
    </div>
    <div class="panel-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th class="text-center">{{ trans('app.table_no') }}</th>
                    <th>{{ trans('app.date') }}</th>
                    <th>{{ trans('app.user-name') }}</th>
                    <th>{{ trans('finance.vou-in') }}</th>
                    <th>{{ trans('finance.vou-out') }}</th>
                    <th>{{ trans('app.description') }}</th>
                    <th class="text-right">{{ trans('app.total') }}</th>
                    <th class="text-center">{{ __('app.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inter_cash_bank as $index => $data)
                <tr>
                    <td class="text-center">{{ ($index + 1) }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->vou_in }}</td>
                    <td>{{ $data->vou_out }}</td>
                    <td>{{ $data->desc }}</td>
                    <td class="text-right">{{ format_rp($data->value) }}</td>
                    <td class="text-center">
                        {!! link_to_route('inter-cash-bank.show', trans('app.edit'), $data->id) !!} |
                        {!! link_to_route('inter-cash-bank.index', trans('app.delete')) !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
