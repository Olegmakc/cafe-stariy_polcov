<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ResetController;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('store');
Route::get('/menu', [MainController::class, 'menu'])->name('menu');
Route::get('/news', [MainController::class, 'news'])->name('news');
Route::get('/news/{slug}', [MainController::class, 'newsArticle'])->name('news-Article');

Route::get('/menu/fetch_data', [MainController::class, 'filterProducts'])->name('menu-Filter');
Route::get('/menu/{category}', [MainController::class, 'menuCategory'])->name('menu-Category');
Route::get('/reset', ResetController::class)->name('reset');

Route::group(['prefix' => 'basket'], function () {
	Route::post('/add/{product}', [BasketController::class, 'basketAdd'])->name('basketAdd');

	Route::group(['middleware' => 'basket_not_empty'], function () {
		Route::get('/', [BasketController::class, 'index'])->name('basket');
		Route::post('/remove/{product}', [BasketController::class, 'basketRemove'])->name('basketRemove');
		Route::post('/removeAll/{product}', [BasketController::class, 'basketRemoveAll'])->name('basketRemoveAll');
		Route::post('/', [BasketController::class, 'basketConfirm'])->name('basketConfirm');
	});
});

Route::group([
	'middleware' => ['auth', 'is-admin'], 'prefix' => 'admin'
], function () {
	Route::get('/dashboard', [MainController::class, 'users'])->name('dashboard');
	Route::post('products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
	Route::delete('products/{id}/forse_delete', [ProductController::class, 'forceDelete'])->name('products.forceDelete');
	Route::get('products/fetch_data', [ProductController::class, 'fetch_data'])->name('products.fetch_data');
	Route::resource('products', ProductController::class);

	Route::get('category/fetch_data', [CategoryController::class, 'fetch_data'])->name('category.fetch_data');
	Route::post('category/{id}/restore', [CategoryController::class, 'restore'])->name('category.restore');
	Route::delete('category/{id}/forse_delete', [CategoryController::class, 'forceDelete'])->name('category.forceDelete');
	Route::resource('category', CategoryController::class);
	Route::get('news/fetch_data', [NewsController::class, 'fetch_data'])->name('news.fetch_data');
	Route::resource('news', NewsController::class);

	Route::get('orders/fetch_data', [OrderController::class, 'fetch_data'])->name('orders.fetch_data');
	Route::get('/orders', [OrderController::class, 'index'])->name('orders');
	Route::get('/orders/{id}', [OrderController::class, 'orderInfo'])->name('orderInfo');
});

require __DIR__ . '/auth.php';
