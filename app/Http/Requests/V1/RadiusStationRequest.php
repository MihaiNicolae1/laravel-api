<?php

namespace App\Http\Requests\V1;

use App\Rules\LatRule;
use App\Rules\LongRule;

class RadiusStationRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'radius_km' => ['required', 'integer'],
            'latitude'  => ['required', 'string', new LatRule()],
            'longitude' => ['required', 'string', new LongRule()]
        ];
    }
}
