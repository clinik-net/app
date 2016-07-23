<?php
Route::get('/login', ['as' => 'login', 'uses' => '\App\Http\Controllers\Index\LoginController@index']);
Route::get('/', ['as' => 'home', 'uses' => '\App\Http\Controllers\Index\IndexController@index']);
Route::get('/users', ['as' => 'users', 'uses' => '\App\Http\Controllers\Users\IndexController@index']);
Route::get('/logout', ['as' => 'logout', 'uses' => '\App\Http\Controllers\Index\IndexController@logout']);
Route::get('/companies', ['as' => 'companies', 'uses' => '\App\Http\Controllers\Companies\IndexController@index']);
Route::get('/companies/create', ['as' => 'companies-new', 'uses' => '\App\Http\Controllers\Companies\IndexController@create']);
Route::get('/companies/edit/{id}', ['as' => 'companies-edit', 'uses' => '\App\Http\Controllers\Companies\IndexController@edit']);
Route::get('/companies/{id}/users', ['as' => 'companies-users', 'uses' => '\App\Http\Controllers\Companies\IndexController@getUsers']);
Route::get('/companies/{id}/users/create', ['as' => 'companies-users-create', 'uses' => '\App\Http\Controllers\Companies\IndexController@createUser']);
Route::get('/users/edit/{id}', ['as' => 'users-edit', 'uses' => '\App\Http\Controllers\Users\IndexController@edit']);
Route::get('/users/create', ['as' => 'users-create', 'uses' => '\App\Http\Controllers\Users\IndexController@create']);
Route::get('/profile', ['as' => 'profile', 'uses' => '\App\Http\Controllers\Profile\IndexController@index']);
Route::get('/my-company', ['as' => 'my-company', 'uses' => '\App\Http\Controllers\Companies\IndexController@myCompany']);
Route::get('/leads', ['as' => 'leads-home', 'uses' => '\App\Http\Controllers\Leads\IndexController@index']);
Route::get('/leads/create', ['as' => 'leads-new', 'uses' => '\App\Http\Controllers\Leads\IndexController@create']);
Route::get('/leads/edit/{id}', ['as' => 'leads-edit', 'uses' => '\App\Http\Controllers\Leads\IndexController@edit']);
Route::get('/leads/view/{id}', ['as' => 'leads-edit', 'uses' => '\App\Http\Controllers\Leads\IndexController@view']);
Route::get('/calendar', ['as' => 'calendar-home', 'uses' => '\App\Http\Controllers\Calendar\IndexController@index']);
//Route::get('/projects', ['as' => 'projects-home', 'uses' => '\App\Http\Controllers\Projects\IndexController@index']);
//Route::get('/projects/create', ['as' => 'projects-new', 'uses' => '\App\Http\Controllers\Projects\IndexController@create']);
//Route::get('/tasks', ['as' => 'tasks-home', 'uses' => '\App\Http\Controllers\Tasks\IndexController@index']);
//Route::get('/tasks/create', ['as' => 'tasks-new', 'uses' => '\App\Http\Controllers\Tasks\IndexController@create']);


/**
 * RESTFUL routes
 */
Route::post('/api/login', '\App\Http\Controllers\Api\LoginController@login');
Route::get('/api/company', '\App\Http\Controllers\Api\CompanyController@getList');
Route::get('/api/company/{id}', '\App\Http\Controllers\Api\CompanyController@get');
Route::post('/api/company', '\App\Http\Controllers\Api\CompanyController@create');
Route::put('/api/company/{id}', '\App\Http\Controllers\Api\CompanyController@update');
Route::delete('/api/company/{id}', '\App\Http\Controllers\Api\CompanyController@remove');
Route::get('/api/company/{id}/users', '\App\Http\Controllers\Api\CompanyController@getUsers');
Route::post('/api/user', '\App\Http\Controllers\Api\UserController@create');
Route::delete('/api/user/{id}', '\App\Http\Controllers\Api\UserController@remove');
Route::get('/api/user', '\App\Http\Controllers\Api\UserController@getList');
Route::get('/api/user/{id}', '\App\Http\Controllers\Api\UserController@get');
Route::put('/api/user/{id}', '\App\Http\Controllers\Api\UserController@update');
Route::get('/api/me', '\App\Http\Controllers\Api\UserController@current');
Route::get('/api/dashboard', '\App\Http\Controllers\Api\DashboardController@getList');
Route::get('/api/location', '\App\Http\Controllers\Api\DashboardController@getHistory');
Route::get('/api/location/user', '\App\Http\Controllers\Api\DashboardController@getHistoryUser');
Route::get('/api/lead', '\App\Http\Controllers\Api\LeadController@getList');
Route::post('/api/lead', '\App\Http\Controllers\Api\LeadController@create');
Route::delete('/api/lead/{id}', '\App\Http\Controllers\Api\LeadController@remove');
Route::get('/api/lead/{id}', '\App\Http\Controllers\Api\LeadController@get');
Route::put('/api/lead/{id}', '\App\Http\Controllers\Api\LeadController@update');
Route::get('/api/lead/{id}/task', '\App\Http\Controllers\Api\LeadController@getTask');
Route::get('/api/lead/{id}/appointment', '\App\Http\Controllers\Api\LeadController@getAppointment');
Route::get('/api/task-type', '\App\Http\Controllers\Api\TaskTypeController@getList');
Route::post('/api/task', '\App\Http\Controllers\Api\TaskController@create');
Route::post('/api/appointment', '\App\Http\Controllers\Api\AppointmentController@create');
Route::get('/api/appointment', '\App\Http\Controllers\Api\AppointmentController@getList');
Route::put('/api/appointment/{id}', '\App\Http\Controllers\Api\AppointmentController@update');
/*

Route::get('/api/task-list', '\App\Http\Controllers\Api\TaskListController@getList');
Route::post('/api/task-list', '\App\Http\Controllers\Api\TaskListController@create');
Route::delete('/api/task-list/{id}', '\App\Http\Controllers\Api\TaskListController@remove');
Route::get('/api/task-list/{id}/task', '\App\Http\Controllers\Api\TodoTaskController@getList');
Route::post('/api/task-list/{id}/task', '\App\Http\Controllers\Api\TodoTaskController@create');
Route::put('/api/todo-task/{id}', '\App\Http\Controllers\Api\TodoTaskController@update');
Route::delete('/api/todo-task/{id}', '\App\Http\Controllers\Api\TodoTaskController@remove');
Route::get('/api/project', '\App\Http\Controllers\Api\ProjectController@getList');
Route::post('/api/project', '\App\Http\Controllers\Api\ProjectController@create');*/