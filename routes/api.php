<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//VER TODOS COM PAGINAÇÃO (10)
route::get('/users', [UserController::class, 'index']);  //{{URL}}/api/users?page=1
//VER PELO ID
route::get('/users/{Userid}', [UserController::class, 'show']); //{{URL}}/api/users/id
//CADASTRAR
route::post('/users', [UserController::class, 'store']); //{{URL}}/api/users + (body:json(name,email,password,))
//EDITAR
route::put('/users/{Userid}', [UserController::class, 'update']); //{{URL}}/api/users/id + (body:json(name,email,password,))
//DELETAR
route::delete('/users/{Userid}', [UserController::class, 'destroy']);////{{URL}}/api/users/id