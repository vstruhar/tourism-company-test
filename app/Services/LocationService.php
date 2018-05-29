<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;

class LocationService
{
	/**
	 * Get location from IP address
	 *
	 * @param string $ip
	 * @return string
	 */
	public function getCountryFromIp($ip)
	{
		try {
			$result = geoip()->getLocation($ip);
		} catch( Exception $exception ) {
			Log::warning('Failed to get location: '. $exception->getMessage());
			return 'Failed to get country from ip';
		}

		return $result->country;
	}
}