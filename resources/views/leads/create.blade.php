<?php $user = Session::get('user'); ?>
@extends('layouts.dashboard')

@section('content')
<div ng-controller="LeadsController" ng-init="lead = {contacts: [{}]}">
    <h3 class="col-xs-12">
        {{ trans('lead.create') }}
    </h3>

    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">{{ trans('app.general') }}</h4>
                </div>
                <div class="content">
                    <h4>{{ trans('lead.contact') }}</h4>
                    <div class="row">
                        <form name="contactForm">
                            <div class="form-group  col-md-6 col-xs-12">
                                <label>{{ trans('app.name') }}</label>
                                <input type="text" name="name" ng-model="lead.contacts[0].name" class="form-control" ng-required="true"/>
                            </div>
                            <div class="form-group  col-md-6 col-xs-12">
                                <label>{{ trans('app.email') }}</label>
                                <input type="text" name="email" ng-model="lead.contacts[0].email" class="form-control" ng-required="true"/>
                            </div>
                            <div class="form-group  col-md-6 col-xs-12">
                                <label>{{ trans('app.phone') }}</label>
                                <input type="text" name="phone" ng-model="lead.contacts[0].phone" class="form-control" ng-required="true"/>
                            </div>
                        </form>
                    </div>
                    <h4>{{ trans('app.description') }}</h4>
                    <div class="row">
                        <form name="notesForm">
                            <div class="form-group col-md-12 col-xs-12">
                                <textarea class="form-control" ng-model="lead.description" name="description" rows="5"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <button ng-click="create()" class="btn btn-success btn-fill" ng-disabled="leadForm.$invalid || contactForm.$invalid || addressForm.$invalid">{{ trans('app.save') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection