@extends('layouts.app')

@section('title', trans('finance.general-cash-bank'))

@section('content')

@inject('coa', 'App\Coa')
@php $positionEnum = App\Enums\positionEnum::class; @endphp

<div class="pull-right">
    {{ $generalCashBank->financialTrans->period_begin }} {{ $generalCashBank->financialTrans->period->status }}
</div>
<h3 class="page-header">
    {{ trans('finance.general-cash-bank') }}
</h3>
{!! Form::model($generalCashBank, ['route' => ['general-cash-bank.show', $generalCashBank->id],'method' => 'patch']) !!}
<div class="row">
    <div class="col-md-3">
        {!! FormField::text('created_at', [
            'value' => request('date', date('Y-m-d', strtotime($generalCashBank->financialTrans->created_at))),
            'label' => trans('app.date'),
            'class' => 'input-sm date-select',
            'placeholder' => 'yyyy-mm-dd',
        ]) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        {!! FormField::radios('position', [
            '1' => 'Kas Bank Masuk',
            '2' => 'Kas Bank Keluar',
        ], ['label' => __('accounting.position'), 'required' => false]) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-6">
    {!! FormField::select('coa_to', $coa::pluckCode(), ['label' => __('accounting.coa-code'), 'required' => false]) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! FormField::text('desc', ['label' => __('accounting.description'), 'required' => true]) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            {!! Form::submit(__('app.edit'), ['class' => 'btn btn-success']) !!}
            {{ link_to_route('general-cash-bank.index', __('app.cancel'), [], ['class' => 'btn btn-default']) }}
        </div>
    </div>
</div>
{!! Form::close() !!}
<hr>
<div class="panel panel-default table-responsive">
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ trans('accounting.coa-code') }}</th>
                <th>{{ trans('app.description') }}</th>
                <th class="text-right">{{ trans('app.total') }}</th>
                <th>{{ trans('accounting.position') }}</th>
                <th class="text-center">{!! link_to_route('general-cash-bank.index', trans('app.add')) !!}</th>
            </tr>
        </thead>
        @foreach ($analysis as $key => $data)
        <tbody>
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->coaFrom->code }} {{ $data->coaFrom->name }}</td>
                <td>{{ $data->desc }}</td>
                <td class="text-right">{{ format_rp($data->value) }}</td>
                <td>{{ $positionEnum::fromValue($data->position === $positionEnum::DEBET ? $positionEnum::CREDIT : $positionEnum::DEBET)->description }}</td>
                <td class="text-center">
                    {!! link_to_route('general-cash-bank.index', trans('app.edit')) !!} |
                    {!! link_to_route('general-cash-bank.index', trans('app.delete')) !!}
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
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
