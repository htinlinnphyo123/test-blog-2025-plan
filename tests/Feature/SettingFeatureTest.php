<?php

namespace Tests\Feature;

use BasicDashboard\Foundations\Domain\Settings\Setting;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SettingFeatureTest extends TestCase
{
    use DatabaseTransactions, TestingRequirement;

    const ROUTE = "/settings";
    const TABLE = "settings";

    //UnAuthorized Test
    public function test_prevent_non_logged_users_to_access_setting_routes(): void
    {
        $setting = Setting::first()->toArray();
        $settingList = $this->get(self::ROUTE);
        $settingCreate = $this->post(self::ROUTE);
        $settingUpdate = $this->put(self::ROUTE . "/" . $setting['id'], $setting);
        $settingEdit = $this->get(self::ROUTE . "/" . $setting['id'] . "/edit");
        $settingDelete = $this->delete(self::ROUTE . "/" . $setting['id']);

        $settingList->assertStatus(302);
        $settingCreate->assertStatus(302);
        $settingUpdate->assertStatus(302);
        $settingEdit->assertStatus(302);
        $settingDelete->assertStatus(302);
    }

    //Store Validation Test
    public function test_setting_cannot_store_without_key(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("", "value");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_setting_cannot_store_without_value(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("key", "");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    //Store Process
    public function test_store_process_of_setting(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfSettingBefore = Setting::count();
        $request = $this->prepareData("Test key", "Test Value");
        $this->post(self::ROUTE, $request);
        $totalNumberOfSettingAfter = Setting::count();
        $this->assertEquals($totalNumberOfSettingBefore + 1, $totalNumberOfSettingAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($request));
    }

    //Listing Process
    public function test_list_of_setting(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $response = $this->get(self::ROUTE);
        $response->assertStatus(200);
    }

    //edit Process
    public function test_edit_process_of_setting(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $editData = Setting::first();
        $response = $this->get(self::ROUTE . '/' . customEncoder($editData->id) . '/edit');
        $response->assertStatus(200);
    }

    //Update Process
    public function test_update_process_of_setting(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $oldData = Setting::Create($this->prepareData("Test Key", "Test Value"));
        $totalNumberOfSettingBefore = Setting::count();
        $updateData = $this->prepareData("Update Key", "Update Value");
        $this->put(self::ROUTE . "/" . customEncoder($oldData->id), $updateData);
        $totalNumberOfSettingAfter = Setting::count();
        $this->assertEquals($totalNumberOfSettingBefore, $totalNumberOfSettingAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($updateData));
    }

    //Delete Validation
    public function test_setting_cannot_delete_without_id(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $deleteData = Setting::first();
        $request = $this->prepareDataForDelete('');
        $response = $this->delete(self::ROUTE . '/' . $deleteData, $request);
        $response->assertStatus(302);
    }

    //Delete Process
    public function test_delete_process_of_setting(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfSettingBefore = Setting::Count();
        $deleteData = Setting::first();
        $request = $this->prepareDataForDelete($deleteData->id);
        $this->delete(self::ROUTE . '/' . $deleteData, $request);
        $totalNumberOfSettingAfter = Setting::Count();
        $this->assertEquals($totalNumberOfSettingBefore, $totalNumberOfSettingAfter + 1);
    }

    //Private Section
    private function prepareData(string $param1, string $param2): array
    {
        return [
            "key" => $param1,
            "value" => $param2,
        ];
    }

    private function prepareDataForCheck(array $data): array
    {
        return [
            'key' => isset($data['key']) ? $data['key'] : '',
            'value' => isset($data['value']) ? $data['value'] : '',
        ];
    }

    private function prepareDataForDelete(string $id): array
    {
        return [
            'id' => $id != '' ? customEncoder($id) : '',
        ];
    }

}
