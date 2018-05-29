<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuestsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'guests' => 'required',
            'guests.*.name' => 'required|min:3',
        ];
    }

	/**
	 * Custom messages
	 *
	 * @return array
	 */
	public function messages()
    {
    	return [
    		'guests.required' => 'You have to submit at least one guest',
	    ];
    }
}
