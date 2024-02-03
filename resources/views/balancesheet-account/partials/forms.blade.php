@inject('group_account', 'App\GroupAccount')
@php 
    $lod = [
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
    ];
@endphp
@if (Request::get('action') == 'create')
    {!! Form::open(['route' => 'balancesheet-account.store']) !!}
    <div class="row">
        <div class="col-md-4">{!! FormField::text('code', ['label' => __('accounting.coa-code'), 'required' => true]) !!}</div>
    </div>
    {!! FormField::text('name', ['label' => __('accounting.coa-name'), 'required' => true]) !!}
    {!! FormField::select('group_account_id', $group_account->pluck('name','id'), ['label' => __('accounting.group-account'), 'required' => true]) !!}
    <div class="row">
        <div class="col-md-4">{!! FormField::select('lod', $lod, ['label' => __('accounting.lod'), 'required' => true]) !!}</div>
    </div>
    {!! FormField::text('desc', ['label' => __('accounting.description'), 'required' => false]) !!}
    {!! Form::submit(__('app.add'), ['class' => 'btn btn-success']) !!}
    {{ link_to_route('balancesheet-account.index', __('app.cancel'), [], ['class' => 'btn btn-default']) }}
    {!! Form::close() !!}
@endif
@if (Request::get('action') == 'edit' && $data)
    {!! Form::model($item, ['route' => ['balancesheet-account.update', $item->id],'method' => 'patch']) !!}
    <div class="row">
        <div class="col-md-4">{!! FormField::text('code', ['label' => __('accounting.coa-code'), 'required' => true, 'disabled' => true]) !!}</div>
    </div>
    {!! FormField::text('name', ['label' => __('accounting.coa-name'), 'required' => true]) !!}
    {!! FormField::select('group_account_id', $group_account->pluck('name','id'), ['label' => __('accounting.group-account'), 'required' => true]) !!}
    <div class="row">
        <div class="col-md-4">{!! FormField::select('lod', $lod, ['label' => __('accounting.lod'), 'required' => true]) !!}</div>
    </div>
    {!! FormField::text('desc', ['label' => __('accounting.description'), 'required' => false]) !!}
    {!! Form::submit(__('app.edit'), ['class' => 'btn btn-success']) !!}
    {{ link_to_route('balancesheet-account.index', __('app.cancel'), [], ['class' => 'btn btn-default']) }}
    {!! Form::close() !!}
@endif
