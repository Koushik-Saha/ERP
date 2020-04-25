<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route url
Route::get('/', 'DashboardController@dashboardAnalytics');

// Route Authenticated
Route::middleware('auth')->group(function () {
// Route Projects
    Route::prefix('project')->group(function () {

        Route::get('/add-project', 'ProjectsController@addProject')->name('projects-add-project');
        Route::post('/add-project', 'ProjectsController@processAddProject')->name('projects-add-project');
        Route::get('/active-project-list', 'ProjectsController@activeProjectList')->name('active-project-list');
        Route::get('/hold-project-list', 'ProjectsController@holdProjectList')->name('hold-project-list');
        Route::get('/completed-project-list', 'ProjectsController@completedProjectList')->name('completed-project-list');
        Route::get('/cancelled-project-list', 'ProjectsController@cancelledProjectList')->name('cancelled-project-list');
        Route::get('/all-project-list', 'ProjectsController@allProjectList')->name('all-project-list');
        Route::get('/project-details/{id}', 'ProjectsController@projectDetails')->name('project-details');

    });
// Route Client
    Route::prefix('client')->group(function () {

        Route::get('/add-client', 'ClientController@addClient')->name('add-client');
        Route::post('/add-client', 'ClientController@processAddClient')->name('add-client');
        Route::get('/client-list', 'ClientController@clientList')->name('client-list');

    });

    // Route Vendor
    Route::prefix('vendor')->group(function () {

        Route::get('/add-vendor', 'VendorController@addVendor')->name('add-vendor');
        Route::post('/add-vendor', 'VendorController@processAddVendor')->name('add-vendor');
        Route::get('/vendor-list', 'VendorController@vendorList')->name('vendor-list');

    });

    // Route Vendor
    Route::prefix('administrator')->group(function () {

        Route::get('/add-administrator', 'AdministratorController@addAdministrator')->name('add-administrator');
        Route::post('/add-administrator', 'AdministratorController@processAddAdministrator')->name('add-administrator');
        Route::get('/administrator-list', 'AdministratorController@administratorList')->name('administrator-list');

    });

    });


    Auth::routes();

//Route::post('/login/validate', 'Auth\LoginController@validate_api');

    Route::get('/test-filemanager', 'ProjectsController@processfilemanager')->name('projects-filemanager');
