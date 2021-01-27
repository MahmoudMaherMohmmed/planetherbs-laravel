<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/products/{category_id?}', 'HomeController@products')->name('products');
Route::get('/product/{slug}', 'HomeController@product')->name('product');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/blog_details/{slug}', 'HomeController@blog_details')->name('blog_details');
Route::get('/certifications', 'HomeController@certifications')->name('certifications');
Route::get('/contact_us', 'HomeController@contact_us')->name('contact_us');

// Authentication Routes...
Route::get('customer-login', 'Auth\LoginController@showLoginForm')->name('customer.login');
Route::post('customer-login', 'Auth\LoginController@login');
Route::post('customer-logout', 'Auth\LoginController@logout')->name('customer.logout');
