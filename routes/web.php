<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return config('permission.capabilities');
    // return view('welcome');
});
