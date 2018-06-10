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

//Authentication Routes
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')
    ->name('user-logout');

//Index Routes
Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'AcquisitionController@index')->name('home');

//OPAC Routes
Route::prefix('OPAC')->group(function(){
    Route::get('','OPACController@index')->name('OPAC-index');
});

//Acquisition Routes
Route::prefix('acquisition')->group(function(){
    //Read
    Route::get('','AcquisitionController@index')->name('acq-list');
    //Form for Edit or Create
    Route::get('book/{id?}','AcquisitionController@book')->name('acq-book');
    //Delete
    Route::get('delete', 'AcquisitionController@delete')->name('acq-delete');

    //Post Request after edit, add, delete
    Route::get('delete/{id}', 'AcquisitionController@destroy')->name('acq-del'); //WTF GET??????
    Route::post('query/{id?}', 'AcquisitionController@query')->name('acq-qry');
});

//Circulation Routes
Route::prefix('circulation')->group(function(){
    //Read
    Route::get('','CirculationController@index')->name('circ-list');
    //Form for Edit and Create
    Route::get('record/{id?}','CirculationController@form')->name('circ-form');
    //Delete
    Route::get('delete/{id}','CirculationController@destroy')->name('circ-delete');

    //Post Request after edit, add, delete
    Route::post('query/{id?}','CirculationController@query')->name('circ-qry');
    Route::get('delete/{id}', 'CirculationController@destroy')->name('circ-del');
});

//Reservation Routes
Route::prefix('reservation')->group(function(){
    //Show list of reserved Books
    Route::get('','ReservationController@index')->name('res-list');
    //Route::get('', 'ReservationController@index')->name('res-list');
});

//Suggestion Routes
Route::prefix('suggestion')->group(function(){
    //Show Forums/Suggestions
    Route::get('','ForumController@index')->name('for-list');
});

//Reports Routes
Route::prefix('reports')->group(function (){
    Route::get('', 'ReportsController@index')->name('rep-list');
});
