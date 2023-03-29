<?php

namespace Tests\Unit;

use App\Models\V1\Company;
use App\Models\V1\Station;
use Tests\TestCase;

class DestroyCompanyTest extends TestCase
{
    /**
     * Test to delete an existing company
     * with its stations with no descendants
     * @test
     * @return void
     */
    public function test_destroy_company_and_stations_no_descendants(): void
    {
        $company = Company::factory()->create();
        $station = Station::factory()->create(['company_id' => $company->id]);
        $this->delete(route('company.delete', $company->id))
            ->assertStatus(200)
            ->assertJson([
                "status" => "success",
                "status_code" => 200,
                "message" => "Entity successfully deleted.",
                "data" => [],
                "meta" => []
            ]);

        $this->assertDatabaseMissing('companies', ['id' => $company->id]);
    }

    /**
     *  Test to delete an existing company with its stations
     *  and descendants stations
     */
    public function test_destroy_company_and_stations_with_descendants(): void
    {
        $company = Company::factory()->create();
        $company2 = Company::factory()->create(['parent_company_id' => $company->id]);
        $station = Station::factory()->create(['company_id' => $company->id]);
        $station2 = Station::factory()->create(['company_id' => $company2->id]);
        $this->delete(route('company.delete', $company->id))
            ->assertStatus(200)
            ->assertJson([
                "status" => "success",
                "status_code" => 200,
                "message" => "Entity successfully deleted.",
                "data" => [],
                "meta" => []
            ]);
        $this->assertDatabaseMissing('companies', ['id' => $company->id]);
        $this->assertDatabaseMissing('companies', ['id' => $company2->id]);
    }

    /**
     *  Test to delete an non-existent company
     * @test
     * @return void
     */
    public function test_destroy_company_non_existent(): void
    {
        $this->delete(route('company.delete', 1))
            ->assertStatus(404)
            ->assertJson([
                "status" => "error",
                "status_code" => 404,
                "message" => "Resource not found",
                "errors" => [],
                "meta" => []
            ]);
    }
}
