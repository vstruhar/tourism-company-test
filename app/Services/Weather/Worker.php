<?php

namespace App\Services\Weather;

use App\Services\Weather\Endpoints\Endpoint;
use App\Services\Weather\Formatter\FormatterInterface;
use App\Services\Weather\Parsers\ParserInterface;

class Worker
{
	/**
	 * @var Endpoint
	 */
	private $endpoint;

	/**
	 * @var ParserInterface
	 */
	private $parser;

	/**
	 * @var FormatterInterface
	 */
	private $formatter;

	/**
	 * BaseService constructor.
	 *
	 * @param Endpoint $endpoint
	 * @param ParserInterface $parser
	 * @param FormatterInterface $formatter
	 */
	public function __construct(Endpoint $endpoint, ParserInterface $parser, FormatterInterface $formatter)
	{
		$this->endpoint = $endpoint;
		$this->parser = $parser;
		$this->formatter = $formatter;
	}

	/**
	 * Call the api endpoint and parse the result
	 *
	 * @param string $country
	 * @return string
	 */
	public function handle(String $country)
	{
		$response = $this->endpoint->getData($country);
		$weather = $this->parser->handle($response);

		if( ! $weather ) {
			return 'Failed to get weather data';
		}

		return $this->formatter->format($weather);
	}
}