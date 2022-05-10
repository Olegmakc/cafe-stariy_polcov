<?php

namespace App\Providers;

use App\Providers\OrderConfirmed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOrderConfirmedNotification
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
     * @param  \App\Providers\OrderConfirmed  $event
     * @return void
     */
    public function handle(OrderConfirmed $event)
    {
        //
    }
}
