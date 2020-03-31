<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/complaint', 'WelcomeController@showComplaint')->name('complaint-show');
Route::post('/complaint', 'WelcomeController@storeComplaint')->name('complaint-store');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/tickets', 'HomeController@index')->name('tickets');
Route::get('/tickets/{id}', 'HomeController@show')->name('ticket-show');
Route::get('/tickets/{uuid}/download', 'HomeController@download')->name('ticket-download');
Route::post('/tickets/{id}', 'HomeController@setOperator')->name('ticket-set-operator-or-status');

Route::group(['middleware' => 'role'], function (){
    Route::get('/operators', 'OperatorController@index')->name('operators');
    Route::get('/operators/create', 'OperatorController@create')->name('operator-create');
    Route::post('/operators/create', 'OperatorController@store')->name('operator-store');
    Route::get('/operators/{id}/edit', 'OperatorController@edit')->name('operator-edit');
    Route::post('/operators/{id}/edit', 'OperatorController@update')->name('operator-update');
    Route::post('/operators/', 'OperatorController@destroy')->name('operator-delete');
});
