<?php $user = Session::get('user'); ?>
@extends('layouts.dashboard')

@section('content')
    <div ng-controller="UsersController">
        <h3 class="col-xs-12" ng-init="setRedirect('{{ $referer }}')">
            {{ trans('user.create') }}
        </h3>
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">{{ trans('app.general') }}</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <form name="userForm">
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>{{ trans('app.name') }}</label>
                                    <input type="text" name="name" ng-model="user.name" class="form-control" ng-required="true"/>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>{{ trans('app.email') }}</label>
                                    <input type="email" name="email" ng-model="user.email" class="form-control" ng-required="true"/>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>{{ trans('user.roles') }}</label><br/>
                                    <button class="btn btn-danger" ng-class="{'btn-fill': hasRol(user, 'admin')}" ng-click="toggleRol(user, 'admin')">[[ "admin" | translate ]]</button>
                                    <button class="btn btn-info" ng-class="{'btn-fill': hasRol(user, 'user')}" ng-click="toggleRol(user, 'user')">[[ "user" | translate ]]</button>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-xs-12" ng-show="error">
                                <div class="alert alert-danger">
                                    [[ error | translate ]]
                                </div>
                            </div>
                            <div class="col-xs-12 text-right">
                                <button ng-click="create()" class="btn btn-success btn-fill" ng-disabled="userForm.$invalid || !user.roles || user.roles.length === 0">{{ trans('app.save') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection