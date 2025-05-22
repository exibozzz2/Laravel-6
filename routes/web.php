<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\GradesController;


// ONLY VIEW

Route::view('/', 'home')->name('home');
Route::view('/add-student-info', 'addStudentInfo');
Route::view('/add-product', 'addProduct');
Route::view('/add-contact', 'addContact ');
Route::view('/testpage', 'testpage');


// Grades Group
Route::get('/student-info', [GradesController::class, 'getAllStudentsInfo'] );
Route::post('/admin/add-student-info', [GradesController::class, 'addStudentInfo']);

// Contacts Group
Route::get('/all-contacts', [ContactsController::class, 'getAllContacts']);
Route::get('/single-contact/{contact}', [ContactsController::class, 'viewSingleContact'])->name('editContact');
Route::get('/admin/delete-contact/{contact}', [ContactsController::class, 'delete']);
Route::post('/admin/update-contact/{contact}', [ContactsController::class, 'update'])->name('updateContact');
Route::post('/admin/add-contact', [ContactsController::class, 'addContact']);

// Products Group
Route::get('/all-products', [ProductsController::class, 'getAllProducts']);
Route::get('/single-product/{product}', [ProductsController::class, 'viewSingleProduct'])->name('editProduct');
Route::get('/admin/delete-product/{product}', [ProductsController::class, 'delete']);
Route::post('/admin/update-product/{product}', [ProductsController::class, 'update'])->name('updateProduct');
Route::post('/admin/add-product', [ProductsController::class, 'addProduct']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
