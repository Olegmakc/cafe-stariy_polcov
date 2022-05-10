<?php

namespace App\ViewComposer;

use App\Models\Category;
use Illuminate\View\View;

class CategoriesComposer
{
	public function compose(View $view)
	{
		return $view->with('categories', Category::get());
	}
}
