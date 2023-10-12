<?php

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('change-password', 'Auth\ChangePasswordController@getChangePassword')->name('change-password');
Route::post('change-password', 'Auth\ChangePasswordController@postChangePassword')->name('change-password');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('users', 'UsersController', ['except' => ['create', 'show', 'edit']]);

    Route::post('backups/upload', ['as' => 'backups.upload', 'uses' => 'BackupsController@upload']);
    Route::post('backups/{fileName}/restore', ['as' => 'backups.restore', 'uses' => 'BackupsController@restore']);
    Route::get('backups/{fileName}/dl', ['as' => 'backups.download', 'uses' => 'BackupsController@download']);
    Route::resource('backups', 'BackupsController', ['except' => ['create', 'show', 'edit']]);

    Route::get('log-files', ['as' => 'log-files.index', 'uses' => 'LogFilesController@index']);
    Route::get('log-files/{filename}', ['as' => 'log-files.show', 'uses' => 'LogFilesController@show']);
    Route::get('log-files/{filename}/download', ['as' => 'log-files.download', 'uses' => 'LogFilesController@download']);

    Route::get('journal', 'AccountingController@journal')->name('journal.index');
    Route::get('general-ledger', 'AccountingController@generalLedger')->name('general-ledger.index');
    Route::get('trial-balance', 'AccountingController@trialBalance')->name('trial-balance.index');
    
    Route::resource('balancesheet-account', 'BalanceSheetController', []);
    Route::resource('general-cash-bank', 'GeneralCashBankController', []);
    Route::resource('inter-cash-bank', 'InterCashBankController', []);
});
