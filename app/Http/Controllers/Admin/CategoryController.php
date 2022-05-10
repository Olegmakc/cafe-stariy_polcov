<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$categories = Category::when($request->has('archive'), function ($query) {
			$query->onlyTrashed();
		})->paginate(7);
		return view('admin.categories.categories', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.categories.form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreCategoryRequest $request)
	{
		$path = $request->file('image')->store('categories');
		$validated = $request->validated();
		Category::create([
			'code' => $validated['code'],
			'name' => $validated['name'],
			'image' => $path,
		]);
		session()->flash('category-success', 'Категорію було успішно створенно');
		return redirect(route('category.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function show(Category $category)
	{
		return view('admin.categories.category', compact('category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Category $category)
	{
		return view('admin.categories.form', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function update(StoreCategoryRequest $request, Category $category)
	{
		$validated = $request->safe()->all();
		if ($request->has('image')) {
			$category = Category::findOrFail($category->id);
			$image = $category->image;
			Storage::delete($image);
			$path = $request->file('image')->store('categories');
			$validated['image'] = $path;
		}

		$category->update($validated);
		session()->flash('category-success', 'Категорію: ' . $category->name . ' було успішно оновленно!');
		return redirect(route('category.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Category $category)
	{
		$category->delete();
		session()->flash('category-success', 'Категорію: ' . $category->name . ' було успішно видаленно!');
		return redirect()->route('category.index');
	}

	public function restore($id)
	{
		$category = Category::onlyTrashed()->findOrFail($id);
		$category->restore();
		session()->flash('category-success', 'Категорію: ' . $category->name . ' було успішно відновленно!');
		return redirect()->route('category.index');
	}

	public function forceDelete($id)
	{
		$category = Category::onlyTrashed()->findOrFail($id);
		$category->forceDelete();
		Storage::delete($category->image);
		session()->flash('category-success', 'Категорію було успішно видаленно!');
		return redirect()->route('category.index');
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
			$categories = Category::query();
			if (!empty($query)) {
				$categories = $categories->where('name', 'LIKE', "%{$query}%");
			}
			$categories = $categories->paginate(7);
			return response()->json(
				[
					'view' => view('admin.categories.searchData', compact('categories'))->render()
				]
			);
		}
	}
}
