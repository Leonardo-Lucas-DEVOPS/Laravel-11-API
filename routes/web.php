<?php

use App\Http\Controllers\Api\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $users = User::all();
    return view('welcome', compact('users'));
})->name('users');

Route::get('/users/store', function () {
    return view('User.StoreUser');
})->name('FormCreate');
