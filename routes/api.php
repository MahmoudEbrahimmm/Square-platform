<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// api users
Route::get("/users/allData","API\UserController@index");
Route::get("/users/showone/{id}","API\UserController@show");
Route::post("/users/store","API\UserController@store");
Route::post("/users/delete","API\UserController@delete");
Route::post("/users/update","API\UserController@update");

// api messages
Route::get("/Message/allData","API\MessageController@index");
Route::get("/Message/showone/{id}","API\MessageController@show");
Route::post("/Message/store","API\MessageController@store");
Route::post("/Message/delete","API\MessageController@delete");
Route::post("/Message/update","API\MessageController@update");

//api courses
Route::get("/courses/allData","API\CoursController@index");
Route::get("/courses/showone/{id}","API\CoursController@show");
Route::post("/courses/store","API\CoursController@store");
Route::post("/courses/delete","API\CoursController@delete");
Route::post("/courses/update","API\CoursController@update");

//api projects
Route::get("/projects/allData","API\ProjectController@index");
Route::get("/projects/showone/{id}","API\ProjectController@show");
Route::post("/projects/store","API\ProjectController@store");
Route::post("/projects/delete","API\ProjectController@delete");
Route::post("/projects/update","API\ProjectController@update");

//api teams
Route::get("/teams/allData","API\TeamController@index");
Route::get("/teams/showone/{id}","API\TeamController@show");
Route::post("/teams/store","API\TeamController@store");
Route::post("/teams/delete","API\TeamController@delete");
Route::post("/teams/update","API\TeamController@update");




