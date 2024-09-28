<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCoordinatesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'simID' => ['required'],      // After merge, use 'simID' instead of 'id'
            'latitude' => ['required'],   // Use 'latitude' instead of 'lat'
            'longitude' => ['required'],  // Use 'longitude' instead of 'lng'
            'strength' => ['required'],   // Use 'strength' instead of 'signal'
            'battery' => ['required'],    // Use 'battery' instead of 'bat'
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'simID' => $this->id,
            'latitude' => $this->lat,
            'longitude' => $this->lng,
            'strength' => $this->signal,
            'battery' => $this->bat,
        ]);
    }
}
