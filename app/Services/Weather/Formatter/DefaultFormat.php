<?php

namespace App\Services\Weather\Formatter;

use App\Services\Weather\WeatherDetails;

class DefaultFormat implements FormatterInterface
{
	/**
	 * Default format for weather
	 *
	 * @param WeatherDetails $weather
	 * @return string
	 */
	public function format(WeatherDetails $weather)
	{
		return 'Temp: ' . $weather->getTemperature() .'K; Desc: ' . $weather->getDescription();
	}
}