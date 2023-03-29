<?php

namespace Tests\Unit;

use App\Models\V1\Company;
use Tests\TestCase;

class CreateCompanyTest extends TestCase
{

    /**
     * Test for empty body request
     *
     * @test
     * @return void
     */
    public function test_empty_body_request(): void
    {
        $this->post(route('company.store'), [])
            ->assertStatus(422);
    }


    /**
     * Test for unsupported body format
     *
     * @test
     * @return void
     */
    public function test_unsupported_format_body(): void
    {
        $company = [
            'name' => 1,
            'parent_company_id' => '12s'
        ];
        $this->post(route('company.store'), $company)
            ->assertStatus(422);
    }

    /**
     * Test for company parent not found
     *
     * @test
     * @return void
     */
    public function test_company_parent_not_found(): void
    {
        $company = Company::factory()->make()->toArray();
        $this->post(route('company.store'), $company)
            ->assertStatus(404)
            ->assertJson([
                "status" => "error",
                "status_code" => 404,
                "message" => "Parent company not found",
                "errors" => [],
                "meta" => []
            ]);
    }

    /**
     * Test for company with parent found
     *
     * @test
     * @return void
     */
    public function test_company_parent_found(): void
    {
        $company1 = Company::factory()->create();
        $company2 = Company::factory()->make(['parent_company_id' => $company1->id])->toArray();
        $this->post(route('company.store'), $company2)
            ->assertStatus(201);
        $this->assertDatabaseHas('companies', $company2);
    }

    /**
     * Test for company with parent null
     *
     * @test
     * @return void
     */
    public function test_company_parent_null(): void
    {
        $company1 = ['name' => fake()->name];
        $this->post(route('company.store'), $company1)
            ->assertStatus(201);
        $this->assertDatabaseHas('companies', $company1);
    }

}
