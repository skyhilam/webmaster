<?php 
namespace App\Repositories;

use Analytics;
use Carbon\Carbon;
use Spatie\Analytics\Period;
use Illuminate\Support\Collection;

class AnalyticsRepository
{
	

	public function fetchUsersAndPageviews(Period $period): Collection
	{
		$response = Analytics::performQuery(
			$period,
			'ga:sessions,ga:pageviews,ga:users',
			[]);

		return collect($response['rows'] ?? [])->map(function (array $item) {
            return [
                'sessions' 		=> (int) $item[0],
                'pageviews' 	=> (int) $item[1],
                'users' 		=> (int) $item[2]
            ];
        });
	}


	public function get()
	{
		// today
		$periods = $this->getCustomPeriod();

		$today_report = $this->getReport(1); 
		$last_7_days_report = $this->getReport(7);
		$last_30_days_report = $this->getReport(30);


		$s = 'sessions';
		$p = 'pageviews';
		$u = 'users';
		return [
			$p =>
				[
					'day' => $today_report[$p],
					'week' => $last_7_days_report[$p],
					'month' => $last_30_days_report[$p]
				],
			$s =>
				[
					'day' => $today_report[$s],
					'week' => $last_7_days_report[$s],
					'month' => $last_30_days_report[$s]
				],
			$u =>
				[
					'day' => $today_report[$u],
					'week' => $last_7_days_report[$u],
					'month' => $last_30_days_report[$u]
				],
		];



	}


	protected function getReport($days): Array
	{
		// d = data;
		$periods = $this->getCustomPeriod($days);

		$d_1 = $this->fetchUsersAndPageviews($periods[0])->first();
		$d_2 = $this->fetchUsersAndPageviews($periods[1])->first();

		return $this->compare($d_1, $d_2)->toArray();
	}


	protected function getCustomPeriod($days = 1)
	{
		// st = start day, pst = preset start day, p = past, pr = present;
		$st 	= Carbon::today();
		$p 		= Carbon::tomorrow();
		$pst  	= Carbon::yesterday();

		if ($days != 1) {
			$st 	= Carbon::today()->subDays($days);
			$pst 	= Carbon::today()->subDays($days * 2);			
		}

		return [Period::create($st, $p), Period::create($pst, $st)];
	}



	protected function compare($data_1, $data_2): Collection
	{
		$past_sessions = $data_1['sessions'];
		$present_sessions = $data_2['sessions'];

		$past_pageviews = $data_1['pageviews'];
		$present_pageviews = $data_2['pageviews'];

		$past_users = $data_1['users'];
		$present_users = $data_2['users'];

		$grow_sessions = $this->getGrow($past_sessions, $present_sessions);
		$grow_pageviews = $this->getGrow($past_pageviews, $present_pageviews);
		$grow_users = $this->getGrow($past_users, $present_users);

		return collect([
			'sessions' 	=> [
				'past' 		=> number_format($past_sessions), 
				'present' 	=> number_format($present_sessions), 
				'grow' 		=> $grow_sessions], 

			'pageviews' 	=> [
				'past' 		=> number_format($past_pageviews), 
				'present' 	=> number_format($present_pageviews), 
				'grow' 		=> $grow_pageviews], 

			'users' 	=> [
				'past' 		=> number_format($past_users), 
				'present' 	=> number_format($present_users), 
				'grow' 		=> $grow_users]
		]);
	}

	protected function getGrow($data_1, $data_2)
	{

		$divisor = $data_2?: 1;
		return number_format(($data_1 - $data_2)/$divisor * 100);
	}
}




