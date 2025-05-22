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
Route::view('/add-student-info', 'addStudentInfo')->name('add.student');
Route::view('/add-product', 'addProduct')->name('add.product');
Route::view('/add-contact', 'addContact ')->name('add.contact');
Route::view('/testpage', 'testpage')->name('test.page');


// Grades Group
Route::controller(GradesController::class)->group(function(){
    Route::get('/student-info', 'getAllStudentsInfo')->name("all.students.info");
    Route::post('/admin/add-student-info','addStudentInfo')->name('add.student.post');
});

// Contacts Group
Route::controller(ContactsController::class)->group(function(){
    Route::get('/all-contacts', 'getAllContacts')->name('all.contacts');
    Route::get('/single-contact/{contact}', 'viewSingleContact')->name('edit.contact');
    Route::get('/admin/delete-contact/{contact}', 'delete')->name('delete.contact');
    Route::post('/admin/update-contact/{contact}', 'update')->name('update.contact');
    Route::post('/admin/add-contact', 'addContact')->name('add.contact.post');
});

// Products Group
Route::controller(ProductsController::class)->group(function(){
    Route::get('/all-products', 'getAllProducts')->name('all.products');
    Route::get('/single-product/{product}', 'viewSingleProduct')->name('edit.product');
    Route::get('/admin/delete-product/{product}', 'delete')->name('delete.product');
    Route::post('/admin/update-product/{product}', 'update')->name('edit.product.post');
    Route::post('/admin/add-product', 'addProduct')->name('add.product.post');
});





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
