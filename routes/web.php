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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@index')->name('index');


Route::get('/home', 'AcquisitionController@index')->name('home');

Route::prefix('acquisition')->group(function(){
    //Read
    Route::get('','AcquisitionController@index')->name('acq-list');
    //Form for Edit or Create
    Route::get('book/{id?}','AcquisitionController@book')->name('acq-book');
    //Delete
    Route::get('delete', 'AcquisitionController@delete')->name('acq-delete');

    //Post Request after edit, add, delete
    Route::post('query/{id?}/{added_by?}', 'AcquisitionController@query')->name('acq-qry');
});

/*Route::prefix('circulation')->group(function(){
    //Read
    Route::get('','CirculationController@index')->name('circ-list');
    //Form for Edit and Create
    Route::get('record/{id?}','CirculationController@form')->name('circ-form');
    //Delete
    Route::get('delete/{id}','CirculationController@destroy')->name('circ-delete');

    //Post Request after edit, add, delete
    Route::post('query/{id?}/{added_by?}','CirculationController@query')->name('circ-qry');
});*/

