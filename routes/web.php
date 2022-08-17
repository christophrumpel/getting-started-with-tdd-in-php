<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Podcast Platform
|--------------------------------------------------------------------------
|
| We are giving your voice a platform.
|
*/

Route::get('/', function () {
    return view('welcome');
});
