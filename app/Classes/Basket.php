<?php

namespace App\Classes;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Basket
{
	protected $order;

	public function __construct($createOrder = false)
	{
		$order = session('order');
		if (is_null($order) && $createOrder) {
			$data = [];
			if (Auth::check()) {
				$data['user_id'] = Auth::id();
			}
			$this->order = new Order($data);
			session(['order' => $this->order]);
		} else {
			$this->order = $order;
		}
	}

	public function getOrder()
	{
		return $this->order;
	}

	public function saveOrder($name, $phone, $email, $destination_adress, $comment, $payment,)
	{
		return $this->order->saveOrder($name, $phone, $email, $destination_adress, $comment, $payment);
	}

	public function addProduct(Product $product)
	{
		if ($this->order->products->contains($product)) {
			$pivotRow = $this->order->products->where('id', $product->id)->first();
			$pivotRow->count++;
		} else {
			$product->count = 1;
			$this->order->products->put($product->id, $product);
		}
	}

	public function removeProduct(Product $product)
	{
		if ($this->order->products->contains($product)) {
			$pivotRow = $this->order->products->where('id', $product->id)->first();
			if ($pivotRow->count < 2) {
				$this->order->products->pull($product->id);
			} else {
				$pivotRow->count--;
			}
		}
	}
	public function removeProductAll(Product $product)
	{
		if ($this->order->products->contains($product->id)) {
			$this->order->products->pull($product->id);
		}
		return redirect()->route('basket');
	}
}
