<?php
//SMALL_MODEL , MODEL , PLURAL_MODEL
namespace Tests\Feature;

use BasicDashboard\Foundations\Domain\pages\Page;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PageFeatureTest extends TestCase
{
    use DatabaseTransactions, TestingRequirement;

    const ROUTE = "/????";
    const TABLE = "????";

    //UnAuthorized Test
    public function test_prevent_non_logged_users_to_access_page_routes(): void
    {
        $page = Page::first()->toArray();;
        $pageList = $this->get(self::ROUTE);
        $pageCreate = $this->post(self::ROUTE);
        $pageUpdate = $this->put(self::ROUTE . "/" . $page['id']);
        $pageEdit = $this->get(self::ROUTE . "/" . $page['id'] . "/edit");
        $pageDelete = $this->delete(self::ROUTE . "/" . $page['id']);

        $pageList->assertStatus(302);
        $pageCreate->assertStatus(302);
        $pageUpdate->assertStatus(302);
        $pageEdit->assertStatus(302);
        $pageDelete->assertStatus(302);
    }

    //Store Validation Test
    public function test_page_cannot_store_without_name(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }


    //Store Process
    public function test_store_process_of_page(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfPageBefore = Page::count();
        $request = $this->prepareData("Test Name");
        $this->post(self::ROUTE, $request);
        $totalNumberOfPageAfter = Page::count();
        $this->assertEquals($totalNumberOfPageBefore + 1, $totalNumberOfPageAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($request));
    }

    //Listing Process
    public function test_list_of_page(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $response = $this->get(self::ROUTE);
        $response->assertStatus(200);
    }

    //Update Process
    public function test_update_process_of_page(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $oldData = Page::Create($this->prepareData("Test Name"));
        $totalNumberOfPageBefore = Page::count();
        $updateData = $this->prepareData("Update Name");
        $this->put(self::ROUTE . "/" . customEncoder($oldData->id), $updateData);
        $totalNumberOfPageAfter = Page::count();
        $this->assertEquals($totalNumberOfPageBefore, $totalNumberOfPageAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($updateData));
    }

    //Delete Validation
    public function test_cpage_cannot_delete_without_id(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $deleteData = Page::first();
        $request = $this->prepareDataForDelete('');
        $response = $this->delete(self::ROUTE . '/' . $deleteData, $request);
        $response->assertStatus(302);
    }

    //Delete Process
    public function test_delete_process_of_page(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfPageBefore = Page::Count();
        $deleteData = Page::first();
        $request = $this->prepareDataForDelete($deleteData->id);
        $this->delete(self::ROUTE . '/' . $deleteData, $request);
        $totalNumberOfPageAfter = Page::Count();
        $this->assertEquals($totalNumberOfPageBefore, $totalNumberOfPageAfter + 1);
    }

    //Private Section
    private function prepareData(string $param1): array
    {
        return [
            "name" => $param1,
        ];
    }

    private function prepareDataForCheck(array $data): array
    {
        return [
            'name' => isset($data['name']) ? $data['name'] : '',
        ];
    }

    private function prepareDataForDelete(string $id): array
    {
        return [
            'id' => $id != '' ? customEncoder($id) : '',
        ];
    }

}
