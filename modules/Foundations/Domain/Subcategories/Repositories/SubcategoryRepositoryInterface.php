<?php
namespace BasicDashboard\Foundations\Domain\Subcategories\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use BasicDashboard\Foundations\Domain\Subcategories\Subcategory;
use BasicDashboard\Foundations\Domain\Base\Repositories\BaseRepositoryInterface;

interface SubcategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function filterSubcategory(array $params): Builder | Subcategory;
    public function getSubcategoryList($params) : LengthAwarePaginator;
    public function getSubcategories(array $request): Collection;
}
