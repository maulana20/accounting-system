@extends('layouts.app')

@section('title', trans('accounting.journal'))

@section('content')

@php $positionEnum = App\Enums\PositionEnum::class; @endphp

<div class="panel panel-default">
    <div class="panel-heading">
        {{ Form::open(['method' => 'get','class' => 'form-inline pull-right']) }}
        {!! FormField::text('from_date', [
            'value' => request('date', null),
            'label' => trans('app.from-date'),
            'class' => 'input-sm date-select',
            'placeholder' => 'yyyy-mm-dd',
        ]) !!}
        {!! FormField::text('to_date', [
            'value' => request('date', null),
            'label' => trans('app.to-date'),
            'class' => 'input-sm date-select',
            'placeholder' => 'yyyy-mm-dd',
        ]) !!}
        {{ Form::submit(trans('app.search'), ['class' => 'btn btn-sm']) }}
        {{ link_to_route('journal.index', trans('app.reset')) }}
        {{ Form::close() }}
        <h3 class="panel-title" style="padding:6px 0">
            {{ trans('accounting.journal') }}
        </h3>
    </div>
    <div class="panel-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>{{ trans('app.date') }}</th>
                    <th>{{ trans('app.trans-id') }}</th>
                    <th>{{ trans('accounting.coa-code') }}</th>
                    <th>{{ trans('accounting.coa-name') }}</th>
                    <th class="text-right">{{ trans('accounting.debet') }}</th>
                    <th class="text-right">{{ trans('accounting.credit') }}</th>
                </tr>
            </thead>
            <tbody>
                @php $id = NULL @endphp
                @foreach ($journal as $data)
                <tr>
                    @if ($id != $data->financial_trans_id)
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->financial_trans_id }}</td>
                    @else
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    @endif
                    <td>{{ $data->coaFrom->code }}</td>
                    <td>{{ $data->coaFrom->name }}</td>
                    <td class="text-right">{{ $data->position === $positionEnum::DEBET ? format_rp($data->value) : 0 }}</td>
                    <td class="text-right">{{ $data->position === $positionEnum::CREDIT ? format_rp($data->value) : 0 }}</td>
                </tr>
                @php $id = $data->financial_trans_id @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('ext_css')
{!! Html::style(url('css/plugins/jquery.datetimepicker.css')) !!}
@endsection

@push('ext_js')
{!! Html::script(url('js/plugins/jquery.datetimepicker.js')) !!}
@endpush

@section('script')
<script>
(function() {
    $('.date-select').datetimepicker({
        timepicker: false,
        format:'Y-m-d',
        closeOnDateSelect: true
    });
})();
</script>
@endsection
