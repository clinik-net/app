<?php $user = Session::get('user'); ?>
@extends('layouts.dashboard')

@section('content')
    <div ng-controller="CompaniesController" ng-init="load('{{ $id }}')">
        <h3 class="col-xs-12">
            {{ trans('app.myCompany') }}
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
                                    <label>{{ trans('app.name') }}</label><br/>
                                    <strong>[[company.name]]</strong>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>{{ trans('app.phone') }}</label><br/>
                                    <strong>[[company.phone]]</strong>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>{{ trans('app.usersNumber') }}</label><br/>
                                    <strong>[[company.usersNumber]]</strong>
                                </div>
                            </form>
                        </div>
                        <h4>{{ trans('app.location') }}</h4>
                        <div class="row">
                            <form name="addressForm">
                                <div class="form-group  col-md-6 col-xs-12">
                                    <label>{{ trans('app.address') }}</label><br/>
                                    <strong>[[company.address]]</strong>
                                </div>
                                <div class="form-group col-md-3 col-xs-6">
                                    <label>{{ trans('app.internalNumber') }}</label><br/>
                                    <strong>[[company.interior]]</strong>
                                </div>
                                <div class="form-group col-md-3 col-xs-6">
                                    <label>{{ trans('app.externalNumber') }}</label><br/>
                                    <strong>[[company.exterior]]</strong>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>{{ trans('app.neighborhood') }}</label><br/>
                                    <strong>[[company.neighborhood]]</strong>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>{{ trans('app.city') }}</label><br/>
                                    <strong>[[company.city]]</strong>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>{{ trans('app.state') }}</label><br/>
                                    <strong>[[company.state]]</strong>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection