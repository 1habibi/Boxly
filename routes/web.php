<?php

use App\Http\Controllers\Admin\Order\IndexController;
use App\Http\Controllers\Admin\Order\QueryController;
use App\Http\Controllers\Admin\Order\ShowController;
use App\Http\Controllers\Admin\Order\UpdateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Главная страница
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('welcome');


// Страница "О нас"
Route::get('/about', function () {
    return Inertia::render('About', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('about');

// Страница "Вопросы и ответы"
Route::get('/qa', function () {
    return Inertia::render('QA', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('qa');


// Авторизация
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Админка
Route::middleware(['admin', 'auth'])->prefix('admin')->group(function (){
    Route::namespace('App\Http\Controllers\Admin\Order')->group( function (){
        Route::get('/orders', IndexController::class)->name('admin.orders.index');
        Route::get('/customers', [\App\Http\Controllers\Admin\AdminCustomerController::class, 'index'])->name('admin.customers.index');
        Route::get('/orders/query', QueryController::class)->name('admin.orders.query');
        Route::get('/orders/{order}', ShowController::class)->name('admin.orders.show')->where ('order', '[0-9]+');;
        Route::patch('/orders/{order}', UpdateController::class)->name('admin.orders.update');
        // couriers
        Route::get('/couriers', [\App\Http\Controllers\Admin\AdminCourierController::class, 'index'])->name('admin.couriers.index');
        Route::get('/couriers/create', [\App\Http\Controllers\Admin\AdminCourierController::class, 'create'])->name('admin.couriers.create');
        Route::post('/couriers/', [\App\Http\Controllers\Admin\AdminCourierController::class, 'store'])->name('admin.couriers.store');
        Route::get('/courier/{courier}', [\App\Http\Controllers\Admin\AdminCourierController::class, 'show'])->name('admin.couriers.show');
        Route::get('/courier/{courier}/edit', [\App\Http\Controllers\Admin\AdminCourierController::class, 'edit'])->name('admin.couriers.edit');
        Route::patch('/courier/{courier}', [\App\Http\Controllers\Admin\AdminCourierController::class, 'update'])->name('admin.couriers.update');
        Route::delete('/courier/{courier}', [\App\Http\Controllers\Admin\AdminCourierController::class, 'destroy'])->name('admin.couriers.destroy');
    });
});

// Customer
Route::middleware('auth')->group(function () {
    Route::get('/profile/customer/create', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customer.create');
    Route::post('/profile/customer', [\App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
    Route::get('/profile/customer/edit', [\App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
    Route::patch('/profile/customer', [\App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
});

// Orders
Route::middleware(['auth', 'verified', 'customer'])->group(function () {
    Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [\App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'delete'])->name('orders.delete');
});

//Loyality
Route::post('/loyality', [\App\Http\Controllers\LoyalityController::class, 'store'])->name('loyality.store');

require __DIR__.'/auth.php';
