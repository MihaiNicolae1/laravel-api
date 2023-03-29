<?php

namespace Tests\Unit;

namespace Tests\Unit;

use App\Models\V1\Company;
use Tests\TestCase;

class UpdateCompanyTest extends TestCase
{
    public function test_update_company_success(): void
    {
        $company = Company::factory()->create();
        $body = ["name" => fake()->company];

        $this->patch(route('company.update', $company->id), $body)
            ->assertStatus(200);

        $this->assertDatabaseHas('companies', $body);
    }

    public function test_update_company_wrong_body(): void
    {
        $company = Company::factory()->create();
        $body = ["name" => 1, "parent_company_id" => "12s"];
        $this->patch(route('company.update', $company->id), $body)
            ->assertStatus(422)
            ->assertJson([
                "message" => "The name must be a string. (and 1 more error)",
                "errors" => [
                    "name" => ["The name must be a string."],
                    "parent_company_id" => ["The parent company id must be an integer."]
                ]
            ]);
    }
}
