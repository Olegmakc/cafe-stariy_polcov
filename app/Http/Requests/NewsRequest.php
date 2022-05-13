<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
			'slug' => 'nullable|string|min:3|unique:news,slug',
			'title' => 'required|string|min:5|max:255',
			'body' => 'required|string|min:3',
			'image' => 'required|image|mimes:png,jpg,svg,jpeg',
		];
	}
	public function messages()
	{
		return [
			'slug.unique' => 'Такий :attribute вже існує, спробуйте інший!',
			'required' => 'Поле :attribute не повинно бути пустим',
			'title.min' => 'Поле :attribute повинно мати мінімум 5 символів',
			'title.max' => 'Поле :attribute повинно мати максимум 255 символів',
			'image' => ':attribute повинно бути формату (*.png, *.jpg, *.svg, *.jpeg)',
			'min' => 'Поле :attribute повинно бути не менше 3-х символів',
			'max' => 'Поле :attribute повинно бути не більше як 255 символи',
		];
	}
	public function attributes()
	{
		return [
			'slug' => 'код новини',
			'title' => 'Заголовок новини',
			'destination_adress' => 'Текс новини',
			'image' => 'Зображення новини',

		];
	}
}
