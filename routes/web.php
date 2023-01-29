<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;


Route::get('/', function () {
    return view('welcome');
});



Route::get('search', 'App\Http\Controllers\SearchController@search')->name('search');