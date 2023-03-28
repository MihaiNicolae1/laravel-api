<?php

namespace App\Http\Requests\V1;

use App\Rules\LatRule;
use App\Rules\LongRule;

class StoreStationRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'       => ['required', 'string', 'max:255'],
            'latitude'   => ['required', 'string', new LatRule()],
            'longitude'  => ['required', 'string', new LongRule()],
            'company_id' => ['required', 'integer'],
            'address'    => ['required', 'string', 'max:255']
        ];
    }
}
