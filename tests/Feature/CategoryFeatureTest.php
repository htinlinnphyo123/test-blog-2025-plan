<?php

namespace Tests\Feature;

use BasicDashboard\Foundations\Domain\Categories\Category;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CategoryFeatureTest extends TestCase
{
    use DatabaseTransactions, TestingRequirement;

    const ROUTE = "/categories";
    const TABLE = "categories";

    //UnAuthorized Test
    public function test_prevent_non_logged_users_to_access_category_routes(): void
    {
        $setting = Category::first()->toArray();
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
    public function test_category_cannot_store_without_name(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("", "name other");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_category_cannot_store_without_name_other(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("name", "");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    //Store Process
    public function test_store_process_of_category(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfCategoryBefore = Category::count();
        $request = $this->prepareData("name", "name other");
        $this->post(self::ROUTE, $request);
        $totalNumberOfCategoryAfter = Category::count();
        $this->assertEquals($totalNumberOfCategoryBefore + 1, $totalNumberOfCategoryAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($request));
    }

    //Listing Process
    public function test_list_of_category(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $response = $this->get(self::ROUTE);
        $response->assertStatus(200);
    }

    //edit Process
    public function test_edit_process_of_category(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $editData = Category::first();
        $response = $this->get(self::ROUTE . '/' . customEncoder($editData->id) . '/edit');
        $response->assertStatus(200);
    }

    //Update Process
    public function test_update_process_of_category(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $oldData = Category::Create($this->prepareData("name", "name other"));
        $totalNumberOfCategoryBefore = Category::count();
        $updateData = $this->prepareData("Update name", "Update name other");
        $this->put(self::ROUTE . "/" . customEncoder($oldData->id), $updateData);
        $totalNumberOfCategoryAfter = Category::count();
        $this->assertEquals($totalNumberOfCategoryBefore, $totalNumberOfCategoryAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($updateData));
    }

    //Delete Validation
    public function test_category_cannot_delete_without_id(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $deleteData = Category::first();
        $request = $this->prepareDataForDelete('');
        $response = $this->delete(self::ROUTE . '/' . $deleteData, $request);
        $response->assertStatus(302);
    }

    //Delete Process
    public function test_delete_process_of_category(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfCategoryBefore = Category::Count();
        $deleteData = Category::first();
        $request = $this->prepareDataForDelete($deleteData->id);
        $this->delete(self::ROUTE . '/' . $deleteData, $request);
        $totalNumberOfCategoryAfter = Category::Count();
        $this->assertEquals($totalNumberOfCategoryBefore, $totalNumberOfCategoryAfter + 1);
    }

    //Private Section
    private function prepareData(string $param1, string $param2): array
    {
        return [
            "name" => $param1,
            "name_other" => $param2,
        ];
    }

    private function prepareDataForCheck(array $data): array
    {
        return [
            'name' => isset($data['name']) ? $data['name'] : '',
            'name_other' => isset($data['name_other']) ? $data['name_other'] : '',
        ];
    }

    private function prepareDataForDelete(string $id): array
    {
        return [
            'id' => $id != '' ? customEncoder($id) : '',
        ];
    }

}
