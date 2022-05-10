<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use HasFactory, SoftDeletes;

	protected $guarded = [];
	public function category()
	{
		return $this->belongsTo(Category::class)->withTrashed();
	}
	public function getPriceForCount()
	{
		if (!is_null($this->pivot)) {

			return $this->price * $this->pivot->count;
		} else {
			$this->price;
		}
	}
	public function scopeSortProduct($query, $sortDirection)
	{
		return $query->sortBy('price', $sortDirection);
	}
}
