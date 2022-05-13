<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
			'name' => 'required|string|min:3|max:255',
			'phone' => 'required|digits:10',
			'email' => 'required|email',
			'destination_adress' => 'required|string',
			'comment' => 'required|min:5|max:255',
			'payment' => 'required|in:cash,credit',
		];
	}
	public function messages()
	{
		return [
			'required' => 'Поле :attribute не повинно бути пустим',
			'phone.digits' => 'Поле :attribute повинно мати 10 цифр',
			'email.email' => 'Поле :attribute повинно бути коректного формату',
			'min' => 'Поле :attribute повинно бути не менше 3-x символи',
			'max' => 'Поле :attribute повинно бути не більше ніж 255 символи',
		];
	}
	public function attributes()
	{
		return [
			'name' => 'Ім\'я',
			'phone' => 'Номер телефону',
			'destination_adress' => 'Адреса доставки',
			'comment' => 'Коментар',
		];
	}
}
