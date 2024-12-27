<?php

use App\Http\Controllers\GradesController;
use Illuminate\Support\Facades\Route;




// VIEW ROUTES WITH FUNCTIONS
Route::view('/', 'home')->name('home');
Route::get('/student-info', [GradesController::class, 'getAllStudentsInfo'] );
Route::get('/all-contacts', [\App\Http\Controllers\ContactsController::class, 'getAllContacts']);
Route::get('/all-products', [\App\Http\Controllers\ProductsController::class, 'getAllProducts']);

// ONLY VIEW
Route::view('/add-student-info', 'addStudentInfo');
Route::view('/add-product', 'addProduct');
Route::view('/add-contact', 'addContact ');


Route::get('/single-product/{product}', [\App\Http\Controllers\ProductsController::class, 'viewSingleProduct'])->name('editProduct');
Route::get('/single-contact/{contact}', [\App\Http\Controllers\ContactsController::class, 'viewSingleContact'])->name('editContact');

// DELETE ROUTES
Route::get('/admin/delete-product/{product}', [\App\Http\Controllers\ProductsController::class, 'delete']);
Route::get('/admin/delete-contact/{contact}', [\App\Http\Controllers\ContactsController::class, 'delete']);

// UPDATE ROUTES
Route::post('/admin/update-product/{product}', [\App\Http\Controllers\ProductsController::class, 'update'])->name('updateProduct');
Route::post('/admin/update-contact/{contact}', [\App\Http\Controllers\ContactsController::class, 'update'])->name('updateContact');

// POST FORM TRANSFER DATA
Route::post('/admin/add-student-info', [GradesController::class, 'addStudentInfo']);
Route::post('/admin/add-product', [\App\Http\Controllers\ProductsController::class, 'addProduct']);
Route::post('/admin/add-contact', [\App\Http\Controllers\ContactsController::class, 'addContact']);











