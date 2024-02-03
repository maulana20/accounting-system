@extends('layouts.app')

@section('title', trans('accounting.trial-balance'))

@section('content')
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
        {{ link_to_route('trial-balance.index', trans('app.reset')) }}
        {{ Form::close() }}
        <h3 class="panel-title" style="padding:6px 0">
            {{ trans('accounting.trial-balance') }}
        </h3>
    </div>
    <div class="panel-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>{{ trans('accounting.group-account') }}</th>
                    <th>{{ trans('accounting.coa-name') }}</th>
                    <th class="text-right">{{ trans('accounting.begining') }}</th>
                    <th class="text-right">{{ trans('accounting.debet') }}</th>
                    <th class="text-right">{{ trans('accounting.credit') }}</th>
                    <th class="text-right">{{ trans('accounting.ending') }}</th>
                </tr>
            </thead>
            <tbody>
                @php $id = NULL; @endphp
                @foreach ($trialBalances as $data)
                <tr>
                    @if ($id != $data->groupAccount->id)
                        <td>{{ $data->groupAccount->name }}</td>
                    @else
                        <td>&nbsp;</td>
                    @endif
                    <td>{{ $data->code }} {{ $data->name }}</td>
                    <td class="text-right">{{ format_rp($data->begining) }}</td>
                    @php $analysis = $data->glAnalysis->first(); @endphp
                    <td class="text-right">{{ format_rp($analysis ? $analysis->debet : 0) }}</td>
                    <td class="text-right">{{ format_rp($analysis ? $analysis->credit : 0) }}</td>
                    <td class="text-right">{{ format_rp($analysis ? $analysis->ending : $data->begining) }}</td>
                </tr>
                @php $id = $data->groupAccount->id @endphp
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
