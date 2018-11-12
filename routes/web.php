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

use Illuminate\Support\Facades\Route;

Route::get('/', 'AuthenticationController@signIn');
Route::get('/sign-in', 'AuthenticationController@signIn');
Route::get('/sign-out', 'AuthenticationController@signOut');
Route::post('/sign-in', 'AuthenticationController@processSignIn');

Route::group(
    [
        'middleware' => [
            'check.for.session'
        ]
    ],
    function () {
        Route::get('/summary', 'SummaryController@summary');
        Route::get('/add-expense', 'ExpenseController@addExpense');
        Route::post('/add-expense', 'ProcessController@processAddExpense');
    }
);
