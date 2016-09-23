<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class LoginSuccess extends Listener
{

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $this->statut->setLoginStatut($event);
    }
}
