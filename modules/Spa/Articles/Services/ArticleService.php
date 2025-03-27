<?php
namespace BasicDashboard\Spa\Articles\Services;

use BasicDashboard\Foundations\Domain\Articles\Repositories\ArticleRepositoryInterface;
use BasicDashboard\Foundations\Domain\Categories\Repositories\CategoryRepositoryInterface;
use BasicDashboard\Foundations\Domain\Notifications\Repositories\NotificationRepositoryInterface;
use BasicDashboard\Foundations\Domain\SponsorAds\Repositories\SponsorAdRepositoryInterface;
use BasicDashboard\Spa\Articles\Resources\ArticleResource;
use BasicDashboard\Spa\Articles\Resources\HomeArticleResource;
use BasicDashboard\Spa\Common\BaseSpaController;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 *
 * A ArticleService is the manager of methods.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class ArticleService extends BaseSpaController
{

    const ADD_COUNT_SUCCESS = "Total view count add success";
    public function __construct(
        private ArticleRepositoryInterface $articleRepositoryInterface,
        private CategoryRepositoryInterface $categoryRepositoryInterface,
        private SponsorAdRepositoryInterface $sponsorAdRepositoryInterface,
        private NotificationRepositoryInterface $notificationRepositoryInterface
    ) {
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index(array $request): JsonResponse
    {
        $data = $this->articleRepositoryInterface->getArticles(params: $request);
        $data = HomeArticleResource::collection(resource: $data)->response()->getData(assoc: true);
        return $this->sendResponse(message: "Index success", data: $data);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function show(string $id): JsonResponse
    {
        $article = $this->articleRepositoryInterface->getModelWithoutEncodedId(id: $id);
        if(!$article){
            return response()->json([
                'data' => 'No article with this ID',
                'code' => 404
            ],404);
        }
        $article         = new ArticleResource(resource: $article);
        $article         = $article->response()->getData(assoc: true)['data'];
        $relatedArticles = $this->articleRepositoryInterface->getRelatedArticles($article['id'],$article['category_id'], limit: 5);
        $relatedArticles = HomeArticleResource::collection(resource: $relatedArticles)->response()->getData(assoc: true);
        $data            = [
            'article'          => $article,
            'related_articles' => $relatedArticles['data'],

        ];
        return $this->sendResponse(message: 'Show success', data: $data);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function addViewCount($id): JsonResponse
    {
        try {
            $this->articleRepositoryInterface->beginTransaction();
            $count = $this->articleRepositoryInterface->increment($id, 'total_view_count');
            $this->articleRepositoryInterface->commit();
            return $this->sendResponse(self::ADD_COUNT_SUCCESS, ['count' => $count]);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function homeIndex(): JsonResponse
    {
        $limitTopLatestArticles = 5;
        try {
            $this->articleRepositoryInterface->beginTransaction();
            $flashNews         = $this->articleRepositoryInterface->getFlashNews();
            $topSponsorAds     = $this->sponsorAdRepositoryInterface->getSponsorAds('Header');
            $bannerNews        = $this->articleRepositoryInterface->getBannerNews();
            $topLatestArticles = $this->articleRepositoryInterface->getLatestArticles($limitTopLatestArticles);
            $sponsorAds        = $this->sponsorAdRepositoryInterface->getSponsorAds('Center');
            $footerSponsorAds  = $this->sponsorAdRepositoryInterface->getSponsorAds('Footer');
            $homeArticles      = $this->articleRepositoryInterface->getHomeData($this->categoryRepositoryInterface->getCategoryListForHome());
            $popUpNotification = $this->notificationRepositoryInterface->getPopUpNotification();
            $flashNews         = HomeArticleResource::collection($flashNews)->response()->getData(true);
            $bannerNews        = HomeArticleResource::collection($bannerNews)->response()->getData(true);
            $topLatestArticles = HomeArticleResource::collection($topLatestArticles)->response()->getData(true);
            $data              = [
                'flash_news'         => $flashNews['data'],
                'top_sponsor_ads'    => $topSponsorAds['data'],
                'banner_news'        => $bannerNews['data'],
                'top_latest_article' => $topLatestArticles['data'],
                'sponsor_ads'        => $sponsorAds['data'],
                'footer_sponsor_ads' => $footerSponsorAds['data'],
                'home_articles'      => $homeArticles,
                'popUpNotification'  => $popUpNotification,
            ];
            $this->articleRepositoryInterface->commit();
            return $this->sendResponse("Home success", $data);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
