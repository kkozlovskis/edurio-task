<?php

use Illuminate\Support\Facades\Route;


Route::prefix('foo')->group(function () {

    Route::prefix('tables')->group(function () {

        Route::prefix('source')->group(function () {

            Route::get('/csv', 'SourceController@csv');

            Route::get('/json', 'SourceController@json');
        });
    });
});
