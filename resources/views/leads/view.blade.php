<?php $user = Session::get('user'); ?>
@extends('layouts.dashboard')

@section('content')
    <div ng-controller="LeadsController" ng-init="load('{{ $id }}')">
        <div class="row">
            <div class="col-md-10 col-xs-12">
                <h3>[[ lead.company ]]</h3>
            </div>
            <div class="col-md-2 col-xs-12 text-right" style="margin-top: 15px">
                <a href="/leads/edit/{{ $id }}" class="btn btn-info col-xs-12">
                    <span class="fa fa-pencil"></span>
                    {{ trans('app.edit') }}
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div ng-class="{'col-md-6': lead.address, 'col-md-12': !lead.address}">
                                <h4 class="title">{{ trans('lead.general') }}</h4>
                                <table class="table">
                                    <tr>
                                        <th class="text-left">{{ trans('app.name') }}</th>
                                        <td>[[ lead.contacts[0].name ]]</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">{{ trans('app.email') }}</th>
                                        <td>[[ lead.contacts[0].email ]]</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">{{ trans('app.phone') }}</th>
                                        <td>[[ lead.contacts[0].phone ]]</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6" ng-show="lead.address">
                                <h4 class="title">{{ trans('lead.location') }}</h4>
                                <p ng-show="lead.address">
                                    [[ lead.address ]] [[ lead.exterior ]] [[ lead.interior || '' ]], [[ lead.neighborhood ]], [[ lead.city ]], [[ lead.state ]], [[ lead.country ]]
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <h4 class="title col-md-6">{{ trans('lead.tasksPending') }}</h4>
                            <div class="col-md-6 text-right">
                                <button data-toggle="modal" data-target="#taskModal" class="btn btn-behance btn-sm">
                                    <span class="fa fa-plus"></span>
                                    {{ trans('task.create') }}
                                </button>
                            </div>
                        </div>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default" ng-repeat="task in tasks">
                                <div class="panel-heading">
                                    <p class="panel-title" >
                                        <a data-target="#collapse[[ $index ]]" href="#" data-toggle="collapse" ng-show="task.type.name !== 'appointment'" style="font-size: 15px">
                                            <span class="fa fa-[[ task.type.icon]]"></span>
                                            <span>[[ task.detail ]]</span>
                                            <small>[[ convertTimestamp(task.createdAt) ]]</small>
                                            <b class="caret"></b>
                                        </a>
                                        <a data-target="#collapse[[ $index ]]" href="#" data-toggle="collapse" ng-hide="task.type.name !== 'appointment'" style="font-size: 15px">
                                            <span class="fa fa-calendar"></span>
                                            [[ dateTimezone(task.date) ]]
                                            <br/>
                                            <span class="fa fa-calendar"></span>
                                            [[ dateTimezone(task.end) ]]
                                            <br/>
                                            <small>
                                                <span class="fa fa-map-marker"></span>
                                                [[ task.where ]]
                                            </small>
                                            <b class="caret"></b>
                                        </a>

                                    </p>
                                    
                                </div>
                                <div id="collapse[[ $index ]]" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        [[ task.notes ]]
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <h4 class="title col-md-6">{{ trans('lead.tasksDone') }}</h4>
                            <div class="col-md-6 text-right">
                                <button data-toggle="modal" data-target="#appointmentModal" class="btn btn-behance btn-sm">
                                    <span class="fa fa-plus"></span>
                                    {{ trans('appointment.create') }}
                                </button>
                            </div>
                        </div>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default" ng-repeat="task in appointments">
                                <div class="panel-heading">
                                    <p class="panel-title" >
                                        <a data-target="#collapse[[ $index ]]" href="#" data-toggle="collapse" ng-show="task.type.name !== 'appointment'" style="font-size: 15px">
                                            <span class="fa fa-[[ task.type.icon]]"></span>
                                            <span>[[ task.detail ]]</span>
                                            <small>[[ convertTimestamp(task.createdAt) ]]</small>
                                            <b class="caret"></b>
                                        </a>
                                        <a data-target="#collapse[[ $index ]]" href="#" data-toggle="collapse" ng-hide="task.type.name !== 'appointment'" style="font-size: 15px">
                                            <span class="fa fa-calendar"></span>
                                            [[ dateTimezone(task.date) ]]
                                            <br/>
                                            <span class="fa fa-calendar"></span>
                                            [[ dateTimezone(task.end) ]]
                                            <br/>
                                            <small>
                                                <span class="fa fa-map-marker"></span>
                                                [[ task.where ]]
                                            </small>
                                            <b class="caret"></b>
                                        </a>

                                    </p>
                                    
                                </div>
                                <div id="collapse[[ $index ]]" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        [[ task.notes ]]
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="taskModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{ trans('task.create')  }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form name="taskForm">
                                <div class="col-md-8 form-group">
                                    <label>{{ trans('app.task') }}</label>
                                    <input ng-required="true" type="text" class="form-control" ng-model="task.detail" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>{{ trans('app.taskType') }}</label>
                                    <select ng-required="true" class="form-control" ng-model="task.type" ng-options="item as item.label for item in taskTypes"></select>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>{{ trans('app.description') }}</label>
                                    <textarea ng-required="true" class="form-control" ng-model="task.notes"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-fill btn-default" data-dismiss="modal">{{ trans('app.cancel') }}</button>
                        <button type="button" class="btn btn-fill btn-primary" ng-click="createTask()" ng-disabled="taskForm.$invalid">{{ trans('app.create') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{ trans('appointment.create')  }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form name="appointmentForm" ng-init="appointment.type = {name: 'appointment', label: 'Cita', icon: 'calendar'}">
                                <div class="col-md-4">
                                    <label>{{ trans('app.date') }}</label>
                                    <md-datepicker ng-required="true" ng-model="appointment.date" md-placeholder="{{ trans('app.date') }}"></md-datepicker>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-xs-12">{{ trans('app.hour') }}</label>
                                    <select class="form-control col-md-50" ng-model="appointment.hour" ng-required="true" ng-options="hour for hour in hours"></select>
                                    <select class="form-control col-md-50" ng-model="appointment.minute" ng-required="true" ng-options="minute for minute in minutes"></select>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>{{ trans('appointment.where') }}</label>
                                    <input ng-required="true" type="text" class="form-control" ng-model="appointment.where" />
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>{{ trans('app.notes') }}</label>
                                    <textarea ng-required="false" class="form-control" ng-model="appointment.notes"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-fill btn-default" data-dismiss="modal">{{ trans('app.cancel') }}</button>
                        <button type="button" class="btn btn-fill btn-primary" ng-click="createAppointment()" ng-disabled="appointmentForm.$invalid">{{ trans('app.create') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection