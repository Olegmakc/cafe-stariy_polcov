<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use HasFactory, SoftDeletes, CascadeSoftDeletes;

	protected $cascadeDeletes = ['products'];
	protected $guarded = [];

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
