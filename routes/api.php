<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::group(['prefix' => '/v1'], function () {

    route::get('/lessons', [LessonApiController::class, 'index']);
    route::put('/lessons/{id}', [LessonApiController::class, 'update']);
    route::get('/lessons/{id}', [LessonApiController::class, 'show']);
    route::get('/lessons/{id}/tags', [LessonApiController::class, 'tags']);
    route::Post('/lessons', [LessonApiController::class, 'store']);
    route::delete('/lessons/{id}', [LessonApiController::class, 'destroy']);

});

Route::group(['prefix' => 'v1'], function () {
    route::get('/users', [UserController::class, 'index']);
    route::get('/users/{id}/lessons',[UserController::class,'lessons']);
    route::get('/users/{id}', [UserController::class, 'show']);
    // route::put('/users/{id}', [UserController::class, 'update']);
    route::post('/users', [UserController::class, 'store']);
    route::match(['put','patch'],'/users/{id}',[UserController::class,'update']);
    route::delete('/users/{id}',[UserController::class,'destroy']);
});
