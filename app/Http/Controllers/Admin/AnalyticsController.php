<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\AnalyticsRepository;
use Spatie\Analytics\Period;
use Illuminate\Http\Request;


class AnalyticsController extends Controller
{
	protected $analytics;

	public function __construct(AnalyticsRepository $analytics)
	{
		$this->analytics = $analytics;
	}

	public function get(Request $request)
	{
		$summary = $this->analytics->get();

		return view('admin.analytics.index', compact('summary'));
	}
}