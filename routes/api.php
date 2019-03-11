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
    Route::post('UpdateProject/{id}','ProjectsController@UpdateProject');
    Route::get('SearchProject/{P}','ProjectsController@SearchProject');
    Route::get('GetProjectList','ProjectsController@GetProjectList');
    Route::get('getProjectNameList','ProjectsController@getProjectNameList');

    //Project People
    Route::get('getProjectPeopleList','ProjectPeopleController@getProjectPeopleList');
    Route::post('AddProjectPeople','ProjectPeopleController@AddProjectPeople');
    Route::post('DeleteProjectPeople/{id}','ProjectPeopleController@DeleteProjectPeople');
    Route::get('GetProjectPeople/{id}','ProjectPeopleController@GetProjectPeople');
    Route::get('getPeopleProject/{id}','ProjectPeopleController@getPeopleProject');
    Route::post('DeleteProjectPeople1','ProjectPeopleController@DeleteProjectPeople1');
    Route::post('bulkAddProjectPeople','ProjectPeopleController@bulkAddProjectPeople');
    
    //Staff
    Route::post('AddStaff','StaffController@AddStaff');
    Route::post('uploadUserProfile','StaffController@uploadUserProfile');
    Route::get('getEmployeeList','StaffController@getEmployeeList');
    Route::get('getEmployeeDetails/{id}','StaffController@getEmployeeDetails');

    //Staff Categoty
    Route::get('getStaffCategory',"StaffCategoriesController@getStaffCategory");

    //staff Status
    Route::get('getStaffStatus','StaffStatusesController@getStaffStatus');
    
    //customer
    Route::get('getCustomerList','CustomersController@getCustomerList');

    //Division
    Route::get('getDivisionList','DivisionsController@getDivisionList');

    //Office
    Route::get('getOfficeList','OfficesController@getOfficeList');
    Route::get('getOfficeNameList','OfficesController@getOfficeNameList');

    //Project Status
    Route::post('getProjectStatus/{status}','ProjectStatusController@getProjectStatus');

    //Project Type
    Route::post('getProjectType/{type}','ProjectTypesController@getProjectType');

    //Region
    Route::post('getRegion/{name}','RegionsController@getRegion');

    //Planned Project People
    Route::get('getPlannedProjectPeople','PlannedProjectPeopleController@getPlannedProjectPeople');
    Route::get('getPlannedProjectPeopleSearch/{id}','PlannedProjectPeopleController@getPlannedProjectPeopleSearch');

});