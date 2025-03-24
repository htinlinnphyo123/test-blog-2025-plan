<?php

namespace Tests\Feature;

use BasicDashboard\Foundations\Domain\Notifications\Notification;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class NotificationFeatureTest extends TestCase
{
    use DatabaseTransactions, TestingRequirement;

    const ROUTE = "/notifications";
    const TABLE = "notifications";

    public function test_prevent_non_logged_users_to_access_notification_routes(): void
    {
        $notification = Notification::first()->toArray();
        $notificationList = $this->get(self::ROUTE);
        $notificationCreate = $this->post(self::ROUTE);
        $notificationEdit = $this->get(self::ROUTE . "/" . $notification['id'] . "/edit");
        $notificationUpdate = $this->put(self::ROUTE . "/" . $notification['id'], $notification);
        $notificationDelete = $this->delete(self::ROUTE . "/" . $notification['id']);

        $notificationList->assertStatus(302);
        $notificationCreate->assertStatus(302);
        $notificationEdit->assertStatus(302);
        $notificationUpdate->assertStatus(302);
        $notificationDelete->assertStatus(302);
    }
    //Store Validation Test
    public function test_notification_cannot_store_without_title(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("", "body", "sending_method");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_notification_cannot_store_without_body(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("title", "", "sending_method");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    public function test_notification_cannot_store_without_sending_method(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("", "", "sending_method");
        $response = $this->post(self::ROUTE, $request);
        $response->assertStatus(302);
    }

    //Store Process Test
    public function test_store_process_of_notification(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfNotificationBefore = Notification::count();
        $request = $this->prepareData("title", "body", "sending_method");
        $this->post(self::ROUTE, $request);
        $totalNumberOfNotificationAfter = Notification::count();
        $this->assertEquals($totalNumberOfNotificationBefore + 1, $totalNumberOfNotificationAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($request));
    }

    //List Process Test
    public function test_list_of_notification(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $response = $this->get(self::ROUTE);
        $response->assertStatus(200);
    }

    //Edit Process Test
    public function test_edit_process_of_notification(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $editData = Notification::first();
        $response = $this->get(self::ROUTE . "/" . customEncoder($editData['id']) . "/edit");
        $response->assertStatus(200);
    }

    //Update Process Test
    public function test_update_process_of_notification(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $oldData = Notification::Create($this->prepareData("title", "body", "sending_method"));
        $totalNumberOfNotificationBefore = Notification::count();
        $updateData = $this->prepareData("title", "body", "sending_method");
        $this->put(self::ROUTE . "/" . customEncoder($oldData->id), $updateData);
        $totalNumberOfNotificationAfter = Notification::count();
        $this->assertEquals($totalNumberOfNotificationBefore, $totalNumberOfNotificationAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($updateData));
    }

    //Delete Validation Test
    public function test_notification_cannot_delete_without_id(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $deleteData = Notification::first();
        $request = $this->prepareDataForDelete('');
        $response = $this->delete(self::ROUTE . "/" . $deleteData, $request);
        $response->assertStatus(302);
    }

    //Delete Process Test
    public function test_delete_process_of_notification(): void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfNotificationBefore = Notification::count();
        $deleteData = Notification::first();
        $request = $this->prepareDataForDelete($deleteData->id);
        $this->delete(self::ROUTE . "/" . customEncoder($deleteData->id), $request);
        $totalNumberOfNotificationAfter = Notification::count();
        $this->assertEquals($totalNumberOfNotificationBefore - 1, $totalNumberOfNotificationAfter);
    }

    //Private Section
    private function prepareData(string $param1, string $param2, string $param3): array
    {
        return [
            "title" => $param1,
            "body" => $param2,
            "sending_method" => $param3,
        ];
    }

    private function prepareDataForCheck(array $data): array
    {
        return [
            'title' => isset($data['title']) ? $data['title'] : '',
            'body' => isset($data['body']) ? $data['body'] : '',
            'sending_method' => isset($data['sending_method']) ? $data['sending_method'] : '',
        ];
    }

    private function prepareDataForDelete(string $id): array
    {
        return [
            'id' => $id != '' ? customEncoder($id) : '',
        ];
    }
}
