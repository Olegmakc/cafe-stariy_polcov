<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$products = Product::with('category')
			->when($request->has('archive'), function ($query) {
				$query->onlyTrashed();
			})
			->paginate(7);

		return view('admin.products.products', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.products.form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ProductRequest $request)
	{
		$path = $request->file('photo')->store('products');
		$params = $request->safe()->all();
		$params['photo'] = $path;
		Product::create($params);
		session()->flash('success', 'Запис успішно додано!');
		return redirect()->route('products.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$product = Product::find($id);
		return view('admin.products.product', compact('product'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$product = Product::findOrFail($id);
		$categories = Category::get();
		return view('admin.products.form', compact('product', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateProductRequest $request, $id)
	{
		$params = $request->safe()->all();
		if ($request->has('photo')) {
			$product = Product::find($id);
			Storage::delete($product->photo);
			$path = $request->file('photo')->store('products');
			$params['photo'] = $path;
		}
		$product = Product::findOrFail($id);
		$product->update($params);
		session()->flash('success', 'Запис успішно ' . $product->title . ' оновленно!');
		return redirect()->route('products.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$product = Product::findOrFail($id);
		$product->delete();
		session()->flash('success', 'Запис:' . $product->title . ' успішно видаленно!');
		return redirect()->route('products.index');
	}

	/**
	 * Restore the specified resource in storage.
	 *
	 * @param  int  $id
	 */
	public function restore($id)
	{
		$product = Product::onlyTrashed()->findOrFail($id);
		$product->restore();
		session()->flash('success', 'Запис: ' . $product->title . ' успішно відновленно!');
		return redirect()->route('products.index');
	}

	/**
	 * Force delete the specified resource in storage.
	 *
	 * @param  int  $id
	 */
	public function forceDelete($id)
	{
		$product = Product::onlyTrashed()->findOrFail($id);
		$product->forceDelete();
		Storage::delete($product->photo);
		session()->flash('success', 'Запис успішно видаленно!');
		return redirect()->route('products.index');
	}

	/**
	 *
	 * @param  \Illuminate\Http\Request  $request
	 */
	function fetch_data(Request $request)
	{
		if ($request->ajax()) {
			$query = $request->get('query');
			$query = str_replace(" ", "%", $query);
			$products = Product::with('category');
			if (!empty($query)) {
				$products = $products->where('title', 'LIKE', "%{$query}%");
			}
			// 	$request->whenHas('query', function ($input) {
			// 		//
			//   });
			if (!is_null($request->get('category'))) {
				$products = $products->where('category_id', $request->get('category'));
			}
			$products = $products->paginate(7);
			return response()->json(
				[
					'view' => view('admin.products.searchData', compact('products'))->render()
				]
			);
		}
	}
}
