<?php

namespace BasicDashboard\Web\Articles\Traits;


use function Illuminate\Support\defer;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Article\CreateNotification;
use BasicDashboard\Spa\Articles\Resources\ArticleResource;

trait SendTelegramNotification
{
    public function sendTelegramNotificationTrait(string $articleId): void
    {
        $categories = $this->getCategories();
        $article    = $this->getFormattedArticle($articleId);

        $chatId     = config('services.telegram-bot-api.chat_id');
        defer(function () use ($article, $categories, $chatId) {
            Notification::route('telegram', $chatId)
                ->notify(new CreateNotification($article['title'], $article['id'], $article['thumbnail'], $categories));
        });
    }

    /**
     * Prepare Categories For Telegram Notification
     * @return array
     */
    private function getCategories(): array
    {
        $categories = $this->categoryRepository->connection(true)->pluck('name')->toArray();
        return $categories;
    }


    /**
     * Prepare Article For Telegram Notification
     * @param string $articleId
     * @return array
     */
    public function getFormattedArticle(string $articleId): array
    {
        $article = $this->articleRepository->show(id: $articleId);
        $article = new ArticleResource($article);
        return $article->response()->getData(true)['data'];
    }
}
