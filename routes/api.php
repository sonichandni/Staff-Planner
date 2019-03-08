<?php

Route::group([
    'prefix' => 'auth'

], function () {

    //Authentication
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');

    //database
    Route::get('GetTableList','GetTableList@GetTableList');
    Route::post('GetFieldsList','GetFieldsList@GetFieldsList');

    //Subscribers
    Route::get('GetSubscribers','GetSubscribers@GetSubscribers');
    Route::post('AddSubscribers','GetSubscribers@AddSubscribers');

    //AccessTypes
    Route::get('GetAllRoles','RolesController@GetAllRoles');
    Route::post('GetRole','RolesController@GetRole');
    Route::post('AddRole','RolesController@AddRole');
    Route::post('DeleteRole','RolesController@DeleteRole');
    Route::post('UpdateRole','RolesController@UpdateRole');

    //Users
    Route::post('AddUser','UsersController@AddUser');
    Route::post('DeleteUser','UsersController@DeleteUser');
    Route::post('UpdateUser','UsersController@UpdateUser');
    Route::post('me', 'AuthController@me');

    //Access Type
    Route::get('GetAllAccessType','AccessTypeController@GetAllAccessType');
    Route::post('GetAccessType','AccessTypeController@GetAccessType');
    Route::post('AddAccessType','AccessTypeController@AddAccessType');
    Route::post('DeleteAccessType','AccessTypeController@DeleteAccessType');
    Route::post('UpdateAccessType','AccessTypeController@UpdateAccessType');

    //User Access
    //Route::get('GetAllUserAccess','UserAccessController@GetAllUserAccess');
    Route::post('GetUserAccess','UserAccessController@GetUserAccess');
    Route::post('AddUserAccess','UserAccessController@AddUserAccess');
    Route::post('DeleteUserAccess','UserAccessController@DeleteUserAccess');
    Route::post('UpdateUserAccess','UserAccessController@UpdateUserAccess');
    Route::post('BulkAddUserAccess','UserAccessController@BulkAddUserAccess');

    //Access Type Combination
    Route::get('GetAllAccessTypeCombination','AccessTypeCombinationController@GetAllAccessTypeCombination');
    Route::post('GetAccessTypeCombination','AccessTypeCombinationController@GetAccessTypeCombination');
    Route::post('AddAccessTypeCombination','AccessTypeCombinationController@AddAccessTypeCombination');
    Route::post('DeleteAccessTypeCombination','AccessTypeCombinationController@DeleteAccessTypeCombination');
    Route::post('UpdateAccessTypeCombination','AccessTypeCombinationController@UpdateAccessTypeCombination');

    //Project
    Route::post('AddProject','ProjectsController@AddProject');
    Route::post('UpdateProject','ProjectsController@UpdateProject');
    
    

});