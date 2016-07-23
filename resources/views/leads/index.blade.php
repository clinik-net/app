<?php $user = Session::get('user'); ?>
@extends('layouts.dashboard')

@section('content')
<div ng-controller="LeadsController" ng-init="getList()">
    <div class="modal fade" tabindex="-1" role="dialog" id="removePrompt">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{ trans('app.remove') }}</h4>
                </div>
                <div class="modal-body">
                    <p>{{ trans('lead.remove') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('app.cancel') }}</button>
                    <button type="button" class="btn btn-danger" ng-click="remove()">{{ trans('app.remove') }}</button>
                </div>
            </div>
        </div>
    </div>
    <h3 class="col-xs-12">
        {{ trans('app.leads') }}
        <button class="btn btn-fill btn-success pull-right" ng-click="toggleSearch()">
            <span class="fa fa-search"></span>
            {{ trans('lead.find') }}
        </button>
        <a href="<?php echo url('/leads/create')?>" style="margin-right: 10px" class="btn btn-fill btn-success pull-right">
            <span class="fa fa-plus"></span>
            {{ trans('lead.create') }}
        </a>
    </h3>

    <div class="row" ng-show="search">
        <div class="col-md-12">
            <form name="searchForm">
                <div class="form-group">
                    <input type="text" ng-model="searchFilter" class="form-control" placeholder="{{ trans('lead.find') }}"/>
                </div>  
            </form>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ trans('app.contact') }}</th>
                <th>{{ trans('app.phone') }}</th>
                <th>{{ trans('app.email') }}</th>
                <th>{{ trans('app.status') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="lead in leads | filter:searchFilter">
                <td>[[ lead.contacts[0]['name'] ]]</td>
                <td>[[ lead.contacts[0]['phone'] ]]</td>
                <td>[[ lead.contacts[0]['email'] ]]</td>
                <td>
                    <span class="label" ng-class="{'label-danger': lead.active === false, 'label-success': lead.active === true}">
                        <span ng-show="lead.active === true">{{ trans('app.active') }}</span>
                        <span ng-show="lead.active === false">{{ trans('app.inactive') }}</span>
                    </span>
                </td>
                <td>
                    <a href="<?php echo url('/leads/view')?>/[[ lead._id ]]">
                        <span class="fa fa-stethoscope"></span>
                    </a>

                    <a href="<?php echo url('/leads/edit')?>/[[ lead._id ]]">
                        <span class="fa fa-pencil"></span>
                    </a>

                    <a href="javascript:;" ng-click="removePrompt(lead)">
                        <span class="fa fa-remove"></span>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection