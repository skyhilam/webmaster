<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\AnalyticsRepository;


class DashboardController extends Controller
{
	protected $analytics;
	protected $user;

	public function __construct(AnalyticsRepository $analytics, UserRepository $user)
	{
		$this->analytics = $analytics;
		$this->user = $user;
	}

	

	public function index()
	{
		$messages = $this->user->getMessages(6);
		$summary = $this->analytics->get()->only('sessions');
		return view('admin.dashboard', compact('summary', 'messages'));
	}
}