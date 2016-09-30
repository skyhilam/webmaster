<?php 
namespace App\Listeners;

use App\Services\Statut;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Listener
{
	protected $statut;

	public function __construct(Statut $statut)
	{
		$this->statut = $statut;
	}
}