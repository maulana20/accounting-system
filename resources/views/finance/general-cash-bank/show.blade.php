@extends('layouts.app')

@section('title', trans('finance.general-cash-bank'))

@section('content')

@inject('period', 'App\Period')
@inject('coa', 'App\Coa')
@inject('general_cash_bank_model', 'App\GeneralCashBank')

<div class="pull-right">
    {{ $general_cash_bank->period_begin }} {{ $period::$statics['type'][$general_cash_bank->status] }}
</div>
<h3 class="page-header">
    {{ trans('finance.general-cash-bank') }}
</h3>
{!! Form::model($general_cash_bank, ['route' => ['general-cash-bank.show', $general_cash_bank->id],'method' => 'patch']) !!}
<div class="row">
    <div class="col-md-3">
        {!! FormField::text('created_at', [
            'value' => request('date', date('Y-m-d', strtotime($general_cash_bank->created_at))),
            'label' => trans('app.date'),
            'class' => 'input-sm date-select',
            'placeholder' => 'yyyy-mm-dd',
        ]) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        {!! FormField::radios('position', $general_cash_bank_model::$statics['position'], ['label' => __('accounting.position'), 'required' => false]) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-6">
       {!! FormField::select('coa_id', $coa::selectRaw("id, CONCAT_WS(' ', code, name) as code_name")->pluck('code_name', 'id'), ['label' => __('accounting.coa-code'), 'required' => false]) !!}
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
        @foreach ($gl_analysis as $key => $value)
        <tbody>
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $value->code }} {{ $value->name }}</td>
                <td>{{ $value->desc }}</td>
                <td class="text-right">{{ format_rp($value->value) }}</td>
                @inject('gl_analysis', 'App\GlAnalysis')
                <td>{{ $gl_analysis::$statics['position'][$value->position] }}</td>
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
