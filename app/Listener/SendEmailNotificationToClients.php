<?php

namespace App\Listener;

use App\Events\newBookCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Client;
use Mail;

class SendEmailNotificationToClients
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
     * @param  newBookCreated  $event
     * @return void
     */
    public function handle(newBookCreated $event)
    {

        $clients = (new client())->getClientsByAuthor($event->idAutor);

        foreach ($clients as $client) {
            Mail::send('notifications.toClients',['client' => $client], function($m) use ($client){
            $m->to($client->email, $client->name)
            ->subject('uno de tus autores ha publicado un nuevo libro');
        });
        }
    }
}
