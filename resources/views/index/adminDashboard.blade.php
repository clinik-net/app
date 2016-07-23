@extends('layouts.dashboard')

@section('content')
<div class="row dashboard">
	<!-- <div class="col-md-6 activeUsers">
		<div class="card">
	        <div class="header">
	            <h4 class="title">{{ trans('app.activeUsers') }}</h4>
	        </div>
	        <div class="content">
	        	<div class="text-center text-success">
	        		<i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp; [[ dashboard.data.activeUsers ]]
	        	</div>
	        </div>
	    </div>
	</div>
	<div class="col-md-6 activeUsers">
		<div class="card">
	        <div class="header">
	            <h4 class="title">{{ trans('app.inactiveUsers') }}</h4>
	        </div>
	        <div class="content">
	        	<div class="text-center text-danger">
	        		<i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp; [[ dashboard.data.inactiveUsers ]]
	        	</div>
	        </div>
	    </div>
	</div>
	<div class="col-md-6 activeUsers">
		<div class="card">
	        <div class="header">
	            <h4 class="title">{{ trans('app.activeUsers') }}</h4>
	        </div>
	        <div class="content">
	        	<table class="table table-striped">
	        		<thead>
	        			<tr>
	        				<th>{{ trans('app.name') }}</th>
	        				<th>{{ trans('app.active') }}</th>
	        				<th>{{ trans('app.lastLocation') }}</th>
	        			</tr>
	        		</thead>
	        		<tbody>
	        			<tr ng-repeat="user in dashboard.data.usersGrid">
	        				<td>[[ user.name ]]</td>
	        				<td>
	        					<span class="label" ng-class="{'label-success': user.active === true, 'label-danger': user.active === false}">
	        						<span ng-show="user.active === true">{{ trans('main.yes') }}</span>
	        						<span ng-hide="user.active === true">{{ trans('main.no') }}</span>
	        					</span>
	        				</td>
	        				<td>
	        					25 de octubre
	        				</td>
	        			</tr>
	        		</tbody>
	        	</table>
	        </div>
	    </div>
	</div>
	<div class="col-md-6 activeUsers">
		<div class="card">
	        <div class="header">
	            <h4 class="title">{{ trans('app.actualLocation') }}</h4>
	        </div>
	        <div class="content">
	        	<div id="map_actualLocation" class="gmaps" style="height: 400px"></div>
	        </div>
	    </div>
	</div>
	<div class="col-md-12 activeUsers">
		<div class="card">
	        <div class="header">
	            <h4 class="title">{{ trans('app.locationHistory') }}</h4>
	        </div>
	        <div class="content">
	        	<div class="row">
	        		<div class="col-md-5 form-group">
	        			<label>
	        				{{ trans('app.user') }}
	        			</label>
	        			<select class="form-control" ng-model="history.user" ng-options="user._id as user.name for user in users" ng-change="setUserDates(history.user)"></select>
	        		</div>
	        		<div class="col-md-5 form-group">
	        			<label>
	        				{{ trans('app.date') }}
	        			</label>
	        			<select class="form-control" ng-model="history.date" ng-options="date for date in userDates"></select>
	        		</div>
	        		<div class="col-md-2 form-group">
	        			<label>&nbsp;</label><br/>
	        			<button ng-click="showHistory()" class="btn btn-sucess">
	        				{{ trans('app.find') }}
	        			</button>
	        		</div>
	        	</div>
	        	<div id="map_locationHistory" class="gmaps" style="height: 400px"></div>
	        </div>
	    </div>
	</div> -->
	<div ng-init="loadMaps()"></div>
	<div ng-init="load()"></div>
</div>
@endsection