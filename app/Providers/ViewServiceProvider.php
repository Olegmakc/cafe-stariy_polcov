<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		View::composer(['news.news', 'news.show'], 'App\ViewComposer\NewsComposer');
		View::composer(['index', 'menu.*', 'about', 'contact', 'news.*'], 'App\ViewComposer\OrderComposer');
		View::composer([
			'admin.products.products', 'admin.products.form', 'menu.menu'
		], 'App\ViewComposer\CategoriesComposer');
	}
}
