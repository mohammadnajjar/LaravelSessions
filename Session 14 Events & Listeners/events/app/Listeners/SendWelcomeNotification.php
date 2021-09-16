<?php

namespace App\Listeners;

use App\Events\Welcome;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
class SendWelcomeNotification
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
     * @param  Welcome  $event
     * @return void
     */
    public function handle(Welcome $event)
    {
    mail::to($event->user)->send(new \App\Mail\Welcome());
    }
}
