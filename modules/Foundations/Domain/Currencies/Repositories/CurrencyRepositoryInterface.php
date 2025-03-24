<?php
namespace BasicDashboard\Foundations\Domain\Currencies\Repositories;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Database\Eloquent\Builder;
use BasicDashboard\Foundations\Domain\Currencies\Currency;
use BasicDashboard\Foundations\Domain\Base\Repositories\BaseRepositoryInterface;

interface CurrencyRepositoryInterface extends BaseRepositoryInterface
{
    public function filterCurrency($params): Builder | Currency;
    public function getCurrencyList($params,$countryId) : LengthAwarePaginator;

}