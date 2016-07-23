<?php $user = Session::get('user'); ?>
@extends('layouts.dashboard')

<?php if (in_array('superadmin', $user['roles']) || in_array('admin', $user['roles'])): ?>
@section('content')
<div ng-controller="CompaniesController" ng-init="getUsers('{{ $id }}')">
    <div class="modal fade" tabindex="-1" role="dialog" id="removePrompt">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{ trans('app.remove') }}</h4>
                </div>
                <div class="modal-body">
                    <p>{{ trans('user.remove') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('app.cancel') }}</button>
                    <button type="button" class="btn btn-danger" ng-click="removeUser()">{{ trans('app.remove') }}</button>
                </div>
            </div>
        </div>
    </div>
    <h3 class="col-xs-12">
        {{ trans('app.users') }} {{ trans('app.of') }} [[ company.name ]]
        <a ng-show="company.users < company.usersNumber" href="/companies/{{ $id }}/users/create" class="btn btn-fill btn-success pull-right">{{ trans('user.create') }}</a>
    </h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{ trans('app.name') }}</th>
            <th>{{ trans('app.email') }}</th>
            <th>{{ trans('user.roles') }}</th>
            <th>{{ trans('app.status') }}</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="user in users">
            <td>
                <a href="<?php echo url('/users/edit')?>/[[ user._id ]]">
                    [[ user.name ]]
                </a>
            </td>
            <td>[[ user.email ]]</td>
            <td>
                <span class="label" ng-repeat="role in user.roles" ng-class="{'label-danger': role === 'admin', 'label-info': role === 'user'}">
                    [[ role | translate ]]
                </span>
            </td>
            <td>
                    <span class="label" ng-class="{'label-danger': user.active === false, 'label-success': user.active === true}">
                        <span ng-show="user.active === true">{{ trans('app.active') }}</span>
                        <span ng-show="user.active === false">{{ trans('app.inactive') }}</span>
                    </span>
            </td>
            <td>
                <a href="<?php echo url('/users/edit')?>/[[ user._id ]]">
                    <span class="fa fa-pencil"></span>
                </a>

                <a href="javascript:;" ng-click="removeUserPrompt(user)" ng-show="!hasRol(user, 'admin')">
                    <span class="fa fa-remove"></span>
                </a>
            </td>
        </tr>
        </tbody>
    </table>
</div>
@endsection
<?php endif?>