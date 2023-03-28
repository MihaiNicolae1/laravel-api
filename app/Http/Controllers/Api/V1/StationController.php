<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreStationRequest;
use App\Models\V1\Company;
use App\Models\V1\Station;
use Knuckles\Scribe\Attributes\Group;

#[Group("Station", "Perform CRUD operations for station")]
class StationController extends Controller
{
    /**
     * Get station info
     *
     * This endpoint lets you get a station info.
     * @group Station
     * @urlParam id integer required The ID of the station.
     */
    public function get($id)
    {
        try {
            $station = Station::find($id);
            if (empty($station)) {
                return apiful()->withMessage('Resource not found')->notFound();
            }
            return apiful($station)->success();
        } catch (\Exception $e) {
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }
    /**
     * Create a new company
     *
     * This endpoint lets you create a new station.
     * @group Station
     * @bodyParam name string required The name of the company. Example: ChargingSpot1
     * @bodyParam latitude string required The latitude of the location. Example: +45.01231
     * @bodyParam longitude string required The longitude of the location. Example: -121.113122
     * @bodyParam address string required The address of the charging station. Example: St.1, Helsinki, Finland
     * @bodyParam company_id integer required The id of the company that owns it. Example: 1
     */
    public function store(StoreStationRequest $request)
    {
        try {
            $company_id = $request->get('company_id');
            if (!Company::where('id', $company_id)->exists()) {
                return apiful()
                    ->withMessage('Company not found')
                    ->notFound();
            }
            $station = Station::create($request->validated());
            return apiful($station)->created();
        } catch (\Exception $e) {
            return apiful()->exception($e);
        }
    }
    /**
     * Delete an existing station
     *
     * This endpoint lets you delete an existing station.
     * @group Station
     * @urlParam id integer required The ID of the station to be deleted. Example:1
     */
    public function destroy($id)
    {
        try {
            $deleted = Station::destroy($id);
            if ($deleted) {
                return apiful($deleted)->deleted();
            }
           return apiful()->notDeleted(404);
        } catch (\Exception $e) {
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }
}
