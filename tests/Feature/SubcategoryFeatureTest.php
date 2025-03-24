<?php

namespace Tests\Feature;

use BasicDashboard\Foundations\Domain\Categories\Category;
use BasicDashboard\Foundations\Domain\Subcategories\Subcategory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SubcategoryFeatureTest extends TestCase
{
    use DatabaseTransactions, TestingRequirement;

    const ROUTE = "/subcategories";
    const TABLE = "subcategories";

    //UnAuthorized Test
    public function test_prevent_non_logged_users_to_access_subcategories_routes(): void
    {
        $setting = Subcategory::first()->toArray();
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
    public function test_subcategory_cannot_store_without_name(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $categoryId = Category::first()->value('id');
        $request = $this->prepareData("", "name other", $categoryId);
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_subcategory_cannot_store_without_name_other(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $categoryId = Category::first()->value('id');
        $request = $this->prepareData("name", "", $categoryId);
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_subcategory_cannot_store_without_category_id(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("name", "name other", "");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    //Store Process
    public function test_store_process_of_subcategory(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $categoryId = Category::first()->value('id');
        $totalNumberOfSubcategoryBefore = Subcategory::count();
        $request = $this->prepareData("name", "name other", $categoryId);
        $this->post(self::ROUTE, $request);
        $totalNumberOfSubcategoryAfter = Subcategory::count();
        $this->assertEquals($totalNumberOfSubcategoryBefore + 1, $totalNumberOfSubcategoryAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($request));
    }

    //Listing Process
    public function test_list_of_subcategory(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $response = $this->get(self::ROUTE);
        $response->assertStatus(200);
    }

    //edit Process
    public function test_edit_process_of_subcategory(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $editData = Subcategory::first();
        $response = $this->get(self::ROUTE . '/' . customEncoder($editData->id) . '/edit');
        $response->assertStatus(200);
    }

    //Update Process
    public function test_update_process_of_subcategory(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $categoryId = Subcategory::first()->value('id');
        $oldData = Subcategory::Create($this->prepareData("name", "name other", $categoryId));
        $totalNumberOfSubcategoryBefore = Subcategory::count();
        $updateData = $this->prepareData("Update name", "Update name other", $categoryId);
        $this->put(self::ROUTE . "/" . customEncoder($oldData->id), $updateData);
        $totalNumberOfSubcategoryAfter = Subcategory::count();
        $this->assertEquals($totalNumberOfSubcategoryBefore, $totalNumberOfSubcategoryAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($updateData));
    }

    //Delete Validation
    public function test_subcategory_cannot_delete_without_id(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $deleteData = Subcategory::first();
        $request = $this->prepareDataForDelete('');
        $response = $this->delete(self::ROUTE . '/' . $deleteData, $request);
        $response->assertStatus(302);
    }

    //Delete Process
    public function test_delete_process_of_subcategory(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfSubcategoryBefore = Subcategory::Count();
        $deleteData = Subcategory::first();
        $request = $this->prepareDataForDelete($deleteData->id);
        $this->delete(self::ROUTE . '/' . $deleteData, $request);
        $totalNumberOfSubcategoryAfter = Subcategory::Count();
        $this->assertEquals($totalNumberOfSubcategoryBefore, $totalNumberOfSubcategoryAfter + 1);
    }

    //Private Section
    private function prepareData(string $param1, string $param2, string $param3): array
    {
        return [
            "name" => $param1,
            "name_other" => $param2,
            "category_id" => $param3,
        ];
    }

    private function prepareDataForCheck(array $data): array
    {
        return [
            'name' => isset($data['name']) ? $data['name'] : '',
            'name_other' => isset($data['name_other']) ? $data['name_other'] : '',
            'category_id' => isset($data['category_id']) ? $data['category_id'] : '',
        ];
    }

    private function prepareDataForDelete(string $id): array
    {
        return [
            'id' => $id != '' ? customEncoder($id) : '',
        ];
    }

}
