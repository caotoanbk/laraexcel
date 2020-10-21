<?php

Route::get('/', function () {
    $excel = App::make('excel');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('importExport', 'ExcelController@importExport')->name('uploadexcel');

Route::get('downloadExcel/{type}', 'ExcelController@downloadExcel');

Route::get('crudapp', 'HomeController@crudapp')->name('crudapp');

Route::post('importExcel', 'ExcelController@importExcel');

// CRUD ROUTE
Route::group(['prefix' => 'crud'], function(){
    Route::get('/data/{table}', 'CrudController@datatable')->name('crud.data');
    Route::get('/{table}', 'CrudController@index')->name('crud.index');
    Route::get('/{table}/show/{id}', 'CrudController@show')->name('crud.show');
    Route::get('/{table}/create', 'CrudController@create')->name('crud.create');
    Route::post('/{table}/store', 'CrudController@store')->name('crud.store');
    Route::get('/{table}/edit/{id}', 'CrudController@edit')->name('crud.edit');
    Route::patch('/{table}/{id}', 'CrudController@update')->name('crud.update');
    Route::delete('/{table}/destroy/{id}', 'CrudController@destroy')->name('crud.destroy');
});