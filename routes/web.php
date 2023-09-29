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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Change Password Routes...
Route::get('change-password', 'Auth\ChangePasswordController@getChangePassword')->name('change-password');
Route::post('change-password', 'Auth\ChangePasswordController@postChangePassword')->name('change-password');

Route::group(['middleware' => 'auth'], function () {
    /*
     * Pages Routes
     */
    Route::get('/', 'HomeController@index')->name('home');

    /*
     * Accounting
     */
    Route::resource('balancesheet-account', 'Accounting\BalanceSheetController', ['except' => ['create', 'show', 'edit']]);
    Route::resource('journal', 'Accounting\JournalController', ['except' => ['create', 'show', 'edit']]);
    Route::resource('general-ledger', 'Accounting\GeneralLegderController', ['except' => ['create', 'show', 'edit']]);
    Route::resource('trial-balance', 'Accounting\TrialBalanceController', ['except' => ['create', 'show', 'edit']]);

    /*
     * Finance
     */
    Route::get('general-cash-bank', 'Finance\GeneralCashBankController@index')->name('general-cash-bank.index');
    Route::get('general-cash-bank/{generalCashBank}', 'Finance\GeneralCashBankController@show')->name('general-cash-bank.show');
    
    Route::get('inter-cash-bank', 'Finance\InterCashBankController@index')->name('inter-cash-bank.index');
    Route::get('inter-cash-bank/{interCashBank}', 'Finance\InterCashBankController@show')->name('inter-cash-bank.show');

    /*
     * Users Routes
     */
    Route::resource('users', 'UsersController', ['except' => ['create', 'show', 'edit']]);

    /*
     * Backup Restore Database Routes
     */
    Route::post('backups/upload', ['as' => 'backups.upload', 'uses' => 'BackupsController@upload']);
    Route::post('backups/{fileName}/restore', ['as' => 'backups.restore', 'uses' => 'BackupsController@restore']);
    Route::get('backups/{fileName}/dl', ['as' => 'backups.download', 'uses' => 'BackupsController@download']);
    Route::resource('backups', 'BackupsController', ['except' => ['create', 'show', 'edit']]);

    /*
     * Log Viewer routes
     */
    Route::get('log-files', ['as' => 'log-files.index', 'uses' => 'LogFilesController@index']);
    Route::get('log-files/{filename}', ['as' => 'log-files.show', 'uses' => 'LogFilesController@show']);
    Route::get('log-files/{filename}/download', ['as' => 'log-files.download', 'uses' => 'LogFilesController@download']);
});
