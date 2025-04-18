<?php
namespace BasicDashboard\Web\Articles\Services;

use Exception;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Ladumor\OneSignal\OneSignal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use function Illuminate\Support\defer;
use Illuminate\Support\Facades\Notification;
use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Web\Articles\Jobs\StoreArticleJob;
use BasicDashboard\Web\Articles\Jobs\UpdateArticleJob;
use BasicDashboard\Foundations\Domain\Categories\Category;
use BasicDashboard\Web\Articles\Resources\ArticleResource;
use BasicDashboard\Web\Articles\Resources\EditArticleResource;
use BasicDashboard\Foundations\Domain\Subcategories\Subcategory;
use BasicDashboard\Web\Articles\Traits\SendTelegramNotification;
use BasicDashboard\Foundations\Domain\Articles\Repositories\ArticleRepositoryInterface;
use BasicDashboard\Foundations\Domain\Categories\Repositories\CategoryRepositoryInterface;

/**
 *
 * A ArticleService is the manager of methods.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class ArticleService extends BaseController
{
    use SendTelegramNotification;
    const VIEW      = 'admin.article';
    const ROUTE     = 'articles';
    const LANG_PATH = "article.article";

    public function __construct(
        private ArticleRepositoryInterface $articleRepository,
        private CategoryRepositoryInterface $categoryRepository,
        private Notification $notification,
        private StoreArticleJob $storeArticleJob
    ) {}

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index(array $request): View
    {
        $articleList = $this->articleRepository->getArticleList($request);
        $articleList = ArticleResource::collection($articleList)->response()->getData(true);
        return $this->returnView(self::VIEW . ".index", $articleList);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function create(): View
    {
        $viewCategories = Category::all(['id','name']);
        $viewSubcategories = Subcategory::all(['id','name']);
        return view(self::VIEW . '.create',compact('viewCategories','viewSubcategories'));
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function store($request) :RedirectResponse
    {
        try {
            $this->articleRepository->beginTransaction();
            $request['is_published'] = 1;
            $model                = $this->articleRepository->insert($request);
            $path                 = "articles" . '/' . $model['id'];
            $paths = [];
            if($request['link'] ?? false){
                $paths = uploadFilesToDigitalOcean($request['link'], $path);
            }
            $thumbnailPath        = isset($request['thumbnail']) ? uploadImageToDigitalOcean($request['thumbnail'], $path) : null;
            $this->storeArticleJob->modelUpdater($model, $paths, $thumbnailPath);
            $this->articleRepository->commit();
            return $this->redirectRoute(self::ROUTE. ".index", __(self::LANG_PATH. '_created'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->articleRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function edit(string $id): View | RedirectResponse
    {
        $article = $this->articleRepository->edit($id);
        $article = new EditArticleResource($article);
        $article = $article->response()->getData(true)['data'];
        return $this->returnView(self::VIEW . ".edit", $article);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function show(string $id): View | RedirectResponse
    {
        $article = $this->articleRepository->show($id);
        $article = new ArticleResource($article);
        $article = $article->response()->getData(true)['data'];
        return $this->returnView(self::VIEW . '.show', $article);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function update($request, string $id, UpdateArticleJob $updateJob): RedirectResponse
    {
        try {
            $model = $this->articleRepository->show($id);

            if ($request['type'] !== $model->type ?? $model->link) {
                $model->link = $updateJob->typeChangedAndAllLinkDeleted($model->link);
            }
            $this->articleRepository->beginTransaction();
            $this->articleRepository->update($request, $id);
            
            $path = "articles" . '/' . $model->id;
            $paths = [];

            if($request['link'] ?? false){
                $paths = uploadFilesToDigitalOcean($request['link'], $path);
            }

            $thumbnailPath = $updateJob->updateThumbnail($request, $model->thumbnail, $path);

            // Update model with merged links and new thumbnail
            $model->update([
                'link' => array_merge($model->link ?? [], $paths ?? []),
                'thumbnail' => $thumbnailPath,
            ]);

            $this->articleRepository->commit();
            return $this->redirectRoute(self::ROUTE. ".index", __(self::LANG_PATH. '_created'));            
        } catch (Exception $e) {
            \Log::info($e);
            return $this->redirectBackWithError($this->articleRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function destroy(array $request): RedirectResponse
    {
        try {
            $this->articleRepository->beginTransaction();
            $this->articleRepository->delete($request['id']);
            $this->articleRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __(self::LANG_PATH . '_deleted'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->articleRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    /**
     * Send One Signal Notification
     * @param mixed $request
     * @param mixed $id
     * @return JsonResponse|mixed
     */
    public function sendArticleNotification($request, $id)
    {
        $request->validate([
            'country' => 'required',
        ], [
            'country.required' => "Please Select Country",
        ]);
        $country = $request->input('country');
        $article = $this->articleRepository->show($id);
        $article = new ArticleResource($article);
        $article = $article->response()->getData(true)['data'];

        $imageUrl = $article['thumbnail'];

        $fields = [
            'included_segments'  => [$country],
            'chrome_web_image'   => $imageUrl, //Chrome web push. Windows and Android only.
            'chrome_web_icon'    => $imageUrl, //Chrome web push
            'chrome_big_picture' => $imageUrl, //Chrome Apps
            'chrome_web_badge'   => $imageUrl, //Chrome web push. Android only.
            'chrome_icon'        => $imageUrl, //Chrome app
            'firefox_icon'       => $imageUrl, //Firefox web push
            'huawei_big_picture' => $imageUrl, //Huawei
            'huawei_small_icon'  => $imageUrl, //Huawei
            'huawei_large_icon'  => $imageUrl, //Huawei
            'adm_big_picture'    => $imageUrl, //Amazon
            'adm_small_icon'     => $imageUrl, //Amazon
            'adm_large_icon'     => $imageUrl, //Huawei
            'big_picture'        => $imageUrl, //Android
            'small_icon'         => $imageUrl, //Android
            'large_icon'         => $imageUrl, //Android
            'data'               => [
                'article_id' => $article['id'],
            ],
        ];
        // defer(function () use ($fields, $article) {
            $test = OneSignal::sendPush($fields, "**" . $article['title']);
            \Log::info($test);
        // });
        return $this->sendAjaxSuccess("Article was successfully Send!");
    }

    //This private function will be run with defer
    public function sendTelegramNotification($articleId): RedirectResponse
    {
        $this->sendTelegramNotificationTrait($articleId);

        return to_route("articles.show", $articleId)->with([
            'message'      => 'Article was successfully Send to Telegram!',
            'responseType' => 'success',
        ]);
    }

}
