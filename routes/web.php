<?php

use App\Http\Controllers\GradesController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});


Route::get('/student-info', [GradesController::class, 'getAllStudentsInfo'] );
Route::post('/admin/add-student-info', [GradesController::class, 'addStudentInfo']);
Route::get('/add-student-info', [GradesController::class, 'addStudentView']);



