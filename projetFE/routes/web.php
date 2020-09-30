<?php

use Illuminate\Support\Facades\Route;

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




Route::view('/', 'welcome');
Auth::routes();
//************auth routes************* */
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin.login.showform');
Route::get('/register/enseignant', 'Auth\RegisterController@showEnseignantRegisterForm')->name('enseignant.register.form');
Route::get('/login/enseignant', 'Auth\LoginController@showEnseignantLoginForm')->name('enseignant.login.showform');
Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('admin.login.submit');
Route::post('/login/enseignant', 'Auth\LoginController@enseignantLogin')->name('enseignant.login.submit');
Route::post('/register/enseignant', 'Auth\RegisterController@createEnseignant')->name('enseignant.register');



Route::get('/home', 'HomeController@index')->name('home');
/**********/
Route::get('/administrateur', 'adminController@admin')->name('admin');
Route::get('/enseignants', 'EnseignantController@index')->name('enseignant');


Route::get('/cours' , 'CourController@index')->name('cour.index')->middleware('auth:enseignant');
Route::post('/cours', 'CourController@store')->name('cour.store');
Route::get('/cours/{id}','CourController@content')->name('cour.content')->middleware('auth:enseignant');
Route::post('/cours/content/{id}','CourController@storelecon')->name('lecon.store');
Route::post('/content/{id}','CourController@storeexamen')->name('examen.store');
Route::get('/cours/exam/{id}','CourController@exam')->name('exam.content')->middleware('auth:enseignant');
Route::post('/exam/{id}','CourController@storeexercice')->name('exercice.store');
Route::get('/{id}','CourController@showcontent')->name('show.content')->middleware('auth:enseignant');
Route::get('/download/{file}','CourController@download');
Route::get('/browse/index' , 'BrowseController@index')->name('browse.index')->middleware('auth:enseignant');
Route::get('/index/{id}','BrowseController@content')->name('browse.content')->middleware('auth:enseignant');




/***********Delete Routes **************/

Route::delete('/cours/{id}','CourController@destroycour')->name('cour.destroy')->middleware('auth:enseignant');
Route::delete('/{id}','CourController@destroylecon')->name('lecon.destroy')->middleware('auth:enseignant');
Route::delete('/content/{id}','CourController@destroyexamen')->name('examen.destroy')->middleware('auth:enseignant');
Route::delete('/account/{id}','adminController@destroyenseignant')->name('enseignant.destroy')->middleware('auth:admin');




/***********Admin Routes********/

Route::get('/administrateur/account','adminController@account')->name('account')->middleware('auth:admin');
Route::get('/administrateur/addaccount','adminController@addaccount')->name('addaccount')->middleware('auth:admin');

