<?php

namespace App\Repositories;

use App\Models\Guest;
use Exception;
use Illuminate\Support\Facades\Log;

class GuestRepository
{
	/**
	 * Save all guests
	 *
	 * @param $data
	 * @param null $country
	 * @param null $weather
	 * @return bool
	 */
	public function save($data, $country = null, $weather = null)
	{
		try {
			foreach ($data as $guest) {
				Guest::create([
					'name' => $guest['name'],
					'phone' => $guest['phone'],
					'country' => $country,
					'weather' => $weather,
				]);
			}
		} catch (Exception $exception) {
			Log::critical("Exception, when inserting new guest: ". $exception->getMessage());
			return false;
		}

		return true;
	}
}