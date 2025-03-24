<?php
namespace BasicDashboard\Foundations\Domain\Users\Repositories;
use BasicDashboard\Foundations\Domain\Base\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use BasicDashboard\Foundations\Domain\Users\User;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getUserList($params): LengthAwarePaginator;
    public function filterUser(array $params): Builder | User;
    public function findByEmail($params):mixed;
    public function getUserOneTap($params):mixed;

}

