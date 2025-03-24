<?php

namespace BasicDashboard\Foundations\Domain\SponsorAds\Repositories;

use BasicDashboard\Foundations\Domain\Base\Repositories\BaseRepositoryInterface;
use BasicDashboard\Foundations\Domain\SponsorAds\SponsorAd;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 *
 * A SponsorAdRepositoryInterface is declaration of methods inside of Repository.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

interface SponsorAdRepositoryInterface extends BaseRepositoryInterface
{
    public function getSponsorAdList($params): LengthAwarePaginator;
    public function filterSponsorAd(array $params): Builder | SponsorAd;
    public function getSponsorAds(string $position = null): Collection;
    public function getSponsorAdsBySize(string $size): Collection;
    public function getRandomSponsorAdsSpa(string $position=null) : array;

}