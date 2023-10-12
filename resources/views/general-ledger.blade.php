@extends('layouts.app')

@section('title', trans('accounting.general-ledger'))

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        {{ Form::open(['method' => 'get','class' => 'form-inline pull-right']) }}
        @inject('coa', 'App\Coa')
        {!! FormField::select('coa_id', $coa->pluck('name','id'), ['label' => __('accounting.coa-to')]) !!}
        {!! FormField::text('from_date', [
            'value' => request('date', $from_date),
            'label' => trans('app.from-date'),
            'class' => 'input-sm date-select',
            'placeholder' => 'yyyy-mm-dd',
        ]) !!}
        {!! FormField::text('to_date', [
            'value' => request('date', $to_date),
            'label' => trans('app.to-date'),
            'class' => 'input-sm date-select',
            'placeholder' => 'yyyy-mm-dd',
        ]) !!}
        {{ Form::submit(trans('app.search'), ['class' => 'btn btn-sm']) }}
        {{ link_to_route('general-ledger.index', trans('app.reset')) }}
        {{ Form::close() }}
        <h3 class="panel-title" style="padding:6px 0">
            {{ trans('accounting.general-ledger') }}
        </h3>
    </div>
    <div class="panel-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>{{ trans('app.date') }}</th>
                    <th>{{ trans('app.trans-id') }}</th>
                    <th>{{ trans('accounting.coa-to') }}</th>
                    <th>{{ trans('accounting.coa-from') }}</th>
                    <th>{{ trans('accounting.description') }}</th>
                    <th class="text-right">{{ trans('accounting.begining') }}</th>
                    <th class="text-right">{{ trans('accounting.debet') }}</th>
                    <th class="text-right">{{ trans('accounting.credit') }}</th>
                    <th class="text-right">{{ trans('accounting.ending') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $id = NULL;
                    $coaTo = NULL;
                    $ending = 0;
                @endphp
                @foreach ($generalLedgers as $data)
                <tr>
                    @php
                        if ($coaTo != $data->coa_to) $ending = 0;
                        $ending += ($coaTo != $data->coa_to ? $data->begining : 0) + ($data->position === $positionEnum::CREDIT ? $data->value : $data->value * -1);
                    @endphp
                    @if ($id != $data->financial_trans_id)
                        <td>{{ $data->created_at }}</td>
                    @else
                        <td>&nbsp;</td>
                    @endif
                    <td>{{ $data->financial_trans_id }}</td>
                    @if ($coaTo != $data->coa_to)
                        <td>{{ $data->coaTo->code }}</td>
                    @else
                        <td>&nbsp;</td>
                    @endif
                    <td>{{ $data->coaFrom->code }}</td>
                    <td>{{ $data->desc }}</td>
                    @if ($coaTo != $data->coa_to)
                        <td class="text-right">{{ format_rp($data->begining) }}</td>
                    @else
                        <td>&nbsp;</td>
                    @endif
                    <td class="text-right">{{ $data->position === $positionEnum::CREDIT ? format_rp($data->value) : 0 }}</td>
                    <td class="text-right">{{ $data->position === $positionEnum::DEBET ? format_rp($data->value) : 0 }}</td>
                    <td class="text-right">{{ format_rp($ending) }}</td>
                </tr>
                @php
                    $id = $data->financial_trans_id;
                    $coaTo = $data->coa_to;
                @endphp
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
