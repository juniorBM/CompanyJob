<?php

//Rotas para jobs
Route::group(array('prefix' => 'jobs'), function()
{
    Route::get('/', 'JobsController@index')->name('jobs');
    Route::get('/job/{job}', 'JobsController@show')->name('jobs/job');
    Route::post('/add', 'JobsController@store')->name('jobs/add');
});

Route::group(array('prefix' => 'companies'), function() 
{
    Route::get('/', 'CompaniesController@index')->name('companies');
    Route::get('/company/{company}', 'CompaniesController@show')->name('companies/company');
    Route::post('/add', 'CompaniesController@store')->name('companies/add');
});

