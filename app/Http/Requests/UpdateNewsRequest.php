<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'slug' => 'nullable|string|min:3|unique:news,slug,' . $this->news->id,
			'title' => 'required|string|min:5|max:255',
			'body' => 'required|string|min:3',
			'image' => 'nullable|image|mimes:png,jpg,svg,jpeg',
		];
	}
}
