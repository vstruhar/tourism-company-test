<?php

namespace App\Services\Weather\Formatter;

use App\Services\Weather\WeatherDetails;

interface FormatterInterface
{
	/**
	 * Default format for weather
	 *
	 * @param WeatherDetails $weather
	 * @return mixed
	 */
	public function format(WeatherDetails $weather);
}