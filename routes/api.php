<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogingController;




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return [
        'name' => 'Anil Sidhu',
        'channel' => 'Code Step By Step'
    ];
});

// Route::get('student', [StudentController::class, 'list']);
// Route::get('add-student', [StudentController::class, 'addstudent']);

// Route::put('update-student', [StudentController::class, 'updateStudent']);

Route::post('/signup', [LogingController::class, 'login']);

