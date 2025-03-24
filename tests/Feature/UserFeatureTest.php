<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserFeatureTest extends TestCase
{
    use DatabaseTransactions, TestingRequirement;

    const ROUTE = "/users";
    const MODEL = "users";

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function test_prevent_non_logged_users_to_access_routes(): void
    {
        $user = $this->getRandomUser();
        $userList = $this->get(self::ROUTE);
        $userCreate = $this->post(self::ROUTE);
        $userUpdate = $this->put(self::ROUTE . "/" . $user->id);
        $userEdit = $this->get(self::ROUTE . "/" . $user->id . "/edit");
        $userDelete = $this->delete(self::ROUTE . "/" . $user->id);

        $userCreate->assertStatus(302);
        $userList->assertStatus(302);
        $userUpdate->assertStatus(302);
        $userEdit->assertStatus(302);
        $userDelete->assertStatus(302);
    }

}
