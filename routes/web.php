<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/domain-checker', function () {
    return view('pages.domain-checker');
});