<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



            //? an optional parameter, we can enter to the route without it...
            //in this case we can give it an default value in the case we don't send it
Route::get('/{id?}',[TaskController::class, 'index']);


Route::post('/save-task',[TaskController::class, 'store']);


             //? a required parameter, we can not enter to the route without it...
Route::get('delete-task/{id}', [TaskController::class, 'destroy']);


Route::post('/update-task', [TaskController::class, 'update']);

