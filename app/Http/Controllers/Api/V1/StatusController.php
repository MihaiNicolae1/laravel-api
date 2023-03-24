<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Group;
use App\Http\Controllers\UrlParam;

#[Group("Server status", "See the status of the server")]
class StatusController extends Controller
{
    #[Group("Get server status")]
    #[UrlParam("id", "integer", "The ID of the post.")]
    #[UrlParam("lang", "The language.", required: false, example: "en")]
    public function get()
    {
        return [
            'status' => 'up',
            'services' => [
                'database' => 'up',
                'redis' => 'up',
            ],
        ];
    }
}
