<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('news')->insert([
			[
				'slug' => Str::slug('«Старий Полковник» запрошує на святкування новорічних корпоративів!', '-'),
				'image' => 'news/01.jpg',
				'title' => '«Старий Полковник» запрошує на святкування новорічних корпоративів!',
				'body' => 'На Вас чекає новорічне меню, та чудова атмосфера. Чекаємо за адресою- вул.Теремнівська 87а.',
				'created_at' => Carbon::now(),
			],
			[
				'slug' => Str::slug('«Старий Полковник» запрошує гостей спробувати страви з нашого мангалу.', '-'),
				'image' => 'news/02.jpg',
				'title' => '«Старий Полковник» запрошує гостей спробувати страви з нашого мангалу.',
				'body' => 'Ми працюємо щодня з 11.00 до 23.00 за адресою м. Луцьк, вул. Теремнівська, 87а.',
				'created_at' => Carbon::now(),
			],
			[
				'slug' => Str::slug('Нам 15 років!', '-'),
				'image' => 'news/03.jpg',
				'title' => 'Нам 15 років!',
				'body' => 'Хочемо подякувати вам - наші любі гості, що весь цей час довіряєте нам, та розділяєте з нами свої урочисті події.',
				'created_at' => Carbon::now(),
			],

		]);
	}
}
