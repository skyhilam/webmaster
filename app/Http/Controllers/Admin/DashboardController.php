<?php 

namespace App\Http\Controllers\Admin;

use App\Mail\DailyMail;
use App\Http\Controllers\Controller;
use App\Repositories\MessageStorageRepository;
use App\Repositories\AnalyticsRepository;


class DashboardController extends Controller
{
	protected $analytics;
	protected $inbox;

	public function __construct(AnalyticsRepository $analytics, MessageStorageRepository $inbox)
	{
		$this->analytics = $analytics;
		$this->inbox = $inbox;
	}

	

	public function index()
	{	
		$inbox = $this->inbox->getTopSixNewMessage();
		$summary = $this->analytics->get()->only('sessions');
		return view('admin.dashboard', compact('summary', 'inbox'));
	}
}