<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CompanyResource;
use App\Models\V1\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function getCompany(int $companyId) {
        $company = Company::find($companyId);
        return new CompanyResource($company);
    }
}
