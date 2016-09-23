<?php 
namespace App\Repositories;

use Analytics;
use Spatie\Analytics\Period;

class AnalyticsRepository
{
	

	public function fetchUsersAndPageviews(Period $period)
	{


		$response = Analytics::performQuery(
			$period,
			'ga:sessions,ga:pageviews,ga:users',
			[]);



		$summary = collect($response['rows'] ?? [])->map(function (array $browserRow) {
            return [
                'sessions' => (int) $browserRow[0],
                'browser' => (int) $browserRow[1],
                'users' => (int) $browserRow[2]
            ];
        });


        return $summary;

	}
}