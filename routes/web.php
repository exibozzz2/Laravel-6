<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\GradesController;



Route::middleware('auth', \App\Http\Middleware\AdminMiddleware::class)->prefix("admin")->group(function(){

    // ONLY VIEW
    Route::view('/', 'home')->name('home');
    Route::view('/add-student-info', 'addStudentInfo')->name('add.student');
    Route::view('/add-product', 'addProduct')->name('add.product');
    Route::view('/add-contact', 'addContact ')->name('add.contact');
    Route::view('/testpage', 'testpage')->name('test.page');


// Grades Group
    Route::controller(GradesController::class)->prefix("student")->group(function(){
        Route::get('/info', 'getAllStudentsInfo')->name("all.students.info");
        Route::post('/post/create','addStudentInfo')->name('add.student.post');
    });

// Contacts Group
    Route::controller(ContactsController::class)->prefix("contacts")->group(function(){
        Route::get('/all', 'getAllContacts')->name('all.contacts');
        Route::get('/{contact}', 'viewSingleContact')->name('edit.contact');
        Route::get('/delete/{contact}', 'delete')->name('delete.contact');
        Route::post('update/{contact}', 'update')->name('update.contact');
        Route::post('/create', 'addContact')->name('add.contact.post');
    });

// Products Group
    Route::controller(ProductsController::class)->prefix("products")->group(function(){
        Route::get('/all', 'getAllProducts')->name('all.products');
        Route::get('/{product}', 'viewSingleProduct')->name('edit.product');
        Route::get('/delete/{product}', 'delete')->name('delete.product');
        Route::post('/update/{product}', 'update')->name('edit.product.post');
        Route::post('/create', 'addProduct')->name('add.product.post');
    });



});


Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
