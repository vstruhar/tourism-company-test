<?php

namespace App\Services\Weather\Parsers;

use App\Services\Weather\WeatherDetails;

class OpenWeather implements ParserInterface
{
	/**
	 * Handle the result that we got from the API endpoint
	 *
	 * @param $response
	 * @return WeatherDetails|bool
	 */
	public function handle($response)
	{
		if( ! $response ) return false;

		$contents = $response->getBody()->getContents();
		$contents = json_decode($contents);

		$weather = new WeatherDetails;

		$weather->setTemperature($contents->main->temp);

		if( count($contents->weather) ) {
			$weather->setDescription($contents->weather[0]->main);
		}

		return $weather;
	}
}