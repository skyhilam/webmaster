<?php

namespace App\Listeners;

use App\Services\Statut;
use App\Events\MemberChangeInfo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChangeInfoSuccess extends Listener
{

    /**
     * Handle the event.
     *
     * @param  MemberChangeInfo  $event
     * @return void
     */
    public function handle(MemberChangeInfo $event)
    {
        $this->statut->setStatut();
    }
}
