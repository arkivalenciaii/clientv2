<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('dashboard/user');
});

Route::get('home', function () {
    return redirect('dashboard/user');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('valence/', [
	'middleware' => 'auth',
	'uses'	=> 'AdminController@index'
]);

Route::post('dashboard/user', [
	'middleware' => 'auth',
	'uses' => 'DashboardController@create',
]);

Route::post('dashboard/user/bank', [
	'middleware' => 'auth',
	'uses' => 'DashboardController@attachBank',
]);

Route::get('dashboard/user', [
    'middleware' => 'auth',
    'uses' => 'DashboardController@index',
]);

Route::get('tree/{id}', 'TreeController@index');

Route::get('check/{id}', 'TreeController@checkexit');

Route::get('json', function(){
	return response(json_encode(\App\User::all()));
});

Route::post('admin/transaction', [
	'middleware' => 'auth',
	'uses' => 'TransactionController@verify',
]);

Route::get('admin/transaction/{id}', [
	'middleware' => 'auth',
	'uses' => 'AdminController@transaction',
]);

Route::get('admin/rank/', [
	'middleware' => 'auth',
	'uses' => 'AdminController@ranking',
]);

Route::get('admin/exits', [
	'middleware' => 'auth',
	'uses' => 'RankController@index',
]);

Route::get('admin/client/transaction/{id}/', [
	'middleware' => 'auth',
	'uses' => 'TransactionController@newTransaction',
]);

Route::post('admin/client/transaction/', [
	'middleware' => 'auth',
	'uses' => 'TransactionController@createTransaction',
]);



// Route::get('subjects/{code}', [
//     'middleware' => 'auth',
//     'uses' => 'SubjectController@index',
// ]);