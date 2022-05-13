<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreContactRequest extends FormRequest
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
	// protected $stopOnFirstFailure = true;

	public function rules()
	{
		return [
			'name' => 'required|string|max:255',
			'email' => 'bail|required|email',
			'subject' => 'required',
			'message' => 'required',
		];
	}
	/**
	 * Получить сообщения об ошибках для определенных правил валидации.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'name.required' => 'Заповніть поле :attribute',
			'email.required' => 'Заповніть поле :attribute',
			'email.email' => 'Поле повинно бути формату email адреси',
			'subject.required' => 'Заповніть поле :attribute',
			'message.required' => 'Введіть ваше :attribute',
		];
	}
	public function attributes()
	{
		return [
			'name' => 'Ім\'я',
			'email' => 'Eлектронна адреса',
			'subject' => 'Тема повідомлення ',
			'message' => 'Повідомлення',
		];
	}
}
