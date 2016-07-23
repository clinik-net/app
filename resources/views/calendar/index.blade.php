<?php $user = Session::get('user'); ?>
@extends('layouts.dashboard')

@section('content')
    <div ng-controller="CalendarController" ng-init="getList()">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <div class="card card-calendar">
                            <div class="content">
                                <div id="fullCalendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        [[ actualEvent | json ]]
        <div class="modal fade" tabindex="-1" role="dialog" id="modalDetail">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{ trans('calendar.detail') }}</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <th>
                                    {{ trans('app.name') }}
                                </th>
                                <td>
                                    <span id="actualLead"></span>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('app.date') }}
                                </th>
                                <td>
                                    <span id="actualStart"></span> - <span id="actualEnd"></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('app.ok') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection