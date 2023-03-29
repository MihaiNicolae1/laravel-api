<?php

namespace Tests\Unit;

use App\Models\V1\Company;
use Tests\TestCase;

class CreateCompanyTest extends TestCase
{

    public function test_empty_body_request()
    {
        $this->post(route('company.store'), [])
            ->assertStatus(422);
    }

    public function test_unsupported_format_body()
    {
        $company = [
            'name' => 1,
            'parent_company_id' => '12s'
        ];
        $this->post(route('company.store'), $company)
            ->assertStatus(422);
    }

    public function test_successful_create() {
        $company = Company::factory()->make()->toArray();
        $this->post(route('company.store'), $company)
            ->assertStatus(201);
        $this->assertDatabaseHas('companies', $company);
    }


}
