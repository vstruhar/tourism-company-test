<?php

namespace App\Services\Weather\Endpoints;

use GuzzleHttp\Client;

abstract class Endpoint
{
	/**
	 * @var Client
	 */
	protected $client;

	/**
	 * OpenWeather constructor.
	 */
	public function __construct()
	{
		$this->client = new Client;
	}

	/**
	 * Get data from endpoint
	 *
	 * @param string $country
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public abstract function getData(String $country);
}