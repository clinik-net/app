<?php $user = Session::get('user'); ?>
@extends('layouts.dashboard')

@section('content')
    <div ng-controller="ProfileController" ng-init="load()">
        <h3 class="col-xs-12">
            {{ trans('app.profile') }}
        </h3>
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">{{ trans('app.general') }}</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <form name="userForm">
                                <div class="form-group col-xs-12 col-md-6">
                                    <label>{{ trans('app.email') }}</label>
                                    <input type="text" name="email" disabled class="form-control" ng-model="user.email" ng-required="true"/>
                                </div>
                                <div class="form-group col-xs-12 col-md-6">
                                    <label>{{ trans('app.name') }}</label>
                                    <input type="text" name="name" class="form-control" ng-model="user.name" ng-required="true"/>
                                </div>
                                <div class="form-group col-xs-12 col-md-12">
                                    <label>{{ trans('app.address') }}</label>
                                    <input type="text" name="address" class="form-control" ng-model="user.address" ng-required="false"/>
                                </div>
                                <div class="form-group col-xs-6 col-md-4">
                                    <label>{{ trans('app.city') }}</label>
                                    <input type="text" name="city" class="form-control" ng-model="user.city" ng-required="false"/>
                                </div>
                                <div class="form-group col-xs-6 col-md-4">
                                    <label>{{ trans('app.state') }}</label>
                                    <input type="text" name="state" class="form-control" ng-model="user.state" ng-required="false"/>
                                </div>
                                <div class="form-group col-xs-6 col-md-4">
                                    <label>{{ trans('app.country') }}</label>
                                    <input type="text" name="country" class="form-control" ng-model="user.country" ng-required="false"/>
                                </div>
                                <div class="form-group col-xs-12 col-md-12">
                                    <label>{{ trans('app.aboutMe') }}</label>
                                    <textarea class="form-control" ng-model="user.about" rows="5"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <button ng-click="update()" class="btn btn-success btn-fill" ng-disabled="userForm.$invalid || loading">
                                    <span class="fa fa-spinner fa-spin" ng-show="loading === true"></span>
                                    {{ trans('app.update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">{{ trans('profile.password') }}</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <form name="passwordForm">
                                <div class="form-group col-xs-12 col-md-12">
                                    <label>{{ trans('profile.currentPassword') }}</label>
                                    <input type="password" name="current" class="form-control" ng-model="password.current" ng-required="true"/>
                                </div>
                                <div class="form-group col-xs-12 col-md-12">
                                    <label>{{ trans('profile.newPassword') }}</label>
                                    <input type="password" name="new" class="form-control" ng-model="password.new" ng-required="true" ng-pattern="passwordPattern"/>
                                    <div class="alert alert-danger" ng-show="passwordForm.new.$invalid && passwordForm.new.$dirty">
                                        {{ trans('profile.passwordCompliance') }}
                                    </div>
                                </div>
                                <div class="form-group col-xs-12 col-md-12">
                                    <label>{{ trans('profile.confirmPassword') }}</label>
                                    <input type="password" name="confirm" class="form-control" ng-model="password.confirm" ng-required="true"/>
                                </div>
                                <div class="form-group col-xs-12 col-md-12" ng-show="error">
                                    <div class="alert alert-danger">
                                        [[ error | translate ]]
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <button ng-click="changePassword()" class="btn btn-success btn-fill" ng-disabled="passwordForm.$invalid || password.new !== password.confirm || loading">
                                    <span class="fa fa-spinner fa-spin" ng-show="loading === true"></span>
                                    {{ trans('app.update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection