<?php

namespace Tests\Feature;

use BasicDashboard\Foundations\Domain\Addresses\Address;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AddressFeatureTest extends TestCase
{
    use DatabaseTransactions, TestingRequirement;

    const ROUTE = '/addresses';
    const TABLE = 'addresses';

    //UnAuthorized Test
    public function test_prevent_non_logged_users_to_access_address_routes(): void
    {
        $address = Address::first()->toArray();
        $addressList = $this->get(self::ROUTE);
        $addressCreate = $this->post(self::ROUTE);
        $addressUpdate = $this->put(self::ROUTE . "/" . $address['id']);
        $addressEdit = $this->get(self::ROUTE . "/" . $address['id'] . "/edit");
        $addressDelete = $this->delete(self::ROUTE . "/" . $address['id']);

        $addressList->assertStatus(302);
        $addressCreate->assertStatus(302);
        $addressUpdate->assertStatus(302);
        $addressEdit->assertStatus(302);
        $addressDelete->assertStatus(302);
    }

    //Store Validation Test
    public function test_address_cannot_store_without_country_id(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $request = $this->prepareData("L1 code", "L1 name", "L2 code", "L2 name", "L3 code", "L3 name", "L4 code", "L4 name", "");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_address_cannot_store_without_level1_code(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $request = $this->prepareData("", "L1 name", "L2 code", "L2 name", "L3 code", "L3 name", "L4 code", "L4 name", "1");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_address_cannot_store_without_level1_name(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $request = $this->prepareData("L1 code", "", "L2 code", "L2 name", "L3 code", "L3 name", "L4 code", "L4 name", "1");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_address_cannot_store_without_level2_code(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $request = $this->prepareData("L1 code", "L1 name", "", "L2 name", "L3 code", "L3 name", "L4 code", "L4 name", "1");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_address_cannot_store_without_level2_name(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $request = $this->prepareData("L1 code", "L1 name", "L2 code", "", "L3 code", "L3 name", "L4 code", "L4 name", "1");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_address_cannot_store_without_level3_code(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $request = $this->prepareData("L1 code", "L1 name", "L2 code", "L2 name", "", "L3 name", "L4 code", "L4 name", "1");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_address_cannot_store_without_level3_name(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $request = $this->prepareData("L1 code", "L1 name", "L2 code", "L2 name", "L3 code", "", "L4 code", "L4 name", "1");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_address_cannot_store_without_level4_code(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $request = $this->prepareData("L1 code", "L1 name", "L2 code", "L2 name", "L3 code", "L3 name", "", "L4 name", "1");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_address_cannot_store_without_level4_name(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $request = $this->prepareData("L1 code", "L1 name", "L2 code", "L2 name", "L3 code", "L3 name", "L4 code", "", "1");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    //Store Process
    public function test_store_process_of_address(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfAddressBefore = Address::count();
        $request = $this->prepareData("L1 code", "L1 name", "L2 code", "L2 name", "L3 code", "L3 name", "L4 code", "L4 name", "1");
        $this->post(self::ROUTE, $request);
        $totalNumberOfAddressAfter = Address::count();
        $this->assertEquals($totalNumberOfAddressBefore + 1, $totalNumberOfAddressAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($request));
    }

    //List Process
    public function test_list_of_address(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $response = $this->get(self::ROUTE);
        $response->assertStatus(200);
    }

    //Edit Process
    public function test_edit_process_of_address(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $editData = Address::first();
        $response = $this->get(self::ROUTE . '/' . customEncoder($editData->id) . '/edit');
        $response->assertStatus(200);
    }

    //Update Process
    public function test_update_process_of_address(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $oldData = Address::Create($this->prepareData("L1 code", "L1 name", "L2 code", "L2 name", "L3 code", "L3 name", "L4 code", "L4 name", "1"));
        $totalNumberOfAddressBefore = Address::count();
        $updateData = $this->prepareData("L1 code update", "L1 name update", "L2 code update", "L2 name update", "L3 code update", "L3 name update", "L4 code update", "L4 name update", "2");
        $this->put(self::ROUTE . "/" . customEncoder($oldData->id), $updateData);
        $totalNumberOfAddressAfter = Address::count();
        $this->assertEquals($totalNumberOfAddressBefore, $totalNumberOfAddressAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($updateData));

    }

    //Delete Validation
    public function test_address_cannot_delete_without_id(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $deletedData = Address::first();
        $request = $this->prepareDataForDelete('');
        $response = $this->delete(self::ROUTE . '/' . $deletedData, $request);
        $response->assertStatus(302);
    }

    //Delete Process
    public function test_delete_process_of_address(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfAddressBefore = Address::Count();
        $deletedData = Address::first();
        $request = $this->prepareDataForDelete($deletedData->id);
        $this->delete(self::ROUTE . '/' . $deletedData, $request);
        $totalNumberOfAddressAfter = Address::Count();
        $this->assertEquals($totalNumberOfAddressBefore, $totalNumberOfAddressAfter + 1);
    }

    //Private Section
    private function prepareData(string $param1, string $param2, string $param3, string $param4, string $param5, string $param6, string $param7, string $param8, string $param9): array
    {
        return [
            "level1_code" => $param1,
            "level1_name" => $param2,
            "level2_code" => $param3,
            "level2_name" => $param4,
            "level3_code" => $param5,
            "level3_name" => $param6,
            "level4_code" => $param7,
            "level4_name" => $param8,
            "country_id" => $param9,
        ];
    }

    private function prepareDataForCheck(array $data): array
    {
        return [
            'level1_code' => isset($data['level1_code']) ? $data['level1_code'] : '',
            'level1_name' => isset($data['level1_name']) ? $data['level1_name'] : '',
            'level2_code' => isset($data['level2_code']) ? $data['level2_code'] : '',
            'level2_name' => isset($data['level2_name']) ? $data['level2_name'] : '',
            'level3_code' => isset($data['level3_code']) ? $data['level3_code'] : '',
            'level3_name' => isset($data['level3_name']) ? $data['level3_name'] : '',
            'level4_code' => isset($data['level4_code']) ? $data['level4_code'] : '',
            'level4_name' => isset($data['level4_name']) ? $data['level4_name'] : '',
            'country_id' => isset($data['country_id']) ? $data['country_id'] : '',
        ];
    }

    private function prepareDataForDelete(string $id): array
    {
        return [
            'id' => $id != '' ? customEncoder($id) : '',
        ];
    }

}
