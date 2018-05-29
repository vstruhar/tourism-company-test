<?php

namespace App\Services\Weather\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class OpenWeather extends Endpoint
{
	/**
	 * Get data from endpoint
	 *
	 * @param string $country
	 * @return bool|\Psr\Http\Message\ResponseInterface
	 */
	public function getData(String $country)
	{
		$params = [
			'q' => $country,
			'units' => 'imperial',
			'appid' => config('services.open_weather.key'),
		];

		try {
			$response = $this->client->request('GET', 'http://api.openweathermap.org/data/2.5/weather', ['query' => $params]);
		} catch(GuzzleException $exception) {
			Log::warning('Failed to get weather: '. $exception->getMessage());
			return false;
		}

		return $response;
	}
}