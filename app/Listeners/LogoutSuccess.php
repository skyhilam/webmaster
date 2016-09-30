<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;

class LogoutSuccess extends Listener
{

    /**
     * Handle the event.
     *
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $this->statut->setVisitorStatut();
    }
}
