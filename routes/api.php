<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('projects', 'v1\ProjectController');
    Route::apiResource('tasks', 'v1\TaskController');
    Route::apiResource('projects.tasks', 'v1\ProjectTaskController');
    Route::apiResource('comments', 'v1\CommentController');
});