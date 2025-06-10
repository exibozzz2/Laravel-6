<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\OrdersController;
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
    Route::controller(GradesController::class)->prefix("student")->name("student.")->group(function(){
        Route::get('/info', 'getAllStudentsInfo')->name('all');
        Route::post('/post/create','addStudentInfo')->name('add.post');
    });

// Contacts Group
    Route::controller(ContactsController::class)->prefix("contacts")->name("contact.")->group(function(){
        Route::get('/all', 'getAllContacts')->name('all');
        Route::get('/{contact}', 'viewSingleContact')->name('edit');
        Route::get('/delete/{contact}', 'delete')->name('delete');
        Route::post('update/{contact}', 'update')->name('update');
        Route::post('/create', 'addContact')->name('post.add');
    });

// Products Group
    Route::controller(ProductsController::class)->prefix("products")->name("product.")->group(function(){
        Route::get('/all', 'getAllProducts')->name('all');
        Route::get('/{product}', 'viewSingleProduct')->name('edit');
        Route::get('/delete/{product}', 'delete')->name('delete');
        Route::post('/update/{product}', 'update')->name('update');
        Route::post('/create', 'addProduct')->name('post.add');
    });

// Orders Group
    Route::controller(OrdersController::class)->prefix("orders")->name('orders.')->group(function(){
       Route::get('/all', 'getAllOrders')->name('all');
       Route::post('/create', 'createOrder')->name('create');
       Route::get('/finish', 'finishOrder')->name('finish');
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
