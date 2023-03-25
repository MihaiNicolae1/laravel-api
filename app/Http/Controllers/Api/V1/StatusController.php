<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;
use Knuckles\Scribe\Attributes\Group;

class StatusController extends Controller
{
    #[Group("Status", "See the status of the API")]
    public function get()
    {
        return [
            'status' => 'up',
            'time'   => Date::now(),
            'services' => [
                'database' => 'up'
            ],
        ];
    }
}
