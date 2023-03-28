<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreCompanyRequest;
use App\Http\Requests\V1\UpdateCompanyRequest;
use App\Models\V1\Company;

use App\Models\V1\Station;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
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
     *
     * @response 200 scenario=success {
     * "status": "success",
     * "status_code": 200,
     * "message": null,
     * "data": {
     * "id": 6,
     * "parent_company_id": null,
     * "name": "VirtaLTD",
     * "created_at": "2023-03-27T12:15:47.000000Z",
     * "updated_at": "2023-03-27T12:15:47.000000Z"
     * },
     * "meta": []
     * }
     * @response status=404 scenario="company not found" {"message": "Resource not found"}
     */
    public function get(int $id): JsonResponse
    {
        try {
            $company = Company::find($id);
            if (empty($company)) {
                return apiful()->withMessage('Resource not found')->notFound();
            }
            return apiful($company)->success();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }

    /**
     * Create a new company
     *
     * This endpoint lets you create a new company.
     * @group Company
     * @bodyParam name string required The name of the company. Example: VirtaLTD
     * @bodyParam parent_company_id integer The id of the parent company.If not provided, will be set to null. Example: 1
     *
     * @response scenario=success {
     * "status": "success",
     * "status_code": 201,
     * "message": "Entity successfully created.",
     * "data": {
     * "name": "123Test",
     * "parent_company_id": 22,
     * "updated_at": "2023-03-28T07:50:49.000000Z",
     * "created_at": "2023-03-28T07:50:49.000000Z",
     * "id": 27
     * },
     * "meta": []
     * }
     */
    public function store(StoreCompanyRequest $request): JsonResponse
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
            Log::info($e->getMessage());
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }

    /**
     * Update an existing company
     *
     * This endpoint lets you update a company.
     * @group Company
     * urlParam id integer required The id of the company. Example: 1
     * @bodyParam name string The name of the company. Example: VirtaUpdated
     * @bodyParam parent_company_id The id of the parent company or "null". Example: 1
     * @response scenario=success {
     * "status": "success",
     * "status_code": 200,
     * "message": "Entity successfully created.",
     * "data": {
     * "name": "123Test",
     * "parent_company_id": 22,
     * "updated_at": "2023-03-28T07:50:49.000000Z",
     * "created_at": "2023-03-28T07:50:49.000000Z",
     * "id": 1
     * },
     * "meta": []
     * }
     * @response status=404 scenario="parent company not found" {"message": "Parent company could not be set."}
     * @response status=400 scenario="company not found" {"message": "Entity not updated successfully."}
     */
    public function update($id, UpdateCompanyRequest $request): JsonResponse
    {
        try {
            if ($request->has('parent_company_id')) {
                $parentCompanyId = $request->get('parent_company_id');
                $parentExists = true;
                if (!empty($parentCompanyId)) {
                    $parentExists = Company::where('id', $parentCompanyId)->exists();
                }
                if (!$parentExists || $parentCompanyId == $id) {
                    return apiful()
                        ->withMessage('Parent company could not be set.')
                        ->notFound();
                }
            }
            $updated = Company::where('id', $id)->update($request->validated());
            if ($updated) {
                return apiful($updated)->updated();
            }
            return apiful()->notUpdated(400);

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }

    /**
     * Delete an existing company
     *
     * This endpoint lets you delete an existing company.
     * Deleting a parent company will also delete all it's children and assigned stations.
     * @group Company
     * @urlParam id integer required The ID of the company to be deleted. Example:1
     *
     * @response scenario=success {
     * "status": "success",
     * "status_code": 200,
     * "message": "Entity successfully deleted.",
     * "data": [],
     * "meta": []
     * }
     * @response status=404 scenario="company not found" {"message": "Resource not found."}
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
            Log::info($e->getMessage());
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }

    /**
     * Get company stations count
     *
     * This endpoint lets you count the stations of a company.
     * @group Company
     * @urlParam id integer required The ID of the company. Example:20
     *
     * @response scenario=success {
     * "status": "success",
     * "status_code": 200,
     * "message": null,
     * "data": {
     * "stations_count": 2
     * },
     * "meta": []
     * }
     * @response status=404 scenario="company not found" {"message": "Resource not found."}
     */
    public function getStationsCount($id): JsonResponse
    {
        try {
            $company = Company::where('id', $id)->exists();
            if (empty($company)) {
                return apiful()->withMessage('Resource not found')->notFound();
            }
            $descIds = Company::getDescendantsIds($id);
            $count = Station::whereIn('id', $descIds)->count();
            return apiful()
                ->withData(['stations_count' => $count])
                ->success();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }

    /**
     * Get company stations list
     *
     * This endpoint lets you get a list with stations of the company.
     * @group Company
     * @urlParam id integer required The ID of the company. Example:20
     *
     * @response scenario=success {
     * "status": "success",
     * "status_code": 200,
     * "message": null,
     * "data": [
     * {
     * "id": 20,
     * "parent_company_id": 6,
     * "name": "123Test",
     * "created_at": "2023-03-28 06:50:27",
     * "updated_at": "2023-03-28 06:50:27"
     * },
     * {
     * "id": 23,
     * "parent_company_id": 20,
     * "name": "123Test",
     * "created_at": "2023-03-28 06:50:36",
     * "updated_at": "2023-03-28 06:50:36"
     * }
     * ],
     * "meta": []
     *
     * @response status=404 scenario="company not found" {"message": "Resource not found."}
     */
    public function getStationsList($id): JsonResponse
    {
        try {
            $company = Company::where('id', $id)->exists();
            if (empty($company)) {
                return apiful()->withMessage('Resource not found')->notFound();
            }
            $list = Company::getDescendantsList($id);
            return apiful($list)->success();

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }
}
