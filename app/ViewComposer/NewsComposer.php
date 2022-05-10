<?php

namespace App\ViewComposer;

use App\Models\News;
use Illuminate\View\View;

class NewsComposer
{
	public function compose(View $view)
	{
		return $view->with('news', News::get());
	}
}
