<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreCompanyRequest;
use App\Models\V1\Company;

use Illuminate\Http\JsonResponse;
use Knuckles\Scribe\Attributes\Group;

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
    public function get(int $id)
    {
        try {
            $company = Company::find($id);
            if (empty($company)) {
                return apiful()->withMessage('Resource not found')->notFound();
            }
            return apiful($company)->success();
        } catch (\Exception $e) {
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }

    /**
     * Create a new company
     *
     * This endpoint lets you create a new company.
     * @group Company
     * @bodyParam name string required The name of the company. Example: VirtaLTD
     * @bodyParam parent_company_id integer The id of the parent company.If not provided, will be null. Example: 1
     */
    public function store(StoreCompanyRequest $request)
    {
        try {
            if ($request->has('parent_company_id')) {
                $parent_company_id = $request->get('parent_company_id');
                if (!Company::where('id', $parent_company_id)->exists()) {
                    return apiful()
                        ->withMessage('Parent company not found')
                        ->notFound();
                }
            }
            $company = Company::create($request->validated());
            return apiful($company)->created();
        } catch (\Exception $e) {
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }

    /**
     * Update an existing company
     *
     * This endpoint lets you update a company.
     * @group Company
     * @bodyParam name string The name of the company. Example: VirtaUpdated
     * @bodyParam parent_company_id string The id of the parent company.If not provided, will be set to null. Example: 1
     */
    public function update($id, StoreCompanyRequest $request)
    {
        try {
            $data = Company::where('id',$id)->update($request);
            return apiful($data)->updated();
        } catch (\Exception $e) {
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }

    /**
     * Delete an existing company
     *
     * This endpoint lets you delete an existing company.
     * Deleting a parent company will also delete all it's children and their stations.
     * @group Company
     * @urlParam id integer required The ID of the company to be deleted. Example:1
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            if (!Company::where('id', $id)->exists()) {
                return apiful()->withMessage("Resource not found")->notFound();
            }
            $descendants = Company::find($id)->descendants()->get();
            if (!empty($descendants)) {
                Company::destroy($descendants);
            }
            Company::destroy($id);
            return apiful()->deleted();
        } catch (\Exception $e) {
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }
}
