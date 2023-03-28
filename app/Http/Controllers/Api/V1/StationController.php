<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\RadiusStationRequest;
use App\Http\Requests\V1\StoreStationRequest;
use App\Http\Requests\V1\UpdateStationRequest;
use App\Models\V1\Company;
use App\Models\V1\Station;
use Illuminate\Support\Facades\Log;
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
     *
     * @response 200 scenario=success {
     * "status": "success",
     * "status_code": 200,
     * "message": null,
     * "data": {
     * "id": 20,
     * "name": "VirtaLTD",
     * "latitude": 45.123213,
     * "longitude": 14.12311,
     * "company_id": 20,
     * "address": "TestAddress",
     * "created_at": "2023-03-28T06:50:59.000000Z",
     * "updated_at": "2023-03-28T06:50:59.000000Z"
     * },
     * "meta": []
     * }
     * @response status=404 scenario="station not found" {"message": "Resource not found"}
     *
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
            Log::info($e->getMessage());
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }

    /**
     * Create a new station
     *
     * This endpoint lets you create a new station.
     * @group Station
     * @bodyParam name string required The name of the company. Example: ChargingSpot1
     * @bodyParam latitude string required The latitude of the location. Example: +45.01231
     * @bodyParam longitude string required The longitude of the location. Example: -121.113122
     * @bodyParam address string required The address of the charging station. Example: St.1, Helsinki, Finland
     * @bodyParam company_id integer required The id of the company that owns it. Example: 1
     *
     * @response 201 scenario success={
     * "status": "success",
     * "status_code": 201,
     * "message": "Entity successfully created.",
     * "data": {
     * "name": "VirtaLTD",
     * "latitude": "45.123213",
     * "longitude": "14.000",
     * "company_id": 25,
     * "address": "Helsinki,Finland",
     * "updated_at": "2023-03-28T09:50:22.000000Z",
     * "created_at": "2023-03-28T09:50:22.000000Z",
     * "id": 29
     * },
     * "meta": []
     * }
     * @response status=404 scenario="company not found" {"message": "Company not found"}
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
            Log::info($e->getMessage());
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }

    /**
     * Delete an existing station
     *
     * This endpoint lets you delete an existing station.
     * @group Station
     * @urlParam id integer required The ID of the station to be deleted. Example:1
     *
     * @response 200 scenario=success{
     * "status": "success",
     * "status_code": 200,
     * "message": "Entity successfully deleted.",
     * "data": 1,
     * "meta": []
     * }
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
            Log::info($e->getMessage());
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }

    /**
     * Update existing station
     *
     * This endpoint lets you update an existing station.
     * @group Station
     * @bodyParam name string The name of the company. Example: ChargingSpot1
     * @bodyParam latitude string The latitude of the location. Example: +45.01231
     * @bodyParam longitude string The longitude of the location. Example: -121.113122
     * @bodyParam address string The address of the charging station. Example: St.1, Helsinki, Finland
     * @bodyParam company_id integer The id of the company that owns it. Example: 1
     *
     * @response 200 scenario=success{
     * "status": "success",
     * "status_code": 200,
     * "message": "Entity successfully updated.",
     * "data": 1,
     * "meta": []
     * }
     */
    public function update($id, UpdateStationRequest $request)
    {
        try {
            if ($request->has('company_id')) {
                $company_id = $request->get('company_id');
                if (!Company::where('id', $company_id)->exists()) {
                    return apiful()
                        ->withMessage('Company not found')
                        ->notFound();
                }
            }
            $updated = Station::where('id', $id)->update($request->validated());
            if ($updated) {
                return apiful($updated)->updated();
            }
            return apiful()->notUpdated(404);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return apiful()->withMessage('Something went wrong')->internal();
        }
    }

    /**
     * Get stations within radius
     *
     * This endpoint lets you get stations within a radius.
     * @bodyParam radius_km int required The km radius to look in. Example: 50
     * @bodyParam latitude string required The latitude of the location. Example: +45.01231
     * @bodyParam longitude string required The longitude of the location. Example: -121.113122
     * @group Station
     *
     * @response 200 scenario=success{
     * "status": "success",
     * "status_code": 200,
     * "message": null,
     * "data": {
     * "45.123213,14": [
     * {
     * "id": 28,
     * "name": "123Test",
     * "latitude": 45.123213,
     * "longitude": 14,
     * "company_id": 25,
     * "address": "TestAddress",
     * "created_at": "2023-03-28 09:09:13",
     * "updated_at": "2023-03-28 09:09:13",
     * "distance": 13.700001346387596
     * }
     * ],
     * "45.123213,14.12311": [
     * {
     * "id": 7,
     * "name": "123Test",
     * "latitude": 45.123213,
     * "longitude": 14.12311,
     * "company_id": 6,
     * "address": "TestAddress",
     * "created_at": "2023-03-27 12:25:12",
     * "updated_at": "2023-03-27 12:25:12",
     * "distance": 16.76832087503264
     * },
     * {
     * "id": 15,
     * "name": "123Test",
     * "latitude": 45.123213,
     * "longitude": 14.12311,
     * "company_id": 6,
     * "address": "TestAddress",
     * "created_at": "2023-03-27 12:27:54",
     * "updated_at": "2023-03-27 12:27:54",
     * "distance": 16.76832087503264
     * }
     * ]
     *
     */
    public function getStationsInRadius(RadiusStationRequest $request)
    {
        if ($request->validated()) {
            $radius = $request->get('radius_km');
            $lat = (float)$request->get('latitude');
            $long = (float)$request->get('longitude');
            $stations = Station::getInRadius($radius, $lat, $long);
            return apiful($stations)->success();
        }
    }
}
