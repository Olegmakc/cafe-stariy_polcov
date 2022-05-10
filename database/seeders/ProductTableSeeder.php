<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('products')->insert([
			[
				'category_id' => '1',
				'title' => 'Суперсирна паста з креветками',
				'description' => 'Cулугуні, пармезан, моцарелла та чеддер та тигорові креветки',
				'weight' => '320',
				'photo' => 'products/01.jpg',
				'price' => '110',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '1',
				'title' => 'Ньокки з грибами',
				'description' => 'Беконом під рожевим соусом',
				'weight' => '180',
				'photo' => 'products/02.jpg',
				'price' => '190',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '1',
				'title' => 'Шніцель курячий',
				'description' => 'З запеченою картоплею',
				'weight' => '200',
				'photo' => 'products/03.jpg',
				'price' => '185',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '1',
				'title' => 'Домашня паста з лососем',
				'description' => 	'М\'ягкий шпинат та вершковий соус альфредо',
				'weight' => '280',
				'photo' => 'products/04.jpg',
				'price' => '150',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '1',
				'title' => 'Курячі мітболи з картопляним пюре',
				'description' => 'Маринованною цибулею під вершково-грибним соусом',
				'weight' => '340',
				'photo' => 'products/05.jpg',
				'price' => '140',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '2',
				'title' => 'Салат з маринованими анчоусами',
				'description' => 'Запечена картопля, перепелині яйця та червона цибуля',
				'weight' => '240',
				'photo' => 'products/06.png',
				'price' => '169',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '2',
				'title' => 'Салат з куркою',
				'description' => 'Листя ромену, шматочки бріошу, обсмажена курка, бекон, чері, перепелині яйця, пармезан, соус Цезар',
				'weight' => '230',
				'photo' => 'products/19.jpeg',
				'price' => '155',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '2',
				'title' => 'Салат зі свіжих овочів',
				'description' => 'з оливковою олією',
				'weight' => '320',
				'photo' => 'products/20.jpg',
				'price' => '95',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '2',
				'title' => 'Цезар з лососем',
				'description' => 'з хрустким багетом, авокадо та яйцем',
				'weight' => '260',
				'photo' => 'products/21.jpg',
				'price' => '250',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '2',
				'title' => 'Салат із тигровою креветкою',
				'description' => 'Половинкою стиглого авокадо, мікс-салатом, медово-гірчичним соусом з манго, солоними горіхами',
				'weight' => '320',
				'photo' => 'products/07.jpg',
				'price' => '205',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],

			[
				'category_id' => '2',
				'title' => 'Салат цезар з курячим шніцелем',
				'description' => 'Ромен, томат черрі, курячій шніцель, пармезан, соус  айолі-цезар',
				'weight' => '220',
				'photo' => 'products/18.jpeg',
				'price' => '135',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '3',
				'title' => 'Філе лосося',
				'description' => 'З кіноа, цукіні та хіяши-вакаме',
				'weight' => '190',
				'photo' => 'products/08.jpg',
				'price' => '248',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '3',
				'title' => 'Шашлик зі свинини',
				'description' => 'шашлик замаринований за фірмовим рецептом',
				'weight' => '100',
				'photo' => 'products/22.jpg',
				'price' => '60',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '3',
				'title' => 'Ребра на грилі',
				'description' => 'мясисті реберця замариновані у фірмових спеціях',
				'weight' => '400',
				'photo' => 'products/24.jpg',
				'price' => '200',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '3',
				'title' => 'Стейк зі свинини',
				'description' => 'соковита свинина на кісточці',
				'weight' => '100',
				'photo' => 'products/23.jpg',
				'price' => '60',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '4',
				'title' => 'Апельсиновий фреш',
				'description' => 'Свіжовижатий сік з апельсина',
				'weight' => '500',
				'photo' => 'products/09.jpg',
				'price' => '70',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '4',
				'title' => 'Зелений смузі',
				'description' => 'Селера, яблуко, мед, гарбузове насіння',
				'weight' => '500',
				'photo' => 'products/10.jpg',
				'price' => '70',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '4',
				'title' => 'Фруктовий смузі',
				'description' => 'Груша, манго, банан, кокосове молоко',
				'weight' => '500',
				'photo' => 'products/11.jpg',
				'price' => '90',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '5',
				'title' => 'Великий сніданок з ковбасками-гриль',
				'description' => 'З яєчнею, запеченою картоплею, квасолею та томатами',
				'weight' => '500',
				'photo' => 'products/12.jpg',
				'price' => '190',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '5',
				'title' => 'Авокадо-тост з тигровими креветками',
				'description' => 'З гуакамоле, цибулею-фрі та яйцем-пашот на злаковому хлібі на заквасці',
				'weight' => '340',
				'photo' => 'products/13.jpg',
				'price' => '205',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '5',
				'title' => 'Яйця-бенедикт з лососем',
				'description' => 'Подаємо з авокадо на зеленому млинці під голандським соусом',
				'weight' => '230',
				'photo' => 'products/14.jpg',
				'price' => '150',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '4',
				'title' => 'Coca-Cola 0.25',
				'description' => NULL,
				'weight' => '250',
				'photo' => 'products/15.png',
				'price' => '35',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '4',
				'title' => 'Моршинська негазована',
				'description' => NULL,
				'weight' => '500',
				'photo' => 'products/16.png',
				'price' => '40',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
			[
				'category_id' => '4',
				'title' => 'Sprite',
				'description' => NULL,
				'weight' => '500',
				'photo' => 'products/17.png',
				'price' => '35',
				'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
			],
		]);
	}
}
