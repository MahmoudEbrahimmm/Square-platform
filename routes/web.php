<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    ['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
    function(){ 

Route::get('/', function () {
    return view('welcome');
})->name("welcome");


// message users
Route::get('/message','MessageController@index')->name('message');
Route::get('/message/show/{id}','MessageController@show')->name('message.show');
Route::get('/message/delete/{id}','MessageController@delete')->name('message.delete');
Route::post('/message/store','MessageController@store')->name('message.store');


Auth::routes();

Route::group(["middleware"=>"CheckAdmin"],function(){
    
Route::get('/home', 'HomeController@index')->name('home');

// users home
Route::get('/users','UserController@index')->name('users');
Route::get('/users/show/{id}','UserController@show')->name('users.show');
Route::get('/users/delete/{id}','UserController@delete')->name('users.delete');
Route::get('/users/create','UserController@create')->name('users.create');
Route::post('/users/store','UserController@store')->name('users.store');
Route::get('/users/edit/{id}','UserController@edit')->name('users.edit');
Route::post('/users/save','UserController@save')->name('users.save');


// corses home
Route::get('/courses','CoursController@index')->name('courses');
Route::get('/courses/show/{id}','CoursController@show')->name('courses.show');
Route::get('/courses/delete/{id}','CoursController@delete')->name('courses.delete');
Route::get('/courses/create','CoursController@create')->name('courses.create');
Route::post('/courses/store','CoursController@store')->name('courses.store');
Route::get('/courses/edit/{id}','CoursController@edit')->name('courses.edit');
Route::post('/courses/save','CoursController@save')->name('courses.save');

// project hom
Route::get('/projects','ProjectController@index')->name('projects');
Route::get('/projects/show/{id}','ProjectController@show')->name('pro.show');
Route::get('/projects/delete/{id}','ProjectController@delete')->name('pro.delete');
Route::get('/projects/create','ProjectController@create')->name('pro.create');
Route::post('/projects/store','ProjectController@store')->name('pro.store');
Route::get('/projects/edit/{id}','ProjectController@edit')->name('pro.edit');
Route::post('/projects/save','ProjectController@save')->name('pro.save');

// team page
Route::get('/teams','TeamController@index')->name('teams');
Route::get('/teams/show/{id}','TeamController@show')->name('teams.show');
Route::get('/teams/delete/{id}','TeamController@delete')->name('teams.delete');
Route::get('/teams/create','TeamController@create')->name('teams.create');
Route::post('/teams/store','TeamController@store')->name('teams.store');
Route::get('/teams/edit/{id}','TeamController@edit')->name('teams.edit');
Route::post('/teams/save','TeamController@save')->name('teams.save');

});
});