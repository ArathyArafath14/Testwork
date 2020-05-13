<?php
Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/marketing', 'Auth\LoginController@showMarketingLoginForm')->name('login.marketing');
Route::get('/login/support', 'Auth\LoginController@showSupportLoginForm')->name('login.support');

Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
Route::get('/register/marketing', 'Auth\RegisterController@showMarketingRegisterForm')->name('register.marketing');
Route::get('/register/support', 'Auth\RegisterController@showSupportRegisterForm')->name('register.support');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/marketing', 'Auth\LoginController@marketingLogin');
Route::post('/login/support', 'Auth\LoginController@supportLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');
Route::post('/register/marketing', 'Auth\RegisterController@createMarketing')->name('register.marketing');
Route::post('/register/support', 'Auth\RegisterController@createSupport')->name('register.support');

Route::view('/home', 'home')->middleware('auth');
Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});

Route::group(['middleware' => 'auth:marketing'], function () {
    Route::view('/marketing', 'marketing');
});

Route::group(['middleware' => 'auth:support'], function () {
    Route::view('/support', 'support');
});
