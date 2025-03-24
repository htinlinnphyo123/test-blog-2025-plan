<?php

namespace BasicDashboard\Foundations\Domain\Users\Repositories\Eloquent;

use BasicDashboard\Foundations\Domain\Base\Repositories\Eloquent\BaseRepository;
use BasicDashboard\Foundations\Domain\Users\Repositories\UserRepositoryInterface;
use BasicDashboard\Foundations\Domain\Users\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function filterUser(array $params): Builder | User
    {

        $connection = $this->connection(true)->with(['country', 'roles']);
        if (isset($params['keyword']) && strlen($params['keyword']) > 0) {
            $keyword = $params['keyword'];
            $connection->where(function (Builder $query) use ($keyword) {
                $query->orWhereHas('country', function (Builder $q) use ($keyword) {
                    $q->where('name', 'like', '%' . $keyword . '%');
                });
                $query->orWhereHas('roles', function (Builder $q) use ($keyword) {
                    $q->where('name', 'like', '%' . $keyword . '%');
                });
            })->orWhere('name', 'LIKE', '%' . $params['keyword'] . '%')
                ->orWhere('email', 'LIKE', '%' . $params['keyword'] . '%')
                ->orWhere('phone', 'LIKE', '%' . $params['keyword'] . '%')
                ->orWhere('father_name', 'LIKE', '%' . $params['keyword'] . '%')
                ->orWhere('gender', 'LIKE', '%' . $params['keyword'] . '%');
        }
        return $connection;
    }

    public function getUserList($params): LengthAwarePaginator
    {
        return $this->filterUser($params)
            ->orderByRaw('CASE WHEN created_at IS NULL THEN updated_at ELSE created_at END DESC')
            ->orderBy('id', 'desc')
            ->paginate(request()->paginate ?? config('numbers.paginate'));
    }

    //Mobile Sections
    public function findByEmail($params): mixed
    {
        return $this->connection(true)->where('email', $params['email'])->where('status', true)->first();
    }

    public function getUserOneTap($params): mixed
    {
        return $this->connection(true)
            ->where('oauth_id', $params['oauth_id'])
            ->where('oauth_provider', $params['oauth_provider'])
            ->first();
    }
}
