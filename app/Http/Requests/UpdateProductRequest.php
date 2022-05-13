<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
			'category_id' => 'required',
			'title' => 'required|string|min:3|max:255',
			'photo' => 'nullable|image|mimes:png,jpg,svg,jpeg',
			'description' => 'nullable|string',
			'weight' => 'required|numeric',
			'price' => 'required|numeric',
		];
	}
	public function messages()
	{
		return [
			'title.required' => 'Поле :attribute не повинно бути пустим',
			'weight.required' => 'Поле :attribute не повинно бути пустим',
			'description.string' => 'Поле :attribute не повинно бути строкой',
			'name.string' => 'Поле :attribute не повинно бути строкой',
			'price.required' => 'Поле :attribute не повинно бути пустим',
			'photo.required' => 'Продукт повинун мати :attribute',
			'photo' => ':attribute повинно бути формату ( *.png, *.jpg, *.svg, *.jpeg )',
			'min' => 'Поле :attribute повинно бути не менше 3-х символів',
			'max' => 'Поле :attribute повинно бути не більше ніж 255 символи',
		];
	}
	public function attributes()
	{
		return [
			'title' => 'Назва продукту',
			'weight' => 'Вага (грами)',
			'price' => 'Ціна (грн.)',
			'description' => 'Опис продукту',
			'photo' => 'Зображення',

		];
	}
}
