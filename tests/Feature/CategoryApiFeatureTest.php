<?php

namespace Tests\Feature;

use BasicDashboard\Foundations\Domain\Categories\Category;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CategoryApiFeatureTest extends TestCase
{
    use DatabaseTransactions, TestingRequirement;

    const ROUTE = "api/v1/mobile/categories";
    const TABLE = "categories";

    //List Process
    public function test_api_list_of_category(): void
    {
        $response = $this->get(self::ROUTE);
        $response->assertStatus(200);
    }

    //Edit Process
    public function test_api_show_process_of_category(): void
    {
        $showData = Category::first();
        $response = $this->get(self::ROUTE . '/' . customEncoder($showData->id));
        $response->assertStatus(200);
    }

}
