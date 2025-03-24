<?php

namespace BasicDashboard\Foundations\Domain\Base\Repositories;

/**
 * An interface for BaseRepository class.
 *
 * @author Nay Ba La
 * @copyright (c) 2022 - Zote Innovation, All Right Reserved.
 */
interface BaseRepositoryInterface
{
    /**
     * Creates a row.
     *
     * @param array $params
     * @param bool $useModel
     * @return mixed
     */
    public function insert(array $request, $useModel = false):mixed;

    /**
     * Creates a row and then returns a primary ID of created record.
     *
     * @param array $params
     * @param bool $useModel
     * @return mixed
     */
    public function insertGetId(array $params, $useModel = false);

    /**
     * Fetch data with pagination.
     *
     * @param array $params
     * @return mixed
     */
    public function getAll();

    /**
     * Updates a row that corresponds to the ID.
     *
     * @param $id
     * @param array $params
     * @return mixed
     */
    public function update(array $params, $id);

    /**
     * Deletes a row that corresponds to the ID.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);
    public function beginTransaction():void;
    public function commit():void;
    public function edit($id): mixed; 
    public function show($id): mixed;
    public function connection($useModel = false): mixed;
}
