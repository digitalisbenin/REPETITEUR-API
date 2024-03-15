<?php

namespace App\Listeners;

use App\Events\NouvelleDemandeAjoutee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class IncrementerNotificationCount
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
     * @param  \App\Events\NouvelleDemandeAjoutee  $event
     * @return void
     */
    public function handle(NouvelleDemandeAjoutee $event)
    {
       // $this->emit('notificationAdded');
    }
}
