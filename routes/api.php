<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//VER TODOS COM PAGINAÇÃO (10)
route::get('/users', [UserController::class, 'index']);  //{{URL}}/api/users?page=1
//VER PELO ID
route::get('/users/show/{Userid}', [UserController::class, 'show']); //{{URL}}/api/users/show/id
//CADASTRAR
route::post('/users/store', [UserController::class, 'store']); //{{URL}}/api/users/store + (body:json(name,email,password,))
//EDITAR
route::put('/users/update/{Userid}', [UserController::class, 'update']); //{{URL}}/api/users/update/id + (body:json(name,email,password,))
//DELETAR
route::delete('/users/destroy/{Userid}', [UserController::class, 'destroy'])->name('apagar');////{{URL}}/api/users/destroy/id