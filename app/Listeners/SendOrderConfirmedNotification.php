<?php

namespace App\Listeners;

use App\Events\OrderConfirmed;
use App\Mail\OrderConfirm;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderConfirmedNotification implements ShouldQueue
{
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  \App\Events\OrderConfirmed  $event
	 * @return void
	 */
	public function handle(OrderConfirmed $event)
	{
		Mail::to($event->order->email)->send(new OrderConfirm($event->order));
	}
}
