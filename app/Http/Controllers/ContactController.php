<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
	public function create()
	{
		return view('contact');
	}
	/**
	 * Сохранить новую запись .
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreContactRequest  $request)
	{
		$validated = $request->validated();
		Contact::create([
			'name' => $validated['name'],
			'email' => $validated['email'],
			'subject' => $validated['subject'],
			'message' => $validated['message'],

		]);
		session()->flash('status', 'Ваше повідомлення було успішно надіслано');
		return redirect(route('index'));
	}
}
