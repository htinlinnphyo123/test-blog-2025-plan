<?php

namespace Tests\Feature;

use BasicDashboard\Foundations\Domain\Countries\Country;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CountryFeatureTest extends TestCase
{
    use DatabaseTransactions, TestingRequirement;

    const ROUTE = "/countries";
    const TABLE = "countries";

    //UnAuthorized Test
    public function test_prevent_non_logged_users_to_access_country_routes(): void
    {
        $country = Country::first()->toArray();
        $countryList = $this->get(self::ROUTE);
        $countryCreate = $this->post(self::ROUTE);
        $countryUpdate = $this->put(self::ROUTE . "/" . $country['id']);
        $countryEdit = $this->get(self::ROUTE . "/" . $country['id'] . "/edit");
        $countryDelete = $this->delete(self::ROUTE . "/" . $country['id']);

        $countryCreate->assertStatus(302);
        $countryList->assertStatus(302);
        $countryUpdate->assertStatus(302);
        $countryEdit->assertStatus(302);
        $countryDelete->assertStatus(302);
    }

    //Store Validation Test
    public function test_country_cannot_store_without_name(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("", "0011", "65", "SGD");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_country_cannot_store_without_zip_code(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("Singapore", "", "65", "SGD");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_country_cannot_store_without_country_code(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("Singapore", "0011", "", "SGD");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_country_cannot_store_without_currency_code(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("Singapore", "0011", "65", "");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    //Store Process
    public function test_store_process_of_country(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfCountriesBefore = Country::count();
        $request = $this->prepareData("Singapore", "0011", "65", "SGD");
        $this->post(self::ROUTE, $request);
        $totalNumberOfCountriesAfter = Country::count();
        $this->assertEquals($totalNumberOfCountriesBefore + 1, $totalNumberOfCountriesAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($request));
    }

    //List Process
    public function test_list_of_country(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $response = $this->get(self::ROUTE);
        $response->assertStatus(200);
    }

    //Edit Process
    public function test_edit_process_of_country(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $editData = Country::first();
        $response = $this->get(self::ROUTE . '/' . customEncoder($editData->id) . '/edit');
        $response->assertStatus(200);
    }

    //Update Process
    public function test_update_process_of_country(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $oldData = Country::Create($this->prepareData("Singapore", "0011", "65", "SGD"));
        $totalNumberOfCountryBefore = Country::count();
        $updateData = $this->prepareData("Singapore_Update", "0011_Update", "65_Update", "SGD_Update");
        $this->put(self::ROUTE . "/" . customEncoder($oldData->id), $updateData);
        $totalNumberOfCountryAfter = Country::count();
        $this->assertEquals($totalNumberOfCountryBefore, $totalNumberOfCountryAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($updateData));
    }

    //Delete Validation
    public function test_country_cannot_delete_without_id(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $deletedData = Country::first();
        $request = $this->prepareDataForDelete('');
        $response = $this->delete(self::ROUTE . '/' . $deletedData, $request);
        $response->assertStatus(302);
    }

    //Delete Process
    public function test_delete_process_of_country(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $demo = $this->prepareData("Singapore Hee Hee", "0011", "65", "SGD");
        $deletedData = Country::create($demo);
        $totalNumberOfCountriesBefore = Country::Count();
        $request = $this->prepareDataForDelete($deletedData->id);
        $this->delete(self::ROUTE . '/' . $deletedData, $request);
        $deleteNumberOfCountriesAfter = Country::Count();
        $this->assertEquals($totalNumberOfCountriesBefore, $deleteNumberOfCountriesAfter + 1);

    }

    //Private Section
    private function prepareData(string $param1, string $param2, string $param3, string $param4): array
    {
        return [
            "name" => $param1,
            "zip_code" => $param2,
            "country_code" => $param3,
            "currency_code" => $param4,
        ];
    }

    private function prepareDataForCheck(array $data): array
    {
        return [
            'name' => isset($data['name']) ? $data['name'] : '',
            'zip_code' => isset($data['zip_code']) ? $data['zip_code'] : '',
            'country_code' => isset($data['country_code']) ? $data['country_code'] : '',
            'currency_code' => isset($data['currency_code']) ? $data['currency_code'] : '',
        ];
    }

    private function prepareDataForDelete(string $id): array
    {
        return [
            'id' => $id != '' ? customEncoder($id) : '',
        ];
    }

}
