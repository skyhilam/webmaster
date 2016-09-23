<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\AnalyticsRepository;
use Spatie\Analytics\Period;
use Illuminate\Http\Request;


class AnalyticsController extends Controller
{
	protected $alt_rep;

	public function __construct(AnalyticsRepository $alt_rep)
	{
		$this->alt_rep = $alt_rep;
	}

	public function get(Request $request)
	{
		$days = $request->input('days', 0);
		$summary = $this->alt_rep->fetchUsersAndPageviews(Period::days($days));

		return view('admin.analytics.index', compact('summary', 'days'));
	}
}