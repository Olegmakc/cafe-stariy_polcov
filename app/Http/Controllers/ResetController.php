<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\HttpCache\Store;

class ResetController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		Artisan::call('migrate:fresh --seed');
		foreach (['products', 'categories', 'news'] as $folder) {
			Storage::deleteDirectory($folder);
			Storage::makeDirectory($folder);

			$files = Storage::disk('reset')->files($folder);

			foreach ($files as $file) {
				Storage::put($file, Storage::disk('reset')->get($file));
			}
		}
		return redirect()->route('index');
	}
}
