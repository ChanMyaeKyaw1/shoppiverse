<?php

use App\Http\Controllers\User\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::group( [ 'prefix' => 'user', 'middleware' => 'userMiddleware'], function() {

    Route::get('home', [UserController::class, 'home'])->name('user#homePage');
    Route::get('product/details/{id}', [UserController::class, 'productDetails'])->name('user#productDetails');

    Route::post('comment', [UserController::class, 'comment'])->name('user#comment');
    Route::get('comment/delete/{id}', [UserController::class, 'commentDelete'])->name('user#commentDelete');

    Route::post('rating', [UserController::class, 'rating'])->name('user#rating');

    Route::get('cart', [UserController::class, 'cart'])->name('user#cart');
    Route::post('addToCart', [UserController::class, 'addToCart'])->name('user#addToCart');

    // api
    // Route::get('cartDelete', [UserController::class, 'cartDelete'])->name('user#cartDelete');

    // Route::get('paymentPage', [UserController::class, 'paymentPage'])->name('user#paymentPage');

    // Route::get('tempStorage', [UserController::class, 'tempStorage'])->name('user#paymentPage');



} );
