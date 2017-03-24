<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Version 1 (v1)
*/
Route::group(['prefix' => 'v1'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:api');

    Route::resource('regions', 'RegionController');
});
