@extends('layouts.app')

@section('title', trans('accounting.journal'))

@section('content')


<div class="pull-right">
    @inject('period', 'App\Period')
    {{ $general_cash_bank->period_begin }} {{ $period::$statics['type'][$general_cash_bank->status] }}
</div>
<h3 class="page-header">
    {{ trans('finance.general-cash-bank') }}
</h3>

<div class="row">
    <div class="col-md-2">
        {!! FormField::text('created_at', [
            'value' => request('date', date('Y-m-d', strtotime($general_cash_bank->created_at))),
            'label' => trans('app.date'),
            'class' => 'input-sm date-select',
            'placeholder' => 'yyyy-mm-dd',
        ]) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {{ $general_cash_bank }}
    </div>
</div>
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
