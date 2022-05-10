<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$news = News::paginate(7);
		return view('admin.news.index', compact('news'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.news.form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(NewsRequest $request)
	{
		$path = $request->file('image')->store('news');
		$validated = $request->validated();

		if (is_null($request->slug)) {
			$slug = Str::slug($validated['title'], '-');
			News::createNews($slug, $validated['title'], $validated['body'], $path);
		} else {
			$slug =  Str::slug($validated['slug'], '-');
			$news = News::createNews($slug, $validated['title'], $validated['body'], $path);
		}
		session()->flash('news-success', 'Новину: ' . Str::of($news->title)->words(3) . ' було успішно створенно!');
		return redirect(route('news.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\News  $news
	 * @return \Illuminate\Http\Response
	 */
	public function show(News $news)
	{
		return view('admin.news.show', compact('news'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\News  $news
	 * @return \Illuminate\Http\Response
	 */
	public function edit(News $news)
	{
		return view('admin.news.form', compact('news'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\News  $news
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateNewsRequest $request, News $news)
	{
		$validated = $request->safe()->all();
		if ($request->has('image')) {
			Storage::delete($news->image);
			$path = $request->file('image')->store('news');
			$validated['image'] = $path;
		}
		$news->update($validated);
		session()->flash('news-success', 'Новину: ' . Str::of($news->title)->words(3) . ' було успішно оновленно!');

		return redirect(route('news.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\News  $news
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(News $news)
	{
		$news->delete();
		Storage::delete($news->image);
		session()->flash('news-success', 'Новину: ' . Str::of($news->title)->words(3) . ' було успішно видаленно!');

		return redirect()->route('news.index');
	}
	function fetch_data(Request $request)
	{
		if ($request->ajax()) {
			$query = $request->get('query');
			$query = str_replace(" ", "%", $query);
			$news = News::query();
			if (!empty($query)) {
				$news->where(function ($q) use ($query) {
					foreach (['title', 'body'] as  $field) {
						$q->orWhere($field, 'LIKE', "%{$query}%");
					}
				});
			}
			$news = $news->paginate(7);
			return response()->json(
				[
					'view' => view('admin.news.searchData', compact('news'))->render()
				]
			);
		}
	}
}
