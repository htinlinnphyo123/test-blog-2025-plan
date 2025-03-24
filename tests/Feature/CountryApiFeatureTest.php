<?php

namespace Tests\Feature;

use BasicDashboard\Foundations\Domain\Countries\Country;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CountryApiFeatureTest extends TestCase
{
    use DatabaseTransactions, TestingRequirement;

    const ROUTE = "api/v1/mobile/countries";
    const TABLE = "countries";

    //List Process
    public function test_api_list_of_country(): void
    {
        $response = $this->get(self::ROUTE);
        $response->assertStatus(200);
    }

    //Edit Process
    public function test_api_show_process_of_country(): void
    {
        $showData = Country::first();
        $response = $this->get(self::ROUTE . '/' . customEncoder($showData->id));
        $response->assertStatus(200);
    }

}
