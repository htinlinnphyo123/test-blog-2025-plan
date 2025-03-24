<?php
//SMALL_MODEL , MODEL , PLURAL_MODEL
namespace Tests\Feature;

use BasicDashboard\Foundations\Domain\SponsorAds\SponsorAd;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SponsorAdFeatureTest extends TestCase
{
    use DatabaseTransactions, TestingRequirement;

    const ROUTE = "/????";
    const TABLE = "????";

    //UnAuthorized Test
    public function test_prevent_non_logged_users_to_access_sponsorAd_routes(): void
    {
        $sponsorAd = SponsorAd::first()->toArray();;
        $sponsorAdList = $this->get(self::ROUTE);
        $sponsorAdCreate = $this->post(self::ROUTE);
        $sponsorAdUpdate = $this->put(self::ROUTE . "/" . $sponsorAd['id']);
        $sponsorAdEdit = $this->get(self::ROUTE . "/" . $sponsorAd['id'] . "/edit");
        $sponsorAdDelete = $this->delete(self::ROUTE . "/" . $sponsorAd['id']);

        $sponsorAdList->assertStatus(302);
        $sponsorAdCreate->assertStatus(302);
        $sponsorAdUpdate->assertStatus(302);
        $sponsorAdEdit->assertStatus(302);
        $sponsorAdDelete->assertStatus(302);
    }

    //Store Validation Test
    public function test_sponsorAd_cannot_store_without_name(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }


    //Store Process
    public function test_store_process_of_sponsorAd(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfSponsorAdBefore = SponsorAd::count();
        $request = $this->prepareData("Test Name");
        $this->post(self::ROUTE, $request);
        $totalNumberOfSponsorAdAfter = SponsorAd::count();
        $this->assertEquals($totalNumberOfSponsorAdBefore + 1, $totalNumberOfSponsorAdAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($request));
    }

    //Listing Process
    public function test_list_of_sponsorAd(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $response = $this->get(self::ROUTE);
        $response->assertStatus(200);
    }

    //Update Process
    public function test_update_process_of_sponsorAd(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $oldData = SponsorAd::Create($this->prepareData("Test Name"));
        $totalNumberOfSponsorAdBefore = SponsorAd::count();
        $updateData = $this->prepareData("Update Name");
        $this->put(self::ROUTE . "/" . customEncoder($oldData->id), $updateData);
        $totalNumberOfSponsorAdAfter = SponsorAd::count();
        $this->assertEquals($totalNumberOfSponsorAdBefore, $totalNumberOfSponsorAdAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($updateData));
    }

    //Delete Validation
    public function test_csponsorAd_cannot_delete_without_id(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $deleteData = SponsorAd::first();
        $request = $this->prepareDataForDelete('');
        $response = $this->delete(self::ROUTE . '/' . $deleteData, $request);
        $response->assertStatus(302);
    }

    //Delete Process
    public function test_delete_process_of_sponsorAd(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfSponsorAdBefore = SponsorAd::Count();
        $deleteData = SponsorAd::first();
        $request = $this->prepareDataForDelete($deleteData->id);
        $this->delete(self::ROUTE . '/' . $deleteData, $request);
        $totalNumberOfSponsorAdAfter = SponsorAd::Count();
        $this->assertEquals($totalNumberOfSponsorAdBefore, $totalNumberOfSponsorAdAfter + 1);
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
