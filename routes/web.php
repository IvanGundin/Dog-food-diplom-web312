<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;

// Главная страница с товарами order
Route::get('/', [FoodController::class, 'foods'])->name('index');
// Добавление маршрута для страницы корзины
Route::view('/cart', 'product')->name('cart');
Route::view('/react', 'user_content')->name('user_content');
// отправка на почту
Route::view('/checkout', 'checkout')->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'submit'])->name('checkout.submit');
// Страницы авторизации
Route::get('/auth_admin', [AuthController::class, 'showAuthForm'])->name('auth.show');
Route::post('/auth_admin', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
// Страница добавления товара с проверкой авторизации
Route::get('/addFood', [FoodController::class, 'index'])->name('addFood');
Route::post('/addFood', [FoodController::class, 'store'])->name('food.store');
// Добавление товара
Route::view('/add-product', 'addProductForm')->name('addProductForm');
Route::get('/add-product', [AuthController::class, 'showAddProductForm'])->name('addProductForm');
// Удаление товара
Route::delete('/food/{id}', [FoodController::class, 'destroy'])->name('food.destroy');
// Карточка товара
Route::get('/{id}', [FoodController::class, 'card'])->name('card');