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
            'sim_id' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'strength' => ['required'],
            'battery' => ['required'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'sim_id' => $this->id,
            'latitude' => $this->lat,
            'longitude' => $this->lng,
            'strength' => $this->signal,
            'battery' => $this->bat,
        ]);
    }
}
