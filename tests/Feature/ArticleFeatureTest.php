<?php

namespace Tests\Feature;

use BasicDashboard\Foundations\Domain\Articles\Article;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ArticleFeatureTest extends TestCase
{
    use DatabaseTransactions, TestingRequirement;

    const ROUTE = "/articles";
    const TABLE = "articles";

    public function test_prevent_non_logged_users_to_access_article(): void
    {
        $article = Article::first()->toArray();
        $articleList = $this->get(self::ROUTE);
        $articleCreate = $this->post(self::ROUTE);
        $articleEdit = $this->get(self::ROUTE . "/" . $article['id'] . "/edit");
        $articleUpdate = $this->put(self::ROUTE . "/" . $article['id'], $article);
        $articleDelete = $this->delete(self::ROUTE . "/" . $article['id']);

        $articleList->assertStatus(302);
        $articleCreate->assertStatus(302);
        $articleEdit->assertStatus(302);
        $articleUpdate->assertStatus(302);
        $articleDelete->assertStatus(302);
    }

    //Store Validation Test
    public function test_article_cannot_store_without_title():void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request = $this->prepareData("", "category_id");
        $response = $this->post(self::ROUTE,$request);
        $response->assertStatus(302);
    }

    public function test_articla_cannot_store_without_category():void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $request=$this->prepareData("title","");
        $response = $this->post(self::ROUTE,$request);
        $response->assertStatus(302);
    }

    //Store Process Test
    public function test_store_process_of_article():void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totalNumberOfArticleBefore = Article::count();
        $request = $this->prepareData("title", "1","default");
        $this->post(self::ROUTE, $request);
        $totalNumberOfArticleAfter = Article::count();
        $this->assertEquals($totalNumberOfArticleBefore + 1, $totalNumberOfArticleAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($request));
    }

    //List Process Test
    public function test_list_of_article():void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $response = $this->get(self::ROUTE);
        $response->assertStatus(200);
    }

    //Edit Process Test
    public function test_edit_process_of_article():void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $editData = Article::first();
        $response = $this->get(self::ROUTE . "/" . customEncoder($editData['id']) . "/edit");
        $response->assertStatus(200);
    }

    //Update Process Test
    public function test_update_process_of_article():void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $oldData = Article::create($this->prepareData("title","1"));
        $totalNumberOfArticleBefore = Article::count();
        $updateData = $this->prepareData("title","1");
        $this->put(self::ROUTE. "/" . customEncoder($oldData->id), $updateData);
        $totalNumberOfArticleAfter = Article::count();
        $this->assertEquals($totalNumberOfArticleBefore,$totalNumberOfArticleAfter);
        $this->assertDatabaseHas(self::TABLE, $this->prepareDataForCheck($updateData));
    }

    //Delete Validation Test
    public function test_article_cannot_delete_without_id():void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $deleteData = Article::first();
        $request = $this->prepareDataForDelete('');
        $response = $this->delete(self::ROUTE . "/" . $deleteData,$request);
        $response->assertStatus(302);
    }

    //Delete Process Test
    public function test_delete_process_of_article():void
    {
        $this->AuthenticateUserForCustomMiddleware();
        $totleNumberOfArticleBefore = Article::count();
        $deleteData = Article::first();
        $request = $this->prepareDataForDelete($deleteData->id);
        $this->delete(self::ROUTE . "/" . customEncoder($deleteData['id']), $request);
        $totalNumberOfArticleAfter = Article::count();
        $this->assertEquals($totleNumberOfArticleBefore - 1, $totalNumberOfArticleAfter);
    }

    //Private Section
    private function prepareData(string $param1, string $param2): array
    {
        return [
            "title" => $param1,
            "category_id" => $param2,
        ];
    }

    private function prepareDataForCheck(array $data): array
    {
        return [
            'title' => isset($data['title']) ? $data['title'] : '',
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
