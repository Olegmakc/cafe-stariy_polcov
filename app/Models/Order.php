<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	use HasFactory;

	protected $fillable = ['name', 'phone', 'email', 'comment', 'payment', 'user_id', 'sum'];

	public function products()
	{
		return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
	}

	public function scopeActive($query)
	{
		return $query->where('status', 1);
	}
	// public function scopeWhereLikeFilds($query, $input)
	// {
	// 	return $query->whereRaw('concat(name," ",destination_adress," ",comment) like ?', "%{$input}%");
	// }

	public function calculateFullSum()
	{
		$sum = 0;
		foreach ($this->products()->withTrashed()->get() as $product) {
			$sum += $product->getPriceForCount();
		}
		return $sum;
	}
	public static function clearOrderSum()
	{
		session()->forget('full_order_sum');
	}

	public static function changeFullSum($addSum)
	{
		$sum = self::getFullSum() + $addSum;
		session(['full_order_sum' => $sum]);
	}

	public function getFullSum()
	{
		$sum = 0;
		foreach ($this->products as $product) {
			$sum += $product->price * $product->count;
		}
		return $sum;
	}

	public function saveOrder($name, $phone, $email, $adress, $comment, $payment)
	{
		$this->status = 1;
		$this->name = $name;
		$this->phone = $phone;
		$this->email = $email;
		$this->destination_adress = $adress;
		$this->comment = $comment;
		$this->payment = $payment;
		$this->sum = $this->getFullSum();

		$products = $this->products;
		$this->save();
		foreach ($products as $productInOrder) {
			$this->products()->attach($productInOrder, [
				'count' => $productInOrder->count
			]);
		}
		session()->forget('order');
		return true;
	}
}
