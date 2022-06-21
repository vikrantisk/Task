<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class BoatRequest extends FormRequest
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
            'length' => ['required', 'numeric', 'min:12', 'max:120'],
            'width' => ['required', 'numeric', 'min:12', 'max:120'],
            'hin' => ['required', 'min:12', 'max:12'],
            'current_hours' => ['required', 'numeric', 'min:1', 'max:30'],
            'service_interval' => ['required', 'numeric', 'min:1', 'max:12'],
            'next_service' => ['required', 'date']
        ];
    }
}
