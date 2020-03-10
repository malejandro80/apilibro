<?php

namespace App\Listener;

use App\Events\sucessfullReservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\author;
use Mail;

class SendEmailNotification
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
     * @param  sucessfullReservation  $event
     * @return void
     */
    public function handle(sucessfullReservation $event)
    {
        $autor =author::find($event->idAuthor);

        Mail::send('notifications.newReservation',['autor' => $autor], function($m) use ($autor){
            $m->to($autor->email, $autor->name)
            ->subject('felicidades, han reservado uno de tus libros');
        });

    }
}
