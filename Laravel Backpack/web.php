<?php

// Login route redirect user to the chosen external provider, and the callback route handles users returning from the external provider.
Route::get('login', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('login/callback', 'Auth\LoginController@handleProviderCallback');


/**
 * Specific redirects to replace default backpack authentication routes
 */
Route::get('admin/login',function(){
    return view('welcome');
});

Route::get('admin/logout',function(){
    return view('welcome');
});