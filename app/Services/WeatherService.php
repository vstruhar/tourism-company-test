<?php

namespace App\Services;

class WeatherService
{
	private $worker;

	/**
	 * WeatherService constructor.
	 */
	public function __construct()
	{
		$this->worker = app()->make('WeatherWorker');
	}

	/**
	 * Get current weather by country
	 *
	 * @param string $country
	 * @return string
	 */
	public function getByCountry(String $country)
	{
		return $this->worker->handle($country);
	}
}