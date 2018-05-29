<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\StoreGuestsRequest;
use App\Repositories\GuestRepository;
use App\Services\LocationService;
use App\Services\WeatherService;

class FormGuest extends ApiBaseController
{
	/**
	 * @var GuestRepository
	 */
	private $guest_repository;

	/**
	 * @var LocationService
	 */
	private $location_service;

	/**
	 * @var WeatherService
	 */
	private $weather_service;

	/**
	 * FormGuest constructor
	 *
	 * @param GuestRepository $guest_repository
	 * @param LocationService $location_service
	 * @param WeatherService $weather_service
	 */
	public function __construct(GuestRepository $guest_repository, LocationService $location_service, WeatherService $weather_service)
	{
		$this->guest_repository = $guest_repository;
		$this->location_service = $location_service;
		$this->weather_service = $weather_service;
	}

	/**
	 * Store guests in the database
	 *
	 * @param StoreGuestsRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function store(StoreGuestsRequest $request)
    {
    	$country = $this->location_service->getCountryFromIp($request->ip());
    	$weather = $this->weather_service->getByCountry($country);

		$success = $this->guest_repository->save($request->get('guests'), $country, $weather);

		if( ! $success ) {
			return $this->respondWithFailure('Failed to save all guests');
		}

		return $this->respondWithCreatedSuccessfully('All guests were saved successfully');
    }
}
