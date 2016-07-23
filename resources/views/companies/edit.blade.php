<?php $user = Session::get('user'); ?>
@extends('layouts.dashboard')

@section('content')
    <div ng-controller="CompaniesController" ng-init="load('{{ $id }}')">
        <h3 class="col-xs-12">
            {{ trans('company.edit') }}
        </h3>

        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">{{ trans('app.general') }}</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <form name="companyForm">
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>{{ trans('app.name') }}</label>
                                    <input type="text" name="name" ng-model="company.name" class="form-control" ng-required="true"/>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>{{ trans('app.phone') }}</label>
                                    <input type="text" name="name" ng-model="company.phone" class="form-control" ng-required="true"/>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>{{ trans('app.usersNumber') }}</label>
                                    <input type="number" name="usersNumber" ng-model="company.usersNumber" class="form-control" min="10" ng-required="true" />
                                </div>
                            </form>
                        </div>
                        <h4>{{ trans('app.location') }}</h4>
                        <div class="row">
                            <form name="addressForm">
                                <div class="form-group  col-md-6 col-xs-12">
                                    <label>{{ trans('app.address') }}</label>
                                    <input type="text" name="address" ng-model="company.address" class="form-control" ng-required="true"/>
                                </div>
                                <div class="form-group col-md-3 col-xs-6">
                                    <label>{{ trans('app.internalNumber') }}</label>
                                    <input type="text" name="interior" ng-model="company.interior" class="form-control"/>
                                </div>
                                <div class="form-group col-md-3 col-xs-6">
                                    <label>{{ trans('app.externalNumber') }}</label>
                                    <input type="text" name="exterior" ng-model="company.exterior" class="form-control"/>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>{{ trans('app.neighborhood') }}</label>
                                    <input type="text" name="neighborhood" ng-model="company.neighborhood" class="form-control" ng-required="true"/>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>{{ trans('app.city') }}</label>
                                    <input type="text" name="city" ng-model="company.city" class="form-control" ng-required="true"/>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>{{ trans('app.state') }}</label>
                                    <input type="text" name="state" ng-model="company.state" class="form-control" ng-required="true"/>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-xs-12" ng-show="error">
                                <div class="alert alert-danger">
                                    [[ error ]]
                                </div>
                            </div>
                            <div class="col-xs-12 text-right">
                                <button ng-click="update()" class="btn btn-success btn-fill" ng-disabled="companyForm.$invalid || adminForm.$invalid || addressForm.$invalid">{{ trans('app.save') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection