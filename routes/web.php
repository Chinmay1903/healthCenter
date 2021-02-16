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

Route::get('/', function () {
    return view('home');
});
Route::get('admin', function () {
    return view('adminlogin');
});

Route::get('adminpassreset',function(){
return view('adminpassreset');
});

Route::get('applist','appointmentlistController@index');
Route::get('search','appointmentlistController@list')->name('search.action');
Route::get('admincreate',function () {
    return view('createadmin');
});
Route::post('createadmin', 'userController@createadmin');
Route::post('makeappointment', 'appointmentlistController@makeappointment')->name('makeappointment.action');
Route::post('login', 'userController@login');
Route::get('logout','userController@logout');
// Route::post('getbydate','appointmentlistController@getbybydate');
// Route::post('getbydept','appointmentlistController@getbybydept');
Route::get('send-mail','MailSend@mailsend');
Route::get('changepassword',function(){
    return view('mailtest');
    });
Route::post('checkEmail','PasswordReset@checkEmail');
Route::post('passreset','PasswordReset@passRest');

Route::get('user','User@index');
Route::get('user/home','User@home');
Route::post('user/login', 'User@login');
Route::get('user/passwordreset1', function(){
    return view('user/otprequest');
});
Route::post('user/passwordreset2','User@otprequest');


// Route::get('test','AjaxTest@index');
// Route::get('search','AjaxTest@search')->name('search.action');

// Route::get('mailTest',function(){
//     return view('sendmail');
//     });

