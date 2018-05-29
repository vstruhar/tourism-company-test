<?php

namespace App\Services\Weather;

class WeatherDetails
{
	/**
	 * @var float
	 */
	protected $temperature = null;

	/**
	 * @var string
	 */
	protected $description = null;

	/**
	 * @return float
	 */
	public function getTemperature(): float
	{
		return $this->temperature;
	}

	/**
	 * @param float $temperature
	 */
	public function setTemperature(float $temperature): void
	{
		$this->temperature = $temperature;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @param string $description
	 */
	public function setDescription(string $description): void
	{
		$this->description = $description;
	}
}