<?php
namespace BasicDashboard\Foundations\Domain\Articles\Repositories\Eloquent;

use BasicDashboard\Foundations\Domain\Articles\Article;
use BasicDashboard\Foundations\Domain\Articles\Repositories\ArticleRepositoryInterface;
use BasicDashboard\Foundations\Domain\Base\Repositories\Eloquent\BaseRepository;
use BasicDashboard\Spa\Articles\Resources\HomeArticleResource;
use BasicDashboard\Spa\Categories\Resources\PureCategoryResource;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 *
 * A ArticleRepository is includes extra function for implementing.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    public function __construct(Article $model)
    {
        parent::__construct($model);
    }

    public function filterArticle(array $params): Builder | Article
    {
        $connection = $this->connection()->with(['category', 'subcategory', 'createdBy', 'writtenBy']);
        if (isset($params['keyword']) && strlen($params['keyword']) > 0) {
            $connection = $connection->where('title', 'LIKE', '%' . $params['keyword'] . '%');
        }

        $isPublished  = $params['is_published'] ?? false;
        $isBanner     = $params['is_banner'] ?? false;
        $isHighlighed = $params['is_highlighed'] ?? false;
        $category     = $params['category'] ?? false;
        $subcategory  = $params['subcategory'] ?? false;

        $connection = $connection->when($isPublished, function ($query) use ($isPublished) {
            return $query->where('is_published', $isPublished == 'yes');
        })
            ->when($isBanner, function ($query) use ($isBanner) {
                return $query->where('is_banner', $isBanner == 'yes');
            })
            ->when($isHighlighed, function ($query) use ($isHighlighed) {
                return $query->where('is_highlighed', $isHighlighed == 'yes');
            })
            ->when($category, function ($query) use ($category) {
                return $query->whereHas('category', function (Builder $query) use ($category) {
                    return $query->where('name', $category);
                });
            })
            ->when($subcategory, function ($query) use ($subcategory) {
                return $query->whereHas('subcategory', function (Builder $query) use ($subcategory) {
                    return $query->where('name', $subcategory);
                });
            });
        return $connection;
    }

    public function getArticleList($params): LengthAwarePaginator
    {
        return $this->filterArticle($params)
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(request()->paginate ?? config('numbers.paginate'));
    }

    //Mobile Sections
    public function getArticles(array $params): LengthAwarePaginator
    {
        $categoryId = $params['category_id'] ?? false;
        $subcategoryId = $params['subcategory_id'] ?? false;
        return $this->connection(true)
            ->with(['category', 'subcategory'])
            ->when($categoryId ?? false, function ($query) use ($categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->when($subcategoryId ?? false, function ($query) use ($subcategoryId) {
                return $query->where('subcategory_id', customDecoder($subcategoryId));
            })
            ->where('is_published', true)
            ->orderBy('id', 'desc')
            ->paginate(request()->paginate ?? config('numbers.paginate'));
    }

    public function getTheMostView(int $limit = 5): Collection
    {
        return $this->connection()
            ->where('is_published', 1)
            ->orderBy('total_view_count', 'desc')
            ->limit($limit)
            ->get();
    }

    //Spa Sections
    public function getBannerNews(int $limit = 10): Collection
    {
        return $this->connection(true)
            ->where('is_banner', 1)
            ->where('is_published', 1)
            ->limit($limit)
            ->orderByRaw('CASE WHEN created_at IS NULL THEN updated_at ELSE created_at END DESC')
            ->get();
    }

    public function getFlashNews(int $limit = 5): Collection
    {
        return $this->connection(true)
            ->where('is_highlighed', 1)
            ->where('is_published', 1)
            ->orderBy('created_at','desc')
            ->limit($limit)
            ->get();
    }

    public function getTopViews(int $limit = 3): Collection
    {
        return $this->connection(true)
            ->where('is_published', 1)
            ->orderBy('total_view_count', 'desc')
            ->limit($limit)
            ->get();
    }

    public function getHomeArticles(int $limit = 6): Collection
    {
        return $this->connection(true)
            ->where('is_published', 1)
            ->orderByRaw('CASE WHEN created_at IS NULL THEN updated_at ELSE created_at END DESC')
            ->where('category_id', 1)
            ->limit($limit)
            ->get();
    }

    public function getVideoArticles(int $limit = 3): Collection
    {
        return $this->connection(true)
            ->where('is_published', 1)
            ->orderByRaw('CASE WHEN created_at IS NULL THEN updated_at ELSE created_at END DESC')
            ->where('type', 'video')
            ->limit($limit)
            ->get();
    }

    public function getLatestArticles(int $limit = 6, bool $skip = false): Collection
    {
        return $this->connection(true)
            ->where('is_published', 1)
            ->orderByRaw('CASE WHEN created_at IS NULL THEN updated_at ELSE created_at END DESC')
            ->when($skip, function ($query) {
                return $query->skip(4);
            })
            ->limit($limit)
            ->get();
    }

    public function getAudioArticles(int $limit = 3): Collection
    {
        return $this->connection(true)
            ->where('is_published', 1)
            ->orderByRaw('CASE WHEN created_at IS NULL THEN updated_at ELSE created_at END DESC')
            ->where('type', 'audio')
            ->limit($limit)
            ->get();
    }

    public function getRelatedArticles(string $id,string $categoryId, int $limit = 3): Collection
    {
        return $this->connection(true)
            ->where('is_published', 1)
            ->where('id', "!=", $id)
            ->orderByRaw('CASE WHEN created_at IS NULL THEN updated_at ELSE created_at END DESC')
            ->where('category_id', $categoryId)
            ->orderByRaw('RAND()')->take($limit)->get();

    }

    public function homeCategory($params): LengthAwarePaginator
    {
        return $this->connection($params)
            ->where('category_id', 1)
            ->orderByRaw('CASE WHEN created_at IS NULL THEN updated_at ELSE created_at END DESC')
            ->orderBy('id', 'desc')
            ->paginate(request()->paginate ?? config('numbers.paginate'));
    }

    public function getHomeData($categories, int $articleLimit = 4, int $videoLimit = 3, int $audioLimit = 3): array
    {
        $data = [];
        foreach ($categories as $category) {
            $category = new PureCategoryResource($category);
            $data[]   = [
                "category_info" => $category->response()->getData(true)['data'],
                "articles"      => $this->HomeDataEloquent('', ['photo', 'default'], $articleLimit, $category['id']),
                "videos"        => $this->HomeDataEloquent('video', [], $videoLimit, $category['id']),
                "audios"        => $this->HomeDataEloquent('audio', [], $audioLimit, $category['id']),
            ];
        }
        return $data;
    }

    //private functions
    protected function HomeDataEloquent(string $type, array $types, int $limit, string $categoryId): array
    {
        return HomeArticleResource::collection($this->connection(true)
                ->where('is_published', 1)
                ->when($types != [], function ($query) use ($types) {
                    return $query->whereIn('type', $types);
                })
                ->when($type != '', function ($query) use ($type) {
                    return $query->where('type', $type);
                })
                ->where('category_id', $categoryId)
                ->orderByRaw('CASE WHEN created_at IS NULL THEN updated_at ELSE created_at END DESC')
                ->limit($limit)
                ->get())->response()->getData(true)['data'];
    }

    public function getModelWithoutEncodedId(string $id) : Article|null
    {
        return $this->model->where('id',$id)->first();
    }

}
