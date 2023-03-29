<?php

namespace Tests\Unit;

use App\Models\V1\Company;
use Tests\TestCase;

class GetCompanyTest extends TestCase
{
    /**
     *  A test for getting non-existent company.
     *  @test
     *  @return void
     */
    public function test_get_nonexistent_company(): void
    {
        $this->get(route('company.get', 1))
            ->assertStatus(404)
            ->assertJson([
                "status" => "error",
                "status_code" => 404,
                "message" => "Resource not found",
                "errors" => [],
                "meta" => []
            ]);
    }
    /**
     *  A test for get existing company.
     *  @test
     *  @return void
    */
    public function test_get_existing_company(): void
    {
        $company = Company::factory()->create();

        $this->get(route('company.get', $company->id))
            ->assertStatus(200)
            ->assertJson([
                "status" => "success",
                "status_code" => 200,
                "message" => null,
                "data" => [
                    "id" => $company->id,
                    "parent_company_id" => null,
                    "name" => $company->name
                ]
            ]);
    }
}
