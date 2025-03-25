<?php

namespace BasicDashboard\Foundations\Domain\Base\Repositories\Eloquent;

use BasicDashboard\Foundations\Domain\Base\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * A Base repository class.
 *
 * @author Nay Ba La
 * All Right Reserved.
 */
class BaseRepository implements BaseRepositoryInterface
{
    /**
     * model
     *
     * @var mixed
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve a connection of eloquent.
     * It should be called by all functions
     *
     * @param bool $useModel A flag that use $model instead of $relation forcibly, when it is passed as true.
     * @param bool $forInsert only adminRelation is returned when true is passed.
     * @return mixed
     */
    public function connection($useModel = false): mixed
    {
        if ($useModel) {
            return $this->model;
        }
        return $this->model;
    }

    /**
     * Creates a row.
     *
     * @param array $params
     * @param bool $useModel
     * @return mixed
     * @throws QueryException
     */
    public function insert(array $params, $useModel = false): mixed
    {
        $query = $this->connection($useModel)->create($params);
        if (!$query) {
            throw new QueryException("Inserting a row was failed.", "sql", [], $query);
        }
        return $query;
    }

    /**
     * Get all records
     *
     *
     * @return mixed
     * @throws QueryException
     */
    public function getAll(): mixed
    {
        $query = $this->connection(true)
            ->orderByRaw('
                CASE
                WHEN updated_at IS NULL THEN created_at
                ELSE updated_at
                END
                DESC')
            ->orderBy('id', 'desc')
            ->get();
        if (!$query) {
            throw new QueryException("Inserting a row was failed.", "sql", [], $query);
        }
        return $query;
    }

    /**
     * Creates a row and then returns a primary ID of created record.
     *
     * @param array $params
     * @param bool $useModel
     * @return mixed
     * @throws QueryException
     */
    public function insertGetId(array $params, $useModel = false): mixed
    {
        $query = $this->insert($params, $useModel);
        if (!$query) {
            throw new QueryException("Inserting a row was failed and can't get id.", "sql", [], $query);
        }
        return $query['id'];
    }

    /**
     * Edit a row and then returns a model.
     *
     * @param int $id
     *
     * @return mixed
     * @throws QueryException
     */
    public function edit($id): mixed
    {
        $id = customDecoder($id);
        $query = $this->connection(true)
            ->where('id', $id)
            ->first();
        return $query;
    }

    public function show($id): mixed
    {
        $id = customDecoder($id);
        $model = $this->connection(true)
            ->where('id',$id)
            ->first();
        return $model;
    }

    public function showBySlug($slug) : mixed
    {
        return $this->connection(true)
            ->where('slug',$slug)
            ->first();
    }

    /**
     * Updates a row that corresponds to the ID.
     *
     * @param $id
     * @param array $params
     * @return mixed
     * @throws QueryException
     */
    public function update(array $params, $id): mixed
    {
        $id = customDecoder($id);
        $model = $this->connection(true)->find($id);
        $query = $model->update($params);
        if (!$query) {
            throw new QueryException("Updating a row was failed.", "sql", [], $query);
        }
        return $query;
    }

    /**
     * Deletes a row that corresponds to the ID.
     *
     * @param $id
     * @return mixed
     * @throws QueryException
     */
    public function delete($id): mixed
    {
        $id = customDecoder($id);
        $this->connection(true)
            ->where('id', $id)
            ->update(['deleted_by' => Auth::user()->id]);
        $query = $this->connection(true)->destroy($id);
        if (!$query) {
            throw new QueryException("Inserting a row was failed.", "sql", [], $query);
        }
        return $query;
    }

    /**
     * Begin DB transaction.
     */
    public function beginTransaction(): void
    {
        DB::beginTransaction();
    }

    /**
     * DB transaction rollback.
     */
    public function rollback(): void
    {
        DB::rollback();
    }

    /**
     * DB transaction commit.
     */
    public function commit(): void
    {
        DB::commit();
    }

    /**
     * increment field and return updated Number
     * @param mixed $id
     * @param mixed $field
     * @param mixed $count
     * @return int
     */
    public function increment($id,$field,$count=1): int
    {
        $id = customDecoder($id);
        $model = $this->connection(true)
            ->where('id',$id);
        $model->increment($field,$count);    
        return $model->first()[$field];
    }

}
