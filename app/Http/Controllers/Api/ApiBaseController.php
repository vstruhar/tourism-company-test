<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiBaseController extends Controller
{
	/**
	 * Respond with success status
	 *
	 * @param string $message
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respondWithSuccess($message = '')
	{
		return response()->json(['message' => $message], 200);
	}

	/**
	 * Respond with created successfully
	 *
	 * @param string $message
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respondWithCreatedSuccessfully($message = '')
	{
		return response()->json(['message' => $message], 201);
	}

	/**
	 * Respond with failure
	 *
	 * @param string $message
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function respondWithFailure($message = '')
	{
		return response()->json(['message' => $message], 500);
	}
}