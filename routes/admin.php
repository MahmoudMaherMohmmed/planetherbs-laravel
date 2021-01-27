<?php

Route::get('/home', 'HomeController@index')->name('admin.index');

//Website Settings
Route::resource('website-settings', 'WebsiteSettingController');

//User Settings
Route::resource('staff', 'StaffController');
Route::resource('customers', 'CustomerController');

//Product
Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');

//Home Settings
Route::resource('sliders', 'SliderController');
Route::resource('news', 'NewsController');
Route::resource('services', 'ServiceController');
Route::resource('teams', 'TeamController');
Route::resource('missions', 'MissionController');
Route::resource('visions', 'VisionController');
Route::resource('strategies', 'StrategyController');
Route::resource('certifications', 'CertificationController');

//general Settings
Route::resource('sociallinks', 'SocialLinkController');
Route::resource('currencies', 'CurrencyController');
Route::resource('countries', 'CountryController');
Route::resource('states', 'StateController');
Route::post('/get-states', 'StateController@getStates')->name('get-states');

