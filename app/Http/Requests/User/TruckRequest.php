<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class TruckRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'make' => ['required', 'string', 'min:3', 'max:255'],
            'model' => ['required', 'string', 'min:3', 'max:255'],
            'year' => ['required', 'numeric', 'digits_between:4,4'],
            'seats' => ['required', 'numeric', 'min:1','max:20'],
            'bed_length' => ['required', 'numeric', 'min:12', 'max:600'],
            'colour' => ['required', 'min:2', 'max:255'],
            'vin' => ['required', 'min:17', 'max:17'],
            'current_mileage' => ['required', 'numeric', 'min:1', 'max:30'],
            'service_interval' => ['required', 'numeric', 'min:1', 'max:12'],
            'next_service' => ['required', 'date']
        ];
    }
}
