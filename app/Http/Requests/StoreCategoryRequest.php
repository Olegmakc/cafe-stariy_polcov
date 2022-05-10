<?php

namespace App\Http\Requests;

// use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
		$rule = [
			'code' => 'required|string|min:3|unique:categories,code',
			'name' => 'required|string|min:5',
			'image' => 'nullable|image',
		];
		if ($this->route()->named('category.update')) {
			$rule['code'] .= ',' . $this->route()->parameter('category')->id;
		}
		return $rule;
	}
	public function messages()
	{
		return [
			'code.required' => 'Поле :attribute не повинно бути пустим',
			'name.required' => 'Поле :attribute не повинно бути пустим',
			'code.string' => 'Поле :attribute не повинно бути строкой',
			'name.string' => 'Поле :attribute не повинно бути строкой',

			'min' => 'Поле :attribute повинно бути не менше як 3 символи',
		];
	}
	public function attributes()
	{
		return [
			'code' => 'Код категорії',
			'name' => 'Назва категорії',
		];
	}
}
