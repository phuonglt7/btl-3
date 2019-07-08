<?php
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('change-pass', 'HomeController@getChangePassword')->name('user.change-password');
    Route::post('change-pass', 'HomeController@postChangePassword')->name('user.post-change-password');
    Route::post('reset-pass', 'HomeController@resetPassword')->name('user.reset-password');
    Route::get('home', 'HomeController@index')->name('home');
    Route::resource('user', 'UserController')->only(['index', 'show', 'store', 'create']);
    Route::get('export-user', 'UserExportController@export')->name('export-user');
    Route::get('export-history/{id}', 'HistoryExportController@export')->name('export-history');
    Route::group(['middleware' => 'checkcount'], function () {
        Route::resource('history', 'HistoryStoreController')->except('destroy');
        Route::get('exportHistory', 'HistoryExportController@export')->name('exportHistory');
        Route::group(['middleware' => 'checkpermiss'], function () {
            Route::resource('store', 'StorehousesController')->except('destroy');
            
            Route::resource('product', 'ProductController')->except('destroy');
        });
    });
});

