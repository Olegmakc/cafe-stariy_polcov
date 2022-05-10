<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('categories')->insert([
			[
				'code' => 'main',
				'name' => 'Основні страви',
				'image' => 'categories/01.jpg',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'code' => 'salad',
				'name' => 'Салати',
				'image' => 'categories/02.jpg',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'code' => 'meatdish',
				'name' => 'М\'ясні страви',
				'image' => 'categories/03.jpg',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'code' => 'drink',
				'name' => 'Напої',
				'image' => 'categories/04.jpg',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'code' => 'breakfast',
				'name' => 'Сніданки',
				'image' => 'categories/05.jpg',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
		]);
	}
}
