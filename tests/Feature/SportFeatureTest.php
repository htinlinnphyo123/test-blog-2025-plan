<?php
//SMALL_MODEL , MODEL , PLURAL_MODEL
namespace Tests\Feature;

use BasicDashboard\Foundations\Domain\Sports\Sport;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SportFeatureTest extends TestCase
{
    use DatabaseTransactions, TestingRequirement;

    const ROUTE = "/????";
    const TABLE = "????";

    //UnAuthorized Test
    public function test_prevent_non_logged_users_to_access_sport_routes(): void
    {
        $sport = Sport::first()->toArray();;
        $sportList = $this->get(self::ROUTE);
        $sportCreate = $this->post(self::ROUTE);
        $sportUpdate = $this->put(self::ROUTE . "/" . $sport['id']);
        $sportEdit = $this->get(self::ROUTE . "/" . $sport['id'] . "/edit");
        $sportDelete = $this->delete(self::ROUTE . "/" . $sport['id']);

        $sportList->assertStatus(302);
        $sportCreate->assertStatus(302);
        $sportUpdate->assertStatus(302);
        $sportEdit->assertStatus(302);
        $sportDelete->assertStatus(302);
    }

    //Store Validation Test
    public function test_sport_cannot_store_without_name(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }


    //Store Process
    public function test_store_process_of_sport(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfSportBefore = Sport::count();
        $request = $this->prepareData("Test Name");
        $this->post(self::ROUTE, $request);
        $totalNumberOfSportAfter = Sport::count();
        $this->assertEquals($totalNumberOfSportBefore + 1, $totalNumberOfSportAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($request));
    }

    //Listing Process
    public function test_list_of_sport(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $response = $this->get(self::ROUTE);
        $response->assertStatus(200);
    }

    //Update Process
    public function test_update_process_of_sport(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $oldData = Sport::Create($this->prepareData("Test Name"));
        $totalNumberOfSportBefore = Sport::count();
        $updateData = $this->prepareData("Update Name");
        $this->put(self::ROUTE . "/" . customEncoder($oldData->id), $updateData);
        $totalNumberOfSportAfter = Sport::count();
        $this->assertEquals($totalNumberOfSportBefore, $totalNumberOfSportAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($updateData));
    }

    //Delete Validation
    public function test_csport_cannot_delete_without_id(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $deleteData = Sport::first();
        $request = $this->prepareDataForDelete('');
        $response = $this->delete(self::ROUTE . '/' . $deleteData, $request);
        $response->assertStatus(302);
    }

    //Delete Process
    public function test_delete_process_of_sport(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfSportBefore = Sport::Count();
        $deleteData = Sport::first();
        $request = $this->prepareDataForDelete($deleteData->id);
        $this->delete(self::ROUTE . '/' . $deleteData, $request);
        $totalNumberOfSportAfter = Sport::Count();
        $this->assertEquals($totalNumberOfSportBefore, $totalNumberOfSportAfter + 1);
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
