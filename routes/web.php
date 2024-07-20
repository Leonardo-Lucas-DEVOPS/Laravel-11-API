<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('users');

Route::get('/users/store', function () {
    return view('User.StoreUser');
})->name('FormCreate');
