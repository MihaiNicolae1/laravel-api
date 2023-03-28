<?php

namespace App\Http\Requests\V1;

use App\Rules\LatRule;
use App\Rules\LongRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the update request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'       => ['string', 'max:255'],
            'latitude'   => ['string', new LatRule()],
            'longitude'  => ['string', new LongRule()],
            'company_id' => ['integer'],
            'address'    => ['string', 'max:255']
        ];
    }
}
