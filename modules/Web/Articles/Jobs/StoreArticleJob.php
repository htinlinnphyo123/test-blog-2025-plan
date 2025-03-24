<?php
namespace BasicDashboard\Web\Articles\Jobs;

class StoreArticleJob
{
    //get link count to generate presigned url
    public function getLinks(array $request): mixed
    {
        $linkCount = 0;
        if (isset($request['link_count'])) {
            $linkCount = $request['link_count'];
        }
        return $linkCount;
    }

    public function checkTelegramNotification($request): bool
    {
        $telegramNotification = false;
        if ($request['is_sent_to_telegram'] == '1') {
            $telegramNotification = true;
        }

        return $telegramNotification;
    }

    public function modelUpdater($model, $paths, $thumbnailPath): void
    {
        $model->update([
            'link'      => $paths,
            'thumbnail' => $thumbnailPath,
        ]);
    }

    public function prepareReturnData($langPath, $urls, $id): array
    {
        return [
            'message'      => __($langPath . '_created'),
            'responseType' => 'success',
            'status'       => 200,
            'data'         => $urls,
            'id'           => customEncoder($id),
        ];
    }

}
