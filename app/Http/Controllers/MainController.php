<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;


class MainController extends Controller
{
	public function index(Request $request)
	{
		$categories = Category::select(['id', 'name', 'code'])->with('products')->get();

		return view('index', compact('categories'));
	}

	public function menu()
	{
		return view('menu.menu');
	}
	public function menuCategory(Request $request, $categoryCode)
	{
		$category = Category::where('code', $categoryCode)->first();
		$products = $category->products()->get();

		return view('menu.menu_category', compact('category', 'products'));
	}

	public function filterProducts(Request $request)
	{
		if ($request->ajax()) {
			$filter = $request->get('filter');
			$category = Category::where('code', $request->get('slug'))->first();
			$products = $category->products();
			switch ($filter) {
				case 'price_up':
					$products = $products->get()->sortBy('price')->values();
					break;
				case 'price_down':
					$products = $products->get()->sortByDesc('price')->values();
					break;
				default:
					$products =	$products->get();
					break;
			}
			return response()->json($products);
		}
	}

	public function about()
	{
		return view('about');
	}

	public function users()
	{
		$users = User::get();
		return view("dashboard", compact('users'));
	}

	public function news()
	{
		return view('news.news');
	}

	public function newsArticle($slug)
	{
		$newsItem = News::where('slug', $slug)->first();
		return view('news.show', compact('newsItem'));
	}
}
