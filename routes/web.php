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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/ajax', 'HomeController@ajax')->name('ajax');
Route::get('/scores', 'HomeController@scores')->name('scores');
Route::get('/rewards', 'HomeController@rewards')->name('rewards');
Route::get('/regulamin', 'HomeController@regulamin')->name('regulamin');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/news-panel', 'AdminController@newspanel')->name('admin.news-panel');
  Route::post('/news-panel', 'AdminController@newspost');
  Route::get('/news-panel/{id}', 'AdminController@editnews');
  Route::patch('/news-panel/{id}', 'AdminController@updatenews');
  Route::delete('/news-panel/{id}', 'AdminController@destroynews');
  Route::get('/users-panel', 'AdminController@userspanel')->name('admin.users-panel');
  Route::get('/users-panel/register', 'AdminController@registerpanel')->name('admin.register-panel');
  Route::get('/scores-panel', 'AdminController@scorespanel')->name('admin.scores-panel');
  Route::get('/quiz-panel', 'AdminController@quizpanel')->name('admin.quiz-panel');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
  
  
  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});
