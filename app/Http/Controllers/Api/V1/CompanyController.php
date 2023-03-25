<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CompanyResource;
use App\Models\V1\Company;

use Knuckles\Scribe\Attributes\BodyParam;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\UrlParam;

#[Group("Company", "Perform CRUD operations for company")]
class CompanyController extends Controller
{
    /**
     * Get company info
     *
     * This endpoint lets you get a company info.
     * @group Company
     * @urlParam id integer required The ID of the company.
     */
    public function get(int $id) {
        return [
            'id' =>$id,
            'parent_id' => null
        ];
    }
    /**
     * Create a new company
     *
     * This endpoint lets you create a new company.
     * @group Company
     * @bodyParam id int required The id of the user. Example: 9
     * @bodyParam parent_id string The id of the parent company.If not provided, will be null. Example: 1
     */
    public function post() {
        return 204;
    }




}
