<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get("/", [MyController::class, 'homepage']);
Route::get('/register', [UserController::class, 'registerpage']);
Route::post('/register', [UserController::class, 'registerUser']);
Route::get("/login", [UserController::class, 'login'])->name("login");
Route::post("/login", [UserController::class, 'LoggingIn']);
Route::post('/logout', [UserController::Class, 'logout']);
Route::get('/aboutus', [MyController::class, 'aboutUs']);
Route::get('/shop', [MyController::class, 'shop']);
Route::get('/category/{category}', [MyController::class, 'byCategory']);
Route::get('/cart', [MyController::class, 'cart'])->middleware("auth");
Route::post('/add-to-cart/{product}',[MyController::class, 'addToCart']);
Route::post('/delete-from-cart/{product}', [MyController::class, 'deleteFromCart']);
Route::get('/delivary-details', [MyController::class, 'delivaryForm']);
Route::post('/submit-delivery-details', [MyController::class, 'addToDB']);

Route::get('/success', [MyController::class, 'success'])->name('success');
Route::get('/cancel', [MyController::class, 'cancel'])->name('cancel');

//Products Route
Route::get('/single_product/{product}',[MyController::class, 'singleProduct']);


//Admin Route
Route::get('/admin-login', [AdminController::class, 'adminForm']);
Route::post('/admin_login', [AdminController::class, 'loginAdmin']);
Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/add-product',[AdminController::class, 'postForm']);
Route::post('/create-product', [AdminController::class, 'create_Product']);
Route::post('/delete_product/{product}', [AdminController::class, 'deleteProduct']);
Route::get('/edit_product/{product}', [AdminController::class, 'editForm']);
Route::post('/update-product/{product}', [AdminController::class, 'updateproduct']);
Route::get('/admin-category/{category}', [AdminController::class, 'adminbycategory']);

