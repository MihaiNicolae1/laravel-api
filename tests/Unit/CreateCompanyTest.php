<?php

namespace Tests\Unit;

use Tests\TestCase;

class CreateCompanyTest extends TestCase
{

    const TEST_URI = '/api/v1/company';
    const TEST_METHOD = 'POST';

    public function test_missing_name_from_body()
    {
        $this->json(self::TEST_METHOD, self::TEST_URI)
            ->assertStatus(422)
            ->assertJson(
                [
                    "message" => "The name field is required.",
                    "errors" => [
                        "name" => [
                            "The name field is required."
                        ]
                    ]
                ]
            );
    }

    public function test_wrong_format_attributes()
    {
        $data = [
                "name" => 123,
                "parent_company_id" => "123s"
        ];
        $this->json(self::TEST_METHOD, self::TEST_URI, $data)
            ->assertStatus(422)
            ->assertJson(
                [
                    "message" => "The name must be a string. (and 1 more error)",
                    "errors" => [
                        "name" => [
                            "The name must be a string."
                        ],
                        "parent_company_id" => [
                            "The parent company id must be an integer."
                        ]
                    ]
                ]
            );
    }

    public function test_create_successfully()
    {
        $data = [
            "name" => "VirtaLTD",
        ];
        $this->json(self::TEST_METHOD, self::TEST_URI, $data)
            ->assertStatus(201);
    }
}
