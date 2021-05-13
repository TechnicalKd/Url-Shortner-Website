<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('welcome');
});


Route::get('{url}','UrlController@show');
/// Route for the register
Route::post('/register','Auth\RegisterController@register');
Route::post('/login','Auth\LoginController@login');
Route::post('/logout','Auth\LoginController@logout');
Route::apiresource('/url','UrlController');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail');

Auth::routes();
