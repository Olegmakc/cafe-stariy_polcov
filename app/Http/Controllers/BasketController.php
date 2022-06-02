<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Events\OrderConfirmed;
use App\Http\Requests\OrderRequest;
use App\Models\Product;

use function Psy\debug;

class BasketController extends Controller
{
	public function index()
	{
		$order = (new Basket())->getOrder();
		return view('basket.basket', compact('order'));
	}

	public function basketConfirm(OrderRequest $request)
	{
		$order = (new Basket())->getOrder();

		$validated = $request->validated();

		if ($request->ajax()) {
			$result = $order->saveOrder(
				$validated['name'],
				$validated['phone'],
				$validated['email'],
				$validated['destination_adress'],
				$validated['comment'],
				$validated['payment']
			);

			if ($result) {
				session()->put('successful', 'Ваше замовлення прийняте в обробку. Наш менеджер зв\'яжеться з вами!');
				OrderConfirmed::dispatch($order);
				return response()->json(['status' => true, "redirect_url" => url('index')]);
			} else {
				return session()->put('warning', 'Відбулася помилка, спробуйте ще раз.');
			}
		}
	}

	public function basketAdd(Product $product)
	{
		(new Basket(true))->addProduct($product);

		session()->flash('success', 'Добавлено продукт: ' . "$product->title");
		return redirect()->route('basket');
	}

	public function basketRemove(Product $product)
	{
		(new Basket())->removeProduct($product);

		session()->flash('warning', 'Продукт: ' . "$product->title" . " видалено з корзини");
		return redirect()->route('basket');
	}

	public function basketRemoveAll(Product $product)
	{
		(new Basket())->removeProductAll($product);

		session()->flash('warning', 'Продукт: ' . "$product->title" . " видалено з корзини");
		return redirect()->route('basket');
	}
}
