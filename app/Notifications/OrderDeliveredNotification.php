<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderDeliveredNotification extends Notification
{
	use Queueable;

	protected $order;
	/**
	 * Create a new notification instance.
	 *
	 * @return void
	 */
	public function __construct(Order $order)
	{
		$this->order = $order;
		$this->afterCommit();
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function via($notifiable)
	{
		return ['mail'];
	}

	/**
	 * Get the mail representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail($notifiable)
	{
		$url = '/orders' . '/' . $this->order->id;
		return (new MailMessage)
			->line('Hello ' . $this->order->name . ' your order was confirmed')
			->action('Notification Action', $url)
			->line('Thank you for using our application!');
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function toArray($notifiable)
	{
		return [
			//
		];
	}
}
