<?php

namespace App\ViewComposer;

use Illuminate\View\View;

class OrderComposer
{
	public function compose(View $view)
	{
		$order = session('order');
		if (!is_null($order)) {
			return $view->with('order', $order);
		}
	}
}
