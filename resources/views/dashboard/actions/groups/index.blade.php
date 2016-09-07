@extends('layout.dashboard')

@section('content')
<div class="content-panel">
    @if(isset($sub_menu))
    @include('dashboard.partials.sub-sidebar')
    @endif
    <div class="content-wrapper">
        <div class="header sub-header">
            <span class="uppercase">
                <i class="ion ion-ios-keypad"></i> {{ trans('dashboard.actions.action_groups') }}
            </span>
            <a class="btn btn-sm btn-success pull-right" href="{{ route('dashboard.actions.groups.add') }}">
                {{ trans('dashboard.actions.groups.add.title') }}
            </a>
            <div class="clearfix"></div>
        </div>
        @include('dashboard.partials.errors')
        <div class="row">
            <div class="col-sm-12 striped-list" id="action-group-list">
                @forelse($groups as $group)
                <div class="row striped-list-item" data-group-id="{{ $group->id }}">
                    <div class="col-xs-6">
                        <h4>
                            @if($groups->count() > 1)
                            <span class="drag-handle"><i class="ion ion-drag"></i></span>
                            @endif
                            {{ $group->name }}
                            <span class="label label-info">{{ $group->actions->count() }}</span>
                        </h4>
                    </div>
                    <div class="col-xs-6 text-right">
                        <a href="{{ route('dashboard.actions.groups.edit', [$group->id]) }}" class="btn btn-default">{{ trans('forms.edit') }}</a>
                        <a href="/dashboard/actions/groups/{{ $group->id }}/delete" class="btn btn-danger confirm-action" data-method="DELETE">{{ trans('forms.delete') }}</a>
                    </div>
                </div>
                @empty
                <div class="list-group-item text-danger">{{ trans('dashboard.actions.groups.none') }}</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@stop
