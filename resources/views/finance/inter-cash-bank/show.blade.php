@extends('layouts.app')

@section('title', trans('finance.inter-cash-bank'))

@section('content')

<div class="pull-right">
    {{ $form->period }} {{ $form->status }}
</div>
<h3 class="page-header">
    {{ trans('finance.inter-cash-bank') }}
</h3>
{!! Form::model($form, ['route' => ['inter-cash-bank.show', $form->id],'method' => 'patch']) !!}
<div class="row">
    <div class="col-md-3">
        {!! FormField::text('created_at', [
            'value' => request('date', date('Y-m-d', strtotime($form->created_at))),
            'label' => trans('app.date'),
            'class' => 'input-sm date-select',
            'placeholder' => 'yyyy-mm-dd',
        ]) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-6">
       {!! FormField::select('coa_from', $coas, ['label' => trans('accounting.coa-from'), 'required' => false]) !!}
    </div>
    <div class="col-md-6">
       {!! FormField::select('coa_to', $coas, ['label' => trans('accounting.coa-to'), 'required' => false]) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        {!! FormField::text('value', ['label' => __('app.total'), 'required' => false]) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! FormField::text('desc', ['label' => __('accounting.description'), 'required' => false]) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            {!! Form::submit(__('app.edit'), ['class' => 'btn btn-success']) !!}
            {{ link_to_route('inter-cash-bank.index', __('app.cancel'), [], ['class' => 'btn btn-default']) }}
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
                <th>{{ trans('finance.vou-code') }}</th>
                <th>{{ trans('accounting.coa-code') }}</th>
                <th>{{ trans('app.description') }}</th>
                <th class="text-right">{{ trans('accounting.debet') }}</th>
                <th class="text-right">{{ trans('accounting.credit') }}</th>
            </tr>
        </thead>
        <tbody>
			@php $vou = null; $no = 0; @endphp
            @foreach ($listing as $data)
            <tr>
                <td>{{ ($data->financialTrans->vou != $vou) ? ++$no : '' }}</td>
                <td>{{ ($data->financialTrans->vou != $vou) ? $data->financialTrans->vou : '' }}</td>
                <td>{{ $data->coaFrom->code }} {{ $data->coaFrom->name }}</td>
                <td>{{ $data->desc }}</td>
                <td class="text-right">{{ ($data->position == "Debet") ? format_rp($data->value) : '' }}</td>
                <td class="text-right">{{ ($data->position == "Credit") ? format_rp($data->value) : '' }}</td>
            </tr>
            @php $vou = $data->financialTrans->vou; @endphp
            @endforeach
        </tbody>
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
