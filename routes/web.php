<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return \App\Permission\PermissionCapabilities::CAPABILITIES;
    $roles = ['a', 'b'];
    $access = [
        'a' => false,
        'b' => false
    ];
    foreach ($roles as $role) {
        if ($access[$role]) {
            return true;
        }
    }
    return false;
    // return view('welcome');
});
