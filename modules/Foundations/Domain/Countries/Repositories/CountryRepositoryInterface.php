<?php
namespace BasicDashboard\Foundations\Domain\Countries\Repositories;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Database\Eloquent\Builder;
use BasicDashboard\Foundations\Domain\Countries\Country;
use BasicDashboard\Foundations\Domain\Base\Repositories\BaseRepositoryInterface;

interface CountryRepositoryInterface extends BaseRepositoryInterface
{

    public function filterCountry(array $params): Builder | Country;
    public function getCountryList($params) : LengthAwarePaginator;

}