<?php $user = Session::get('user'); ?>
@extends('layouts.dashboard')

<?php if (in_array('superadmin', $user['roles']) || in_array('admin', $user['roles'])): ?>
@section('content')
<div ng-controller="CompaniesController" ng-init="getList()">
    <div class="modal fade" tabindex="-1" role="dialog" id="removePrompt">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{ trans('app.remove') }}</h4>
                </div>
                <div class="modal-body">
                    <p>{{ trans('company.remove') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('app.cancel') }}</button>
                    <button type="button" class="btn btn-danger" ng-click="remove()">{{ trans('app.remove') }}</button>
                </div>
            </div>
        </div>
    </div>
    <h3 class="col-xs-12">
        {{ trans('app.companies') }}
        <a href="<?php echo url('/companies/create')?>" class="btn btn-fill btn-success pull-right">{{ trans('company.create') }}</a>
    </h3>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{ trans('app.name') }}</th>
            <th>{{ trans('app.phone') }}</th>
            <th>{{ trans('app.users') }}</th>
            <th>{{ trans('app.status') }}</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="company in companies">
            <td>
                <a href="<?php echo url('/companies/edit')?>/[[ company._id ]]">
                    [[ company.name ]]
                </a>
            </td>
            <td>[[ company.phone ]]</td>
            <td>[[ company.users ]]/[[ company.usersNumber ]]</td>
            <td>
                    <span class="label" ng-class="{'label-danger': company.active === false, 'label-success': company.active === true}">
                        <span ng-show="company.active === true">{{ trans('app.active') }}</span>
                        <span ng-show="company.active === false">{{ trans('app.inactive') }}</span>
                    </span>
            </td>
            <td>
                <a href="<?php echo url('/companies/edit')?>/[[ company._id ]]">
                    <span class="fa fa-pencil"></span>
                </a>

                <a href="/companies/[[ company._id ]]/users">
                    <span class="fa fa-user"></span>
                </a>

                <a href="javascript:;" ng-click="removePrompt(company)">
                    <span class="fa fa-remove"></span>
                </a>
            </td>
        </tr>
        </tbody>
    </table>
</div>
@endsection
<?php endif?>